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
use dtc\Models\Receiving;
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
 $receiving_array=null;
$client_bank_accounts=array();


class ReceivingController extends Controller{
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


				// $receivingList= Receiving::all();//orderBy('created_at', 'desc')->get();
				 $receivingList= Receiving::orderBy('created_at', 'desc')->get();
				// working $receivingList= Receiving::whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('created_at', 'desc')->get();
            // ->whereDate('created_at', '=', Carbon::today()->toDateString());
				$view =  View::make('receiving.index',compact('receivingList'));



				if (Request::ajax())
				{

					return  $view->renderSections()['middle_right_DIV'];
				}
				else{

					return  $view;
				}
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Receiving');
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


				 $code= Helper::getNextCode("receiving");
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
				$view =View::make('receiving.create')
					->with('code',$code)
                    ->with('agents',$agents)
                    ->with('agents_code',$agents_code)
                    ->with('setups',$setups)
                    ->with('acc_groups',$acc_groups)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Receiving');
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
		          'code'=>'required|unique:receiving,code',
                'lkr' => 'required|numeric|min:0',
                'sdr' => 'required|numeric|min:0',
		    );
		    //get all Receiving information

         $receivings = Input::all();
         $GLOBALS['recivngs'] =  $receivings ;

         $validation=Validator::make($receivings,$rules);

		      if($validation->passes())
		      {
		      //save new Receiving information in the database 
		      //and redirect to index page


                  $rewult = DB::transaction(function () {
                      $GLOBALS['recivngs']['pha']= Agent::find(   $GLOBALS['recivngs']['agent_id'])->amount;
                      $GLOBALS['recivngs']['pcapital']= System::first()->capital;
				 $empl= Receiving::create(   $GLOBALS['recivngs']);
                  $GLOBALS['receiving_array']=      $GLOBALS['recivngs'] ;
				 // $privilege =Privileges:: privilege(['driver_id' => $receivings['id']]);

				  \DB::update('update `increment_helper` set `receiving`=`receiving`+1');


                  DB::table('agent')->where('id', '=', $empl->agent_id)->update(['amount' =>  DB::raw('amount - '.($empl->lkr +$empl->kooli ))]);
                  DB::table('system')->update(['capital' =>  DB::raw('capital + '.$empl->sdr)]);


                   Mail::send('email.receivinge', $GLOBALS['receiving_array'] , function($message) {
                      $agent = Agent::find($GLOBALS['receiving_array']['agent_id']);
                      $message->to($agent->email, $agent->fullname)->subject(
                          'Receiving Code :'.$GLOBALS['receiving_array']['code'].
                          'Date :'.$GLOBALS['receiving_array']['date']
                      );
                  });

				  $user = User::find(Auth::id());
				  Log::info('Receiving '.$empl->code.' is created. by:'.$user->name);


                  });
		          return Redirect::route('receiving.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Receiving Successfully created.');
		      }
		      //show error message
		      return Redirect::route('receiving.create')
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

			 $task = Receiving::findOrFail($id);

				 return View::make('receiving.show')->withTask($task);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Receiving');
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
				$receiving = Receiving::find($id);
             $agents=Agent::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $setups=System::first();//DB::table ('system')->first();
             $code= Helper::getNextCode("receiving");

                 $GLOBALS['receiving_array']=$receiving;
             if (is_null($receiving))
				{
					return Redirect::route('receiving.index');
				}
				//redirect to update form
				//$receivings = Receiving::lists('name', 'id');

             $temp_clients = Agent::all();

             $temp_clients->each(function($each_client) // foreach($posts as $post) { }
             {
                 $GLOBALS['second_array'][$each_client->id][0]=$each_client->bank_acc_1;
                 $GLOBALS['second_array'][$each_client->id][1]=$each_client->bank_acc_2;
                 $GLOBALS['second_array'][$each_client->id][2]=$each_client->bank_acc_3;
                 $GLOBALS['second_array'][$each_client->id][3]=$each_client->bank_acc_4;

                 if($each_client->id == $GLOBALS['receiving_array']->agent_id){

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

				return View::make('receiving.edit')
                    ->with('receiving',$receiving)
                    ->with('agents',$agents)
                    ->with('agents_code',$agents_code)
                    ->with('setups',$setups)
                    ->with('food_groups',$food_groups)
                    ->with('code',$code)
                    ->with('temp_agent_bank_accounts',$temp_agent_bank_accounts)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Receiving');
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
             'code'=>'required|unique:receiving,code,'.$id,
             'lkr' => 'required|numeric|min:0',

         );
        $receivings = Input::all();




        $validation = Validator::make($receivings, $rules);


        if ($validation->passes())
        {
            $book = Receiving::find($id);
            DB::table('agent')->where('id', '=', $book ->agent_id)->update(['amount' => DB::raw('amount - '. $book->lkr)]);
            $book->update($receivings);
            DB::table('agent')->where('id', '=', $receivings ['agent_id'])->update(['amount' => DB::raw('amount + '. $receivings['sdr'])]);
			$user = User::find(Auth::id());

          //  $ai =  \DB::getPdo()->lastInsertId();
          //  \DB::update('update `increment_helper` set `receiving`=`receiving`+1');



            Log::warning('Receiving '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('receiving.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Receiving Successfully updated.');
        }
        return Redirect::route('receiving.edit', $id)
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
         if (Auth::check()) {


             $GLOBALS['recv_id'] = $id;

             $rewult = DB::transaction(function () {

                 $driver = Receiving::find($GLOBALS['recv_id']);

                 $user = User::find(Auth::id());
                 DB::table('agent')->where('id', '=', $driver->agent_id)->update(['amount' => DB::raw('amount + ' . ($driver->lkr + $driver->kooli))]);
                 // DB::table('system')->update(['capital' => DB::raw('capital - '. $driver->pcapital) ]);
                 DB::table('system')->update(['capital' => DB::raw('`capital` - ' . $driver->sdr)]);
                 \DB::table('receiving')->where('id', '=',  $GLOBALS['recv_id'])->delete();
                 Log::warning('Receiving ' . $driver->code . ' is deleted. by:' . $user->name);
             });


             if (is_null($rewult)) {
                 return Redirect::route('receiving.index')
                     ->withInput()
                     ->with('scs_success', 'Receiving Successfully deleted.');

             } else {

                 return Redirect::route('receiving.index')
                     ->withInput()
                     ->with('scs_errors', 'Receiving Deletion Failed.');
             }

         } else {

             Log::warning('Un Authorized Employee ' . Auth::user()->name . ' trying to Delete Receiving');
             Session::put("error_message", Lang::get('messages.action_authorized_warning'));
             return redirect('dashboard');


         }
     }

    public function search_receiving(){


        if (Auth::check())
        {


            $receivings=Receiving::lists('code' ,'id' );



            $view =View::make('receiving.search_receiving')
                ->with('receivings',$receivings)
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

    public function display_receiving(){


        if (Auth::check())
        {


            $receiving= Input::all();
            $task = Receiving::findOrFail($receiving['receiving_id']);

            $view = View::make('receiving.show')->withTask($task);



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Receiving Search');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }

}


?>