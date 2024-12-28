<?php
namespace dtc\Http\Controllers;


use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\Employee;
use dtc\Models\EmployeePayment;

use dtc\Models\EmployeePaymentProducts;
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


class EmployeePaymentController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('employee_payment'))
		 {


				 $employee_paymentsList= EmployeePayment::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				// $totalCreditAmount= EmployeePayment::sum('amount');
             $employee_payments=EmployeePayment::where('is_deleted','=',false)->lists('name' ,'id' );
				$view =  View::make('employee_payment.index')
                    ->with('employee_paymentsList',$employee_paymentsList)
                    ->with('employee_payments',$employee_payments)
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access EmployeePayment');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }



	 }

	 public function create()
	 {
         if (Auth::check()&& Helper::getAuth('new_employee_payment'))
             {

                 $code= Helper::getNextCode("employee_payment");
                 $employees_names=Employee::where('id','!=','16')->lists('name' ,'id' );
                 $employees=Employee::lists('code' ,'id' );
                 $employeeList=Employee::where('is_deleted','=','0')->lists('code' ,'id' );


//example usage.


                 /*
                 $food_groups = array(
                     '2' => array('bread', 'rice', 'oatmeal'),
                     '3' => array('kidney beans', 'lentils', 'split peas'),
                 );
     */
                 $view =View::make('employee_payment.create')
                     ->with('code',$code)
                     ->with('employees',$employees)
                     ->with('employeeList',$employeeList)
                     ->with('employees_names',$employees_names)
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


             'amount' => 'required|numeric|min:0'
         );
         //get all SalesExpense information
         $expenses = Input::all();


         $validation=Validator::make($expenses,$rules);


         if($validation->passes())
         {
             //save new SalesExpense information in the database
             //and redirect to index page


             $empl= EmployeePayment::create($expenses);
             //$GLOBALS['expense_array']=   $expenses ;
             // $privilege =Privileges:: privilege(['driver_id' => $expenses['id']]);

             \DB::update('update `increment_helper` set `employee_payment`=`employee_payment`+1');




             $user = User::find(Auth::id());
             Log::info('Employee Payment '.$empl->code.' is created. by:'.$user->name);
             //return Redirect::route('sales_expense.index')

             return redirect('employee/'.$empl->employee_id)
                 ->withErrors($validation)
                 ->with('scs_success', 'Employee Payment Successfully created.');
         }
         //show error message
         return redirect('employee_create_expense')
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
		 if (Auth::check() && Helper::getAuth('view_employee_payment'))
		 {

             $employee_payment = EmployeePayment::findOrFail($id);
            // $givingList= Giving::where('agent_id','=',$id)->get();
             $employee= Employee::where('id','=',$employee_payment->employee_id)->first();
				 return View::make('employee_payment.show')
                     ->with("employee_payment",$employee_payment)
                     ->with("employee",$employee)
                     ;
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Employee Payment');
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

		 if (Auth::check() && Helper::getAuth('edit_employee_payment'))
		 {

			 //get the current book by i
				$employee_payment = EmployeePayment::find($id);
             $employee = Employee::findOrFail($employee_payment->employee_id);
             $employee_nos=Employee::lists('name' ,'id' );
             $lorries=Employee::lists('code' ,'id' );
             $employeeList=Employee::where('is_deleted','=','0')->lists('code' ,'id' );
				if (is_null($employee_payment))
				{
					return Redirect::route('employee.index');
				}
				//redirect to update form
				//$employee_payments = EmployeePayment::lists('name', 'id');
				return View::make('employee_payment.edit')
                    ->with('employee_payment',$employee_payment)
                    ->with('employee',$employee)
                    ->with('employee_nos',$employee_nos)
                    ->with('lorries',$lorries)
                    ->with('employeeList',$employeeList)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Employee Payment');
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
        $employee_payments = Input::all();




        $validation = Validator::make($employee_payments, $rules);


        if ($validation->passes())
        {
            $book = EmployeePayment::find($id);

            $book->update($employee_payments);
			$user = User::find(Auth::id());
			Log::warning('EmployeePayment '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('employee.show',$book->employee_id)
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Employee Payment '.$book->code.'Successfully Edited.');
        }
        return Redirect::route('employee_payment.edit', $id)
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
		 if (Auth::check()  && Helper::getAuth('delete_employee_payment'))
		 {



				 $driver = EmployeePayment::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('EmployeePayment '.$driver->code.' is deleted. by:'.$user->name);
            // \DB::table('employee_payment')->where('id', '=', $id)->delete();

             \DB::table('employee_payment')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('employee.show',$driver->employee_id)
					->withInput()
					->with('scs_success', 'Employee Payment  '.$driver->code.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Employee Payment');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


}


?>