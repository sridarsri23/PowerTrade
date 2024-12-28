<?php
namespace dtc\Http\Controllers;



use dtc\Models\System;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use dtc\Http\Controllers\Controller;
use dtc\Models\Employee;
use dtc\Models\Privileges;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use UserModel;
use Mail;
use Redirect;
use Auth;
use dtc\Models\User;
use Request;

class SystemSettingsController extends Controller{
	//function __construct() {
		//parent::__construct();
		//Lang::setLocale(Session::get('locale'));
	//}

	
		public function privileges(){


        //settings is privileges
			if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['privileges'])
			{
					   	   //get all users except main admin
        //$usersList=User::where('id','!=',Auth::id())->where('is_deleted','=',false)->lists('name','id');
        $usersList=User::where('id','!=',16)->lists('name','id');
						$privilege_id_employee_id_list =Privileges::where('employee_id','!=',16)->lists('id','employee_id');

        $privilegeList=Privileges::where('employee_id','!=',16)->get();
        $my_privilegeList=Privileges::where('employee_id','=',Auth::id())->first();

 // $view = View::make('giver.product.index',compact('productList'));
					   $view= View::make('system.privileges',array('title'=>'Settings'),compact('usersList'))
					   ->with('privilege_id_employee_id_list',$privilege_id_employee_id_list )
					   ->with('privilegeList',$privilegeList)
					   ->with('my_privilegeList',$my_privilegeList)
					   ;

					    //return  $view;//->renderSections()['middle_DIV'] ;


					 //  $sections = $view->renderSections(); 
    				//return json_encode($sections); 
					   //return $view;

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



						Log::warning('Un Authorized Employee '.Auth::id().' trying to access Settings');
						//Auth::logout();
						Session::put("error_message","'You are not authorized! Your action been logged!'");
						return redirect('dashboard');
						//return Redirect::to('login',array('title'=>'Dashboard'));
							//->with('scs_errors', 'You are not authorized! Your action been logged! Please log in again.');
						//return View::make('user.login',array('title'=>'Login'))

						//;


					}
		}

	
  public function privileges_update()
  {

	  if (Auth::check() && Privileges::where('employee_id','=',Auth::id())->first()['settings'])
	  {

				$privileges = Input::except('_method','_token');//Input::all();
				$privileges['product'] = $privileges['product']  == 'Yes' ? true : false;
				$privileges['new_product'] = $privileges['new_product']  == 'Yes' ? true : false;
				$privileges['view_product'] = $privileges['view_product']  == 'Yes' ? true : false;
				$privileges['edit_product'] = $privileges['edit_product']  == 'Yes' ? true : false;
				$privileges['delete_product'] = $privileges['delete_product']  == 'Yes' ? true : false;

				$privileges['loading'] = $privileges['loading']  == 'Yes' ? true : false;
				$privileges['new_loading'] = $privileges['new_loading']  == 'Yes' ? true : false;
				$privileges['view_loading'] = $privileges['view_loading']  == 'Yes' ? true : false;
				$privileges['edit_loading'] = $privileges['edit_loading']  == 'Yes' ? true : false;
				$privileges['delete_loading'] = $privileges['delete_loading']  == 'Yes' ? true : false;


				$privileges['invoice'] = $privileges['invoice']  == 'Yes' ? true : false;
				$privileges['new_invoice'] = $privileges['new_invoice']  == 'Yes' ? true : false;
				$privileges['view_invoice'] = $privileges['view_invoice']  == 'Yes' ? true : false;
				$privileges['edit_invoice'] = $privileges['edit_invoice']  == 'Yes' ? true : false;
				$privileges['delete_invoice'] = $privileges['delete_invoice']  == 'Yes' ? true : false;


				$privileges['unloading'] = $privileges['unloading']  == 'Yes' ? true : false;
				$privileges['new_unloading'] = $privileges['new_unloading']  == 'Yes' ? true : false;
				$privileges['view_unloading'] = $privileges['view_unloading']  == 'Yes' ? true : false;
				$privileges['edit_unloading'] = $privileges['edit_unloading']  == 'Yes' ? true : false;
				$privileges['delete_unloading'] = $privileges['delete_unloading']  == 'Yes' ? true : false;


				$privileges['return_product'] = $privileges['return_product']  == 'Yes' ? true : false;
				$privileges['new_sales_return'] = $privileges['new_sales_return']  == 'Yes' ? true : false;
				$privileges['view_sales_return'] = $privileges['view_sales_return']  == 'Yes' ? true : false;
				$privileges['edit_sales_return'] = $privileges['edit_sales_return']  == 'Yes' ? true : false;
				$privileges['delete_sales_return'] = $privileges['delete_sales_return']  == 'Yes' ? true : false;


				$privileges['sales_expense'] = $privileges['sales_expense']  == 'Yes' ? true : false;
				$privileges['new_expense'] = $privileges['new_expense']  == 'Yes' ? true : false;
				$privileges['view_expense'] = $privileges['view_expense']  == 'Yes' ? true : false;
				$privileges['edit_expense'] = $privileges['edit_expense']  == 'Yes' ? true : false;
				$privileges['delete_expense'] = $privileges['delete_expense']  == 'Yes' ? true : false;


				$privileges['route'] = $privileges['route']  == 'Yes' ? true : false;
				$privileges['new_route'] = $privileges['new_route']  == 'Yes' ? true : false;
				$privileges['view_route'] = $privileges['view_route']  == 'Yes' ? true : false;
				$privileges['edit_route'] = $privileges['edit_route']  == 'Yes' ? true : false;
				$privileges['delete_route'] = $privileges['delete_route']  == 'Yes' ? true : false;


				$privileges['lorry'] = $privileges['lorry']  == 'Yes' ? true : false;
				$privileges['new_lorry'] = $privileges['new_lorry']  == 'Yes' ? true : false;
				$privileges['view_lorry'] = $privileges['view_lorry']  == 'Yes' ? true : false;
				$privileges['edit_lorry'] = $privileges['edit_lorry']  == 'Yes' ? true : false;
				$privileges['delete_lorry'] = $privileges['delete_lorry']  == 'Yes' ? true : false;
				
				
				$privileges['outlet'] = $privileges['outlet']  == 'Yes' ? true : false;
				$privileges['new_outlet'] = $privileges['new_outlet']  == 'Yes' ? true : false;
				$privileges['view_outlet'] = $privileges['view_outlet']  == 'Yes' ? true : false;
				$privileges['edit_outlet'] = $privileges['edit_outlet']  == 'Yes' ? true : false;
				$privileges['delete_outlet'] = $privileges['delete_outlet']  == 'Yes' ? true : false;

				$privileges['sales'] = $privileges['sales']  == 'Yes' ? true : false;
				$privileges['new_sales'] = $privileges['new_sales']  == 'Yes' ? true : false;
				$privileges['view_sales'] = $privileges['view_sales']  == 'Yes' ? true : false;
				$privileges['edit_sales'] = $privileges['edit_sales']  == 'Yes' ? true : false;
				$privileges['delete_sales'] = $privileges['delete_sales']  == 'Yes' ? true : false;


				$privileges['employee'] = $privileges['employee']  == 'Yes' ? true : false;
				$privileges['new_employee'] = $privileges['new_employee']  == 'Yes' ? true : false;
				$privileges['view_employee'] = $privileges['view_employee']  == 'Yes' ? true : false;
				$privileges['edit_employee'] = $privileges['edit_employee']  == 'Yes' ? true : false;
				$privileges['delete_employee'] = $privileges['delete_employee']  == 'Yes' ? true : false;


				$privileges['driver'] = $privileges['driver']  == 'Yes' ? true : false;
				$privileges['new_driver'] = $privileges['new_driver']  == 'Yes' ? true : false;
				$privileges['view_driver'] = $privileges['view_driver']  == 'Yes' ? true : false;
				$privileges['edit_driver'] = $privileges['edit_driver']  == 'Yes' ? true : false;
				$privileges['delete_driver'] = $privileges['delete_driver']  == 'Yes' ? true : false;


          $privileges['lorry_expense'] = $privileges['lorry_expense']  == 'Yes' ? true : false;
          $privileges['new_lorry_expense'] = $privileges['new_lorry_expense']  == 'Yes' ? true : false;
          $privileges['view_lorry_expense'] = $privileges['view_lorry_expense']  == 'Yes' ? true : false;
          $privileges['edit_lorry_expense'] = $privileges['edit_lorry_expense']  == 'Yes' ? true : false;
          $privileges['delete_lorry_expense'] = $privileges['delete_lorry_expense']  == 'Yes' ? true : false;


          $privileges['running_expense'] = $privileges['running_expense']  == 'Yes' ? true : false;
          $privileges['new_running_expense'] = $privileges['new_running_expense']  == 'Yes' ? true : false;
          $privileges['view_running_expense'] = $privileges['view_running_expense']  == 'Yes' ? true : false;
          $privileges['edit_running_expense'] = $privileges['edit_running_expense']  == 'Yes' ? true : false;
          $privileges['delete_running_expense'] = $privileges['delete_running_expense']  == 'Yes' ? true : false;


          $privileges['driver_payment'] = $privileges['driver_payment']  == 'Yes' ? true : false;
          $privileges['new_driver_payment'] = $privileges['new_driver_payment']  == 'Yes' ? true : false;
          $privileges['view_driver_payment'] = $privileges['view_driver_payment']  == 'Yes' ? true : false;
          $privileges['edit_driver_payment'] = $privileges['edit_driver_payment']  == 'Yes' ? true : false;
          $privileges['delete_driver_payment'] = $privileges['delete_driver_payment']  == 'Yes' ? true : false;


          $privileges['employee_payment'] = $privileges['employee_payment']  == 'Yes' ? true : false;
          $privileges['new_employee_payment'] = $privileges['new_employee_payment']  == 'Yes' ? true : false;
          $privileges['view_employee_payment'] = $privileges['view_employee_payment']  == 'Yes' ? true : false;
          $privileges['edit_employee_payment'] = $privileges['edit_employee_payment']  == 'Yes' ? true : false;
          $privileges['delete_employee_payment'] = $privileges['delete_employee_payment']  == 'Yes' ? true : false;

				$privileges['settings'] = $privileges['settings']  == 'Yes' ? true : false;
				$privileges['privileges'] = $privileges['privileges']  == 'Yes' ? true : false;
				$privileges['stock_report'] = $privileges['stock_report']  == 'Yes' ? true : false;
				$privileges['credit_sales_report'] = $privileges['credit_sales_report']  == 'Yes' ? true : false;
				$privileges['sales_report'] = $privileges['sales_report']  == 'Yes' ? true : false;
				$privileges['log'] = $privileges['log']  == 'Yes' ? true : false;

          $privileges['add_stocks_many'] = $privileges['add_stocks_many']  == 'Yes' ? true : false;
          $privileges['remove_stocks_many'] = $privileges['remove_stocks_many']  == 'Yes' ? true : false;
          $privileges['purchasing'] = $privileges['purchasing']  == 'Yes' ? true : false;
          $privileges['manufacturing'] = $privileges['manufacturing']  == 'Yes' ? true : false;
          $privileges['tour'] = $privileges['tour']  == 'Yes' ? true : false;
          $privileges['stock'] = $privileges['stock']  == 'Yes' ? true : false;









          $book = Employee::find( $privileges['employee_id']);
					//$book->update($privileges);
				//Privileges::find($privileges['privilege_id'])->employee()->associate($book)->save();

				$book->privileges()->update($privileges);

				$user = User::find(Auth::id());
				Log::warning('Settings '.$user->name.' is editing privileges for'.$book->name);

			//Session::set('SUCCESS_MESSAGE', 'Privileges Successfully updated.');
				//Session::put('SUCCESS_MESSAGE', "Privileges Successfully updated.");
				//$_SESSION["SUCCESS_MESSAGE"] = "Privileges Successfully updated.";
				return Redirect::to('privileges')
                    ->with('scs_success', 'Privileges Successfully updated for '.$book->name);


				/*
                            return Redirect::route('system.employee.edit', $id)
                                ->withInput()
                                ->with('message', 'There were validation errors.');

                                    */
	 		 } else{



		  Log::warning('Un Authorized Employee '.Auth::id().' trying to access/update Settings');
		  //Auth::logout();
		  Session::put("error_message","'You are not authorized! Your action been logged!'");
		  return redirect('dashboard');
		  //return Redirect::to('login',array('title'=>'Dashboard'));
		  //->with('scs_errors', 'You are not authorized! Your action been logged! Please log in again.');
		  //return View::make('user.login',array('title'=>'Login'))

		  //;


	  }


  			}

    public function settings(){

        if (Auth::check())
        {
            //get all users except main admin
            //$usersList=User::where('id','!=',Auth::id())->where('is_deleted','=',false)->lists('name','id');
            $setupList=System::first();

            // $view = View::make('giver.product.index',compact('productList'));
            $view= View::make('system.mysetup',array('title'=>'My Setup'))
                ->with('setupList',$setupList);
            ;

            //return  $view;//->renderSections()['middle_DIV'] ;


            //  $sections = $view->renderSections();
            //return json_encode($sections);
            //return $view;

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



            Log::warning('Un Authorized Employee '.Auth::id().' trying to access Settings');
            //Auth::logout();
            Session::put("error_message","'You are not authorized! Your action been logged!'");
            return redirect('dashboard');
            //return Redirect::to('login',array('title'=>'Dashboard'));
            //->with('scs_errors', 'You are not authorized! Your action been logged! Please log in again.');
            //return View::make('user.login',array('title'=>'Login'))

            //;


        }
    }


    public function settings_update()
    {

        if (Auth::check())
        {






            $rules=array(
                'agent_commision_pcnt'=>'numeric|min:0',
                'sd_to_lkr' => 'numeric|min:0',

            );
            $mysetups = Input::except('_method','_token');//Input::all();




            $validation = Validator::make($mysetups, $rules);


            if ($validation->passes())
            {
                $book = System::find(1);
                $book->update($mysetups);
                $user = User::find(Auth::id());
                // Log::warning('Setup  is edited. by:'.$user->name);
                return Redirect::to('system/mysetup')
                    ->with('scs_success', 'Your Setup Successfully updated.');
            }
            else{

                return Redirect::to('system/mysetup')
                    ->withInput()
                    ->withErrors($validation)
                    ->with('message', 'There were validation errors.')
                    ->with('scs_errors', 'There were validation errors.');
            }

        } else{



            Log::warning('Un Authorized Employee '.Auth::id().' trying to access/update Settings');

            Session::put("error_message","'You are not authorized! Your action been logged!'");
            return redirect('dashboard');



        }


    }
	}




?>