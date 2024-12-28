<?php
namespace dtc\Http\Controllers;


use dtc\Models\Giving;
use dtc\Models\Settlement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Company;
use dtc\Models\Helper;
use dtc\Models\Order;
use dtc\Models\Site;
use dtc\Models\Route;
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


class RouteController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('route'))
		 {


				 $routeList= Route::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

				$view =  View::make('routee.index',compact('routeList'))

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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Route');
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

		 if (Auth::check() && Helper::getAuth('new_route'))
		 {


				 $code= Helper::getNextCode("route");


				$view =View::make('routee.create')
					->with('code',$code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Route');
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

		          'name'=>'required'

		    );
		    //get all Route information
		    $routes = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($routes,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $routes['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $routes['is_fuel'] = $routes['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $routes['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Route information in the database 
		      //and redirect to index page


				 $empl= Route::create($routes);

				 // $privilege =Privileges:: privilege(['driver_id' => $routes['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `route`=route+1');
				


				  $user = User::find(Auth::id());
				  Log::info('Route '.$empl->name.' is created. by:'.$user->name);
		          return Redirect::route('routee.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Route '.$empl->name.'Successfully created.');
		      }
		      //show error message
		      return Redirect::route('routee.create')
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
         $task = Route::findOrFail($id);
		 if (Auth::check() && Helper::getAuth('view_route'))
		 {



				 return View::make('routee.show')
                     ->withTask($task);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Route :'.$task->name);
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
         $route = Route::find($id);
		 if (Auth::check() && Helper::getAuth('edit_route'))
		 {

			 //get the current book by i

				if (is_null($route))
				{
					return Redirect::route('route.index');
				}
				//redirect to update form
				//$routes = Route::lists('name', 'id');
				return View::make('routee.edit', compact('route'))
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Route :'.$route->name);
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
            'name'=>'required'

        );
        $routes = Input::all();




        $validation = Validator::make($routes, $rules);


        if ($validation->passes())
        {
            $book = Route::find($id);
            $book->update($routes);
			$user = User::find(Auth::id());
			Log::warning('Route '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('routee.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Route '.$book->name.' Successfully Edited.');
        }
        return Redirect::route('routee.edit', $id)
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
		 if (Auth::check() && Helper::getAuth('delete_route') )
		 {



				 $driver = Route::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Route '.$driver->name.' is deleted. by:'.$user->name);
             \DB::table('route')->where('id', '=', $id)->delete();
				return Redirect::route('routee.index')
					->withInput()
					->with('scs_success', 'Route : '.$driver->name.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Route');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $routeList= Route::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('route.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Route');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $routeList= Route::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('route.settle_route');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Route');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>