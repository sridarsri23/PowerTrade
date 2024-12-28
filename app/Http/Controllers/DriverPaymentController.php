<?php
namespace dtc\Http\Controllers;


use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\Driver;
use dtc\Models\DriverPayment;
use dtc\Models\Product;
use dtc\Models\Sales;
use dtc\Models\Settlement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Company;
use dtc\Models\Helper;
use dtc\Models\Order;
use dtc\Models\Site;
use dtc\Models\Vehicle;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use UserModel;
use Mail;
use Redirect;
use Auth;
use dtc\Models\User;
use Request;


class DriverPaymentController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('driver_payment'))
		 {


				 $driver_paymentsList= DriverPayment::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				// $totalCreditAmount= DriverPayment::sum('amount');
             $driver_payments=DriverPayment::where('is_deleted','=',false)->lists('name' ,'id' );
				$view =  View::make('driver_payment.index')
                    ->with('driver_paymentsList',$driver_paymentsList)
                    ->with('driver_payments',$driver_payments)
                ;



				if (Request::ajax())
				{

					return  $view->renderSections()['middle_right_DIV'];
				}
				else{

					return  $view;
				}
		 }

		 else{

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access DriverPayment');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }



	 }

	 public function create()
	 {
         if (Auth::check()&& Helper::getAuth('new_driver_payment'))
             {

                 $code= Helper::getNextCode("driver_payment");
                 $drivers_names=Driver::where('id','!=','16')->lists('name' ,'id' );
                 $drivers=Driver::lists('code' ,'id' );
                 $driverList=Driver::where('is_deleted','=','0')->lists('code' ,'id' );


//example usage.


                 /*
                 $food_groups = array(
                     '2' => array('bread', 'rice', 'oatmeal'),
                     '3' => array('kidney beans', 'lentils', 'split peas'),
                 );
     */
                 $view =View::make('driver_payment.create')
                     ->with('code',$code)
                     ->with('drivers',$drivers)
                     ->with('driverList',$driverList)
                     ->with('drivers_names',$drivers_names)
                 ;

                 return $view;//
             }

             else{

                 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Sales Expense');
                 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
                 return redirect('dashboard');


             }

	 }
	 /**
	  * Store a newly created resource in storage.
	  *
	  * @return Response
	  */
	 public function store()
	 {
         //create a rule validation
         $rules=array(


             'amount' => 'required|numeric|min:0'
         );
         //get all SalesExpense information
         $expenses = Input::all();


         $validation=Validator::make($expenses,$rules);


         if($validation->passes())
         {
             //save new SalesExpense information in the database
             //and redirect to index page


             $empl= DriverPayment::create($expenses);
             //$GLOBALS['expense_array']=   $expenses ;
             // $privilege =Privileges:: privilege(['driver_id' => $expenses['id']]);

             \DB::update('update `increment_helper` set `driver_payment`=`driver_payment`+1');




             $user = User::find(Auth::id());
             Log::info('Driver Payment '.$empl->code.' is created. by:'.$user->name);
             //return Redirect::route('sales_expense.index')

             return redirect('driver/'.$empl->driver_id)
                 ->withErrors($validation)
                 ->with('scs_success', 'Driver Payment Successfully created.');
         }
         //show error message
         return redirect('driver_create_expense')
             ->withInput()
             ->withErrors($validation)
             ->with('message', 'Some fields are incomplete.')
             ->with('scs_errors', 'Some fields are incomplete.');
	 }
	 /**
	  * Display the specified resource.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function show($id)
	 {
		 if (Auth::check() && Helper::getAuth('view_driver_payment'))
		 {

             $driver_payment = DriverPayment::findOrFail($id);
            // $givingList= Giving::where('agent_id','=',$id)->get();
             $driver= Driver::where('id','=',$driver_payment->driver_id)->first();
				 return View::make('driver_payment.show')
                     ->with("driver_payment",$driver_payment)
                     ->with("driver",$driver)
                     ;
			 }

		else{

		Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to View Driver Payment');
		Session::put("error_message",Lang::get('messages.action_authorized_warning'));
		return redirect('dashboard');


		}
	 }


	 /**
	  * Show the form for editing the specified resource.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function edit($id)
	 {

		 if (Auth::check() && Helper::getAuth('edit_driver_payment'))
		 {

			 //get the current book by i
				$driver_payment = DriverPayment::find($id);
             $driver = Driver::findOrFail($driver_payment->driver_id);
             $driver_nos=Driver::lists('name' ,'id' );
             $lorries=Driver::lists('code' ,'id' );
             $driverList=Driver::where('is_deleted','=','0')->lists('code' ,'id' );
				if (is_null($driver_payment))
				{
					return Redirect::route('driver.index');
				}
				//redirect to update form
				//$driver_payments = DriverPayment::lists('name', 'id');
				return View::make('driver_payment.edit')
                    ->with('driver_payment',$driver_payment)
                    ->with('driver',$driver)
                    ->with('driver_nos',$driver_nos)
                    ->with('lorries',$lorries)
                    ->with('driverList',$driverList)
					;
		 }

		 else{

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Edit Driver Payment');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }
	 /**
	  * Update the specified resource in storage.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function update($id)
	 {
	  //create a rule validation
        $rules=array(

            'amount' => 'numeric|min:0',


        );
        $driver_payments = Input::all();




        $validation = Validator::make($driver_payments, $rules);


        if ($validation->passes())
        {
            $book = DriverPayment::find($id);

            $book->update($driver_payments);
			$user = User::find(Auth::id());
			Log::warning('DriverPayment '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('driver.show',$book->driver_id)
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Driver Payment '.$book->code.'Successfully Edited.');
        }
        return Redirect::route('driver_payment.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');
	 }

	 /**
	  * Remove the specified resource from storage.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function destroy($id)
	 {
		 if (Auth::check()  && Helper::getAuth('delete_driver_payment'))
		 {



				 $driver = DriverPayment::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('DriverPayment '.$driver->code.' is deleted. by:'.$user->name);
            // \DB::table('driver_payment')->where('id', '=', $id)->delete();

             \DB::table('driver_payment')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('driver.show',$driver->driver_id)
					->withInput()
					->with('scs_success', 'Driver Payment  '.$driver->code.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to Delete Driver Payment');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


}


?>