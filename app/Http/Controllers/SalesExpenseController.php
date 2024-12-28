<?php
namespace dtc\Http\Controllers;


use dtc\Models\Route;
use dtc\Models\Sales;
use dtc\Models\SalesExpense;
use dtc\Models\Client;
use dtc\Models\SalesProducts;
use dtc\Models\System;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Company;
use dtc\Models\Helper;
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
 $second_array=array();
 $third_array=array();
 $expense_array=null;
$client_bank_accounts=array();


class SalesExpenseController extends Controller{
	function __construct() {
		//parent::__construct();
		Lang::setLocale(Session::get('locale'));
	}
	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('sales_expense'))
		 {


				// $expenseList= SalesExpense::all();//orderBy('created_at', 'desc')->get();
				 $expenseList= SalesExpense::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				// working $expenseList= SalesExpense::whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('created_at', 'desc')->get();
            // ->whereDate('created_at', '=', Carbon::today()->toDateString());
				$view =  View::make('sales_expense.index',compact('expenseList'));



				if (Request::ajax())
				{

					return  $view->renderSections()['middle_right_DIV'];
				}
				else{

					return  $view;
				}
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Sales Expense');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');

		 }

	 }
	 /**
	  * Show the form for creating a new resource.
	  *
	  * @return Response
	  */


	 public function create()
	 {

		 if (Auth::check() && Helper::getAuth('new_expense'))
		 {


				 $code= Helper::getNextCode("sales_expense");
             $sales=Sales::lists('code' ,'id' );
             $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );


//example usage.


             /*
             $food_groups = array(
                 '2' => array('bread', 'rice', 'oatmeal'),
                 '3' => array('kidney beans', 'lentils', 'split peas'),
             );
*/
				$view =View::make('sales_expense.create')
					->with('code',$code)
                    ->with('sales',$sales)
                    ->with('salesList',$salesList)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Sales Expense');
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

		          'date'=>'required',
		          'code'=>'required|unique:sales_expense,code',
                'amount' => 'required|numeric|min:0',
		    );
		    //get all SalesExpense information
		    $expenses = Input::all();

		  
		      $validation=Validator::make($expenses,$rules);


		      if($validation->passes())
		      {
		      //save new SalesExpense information in the database
		      //and redirect to index page


				 $empl= SalesExpense::create($expenses);
                  //$GLOBALS['expense_array']=   $expenses ;
				 // $privilege =Privileges:: privilege(['driver_id' => $expenses['id']]);

				  \DB::update('update `increment_helper` set `sales_expense`=`sales_expense`+1');




				  $user = User::find(Auth::id());
				  Log::info('Sales Expense '.$empl->code.' is created. by:'.$user->name);
		          return Redirect::route('sales_expense.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Sales Expense Successfully created.');
		      }
		      //show error message
		      return Redirect::route('sales_expense.create')
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
		 if (Auth::check() && Helper::getAuth('view_expense'))
		 {

			 $task = SalesExpense::findOrFail($id);

				 return View::make('sales_expense.show')->withTask($task);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View SalesExpense');
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

		 if (Auth::check() && Helper::getAuth('edit_expense'))
		 {


			 //get the current book by i
				$sales_expense = SalesExpense::find($id);
             $sale=Sales::findOrFail($sales_expense->sales_id);
                        $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );


				//redirect to update form
				//$expenses = SalesExpense::lists('name', 'id');




				return View::make('sales_expense.edit')
                    ->with('sales_expense',$sales_expense)
                    ->with('sale',$sale)
                    ->with('salesList',$salesList)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit SalesExpense');
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

             'date'=>'required',
             'amount' => 'required|numeric|min:0',

         );
        $expenses = Input::all();




        $validation = Validator::make($expenses, $rules);


        if ($validation->passes())
        {
            $book = SalesExpense::find($id);
            $book->update($expenses);

			$user = User::find(Auth::id());

          //  $ai =  \DB::getPdo()->lastInsertId();
          //  \DB::update('update `increment_helper` set `expense`=`expense`+1');



            Log::warning('Sales Expense '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('sales_expense.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Sales Expense '.$book->code.' Successfully updated.');
        }
        return Redirect::route('sales_expense.edit', $id)
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
		 if (Auth::check()  && Helper::getAuth('delete_expense'))
		 {

				 $driver = SalesExpense::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Sales Expense '.$driver->code.' is deleted. by:'.$user->name);
          //DB::table('system')->update(['capital' => DB::raw('capital + '. $driver->amount)]);
            // \DB::table('expense')->where('id', '=', $id)->delete();
             \DB::table('sales_expense')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('sales_expense.index')
					->withInput()
					->with('scs_success', 'SalesExpense Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete SalesExpense');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }

    public function search_expense(){


        if (Auth::check())
        {


            $expenses=SalesExpense::lists('code' ,'id' );



            $view =View::make('expense.search_expense')
                ->with('expenses',$expenses)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Client Search');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }

    public function display_expense(){


        if (Auth::check())
        {


            $expense= Input::all();
            $task = SalesExpense::findOrFail($expense['expense_id']);

            $view = View::make('expense.show')->withTask($task);



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access SalesExpense Search');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }

}


?>