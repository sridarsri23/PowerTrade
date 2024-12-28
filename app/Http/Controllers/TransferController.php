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
use dtc\Models\Transfer;
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
 $transfer_array=null;
$client_bank_accounts=array();


class TransferController extends Controller{
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


				// $transferList= Transfer::all();//orderBy('created_at', 'desc')->get();
				 $transferList= Transfer::orderBy('created_at', 'desc')->get();
				// working $transferList= Transfer::whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('created_at', 'desc')->get();
            // ->whereDate('created_at', '=', Carbon::today()->toDateString());
				$view =  View::make('transfer.index',compact('transferList'));



				if (Request::ajax())
				{

					return  $view->renderSections()['middle_right_DIV'];
				}
				else{

					return  $view;
				}
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Transfer');
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


				 $code= Helper::getNextCode("transfer");
             $agents=Agent::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $setups=\DB::table ('system')->first();


//example usage.
             $temp_clients = Agent::all();


				$view =View::make('transfer.create')
					->with('code',$code)
                    ->with('agents',$agents)
                    ->with('agents_code',$agents_code)
                    ->with('setups',$setups)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Transfer');
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
		          'code'=>'required|unique:transfer,code',
                'lkr' => 'required|numeric|min:0',
		    );
		    //get all Transfer information

         $transfers = Input::all();
         $GLOBALS['recivngs'] =  $transfers ;

         $validation=Validator::make($transfers,$rules);

		      if($validation->passes())
		      {
		      //save new Transfer information in the database 
		      //and redirect to index page


                  $rewult = DB::transaction(function () {
                      $GLOBALS['recivngs']['from_agnt_pha']= Agent::find(   $GLOBALS['recivngs']['from_agent_id'])->amount;
                      $GLOBALS['recivngs']['to_agent_pha']= Agent::find(   $GLOBALS['recivngs']['to_agent_id'])->amount;
				 $empl= Transfer::create(   $GLOBALS['recivngs']);
                  $GLOBALS['transfer_array']=      $GLOBALS['recivngs'] ;
				 // $privilege =Privileges:: privilege(['driver_id' => $transfers['id']]);

				  \DB::update('update `increment_helper` set `transfer`=`transfer`+1');


                  DB::table('agent')->where('id', '=', $empl->from_agent_id)->update(['amount' =>  DB::raw('amount - '.$empl->lkr )]);
                  DB::table('agent')->where('id', '=', $empl->to_agent_id)->update(['amount' =>  DB::raw('amount + '.$empl->lkr )]);




                   Mail::send('email.transfer_frome', $GLOBALS['transfer_array'] , function($message) {
                      $agent = Agent::find($GLOBALS['transfer_array']['from_agent_id']);
                      $message->to(   $agent->email, $agent->fullname)->subject(
                          'Transfer Code :'.$GLOBALS['transfer_array']['code'].
                          'Date :'.$GLOBALS['transfer_array']['date']
                      );
                  });

                   Mail::send('email.transfer_toe', $GLOBALS['transfer_array'] , function($message) {
                      $agent = Agent::find($GLOBALS['transfer_array']['to_agent_id']);
                      $message->to(   $agent->email, $agent->fullname)->subject(
                          'Transfer Code :'.$GLOBALS['transfer_array']['code'].
                          'Date :'.$GLOBALS['transfer_array']['date']
                      );
                  });

				  $user = User::find(Auth::id());
				  Log::info('Transfer '.$empl->code.' is created. by:'.$user->name);


                  });
		          return Redirect::route('transfer.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Transfer Successfully created.');
		      }
		      //show error message
		      return Redirect::route('transfer.create')
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

			 $task = Transfer::findOrFail($id);

				 return View::make('transfer.show')->withTask($task);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Transfer');
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
				$transfer = Transfer::find($id);
             $agents=Agent::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $setups=System::first();//DB::table ('system')->first();
             $code= Helper::getNextCode("transfer");

                 $GLOBALS['transfer_array']=$transfer;
             if (is_null($transfer))
				{
					return Redirect::route('transfer.index');
				}
				//redirect to update form
				//$transfers = Transfer::lists('name', 'id');

             $temp_clients = Agent::all();

             $temp_clients->each(function($each_client) // foreach($posts as $post) { }
             {
                 $GLOBALS['second_array'][$each_client->id][0]=$each_client->bank_acc_1;
                 $GLOBALS['second_array'][$each_client->id][1]=$each_client->bank_acc_2;
                 $GLOBALS['second_array'][$each_client->id][2]=$each_client->bank_acc_3;
                 $GLOBALS['second_array'][$each_client->id][3]=$each_client->bank_acc_4;

                 if($each_client->id == $GLOBALS['transfer_array']->agent_id){

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

				return View::make('transfer.edit')
                    ->with('transfer',$transfer)
                    ->with('agents',$agents)
                    ->with('agents_code',$agents_code)
                    ->with('setups',$setups)
                    ->with('food_groups',$food_groups)
                    ->with('code',$code)
                    ->with('temp_agent_bank_accounts',$temp_agent_bank_accounts)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Transfer');
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
             'code'=>'required|unique:transfer,code,'.$id,
             'lkr' => 'required|numeric|min:0',

         );
        $transfers = Input::all();




        $validation = Validator::make($transfers, $rules);


        if ($validation->passes())
        {
            $book = Transfer::find($id);
            DB::table('agent')->where('id', '=', $book ->agent_id)->update(['amount' => DB::raw('amount - '. $book->lkr)]);
            $book->update($transfers);
            DB::table('agent')->where('id', '=', $transfers ['agent_id'])->update(['amount' => DB::raw('amount + '. $transfers['sdr'])]);
			$user = User::find(Auth::id());

          //  $ai =  \DB::getPdo()->lastInsertId();
          //  \DB::update('update `increment_helper` set `transfer`=`transfer`+1');



            Log::warning('Transfer '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('transfer.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Transfer Successfully updated.');
        }
        return Redirect::route('transfer.edit', $id)
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

                 $driver = Transfer::find($GLOBALS['recv_id']);

                 $user = User::find(Auth::id());
                 DB::table('agent')->where('id', '=', $driver->from_agent_id)->update(['amount' => DB::raw('amount + ' . ($driver->lkr))]);
                 DB::table('agent')->where('id', '=', $driver->to_agent_id)->update(['amount' => DB::raw('amount - ' . ($driver->lkr))]);
                 // DB::table('system')->update(['capital' => DB::raw('capital - '. $driver->pcapital) ]);
               //  DB::table('system')->update(['capital' => DB::raw('`capital` - ' . $driver->sdr)]);
                 \DB::table('transfer')->where('id', '=',  $GLOBALS['recv_id'])->delete();
                 Log::warning('Transfer ' . $driver->code . ' is deleted. by:' . $user->name);
             });


             if (is_null($rewult)) {
                 return Redirect::route('transfer.index')
                     ->withInput()
                     ->with('scs_success', 'Transfer Successfully deleted.');

             } else {

                 return Redirect::route('transfer.index')
                     ->withInput()
                     ->with('scs_errors', 'Transfer Deletion Failed.');
             }

         } else {

             Log::warning('Un Authorized Employee ' . Auth::user()->name . ' trying to Delete Transfer');
             Session::put("error_message", Lang::get('messages.action_authorized_warning'));
             return redirect('dashboard');


         }
     }

    public function search_transfer(){


        if (Auth::check())
        {


            $transfers=Transfer::lists('code' ,'id' );



            $view =View::make('transfer.search_transfer')
                ->with('transfers',$transfers)
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

    public function display_transfer(){


        if (Auth::check())
        {


            $transfer= Input::all();
            $task = Transfer::findOrFail($transfer['transfer_id']);

            $view = View::make('transfer.show')->withTask($task);



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Transfer Search');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }

}


?>