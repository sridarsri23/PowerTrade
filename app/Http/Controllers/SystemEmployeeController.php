<?php
namespace dtc\Http\Controllers;


use dtc\Models\EmployeePayment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Helper;

use View;
use Validator;
use Illuminate\Support\Facades\Input;
use UserModel;
use Mail;
use Redirect;
use Auth;
use dtc\Models\User;
use Request;
use dtc\Models\Employee;
use dtc\Models\Privileges;
use DB;
/**
 *
 * @author Shri
 */
class SystemEmployeeController extends Controller{
	function __construct() {
		//parent::__construct();
		Lang::setLocale(Session::get('locale'));
	}
	/**
	 * @return mixed
	 * @author Shri
     */
	public function index()
	 {

		 if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['employee'])
		 {

			 $employeeList= Employee::where('is_deleted','=',false)->where('id','!=',16)->orderBy('created_at', 'desc')->get();
					 $privileges= Privileges::where('employee_id','=',Auth::id())->first();
				 $view =  View::make('employee.index',compact('employeeList'))->with('privileges',$privileges);



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

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Employee');
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

		 if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['new_employee'])
		 {
             $code= Helper::getNextCode("employee");
					$view =View::make('employee.create')->with('code',$code)
					;



				   return $view;//

				 }
			else{

				Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to New Employee');
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
		          'name'=>'required|unique:users,name,id',
		          'email' => 'required|email|unique:users,email,id',
		          'phone' => 'between:10,15',
		          'password'=> 'password|min:8',
		          'confirm_password' => 'same:password',


		    );
		    //get all Employee information
		    $employees = Input::all();
		    //validate book information with the rules
		 

			   $employees['can_login'] = $employees['can_login']  == 'Yes' ? true : false;
		  
		      $validation=Validator::make($employees,$rules);

		 $employees['password']=Hash::make( $employees['password']);
		 $employees['email_verification']=true;

		      //get Citiy Id as for the selected City Name
		   

		     // $employees['cg_city_cg_city_id'] = $city ->cg_city_id;


		 
		     		// $employees['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Employee information in the database 
		      //and redirect to index page


                  //---------------------------

                  $temp = false;
                  DB::beginTransaction();

                            try {
                                $empl = Employee::create($employees);
                               // $ai = \DB::getPdo()->lastInsertId();
                                //\DB::update('update `increment_helper` set `employee`=`employee`+'.$ai);
                                \DB::update('update `increment_helper` set `employee`=employee+1');
                                // $employee = Site::find( $employees['site_id'] );
                                //$employee->employees()->save($empl);
                               // $privilege = Privileges:: privilege(['employee_id' => $ai]);

                                //$ai =  \DB::getPdo()->lastInsertId();
                                // \DB::update('update increment_helper set employee='.$ai);
                                // $employee->privilege()->save($privilege);
                               $privilege = new Privileges();

                                $priv = $empl->privileges()->save($privilege);
                            }catch(\Exception $e){

                                DB::rollback();
                                return Redirect::route('employee.create')
                                    ->withInput()
                                 ->with('scs_errors', 'Transaction Failed. Please Try again. Make sure you have a proper Internet. '.$e)
                                    ;

                            }

                      if($empl && $priv) {

                          DB::commit();

                          $user = User::find(Auth::id());
                          Log::info('Employee '.$empl->name.' is created. by:'.$user->name);
                          return Redirect::route('employee.index')
                              ->withInput()
                              ->withErrors($validation)
                              ->with('scs_success', 'Employee Successfully created.');
                          $temp = true;
                          // all good
                      }
                      else{
                      $temp = false;
                      DB::rollback();
                          return Redirect::route('employee.create')
                              ->withInput()
                              ->with('scs_errors', 'Transaction Failed. Please Try again. Make sure you have a proper Internet.')
                   ;

                      // something went wrong
                  }


                  //-----------------
		      }
		      //show error message
		      return Redirect::route('employee.create')
		           ->withInput()
		           ->withErrors($validation)
		           ->with('scs_errors', 'Some fields are incomplete.')
		           ->with('message', 'Some fields are incomplete.');
	 }
	 /**
	  * Display the specified resource.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function show($id)
	 {
		 if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['view_employee'])
		 {

			 $task = Employee::findOrFail($id);
             $paymentList= EmployeePayment::where('employee_id','=',$id)->where('is_deleted','=',false)->get();

				return View::make('employee.show')->withTask($task)
                    ->with('paymentList',$paymentList);
			 }
		else{

			Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Employee');
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
		 $employee = Employee::find($id);
		 if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['edit_employee'])
		 {


						if (is_null($employee))
						{
							return Redirect::route('system.employee.index');
						}
						//redirect to update form
						//$employees = Employee::lists('name', 'id');
						return View::make('employee.edit', compact('employee'))
							;

				 }
			else{

				Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Edit Employee '.	 $employee ->name);
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
			'name'=>'required',
			'email' => 'required|email',
			'phone' => 'between:9,15',
            'password'=> 'password|min:8',
			'confirm_password' => 'same:password',

		);
        $employees = Input::all();
		 $employees['can_login'] = $employees['can_login']  == 'Yes' ? true : false;



        $validation = Validator::make($employees, $rules);
		 $employees['password']=Hash::make( $employees['password']);

        if ($validation->passes())
        {
            $book = Employee::find($id);
            $book->update($employees);
			$user = User::find(Auth::id());
			Log::warning('Employee '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('employee.index')
                ->withInput()
                ->withErrors($validation)
			->with('scs_success', 'Employee '.$book->name.' Successfully Updated.');
        }
        return Redirect::route('employee.edit', $id)
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
		 $employee = Employee::find($id);
		 if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['delete_employee'])
		 {

			 \DB::table('users')->where('id', '=', $id)->update(array('is_deleted' => true));
					 \DB::table('users')->where('id', '=', $id)->update(array('can_login' => false));


					 $user = User::find(Auth::id());
					 Log::warning('Employee '.$employee->name.' is deleted. by:'.$user->name);
					return Redirect::route('employee.index')
						->withInput()
						->with('scs_success', 'Employee '.$employee->name.' Successfully deleted.');

			 }
		else{

			Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Employee '.$employee->name);
			Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			return redirect('dashboard');
		}

}


    public function create_payment()
    {

        if (Auth::check())
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
            $view =View::make('employee.create_payment')
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

    public function store_payment()
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
        return redirect('employee_create_payment')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Some fields are incomplete.')
            ->with('scs_errors', 'Some fields are incomplete.');
    }

	}


?>