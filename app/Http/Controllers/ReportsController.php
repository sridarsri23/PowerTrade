<?php
namespace dtc\Http\Controllers;
ini_set('max_execution_time', 300);
use DB;
use dtc\Models\Employee;
use dtc\Models\Loading;
use dtc\Models\Lorry;
use dtc\Models\Route;
use dtc\Models\Sales;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Driver;
use dtc\Models\Helper;
use dtc\Models\Order;
use dtc\Models\Site;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use UserModel;
use Mail;
use Redirect;
use Auth;
use dtc\Models\User;
use Request;
use dtc\Models\Company;
use dtc\Models\Privileges;
use fpdf;
use mysql_report;
use PDF;
use DaySheetPDF;
use LorryTransportBill;
use DSheet;
use CreditSales;

class ReportsController extends Controller{
	function __construct() {
		//parent::__construct();
		Lang::setLocale(Session::get('locale'));
	}

	/**
	 * @return mixed
	 */
	public function dtclog()
	{



		if (Auth::check()&& Helper::getAuth('log'))
		{


			$view =  View::make('report.scslog');



					if (Request::ajax())
					{

						//  $sections = $view->renderSections();
						//	return json_encode($sections);
						return  $view->renderSections()['middle_right_DIV'];
					}
					else{

						return  $view;
					}

			}
		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Access Log');
		Session::put("error_message",Lang::get('messages.action_authorized_warning'));
		return redirect('dashboard');
		}


}


	/**
	 * Display a listing of the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$site_id=Auth::user()->site_id;
		$companies=Company::where('is_deleted','=',0)->lists('name','id');
		$orders=Order::where('is_deleted','=',0)->where('site_id','=',$site_id)->lists('po_number','id');
		return view('report.report')
			->with('companies',$companies)
			->with('orders',$orders)
			;
	}
	public function lorry_transport_bill_index()
	{
		$site_id=Auth::user()->site_id;
		$drivers=Driver::where('is_deleted','=',0)->lists('name','id');
		$drivers_id_bill_date=Driver::where('is_deleted','=',0)->lists('id','bill_date');
		return view('report.lorry_transport_bill')
			->with('drivers',$drivers)
			->with('drivers_id_bill_date',$drivers_id_bill_date)
			;
	}
	public function credit_sales()
	{

        if (Auth::check()&& Helper::getAuth('credit_sales_report'))
        {

		$routes=Route::where('is_deleted','=',0)->lists('name','id');

		return view('report.credit_sales')
			->with('routes',$routes)
			;
        }
        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Credit Sales Report');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');
        }

    }
	public function sales_report()
	{
        if (Auth::check() && Helper::getAuth('sales_report'))
        {
		$sales=Sales::where('is_deleted','=',0)->lists('code','id');

		return view('report.sales_report')
			->with('sales',$sales)
			;
        }
        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Sales Profit Report');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');
        }
	}
	public function sales_balance()
	{
        if (Auth::check() && Helper::getAuth('sales_report'))
        {

		$sales=Sales::where('is_deleted','=',0)->lists('code','id');

		return view('report.sales_balance')
			->with('sales',$sales)
			;
        }
        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Sales Tally Report');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');
        }
	}

    public function normal_sales_report()
    {
        if (Auth::check() && Helper::getAuth('sales_report'))
        {


            $sales=Sales::where('is_deleted','=',0)->lists('code','id');

        return view('report.normal_sales_report')
            ->with('sales',$sales)
            ;
        }
        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Normal Sales Report');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');
        }
    }
	public function day_sheet_index()
	{

		return view('report.day_sheet_report')
			;
	}
	public function period_cash_book_index()
	{

		return view('report.cash_book_period')
			;
	}


	public function post()
	{


		ini_set('error_reporting', 'E_ALL | E_STRICT');
		ini_set('display_errors', 'On');

		$pdf = new PDF('P','mm','A4');
		$pdf->SetFont('Arial','',10);
		$pdf->SetTopMargin(20);
		$pdf->SetAutoPageBreak(auto,54);


		$host = Config::get('database.connections.mysql.host');
		$username = Config::get('database.connections.mysql.username');
		$password = Config::get('database.connections.mysql.password') ;
		$database = Config::get('database.connections.mysql.database');

			$pdf->connect($host, $username, $password, $database);



		$params =Input::all();
		$company=Company::find($params['company_id']);
		$order=Order::find($params['order_id']);


		$total_advance= DB::table('advance')->where('date', '>=',$params['from'])
			->where('date', '<=',$params['to'])
			->where('order_id', '=',$params['order_id'])->sum('amount')
		;
		$attr = array(
			'titleFontSize'=>18,
			'company_name'=>$company->name ,
			'cube_price'=> $order->cube_price ,
			'po_number'=> $order->po_number ,
			'currency'=> Lang::get('setup.currency'),
			'bill_code'=> Helper::getNextCode("company_bill"),
			'from_date'=> $params['from'],
			'to_date'=> $params['to'],
			'created_by'=> Auth::user()->full_name,
			'bill_to'=> $company->contact_person.'|'.$company->address,
			'total_advance'=> $total_advance,
			'titleText'=> 'Company Bill'
		);
	 	$pdf->mysql_report('', false, $attr,$params );


		$pdf->Output();

		\DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
		$user = Auth::user();
		Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);

	}


	public function day_sheet_post()
	{


		ini_set('error_reporting', 'E_ALL | E_STRICT');
		ini_set('display_errors', 'On');

		$pdf = new \DSheet('L','mm','A4');
		$pdf->SetFont('Arial','',10);
		$pdf->SetTopMargin(20);
		$pdf->SetAutoPageBreak(auto,54);
		//$pdf->StartPageGroup();
		//$pdf->AddPage();
	//	$pdf->Write(5, 'Start of group 2');
		//$pdf->AddPage();

		$host = Config::get('database.connections.mysql.host');
		$username = Config::get('database.connections.mysql.username');
		$password = Config::get('database.connections.mysql.password') ;
		$database = Config::get('database.connections.mysql.database');


		$pdf->connect($host, $username, $password, $database);


		$params =Input::all();

		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Sales Report'
		);
		//$pdf->mysql_report('', false, $attr,$params,1 );


		//$attr = array('titleFontSize'=>18, 'titleText'=>'Second Example Title.');


// Generate report
		//$pdf->mysql_report('', false, $attr,$params,2 );

		$sql_statement = "Select loading.delivery_note_code AS 'DN #',
 						  	`loading`.code AS 'D Code',
 						  	`order`.po_number AS 'PO #',
 						  	`point`.name AS 'Point',
 						  	`vehicle`.no AS 'Vehicle',
 						  	`driver`.name AS 'Driver',
 						  	`loading`.is_confirmed AS 'Confirmed',
 						  	`loading`.loading_qty AS 'Qty',
 						  	`order`.cube_price AS 'Cube Price',
 						  	`order`.cube_cost AS 'Cube Cost',
 						  	(`loading`.loading_qty * `order`.cube_price) AS 'Value',
 						  	(`loading`.loading_qty * `order`.cube_cost) AS 'Cost'
							From loading join `order` on loading.order_id=`order`.id
 						join point on `loading`.point_id=`point`.id
 						join driver on loading.driver_id=driver.id
 						join vehicle on loading.vehicle_id=vehicle.id
 						where loading.site_id=#site# and DATE(loading.loading_time) = '#date#'
 						and loading.is_deleted=0
 						 GROUP BY loading.delivery_note_code";

// Generate report
		$pdf->mysql_report($sql_statement, false, $attr );


		/* Example 6: Same report as above but set up to output rows using a LEFT JOIN and SQL to improve the layout */
// SQL statement
		$sql_statement = "Select
          DISTINCT vehicle.no AS 'Vehicle',
          (SELECT po_number FROM `order` where id= expense.order_id) AS 'PO#',
          (Select code from payment where id=expense.payment_id) AS 'Payment Code',
          (SELECT sum(driver_diesel) FROM expense WHERE driver_id =driver.id and DATE(`date`) = '#date#' ) AS 'Tot Driver Diesel',
           (SELECT sum(driver_advance) FROM expense WHERE driver_id =driver.id and DATE(`date`) = '#date#' ) AS 'Tot Driver Advance',
          (SELECT sum(lorry_expense) FROM expense WHERE driver_id =driver.id and DATE(`date`) = '#date#' ) AS 'Tot Lorry Expense',
           (SELECT sum(other) FROM expense WHERE driver_id =driver.id and DATE(`date`) = '#date#' ) AS 'Tot Other',
           (SELECT sum(liters) FROM expense WHERE driver_id =driver.id and DATE(`date`) = '#date#' ) AS 'Tot Voucher Diesel',
           expense.note AS 'Note',
            (SELECT sum(amount) FROM expense WHERE driver_id =driver.id and DATE(`date`) = '#date#' ) AS 'Total  Expense'
       from  expense  join loading  on expense.driver_id=loading.driver_id
      join vehicle on vehicle.id=expense.vehicle_id
      join driver on driver.id=expense.driver_id
      where expense.site_id=#site# and
      DATE(loading.loading_time) = '#date#' and
      loading.is_confirmed =true  and
      loading.is_deleted=0 and
      expense.is_deleted=0 and
      vehicle.is_deleted=0 and
      driver.is_deleted=0
      Group by vehicle.no
" ;
// Generate report

		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'site_id'=> Auth::user()->site_id,
			'site_name'=>$site->name,
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Day Sheet :Usual Expenses'
		);
		$pdf->mysql_report($sql_statement, false, $attr );


		/* Example 6: Same report as above but set up to output rows using a LEFT JOIN and SQL to improve the layout */
// SQL statement
		$sql_statement = "Select
	code AS 'Code',
	(Select code from payment where id=payment_id) AS 'Payment Code',
      petty_cash AS 'Petty Cash',
          other AS 'Other Expense',
           expense.note AS 'Note',
            amount AS 'Expense Total'
       from  expense
      where expense.site_id=#site# and
      DATE(expense.date) = '#date#' and
      expense.is_deleted=0 and driver_id is null
" ;
// Generate report

		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'site_id'=> Auth::user()->site_id,
			'site_name'=>$site->name,
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Day Sheet : Other Expenses'
		);
		$pdf->mysql_report($sql_statement, false, $attr );

		$pdf->Output();

			/*
		\DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
		$user = Auth::user();
		Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
			*/
	}




	public function lorry_transport_bill_post()
	{


		ini_set('error_reporting', 'E_ALL | E_STRICT');
		ini_set('display_errors', 'On');

		$pdf = new LorryTransportBill('L','mm','A4');
		$pdf->SetFont('Arial','',10);
		$pdf->SetTopMargin(20);
		$pdf->SetAutoPageBreak(auto,54);
		//$pdf->StartPageGroup();
		//$pdf->AddPage();
		//	$pdf->Write(5, 'Start of group 2');
		//$pdf->AddPage();

		$host = Config::get('database.connections.mysql.host');
		$username = Config::get('database.connections.mysql.username');
		$password = Config::get('database.connections.mysql.password') ;
		$database = Config::get('database.connections.mysql.database');


		$pdf->connect($host, $username, $password, $database);


		$params =Input::all();

		$site= Site::find( Auth::user()->site_id);
		$driver= Driver::find( $params['driver_id']);
		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'to_date'=> $params['to'],
			'site_id'=> Auth::user()->site_id,
			'site_name'=>$site->name,
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Lorry Transport Bill : Loading',
			'driver_id'=> $params['driver_id'],
			'driver_name'=> $driver->name
		);
		//$pdf->mysql_report('', false, $attr,$params,1 );


		//$attr = array('titleFontSize'=>18, 'titleText'=>'Second Example Title.');


// Generate report
		//$pdf->mysql_report('', false, $attr,$params,2 );
			/*
		$sql_statement = "Select loading.delivery_note_code AS 'DN #',
 						  	`loading`.code AS 'D Code',
 						  	`order`.po_number AS 'PO #',
 						  	`point`.name AS 'Point',
 						  	`vehicle`.no AS 'Vehicle',
 						  	`driver`.name AS 'Driver',
 						  	`loading`.is_confirmed AS 'Confirmed',
 						  	`loading`.loading_qty AS 'Qty',
 						  	`order`.cube_price AS 'Cube Price',
 						  	`order`.cube_cost AS 'Cube Cost',
 						  	(`loading`.loading_qty * `order`.cube_price) AS 'Value',
 						  	(`loading`.loading_qty * `order`.cube_cost) AS 'Cost'
							From loading join `order` on loading.order_id=`order`.id
 						join point on `loading`.point_id=`point`.id
 						join driver on loading.driver_id=driver.id
 						join vehicle on loading.vehicle_id=vehicle.id
 						where loading.site_id=#site# and DATE(loading.loading_time) = '#date#'
 						and loading.is_deleted=0
 						 GROUP BY loading.delivery_note_code";

// Generate report
		$pdf->mysql_report($sql_statement, false, $attr );
				*/
	/* Example 6: Same report as above but set up to output rows using a LEFT JOIN and SQL to improve the layout */
// SQL statement
		$sql_statement = "Select
         DATE(loading.unloading_time) AS 'Date',
           (SELECT name FROM `point` where id=loading.point_id ) AS 'Point',
          (Select name from `order` where id = loading.order_id)  AS 'Order',
          (Select name from `point_incharge` where id = loading.point_incharge_id)  AS 'Point Incharge',
           sum(loading.unloading_qty)  AS 'Cubes',
         (SELECT lorry_cube_charge FROM `order` where id = loading.order_id ) AS 'Lorry-Charge/cube',
         ( (SELECT lorry_cube_charge FROM `order` where id = loading.order_id ) * (sum(loading.unloading_qty)) ) AS 'Lorry Charge',
         GROUP_CONCAT(loading.note SEPARATOR ' | ') AS 'Loading Note'
       from  loading
       join driver on driver.id=loading.driver_id
       join vehicle on vehicle.id=loading.vehicle_id
       join `order` on `order`.id=loading.order_id
       join `point` on `point`.id=loading.point_id
       join `point_incharge` on `point_incharge`.id=loading.point_incharge_id

      where loading.site_id=#site_id# and
      loading.unloading_time >= '#from_date#' and
      loading.unloading_time <= '#to_date#' and
      loading.is_confirmed =true  and
      loading.is_deleted=0 and
      vehicle.is_deleted=0 and
            `point`.is_deleted=0 and
                  `order`.is_deleted=0 and
      driver.id=#driver_id# and
      driver.is_deleted=0
GROUP BY DATE(loading.unloading_time),loading.point_id
" ;
// Generate report
		$pdf->mysql_report($sql_statement, false, $attr );

		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'to_date'=> $params['to'],
			'site_id'=> Auth::user()->site_id,
			'site_name'=>$site->name,
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Lorry Transport Bill : Expenses',
			'driver_id'=> $params['driver_id'],
			'driver_name'=> $driver->name
		);

		$sql_statement = "Select
         expense.date AS 'Date-Time',
          (Select  no from vehicle where id = expense.vehicle_id) AS 'Vehicle',
        round( ( liters / (Select diesel_amount_per_liter from site where id = #site_id# )),2)  AS 'Voucher Diesel Liters',
        liters AS 'Voucher Diesel Amount',
        driver_diesel AS 'Driver Diesel',
        driver_advance AS 'Driver Advance',
        lorry_expense AS 'Lorry Expense',
        other AS 'Other Expense',
        expense.note AS 'Expense Note'  ,
        amount AS 'Expense Total'
       from  expense
       join driver on driver.id=expense.driver_id
       join vehicle on vehicle.id=expense.vehicle_id

      where expense.site_id=#site_id#  and
      expense.date >= '#from_date#' and
      expense.date <= '#to_date#' and
      expense.is_deleted=0 and
      vehicle.is_deleted=0 and
      driver.id=#driver_id# and
      driver.is_deleted=0";
		$pdf->mysql_report($sql_statement, false, $attr );


		if ($params['update_bill_date']){


				\DB::table('driver')->where('id', '=',  $params['driver_id'])
					->update(array('bill_date' => $params['to']));
		}


		$pdf->Output();

		/*
    \DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
    $user = Auth::user();
    Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
        */
	}


	public function credit_saless_post()
	{


		ini_set('error_reporting', 'E_ALL | E_STRICT');
		ini_set('display_errors', 'On');

		$pdf = new \CreditSales('L','mm','A4');
		$pdf->SetFont('Arial','',10);
		$pdf->SetTopMargin(20);
		$pdf->SetAutoPageBreak(auto,54);
		//$pdf->StartPageGroup();
		//$pdf->AddPage();
		//	$pdf->Write(5, 'Start of group 2');
		//$pdf->AddPage();

		$host = Config::get('database.connections.mysql.host');
		$username = Config::get('database.connections.mysql.username');
		$password = Config::get('database.connections.mysql.password') ;
		$database = Config::get('database.connections.mysql.database');


		$pdf->connect($host, $username, $password, $database);


		$params =Input::all();

		$route= Route::find( $params['route_id']);
		$attr = array(
			'titleFontSize'=>18,
			'created_by'=>Auth::user()->name,
			'titleText'=> 'Credit Balance Report',
			'route_id'=> $route->id,
			'route_name'=> $route->name
		);

// SQL statement

		$sql_statement = "Select
           outlet.name AS 'Outlet Name',
          outlet.address  AS 'Address',
          outlet.phone  AS 'Phone',
          outlet.note  AS 'Note',
          outlet.credit  AS 'Cash Credit',
          outlet.cheque  AS 'Cheque Credit',
          (outlet.cheque + outlet.credit)  AS 'Total Credit'
       from  outlet
       join route on outlet.route_id=route.id
      where route.id=#route_id# and
      route.is_deleted=0 and
      outlet.is_deleted=0
" ;


// Generate report
		$pdf->mysql_report($sql_statement, false, $attr );


		$pdf->Output();

		/*
    \DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
    $user = Auth::user();
    Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
        */
	}
    public function sales_report_post()
    {


        ini_set('error_reporting', 'E_ALL | E_STRICT');
        ini_set('display_errors', 'On');

        $pdf = new \SalesReport('L','mm','A4');
        $pdf->SetFont('Arial','',10);
        $pdf->SetTopMargin(20);
        $pdf->SetAutoPageBreak(auto,54);
        //$pdf->StartPageGroup();
        //$pdf->AddPage();
        //	$pdf->Write(5, 'Start of group 2');
        //$pdf->AddPage();

        $host = Config::get('database.connections.mysql.host');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password') ;
        $database = Config::get('database.connections.mysql.database');


        $pdf->connect($host, $username, $password, $database);


        $params =Input::all();
        //dump($params['sales_id']);
        //return;

        $sales= Sales::find( $params['sales_id']);
        $route= Route::find( $sales->route_id);
        $lorry= Lorry::find( $sales->lorry_id);
        $driver= Driver::find( $sales->driver_id);
        $salesman = Employee::find( $sales->salesman_id);
        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Report : Loadings',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for loadings

        $sql_statement = "Select
                    distinct loading.code AS 'Loading Code',
                    loading.date AS 'Loading Date',
                    (Select name from users where id =loading.incharge_id) AS 'Loading Incharge',
             (Select name from product where id = loader.product_id) AS 'Product',
          loader.qty  AS 'QTY',
            sales_products.cost_price  AS 'Cost',
          (sales_products.cost_price *  loader.qty)  AS 'Sub Total Cost'
       from  loading
    join loader on loader.loading_id=loading.id
     join sales_products on sales_products.product_id=loader.product_id
       join sales on loading.sales_id=sales.id
       join route on sales.route_id=route.id
      where route.id=#route_id# and
     sales.id=#sales_id# and
      loader.qty!=0 and
      sales.is_deleted=0 and
      loading.is_deleted=0
      order by loading.code
  
" ;


// Generate report for Loadings
        $pdf->mysql_report($sql_statement, false, $attr );

        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Report : Invoices',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for invoices

        $sql_statement = "Select
                    distinct  (Select name from outlet where id =invoice.outlet_id)  AS 'Outlet',
                     invoice.invoice_no AS 'Invoice No',
                     invoice.code AS 'Invoice Code',
                    invoice.date AS 'Invoice Date',
                    invoice.note AS 'Invoice Note',
                     (invoice.discount + invoice.total) AS 'Invoice Total',
                     invoice.discount AS 'Discount',
                    invoice.total AS 'Sub Total',
                   (Select sum(free_issue*price) from invoice_products where invoice_id =invoice.id)  AS 'FI Value',
                     invoice.cash AS 'Cash',
                     invoice.credit AS 'Cash Credit',
                     invoice.cheque_value AS 'Cheque Credit',
                     (invoice.cheque_value + invoice.credit) AS 'Total Credit'
       from  invoice
    join invoice_products on invoice.id=invoice_products.invoice_id
       join sales on invoice.sales_id=sales.id
      where 
     sales.id=#sales_id# and
      invoice.is_deleted=0
      order by invoice.invoice_no
  
" ;


// Generate report for invoices
        $pdf->mysql_report($sql_statement, false, $attr );


// ATTR  for expenses
        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Report : Expenses',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for expenses

        $sql_statement = "Select
                     sales_expense.code AS 'Invoice Code',
                    sales_expense.date AS 'Expense Date',
                    sales_expense.note AS 'Expense Note',
                    sales_expense.type AS 'Expense Type',
                    sales_expense.amount AS 'Expense Amount'
       from  sales_expense
       join sales on sales_expense.sales_id=sales.id
      where 
     sales.id=#sales_id# and
      sales_expense.is_deleted=0
" ;


// Generate report for driver payment
        $pdf->mysql_report($sql_statement, false, $attr );

        // ATTR  for expenses
        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Report : Driver Payments',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for driver payment

        $sql_statement = "Select
                     driver.code AS 'Driver Code',
                     driver.name AS 'Driver Name',
                     driver_payment.date AS 'Payment Date',
                     driver_payment.code AS 'Payment Code',
                     driver_payment.note AS 'Payment Note',
                     driver_payment.amount AS 'Payment Amount'
       from  driver
       join driver_payment on driver_payment.driver_id=driver.id
       join sales on driver_payment.sales_id=sales.id
      where 
     sales.id=#sales_id# and
      driver_payment.is_deleted=0
" ;


// Generate report for driver payment
        $pdf->mysql_report($sql_statement, false, $attr );

        $pdf->Output();

        /*
    \DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
    $user = Auth::user();
    Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
        */
    }

    public function sales_balance_post()
    {


        ini_set('error_reporting', 'E_ALL | E_STRICT');
        ini_set('display_errors', 'On');

        $pdf = new \SalesBalance('P','mm','A4');
        $pdf->SetFont('Arial','',10);
        $pdf->SetTopMargin(20);
        $pdf->SetAutoPageBreak(auto,54);
        //$pdf->footerset= false;
        //$pdf->StartPageGroup();
        //$pdf->AddPage();
        //	$pdf->Write(5, 'Start of group 2');
        //$pdf->AddPage();

        $host = Config::get('database.connections.mysql.host');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password') ;
        $database = Config::get('database.connections.mysql.database');


        $pdf->connect($host, $username, $password, $database);


        $params =Input::all();
        //dump($params['sales_id']);
        //return;

        $sales= Sales::find( $params['sales_id']);
        $route= Route::find( $sales->route_id);
        $lorry= Lorry::find( $sales->lorry_id);
        $driver= Driver::find( $sales->driver_id);
        $salesman = Employee::find( $sales->salesman_id);
        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Tally Report',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for balance report

        $sql_statement = "SELECT (select name from product where product.id=sales_products.product_id) AS 'Product',
(select qty from product where product.id=sales_products.product_id) AS 'Stock QTY',
(select sum(qty) from loader JOIN loading on loader.loading_id=loading.id where loader.product_id=sales_products.product_id and loading.sales_id=sales.id ) AS 'Loading QTY',
(select sum(qty) from invoice_products JOIN invoice on invoice_products.invoice_id=invoice.id where invoice_products.product_id=sales_products.product_id and invoice.sales_id=sales.id ) AS 'Sales QTY',
 (select sum(qty) from unloader JOIN unloading on unloader.unloading_id=unloading.id where unloader.product_id=sales_products.product_id and unloading.sales_id=sales.id ) AS 'Unloading QTY',
  ((select sum(qty) from loader JOIN loading on loader.loading_id=loading.id where loader.product_id=sales_products.product_id and loading.sales_id=sales.id ) - (select sum(qty) from unloader JOIN unloading on unloader.unloading_id=unloading.id where unloader.product_id=sales_products.product_id and unloading.sales_id=sales.id ) ) AS 'Load - Unload',
  (select sum(qty) from sales_return_products JOIN sales_return on sales_return_products.sales_return_id=sales_return.id where sales_return_products.product_id=sales_products.product_id and sales_return.sales_id=sales.id and sales_return.is_resellable=true ) AS 'Sales Return - Re Sell-able', 
  (select sum(qty) from sales_return_products JOIN sales_return on sales_return_products.sales_return_id=sales_return.id where sales_return_products.product_id=sales_products.product_id and sales_return.sales_id=sales.id and sales_return.is_resellable=false ) AS 'Sales Return - Not Sell-able', 
  (select sum(qty) from sales_return_products JOIN sales_return on sales_return_products.sales_return_id=sales_return.id where sales_return_products.product_id=sales_products.product_id and sales_return.sales_id=sales.id and sales_return.is_sold=true ) AS 'Sales Return - Sold', 
  (select sum(qty) from sales_return_products JOIN sales_return on sales_return_products.sales_return_id=sales_return.id where sales_return_products.product_id=sales_products.product_id and sales_return.sales_id=sales.id ) AS 'Sales Return - Total' 
  from sales_products join sales on sales.id=sales_products.sales_id 
  join route on route.id=sales.route_id
  join product on product.id=sales_products.product_id
     where route.id=#route_id# and
     sales.id=#sales_id# and
      sales.is_deleted=0 and
      product.is_deleted=0
    
  
" ;

        /*
         *
         *
        $sql_statement = "Select
                    distinct product.name AS 'Product',
                    product.code AS 'Product Code',
                    product.qty AS 'Stock QTY',
                    loading.code AS 'Loading Code',
                    loader.qty AS 'Loading QTY',
                    unloading.code AS 'Unoading Code',
                    unloader.qty AS 'Unloading QTY'
       from  product
           join loader on loader.product_id=product.id
           join loading on loader.loading_id=loading.id
     join sales_products on sales_products.product_id=loader.product_id
       join sales on loading.sales_id=sales.id
       join route on sales.route_id=route.id
       join unloading on sales.id=unloading.sales_id
       join unloader on unloading.id=unloader.unloading_id
      where route.id=#route_id# and
     sales.id=#sales_id# and
      sales.is_deleted=0 and
      product.is_deleted=0
      group by product.name

" ;

         */



// Generate report for Loadings
        $pdf->mysql_report($sql_statement, false, $attr );



        $pdf->Output();

        /*
    \DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
    $user = Auth::user();
    Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
        */
    }

    public function normal_sales_report_post()
    {


        ini_set('error_reporting', 'E_ALL | E_STRICT');
        ini_set('display_errors', 'On');

        $pdf = new \NormalSalesReport('L','mm','A4');
        $pdf->SetFont('Arial','',10);
        $pdf->SetTopMargin(20);
        $pdf->SetAutoPageBreak(auto,54);
        //$pdf->StartPageGroup();
        //$pdf->AddPage();
        //	$pdf->Write(5, 'Start of group 2');
        //$pdf->AddPage();

        $host = Config::get('database.connections.mysql.host');
        $username = Config::get('database.connections.mysql.username');
        $password = Config::get('database.connections.mysql.password') ;
        $database = Config::get('database.connections.mysql.database');


        $pdf->connect($host, $username, $password, $database);


        $params =Input::all();
        //dump($params['sales_id']);
        //return;

        $sales= Sales::find( $params['sales_id']);
        $route= Route::find( $sales->route_id);
        $lorry= Lorry::find( $sales->lorry_id);
        $driver= Driver::find( $sales->driver_id);
        $salesman = Employee::find( $sales->salesman_id);

// Generate report for Invoices


        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Report : Invoices',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for invoices

        $sql_statement = "Select
                    distinct  (Select name from outlet where id =invoice.outlet_id)  AS 'Outlet',
                     invoice.invoice_no AS 'Invoice No',
                     invoice.code AS 'Invoice Code',
                    invoice.date AS 'Invoice Date',
                    invoice.note AS 'Invoice Note',
                     (invoice.discount + invoice.total) AS 'Invoice Total',
                     invoice.discount AS 'Discount',
                    invoice.total AS 'Sub Total',
                    invoice.previous_credit AS 'Prev Cash Credit',
                    invoice.previous_cheque AS 'Prev Cheque Credit',
                    invoice.total_payable AS 'Total Payable',
                   (Select sum(free_issue*price) from invoice_products where invoice_id =invoice.id)  AS 'FI Value',
                     invoice.cash AS 'Cash',
                     invoice.credit AS 'Cash Credit',
                     invoice.cheque_value AS 'Cheque Credit',
                     (invoice.cheque_value + invoice.credit) AS 'Total Credit'
       from  invoice
    join invoice_products on invoice.id=invoice_products.invoice_id
       join sales on invoice.sales_id=sales.id
      where 
     sales.id=#sales_id# and
      invoice.is_deleted=0
      order by invoice.invoice_no
  
" ;


// Generate report for invoices
        $pdf->mysql_report($sql_statement, false, $attr );


// ATTR  for expenses
        $attr = array(
            'titleFontSize'=>18,
            'created_by'=>Auth::user()->name,
            'titleText'=> 'Sales Report : Expenses',
            'sales_id'=> $sales->id,
            'route_id'=> $route->id,
            'route_name'=> $route->name,
            'sales_code'=> $sales->code,
            'lorry'=> $lorry->no,
            'driver'=> $driver->name,
            'from_date'=> $sales->start_date,
            'to_date'=> $sales->end_date,
            'salesman'=> $salesman->name
        );

// SQL statement for expenses

        $sql_statement = "Select
                     sales_expense.code AS 'Invoice Code',
                    sales_expense.date AS 'Expense Date',
                    sales_expense.note AS 'Expense Note',
                    sales_expense.type AS 'Expense Type',
                    sales_expense.amount AS 'Expense Amount'
       from  sales_expense
       join sales on sales_expense.sales_id=sales.id
      where 
     sales.id=#sales_id# and
      sales_expense.is_deleted=0
" ;

        $pdf->mysql_report($sql_statement, false, $attr );


        $pdf->Output();

        /*
    \DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
    $user = Auth::user();
    Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
        */
    }

    public function period_cash_book_post()
	{


		ini_set('error_reporting', 'E_ALL | E_STRICT');
		ini_set('display_errors', 'On');

		$pdf = new \PeriodCashBook('L','mm','A4');
		$pdf->SetFont('Arial','',10);
		$pdf->SetTopMargin(20);
		$pdf->SetAutoPageBreak(auto,52);
		//$pdf->StartPageGroup();
		//$pdf->AddPage();
		//	$pdf->Write(5, 'Start of group 2');
		//$pdf->AddPage();

		$host = Config::get('database.connections.mysql.host');
		$username = Config::get('database.connections.mysql.username');
		$password = Config::get('database.connections.mysql.password') ;
		$database = Config::get('database.connections.mysql.database');


		$pdf->connect($host, $username, $password, $database);


		$params =Input::all();

		$site= Site::find( Auth::user()->site_id);
		$driver= Driver::find( $params['driver_id']);
		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'to_date'=> $params['to'],
			'site_id'=> Auth::user()->site_id,
			'site_name'=>$site->name,
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Cash Book : Payments',
		);
		//$pdf->mysql_report('', false, $attr,$params,1 );


		//$attr = array('titleFontSize'=>18, 'titleText'=>'Second Example Title.');


// Generate report
		//$pdf->mysql_report('', false, $attr,$params,2 );
			/*
		$sql_statement = "Select loading.delivery_note_code AS 'DN #',
 						  	`loading`.code AS 'D Code',
 						  	`order`.po_number AS 'PO #',
 						  	`point`.name AS 'Point',
 						  	`vehicle`.no AS 'Vehicle',
 						  	`driver`.name AS 'Driver',
 						  	`loading`.is_confirmed AS 'Confirmed',
 						  	`loading`.loading_qty AS 'Qty',
 						  	`order`.cube_price AS 'Cube Price',
 						  	`order`.cube_cost AS 'Cube Cost',
 						  	(`loading`.loading_qty * `order`.cube_price) AS 'Value',
 						  	(`loading`.loading_qty * `order`.cube_cost) AS 'Cost'
							From loading join `order` on loading.order_id=`order`.id
 						join point on `loading`.point_id=`point`.id
 						join driver on loading.driver_id=driver.id
 						join vehicle on loading.vehicle_id=vehicle.id
 						where loading.site_id=#site# and DATE(loading.loading_time) = '#date#'
 						and loading.is_deleted=0
 						 GROUP BY loading.delivery_note_code";

// Generate report
		$pdf->mysql_report($sql_statement, false, $attr );
				*/
	/* Example 6: Same report as above but set up to output rows using a LEFT JOIN and SQL to improve the layout */
// SQL statement
		$sql_statement = "Select
        	payment.paid_on AS 'Paid Date',
        	payment.created_at AS 'Entered Date',
		  payment.code AS 'Payment Code',
		  payment_request.code AS 'Payment Request Code',
		  (Select name from user where id = payment_request.requester_id) AS 'Requested By',
		  (Select name from user where id = payment_request.approver_id) AS 'Paid By',
		  payment.bank AS 'Bank',
		  payment.account_no AS 'Bank Account',
		  payment.bank_draft_no AS 'Bank Draft No',
		  payment_request.status AS 'Status',
		  payment.bulk_diesel  AS 'Bulk Diesel',
		  payment.driver_diesel  AS 'Driver Diesel',
		  payment.driver_advance  AS 'Driver Advance',
		  payment.lorry_expense  AS 'Lorry Expense',
		  payment.petty_cash  AS 'Petty Cash',
		  payment.other  AS 'Other',
		  payment.from_date  AS 'From Date',
		  payment.to_date  AS 'To Date',
         payment_request.note AS 'Payment Request Note',
         payment.amount AS 'Payment Total'
       from  payment
       join payment_request on payment.payment_request_id=payment_request.id
      where payment_request.site_id=#site_id# and
      payment.paid_on >= '#from_date#' and
      payment.paid_on <= '#to_date#' and
       payment_request.status ='Paid'  and
      payment.is_deleted=0 and
       payment_request.is_deleted=0
" ;
// Generate report
		$pdf->mysql_report($sql_statement, false, $attr );

		$attr = array(
			'titleFontSize'=>18,
			'from_date'=> $params['from'],
			'to_date'=> $params['to'],
			'site_id'=> Auth::user()->site_id,
			'site_name'=>$site->name,
			'created_by'=>Auth::user()->full_name,
			'titleText'=> 'Cash Book : Expenses',
		);

		$sql_statement = "Select
         expense.date AS 'Date-Time',
          (Select  no from vehicle where id = expense.vehicle_id) AS 'Vehicle',
          (Select  name from driver where id = expense.driver_id) AS 'Driver',
        round( ( liters / (Select diesel_amount_per_liter from site where id = #site_id# )),2)  AS 'Voucher Diesel Liters',
        liters AS 'Voucher Diesel Amount',
        driver_diesel AS 'Driver Diesel',
        driver_advance AS 'Driver Advance',
        lorry_expense AS 'Lorry Expense',
        petty_cash AS 'Petty Cash',
        other AS 'Other Expense',
        expense.note AS 'Expense Note'  ,
        amount AS 'Expense Total'
       from  expense
      where expense.site_id=#site_id#  and
      expense.date >= '#from_date#' and
      expense.date <= '#to_date#' and
      expense.is_deleted=0 ";
		$pdf->mysql_report($sql_statement, false, $attr );




		$pdf->Output();

		/*
    \DB::update('update `increment_helper` set `company_bill`=`company_bill`+1');
    $user = Auth::user();
    Log::info('Company Bill '.$attr['bill_code'].' is created. by:'.$user->name);
        */
	}

}


