<?php
namespace dtc\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Company;
use dtc\Models\Helper;
use dtc\Models\Order;
use dtc\Models\Site;
use dtc\Models\Client;
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


class ClientController extends Controller{
	function __construct() {
		//parent::__construct();
		Lang::setLocale(Session::get('locale'));
	}
	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check())
		 {


				 $clientList= Client::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
		
				$view =  View::make('client.index',compact('clientList'));



				if (Request::ajax())
				{

					return  $view->renderSections()['middle_right_DIV'];
				}
				else{

					return  $view;
				}
		 }

		 else{

			 //Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Client');
			// Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('auth/login');


		 }



	 }
	 /**
	  * Show the form for creating a new resource.
	  *
	  * @return Response
	  */
	 public function create()
	 {

		 if (Auth::check())
		 {


				 $code= Helper::getNextCode("client");


				$view =View::make('client.create')
					->with('code',$code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Client');
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

		          'name'=>'required',
		          'code'=>'required|unique:client,code',
				'phone'=>'numeric|digits_between:8,15',


		    );
		    //get all Client information
		    $clients = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($clients,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $clients['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $clients['is_fuel'] = $clients['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $clients['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Client information in the database 
		      //and redirect to index page


				 $empl= Client::create($clients);

				 // $privilege =Privileges:: privilege(['driver_id' => $clients['id']]);
				 // $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `client`=client+1');
				


				  $user = User::find(Auth::id());
				  Log::info('Client '.$empl->name.' is created. by:'.$user->name);
		          return Redirect::route('client.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Client Successfully created.');
		      }
		      //show error message
		      return Redirect::route('client.create')
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
		 if (Auth::check())
		 {

			 $task = Client::findOrFail($id);
             $orderList=Order::where('client_id','=',$id)->orderBy('created_at', 'desc')->get();
				 return View::make('client.show')
                     ->withTask($task)
                     ->with('orderList',$orderList);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Client');
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

		 if (Auth::check())
		 {

			 //get the current book by i
				$client = Client::find($id);
				if (is_null($client))
				{
					return Redirect::route('client.index');
				}
				//redirect to update form
				//$clients = Client::lists('name', 'id');
				return View::make('client.edit', compact('client'))
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Client');
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
            'code'=>'required|unique:client,code,'.$id,
            'phone'=>'numeric|digits_between:8,15',



        );
        $clients = Input::all();




        $validation = Validator::make($clients, $rules);


        if ($validation->passes())
        {
            $book = Client::find($id);
            $book->update($clients);
			$user = User::find(Auth::id());
			Log::warning('Client '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('client.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Client Successfully updated.');
        }
        return Redirect::route('client.edit', $id)
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
		 if (Auth::check() )
		 {



				 $driver = Client::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Client '.$driver->name.' is deleted. by:'.$user->name);
             \DB::table('client')->where('id', '=', $id)->delete();
				return Redirect::route('client.index')
					->withInput()
					->with('scs_success', 'Client Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Client');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }

	 public function search_client(){


         if (Auth::check())
         {


             $clients=Client::lists('name' ,'id' );



             $view =View::make('client.search_client')
                 ->with('clients',$clients)
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

             Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Cleint Serach');
             Session::put("error_message",Lang::get('messages.action_authorized_warning'));
             return redirect('dashboard');


         }

         }

         public function display_client(){


         if (Auth::check())
         {


             $client= Input::all();
             $task = Client::findOrFail($client['client_id']);
             $orderList=Order::where('client_id','=',$client['client_id'])->orderBy('created_at', 'desc')->get();

             $view = View::make('client.show')
                 ->withTask($task)
                 ->with('orderList',$orderList);





             if (Request::ajax())
             {

                 return  $view->renderSections()['middle_right_DIV'];
             }
             else{

                 return  $view;
             }

         }

         else{

             Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Cleint Serach');
             Session::put("error_message",Lang::get('messages.action_authorized_warning'));
             return redirect('dashboard');


         }

         }


	}


?>