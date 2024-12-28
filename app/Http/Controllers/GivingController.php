<?php
namespace dtc\Http\Controllers;


use dtc\Models\Agent;
use dtc\Models\Client;
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
use dtc\Models\Giving;
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
 $giving_array=null;
$client_bank_accounts=array();


class GivingController extends Controller{
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


				// $givingList= Giving::all();//orderBy('created_at', 'desc')->get();
				 $givingList= Giving::orderBy('created_at', 'desc')->get();
				// working $givingList= Giving::whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('created_at', 'desc')->get();
            // ->whereDate('created_at', '=', Carbon::today()->toDateString());
				$view =  View::make('giving.index',compact('givingList'));



				if (Request::ajax())
				{

					return  $view->renderSections()['middle_right_DIV'];
				}
				else{

					return  $view;
				}
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Giving');
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

		 if (Auth::check())
		 {


				 $code= Helper::getNextCode("giving");
             $agents=Agent::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $setups=\DB::table ('system')->first();


//example usage.
             $temp_clients = Agent::all();

             $temp_clients->each(function($each_client) // foreach($posts as $post) { }
             {
                 //do something
                // echo  $each_client->id .' '.$each_client->bank_acc_1;
                // $food_groups[$each_client->id] = array();
                  //  $food_groups[$each_client->id][]=array($each_client->bank_acc_1,$each_client->bank_acc_2);
            // $food_groups=array($each_client->id=> array($each_client->bank_acc_1,$each_client->bank_acc_2));


                 $GLOBALS['third_array'][$each_client->id][0]=$each_client->bank_acc_1;
                 $GLOBALS['third_array'][$each_client->id][1]=$each_client->bank_acc_2;
                 $GLOBALS['third_array'][$each_client->id][2]=$each_client->bank_acc_3;
                 $GLOBALS['third_array'][$each_client->id][3]=$each_client->bank_acc_4;
             }
             );
             /*
             $food_groups = array(
                 '2' => array('bread', 'rice', 'oatmeal'),
                 '3' => array('kidney beans', 'lentils', 'split peas'),
             );
*/$acc_groups=$GLOBALS['third_array'];
				$view =View::make('giving.create')
					->with('code',$code)
                    ->with('agents',$agents)
                    ->with('agents_code',$agents_code)
                    ->with('setups',$setups)
                    ->with('acc_groups',$acc_groups)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Giving');
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
		          'code'=>'required|unique:giving,code',
                'lkr' => 'required|numeric|min:0',
		    );
		    //get all Giving information
		    $givings = Input::all();

		  
		      $validation=Validator::make($givings,$rules);


		      if($validation->passes())
		      {
		      //save new Giving information in the database 
		      //and redirect to index page

                  $givings['pha']= Agent::find($givings['agent_id'])->amount;
				 $empl= Giving::create($givings);
                  $GLOBALS['giving_array']=   $givings ;
				 // $privilege =Privileges:: privilege(['driver_id' => $givings['id']]);

				  \DB::update('update `increment_helper` set `giving`=`giving`+1');


                  DB::table('agent')->where('id', '=', $empl->agent_id)->update(['amount' =>  DB::raw('amount + '.$empl->lkr)]);


                   Mail::send('email.givinge', $GLOBALS['giving_array'] , function($message) {
                      $agent = Agent::find($GLOBALS['giving_array']['agent_id']);
                      $message->to($agent->email, $agent->fullname)->subject(
                          'Giving Code :'.$GLOBALS['giving_array']['code'].
                          'Date :'.$GLOBALS['giving_array']['date']
                      );
                  });

				  $user = User::find(Auth::id());
				  Log::info('Giving '.$empl->code.' is created. by:'.$user->name);
		          return Redirect::route('giving.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Giving Successfully created.');
		      }
		      //show error message
		      return Redirect::route('giving.create')
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

			 $task = Giving::findOrFail($id);

				 return View::make('giving.show')->withTask($task);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Giving');
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
				$giving = Giving::find($id);
             $agents=Agent::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $setups=System::first();//DB::table ('system')->first();
             $code= Helper::getNextCode("giving");

                 $GLOBALS['giving_array']=$giving;
             if (is_null($giving))
				{
					return Redirect::route('giving.index');
				}
				//redirect to update form
				//$givings = Giving::lists('name', 'id');

             $temp_clients = Agent::all();

             $temp_clients->each(function($each_client) // foreach($posts as $post) { }
             {
                 $GLOBALS['second_array'][$each_client->id][0]=$each_client->bank_acc_1;
                 $GLOBALS['second_array'][$each_client->id][1]=$each_client->bank_acc_2;
                 $GLOBALS['second_array'][$each_client->id][2]=$each_client->bank_acc_3;
                 $GLOBALS['second_array'][$each_client->id][3]=$each_client->bank_acc_4;

                 if($each_client->id == $GLOBALS['giving_array']->agent_id){

                     $GLOBALS['client_bank_accounts']= array(
                         $each_client->bank_acc_1=>$each_client->bank_acc_1,
                         $each_client->bank_acc_2=>$each_client->bank_acc_2,
                         $each_client->bank_acc_3=>$each_client->bank_acc_3,
                         $each_client->bank_acc_4=>$each_client->bank_acc_4,
                     );
                 }
             }
             );
             $food_groups=$GLOBALS['second_array'];


             $temp_agent_bank_accounts  =  $GLOBALS['client_bank_accounts'];

				return View::make('giving.edit')
                    ->with('giving',$giving)
                    ->with('agents',$agents)
                    ->with('agents_code',$agents_code)
                    ->with('setups',$setups)
                    ->with('food_groups',$food_groups)
                    ->with('code',$code)
                    ->with('temp_agent_bank_accounts',$temp_agent_bank_accounts)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Giving');
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
             'code'=>'required|unique:giving,code,'.$id,
             'lkr' => 'required|numeric|min:0',

         );
        $givings = Input::all();




        $validation = Validator::make($givings, $rules);


        if ($validation->passes())
        {
            $book = Giving::find($id);
            DB::table('agent')->where('id', '=', $book ->agent_id)->update(['amount' => DB::raw('amount - '. $book->lkr)]);
            $book->update($givings);
            DB::table('agent')->where('id', '=', $givings ['agent_id'])->update(['amount' => DB::raw('amount + '. $givings['sdr'])]);
			$user = User::find(Auth::id());

          //  $ai =  \DB::getPdo()->lastInsertId();
          //  \DB::update('update `increment_helper` set `giving`=`giving`+1');



            Log::warning('Giving '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('giving.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Giving Successfully updated.');
        }
        return Redirect::route('giving.edit', $id)
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

				 $driver = Giving::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Giving '.$driver->code.' is deleted. by:'.$user->name);
          DB::table('agent')->where('id', '=', $driver->agent_id)->update(['amount' => DB::raw('amount - '. $driver->lkr)]);
             \DB::table('giving')->where('id', '=', $id)->delete();
				return Redirect::route('giving.index')
					->withInput()
					->with('scs_success', 'Giving Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Giving');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }

    public function search_giving(){


        if (Auth::check())
        {


            $givings=Giving::lists('code' ,'id' );



            $view =View::make('giving.search_giving')
                ->with('givings',$givings)
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

    public function display_giving(){


        if (Auth::check())
        {


            $giving= Input::all();
            $task = Giving::findOrFail($giving['giving_id']);

            $view = View::make('giving.show')->withTask($task);



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Giving Search');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }

}


?>