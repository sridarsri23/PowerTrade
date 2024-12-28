<?php
namespace dtc\Http\Controllers;



use dtc\Models\User;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use dtc\Http\Controllers\Controller;
use dtc\Models\System;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use Mail;
use Redirect;
use Auth;
use Request;

class SystemSettingsController_old extends Controller{

	
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