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
 $second_array=array();
 $third_array=array();
 $order_array=null;
$client_bank_accounts=array();


class OrderController extends Controller{
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


				// $orderList= Order::all();//orderBy('created_at', 'desc')->get();
				 $unsettled_orderList= Order::whereDate('created_at', '!=', Carbon::today()->toDateString())->where('is_paid_to_agent','=',false)->orderBy('created_at', 'desc')->get();
				 $credit_orderList= Order::where('is_credit','=',true)->orderBy('created_at', 'desc')->get();
				$orderList= Order::whereDate('created_at', '=', Carbon::today()->toDateString())->orderBy('created_at', 'desc')->get();
            // ->whereDate('created_at', '=', Carbon::today()->toDateString());
				$view =  View::make('order.index',compact('orderList'))
                ->with('unsettled_orderList',$unsettled_orderList)
                ->with('credit_orderList',$credit_orderList)
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Order');
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


				 $code= Helper::getNextCode("order");
             $agents=Agent::lists('name' ,'id' );
             $clients=Client::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $clients_code=Client::lists('code' ,'id' );
             $agent_cmn=Agent::lists('cmn_pcnt','id' );
             $setups=\DB::table ('system')->first();


//example usage.
             $temp_clients = Client::all();
             $GLOBALS['third_array']=null;
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
                 $GLOBALS['third_array'][$each_client->id][4]=$each_client->bank_acc_5;
                 $GLOBALS['third_array'][$each_client->id][5]=$each_client->bank_acc_6;
                 $GLOBALS['third_array'][$each_client->id][6]=$each_client->bank_acc_7;
                 $GLOBALS['third_array'][$each_client->id][7]=$each_client->bank_acc_8;
             }
             );
             /*
             $food_groups = array(
                 '2' => array('bread', 'rice', 'oatmeal'),
                 '3' => array('kidney beans', 'lentils', 'split peas'),
             );
*/
             $acc_groups=$GLOBALS['third_array'];
				$view =View::make('order.create')
					->with('code',$code)
                    ->with('agents',$agents)
                    ->with('clients',$clients)
                    ->with('agents_code',$agents_code)
                    ->with('clients_code',$clients_code)
                    ->with('setups',$setups)
                    ->with('agent_cmn',$agent_cmn)
                    ->with('acc_groups',$acc_groups)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Order');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }


	 }

	 public function createc()
	 {

		 if (Auth::check())
		 {


				 $code= Helper::getNextCode("order");
				 $client_code= Helper::getNextCode("client");
             $agents=Agent::lists('name' ,'id' );
             $clients=Client::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $clients_code=Client::lists('code' ,'id' );
             $agent_cmn=Agent::lists('cmn_pcnt','id' );
             $setups=\DB::table ('system')->first();


//example usage.
             $temp_clients = Client::all();
             $GLOBALS['third_array']=null;
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
                 $GLOBALS['third_array'][$each_client->id][4]=$each_client->bank_acc_5;
                 $GLOBALS['third_array'][$each_client->id][5]=$each_client->bank_acc_6;
                 $GLOBALS['third_array'][$each_client->id][6]=$each_client->bank_acc_7;
                 $GLOBALS['third_array'][$each_client->id][7]=$each_client->bank_acc_8;
             }
             );
             /*
             $food_groups = array(
                 '2' => array('bread', 'rice', 'oatmeal'),
                 '3' => array('kidney beans', 'lentils', 'split peas'),
             );
*/$acc_groups=$GLOBALS['third_array'];
				$view =View::make('order.createc')
					->with('code',$code)
                    ->with('agents',$agents)
                    ->with('clients',$clients)
                    ->with('agents_code',$agents_code)
                    ->with('clients_code',$clients_code)
                    ->with('setups',$setups)
                    ->with('agent_cmn',$agent_cmn)
                    ->with('acc_groups',$acc_groups)
                    ->with('client_code',$client_code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Order');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }


	 }

    public function createu()
    {

        if (Auth::check())
        {


            $code= Helper::getNextCode("order");
            $client_code= Helper::getNextCode("client");
            $agents=Agent::lists('name' ,'id' );
            $clients=Client::lists('name' ,'id' );
            $agents_code=Agent::lists('code' ,'id' );
            $clients_code=Client::lists('code' ,'id' );
            $agent_cmn=Agent::lists('cmn_pcnt','id' );
            $setups=\DB::table ('system')->first();


//example usage.
            $temp_clients = Client::all();
            $GLOBALS['third_array']=null;
            $GLOBALS['banks_ids']=null;
            $temp_clients->each(function($each_client) // foreach($posts as $post) { }
            {
                //do something
                // echo  $each_client->id .' '.$each_client->bank_acc_1;
                // $food_groups[$each_client->id] = array();
                //  $food_groups[$each_client->id][]=array($each_client->bank_acc_1,$each_client->bank_acc_2);
                // $food_groups=array($each_client->id=> array($each_client->bank_acc_1,$each_client->bank_acc_2));
                /*
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_1;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_2;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_3;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_4;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_5;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_6;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_7;
                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_8;
            */

                $GLOBALS['banks_ids'] [$each_client->id]=$each_client->bank_acc_1." ".$each_client->bank_acc_2
                                ." ".$each_client->bank_acc_3
                                ." ".$each_client->bank_acc_4
                                ." ".$each_client->bank_acc_5
                                ." ".$each_client->bank_acc_6
                                ." ".$each_client->bank_acc_7
                                ." ".$each_client->bank_acc_8


                ;
              //  $GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_2."";
               //$GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_3."";
               //$GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_4."";
           //   $GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_5."";
             //  $GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_6."";
              // $GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_7."";
              // $GLOBALS['banks_ids'] [$each_client->id]="".$each_client->bank_acc_8."";

               // $GLOBALS['banks_ids'][$each_client->bank_acc_1]=$each_client->id;

                $GLOBALS['third_array'][$each_client->id][0]=$each_client->bank_acc_1;
                $GLOBALS['third_array'][$each_client->id][1]=$each_client->bank_acc_2;
                $GLOBALS['third_array'][$each_client->id][2]=$each_client->bank_acc_3;
                $GLOBALS['third_array'][$each_client->id][3]=$each_client->bank_acc_4;
                $GLOBALS['third_array'][$each_client->id][4]=$each_client->bank_acc_5;
                $GLOBALS['third_array'][$each_client->id][5]=$each_client->bank_acc_6;
                $GLOBALS['third_array'][$each_client->id][6]=$each_client->bank_acc_7;
                $GLOBALS['third_array'][$each_client->id][7]=$each_client->bank_acc_8;
            }
            );
            /*
            $food_groups = array(
                '2' => array('bread', 'rice', 'oatmeal'),
                '3' => array('kidney beans', 'lentils', 'split peas'),
            );
*/$acc_groups=$GLOBALS['third_array'];
$banks_ids=$GLOBALS['banks_ids'];
            $view =View::make('order.createu')
                ->with('code',$code)
                ->with('agents',$agents)
                ->with('clients',$clients)
                ->with('agents_code',$agents_code)
                ->with('clients_code',$clients_code)
                ->with('setups',$setups)
                ->with('agent_cmn',$agent_cmn)
                ->with('acc_groups',$acc_groups)
                ->with('client_code',$client_code)
                ->with('banks_ids',$banks_ids)
            ;

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Order');
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
		          'code'=>'required|unique:order,code',
                'from_currency_amount' => 'required|numeric|min:0',
                'to_currency_amount' => 'required|numeric|min:0',
                'comission_amount' => 'required|numeric|min:0',
                'client_bank_acc' => 'required',
		    );
		    //get all Order information
		    $orders = Input::all();

		  
		      $validation=Validator::make($orders,$rules);


		      if($validation->passes())
		      {
		      //save new Order information in the database 
		      //and redirect to index page

                  $orders['commission_pcnt']=Agent::find( $orders['agent_id'])->cmn_pcnt;

                  $orders['is_credit']=   $orders['is_credit']== 'Yes' ? true:false;

				 $empl= Order::create($orders);

				 // $privilege =Privileges:: privilege(['driver_id' => $orders['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `order`=`order`+1');


                //  DB::table('agent')->where('id', '=', $empl->agent_id)->update(['amount' =>  DB::raw('amount - '.$empl->from_currency_amount)]);

				  $user = User::find(Auth::id());
				  Log::info('Order '.$empl->code.' is created. by:'.$user->name);
		          return Redirect::route('order.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Order Successfully created.');
		      }
		      //show error message
		      return Redirect::route('order.create')
		           ->withInput()
		           ->withErrors($validation)
		           ->with('message', 'Some fields are incomplete.')
		           ->with('scs_errors', 'Some fields are incomplete.');
	 }


    public function storec()
    {
        //create a rule validation
        $rules=array(

            'date'=>'required',
            'code'=>'required|unique:order,code',
            'from_currency_amount' => 'required|numeric|min:0',
            'to_currency_amount' => 'required|numeric|min:0',
            'comission_amount' => 'required|numeric|min:0',
        );
        //get all Order information
        $GLOBALS['orders'] = Input::all();




        $validation=Validator::make(  $GLOBALS['orders'],$rules);


        if($validation->passes())
        {
            //save new Order information in the database
            //and redirect to index page
            $rewult= DB::transaction(function () {

                $client_id=$GLOBALS['orders']['client_id'];
                if(  $GLOBALS['orders'] ['is_new_client']){//if new cllient

                    $client_id = DB::table('client')->insertGetId(
                        ['name' => $GLOBALS['orders']['client_name'] ,
                            'full_name' => $GLOBALS['orders']['client_name'] ,
                            'code' => $GLOBALS['orders']['client_code'] ,
                            'bank_acc_1' => $GLOBALS['orders']['client_bank_details'] ]

                    );

                    $GLOBALS['orders']['client_bank_acc']= $GLOBALS['orders']['client_bank_details'];
                }

                $GLOBALS['orders']['commission_pcnt']=Agent::find( $GLOBALS['orders']['agent_id'])->cmn_pcnt;
                $GLOBALS['orders']['client_id']=$client_id;//Agent::find( $GLOBALS['orders']['agent_id'])->cmn_pcnt;
                $GLOBALS['orders']['is_credit']=   $GLOBALS['orders']['is_credit']== 'Yes' ? true:false;
                Order::create( $GLOBALS['orders']);

                // $privilege =Privileges:: privilege(['driver_id' => $orders['id']]);
                $ai =  \DB::getPdo()->lastInsertId();
                \DB::update('update `increment_helper` set `order`=`order`+1');
                \DB::update('update `increment_helper` set `client`=`client`+1');


            });




            //  DB::table('agent')->where('id', '=', $empl->agent_id)->update(['amount' =>  DB::raw('amount - '.$empl->from_currency_amount)]);

            $user = User::find(Auth::id());
            Log::info('Order '.$user->code.' is created. by:'.$user->name);
            return Redirect::route('order.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Order Successfully created.');
        }
        //show error message
       // return Redirect::route('order.createc')
                      return Redirect::to('createc')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Some fields are incomplete.')
            ->with('scs_errors', 'Some fields are incomplete.');
    }

    public function storeu()
    {
        //create a rule validation
        $rules=array(

            'date'=>'required',
            'code'=>'required|unique:order,code',
            'from_currency_amount' => 'required|numeric|min:0',
            'to_currency_amount' => 'required|numeric|min:0',
            'comission_amount' => 'required|numeric|min:0',
        );
        //get all Order information
        $GLOBALS['orders'] = Input::all();




        $validation=Validator::make(  $GLOBALS['orders'],$rules);


        if($validation->passes())
        {
            //save new Order information in the database
            //and redirect to index page
            $rewult= DB::transaction(function () {

                $client_id=$GLOBALS['orders']['client_id'];
                if(  $GLOBALS['orders'] ['is_new_client']){//if new cllient

                    $client_id = DB::table('client')->insertGetId(
                        ['name' => $GLOBALS['orders']['client_name'] ,
                            'full_name' => $GLOBALS['orders']['client_name'] ,
                            'code' => $GLOBALS['orders']['client_code'] ,
                            'bank_acc_1' => $GLOBALS['orders']['client_bank_details'] ]

                    );

                    $GLOBALS['orders']['client_bank_acc']= $GLOBALS['orders']['client_bank_details'];
                }

                $GLOBALS['orders']['commission_pcnt']=Agent::find( $GLOBALS['orders']['agent_id'])->cmn_pcnt;
                $GLOBALS['orders']['client_id']=$client_id;//Agent::find( $GLOBALS['orders']['agent_id'])->cmn_pcnt;
                $GLOBALS['orders']['is_credit']=   $GLOBALS['orders']['is_credit']== 'Yes' ? true:false;
                Order::create( $GLOBALS['orders']);

                // $privilege =Privileges:: privilege(['driver_id' => $orders['id']]);
                $ai =  \DB::getPdo()->lastInsertId();
                \DB::update('update `increment_helper` set `order`=`order`+1');
                \DB::update('update `increment_helper` set `client`=`client`+1');


            });




            //  DB::table('agent')->where('id', '=', $empl->agent_id)->update(['amount' =>  DB::raw('amount - '.$empl->from_currency_amount)]);

            $user = User::find(Auth::id());
            Log::info('Order '.$user->code.' is created. by:'.$user->name);
            return Redirect::route('order.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Order Successfully created.');
        }
        //show error message
        // return Redirect::route('order.createc')
        return Redirect::to('createc')
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

			 $task = Order::findOrFail($id);

				 return View::make('order.show')->withTask($task);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Order');
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
				$order = Order::find($id);
             $agents=Agent::lists('name' ,'id' );
             $clients=Client::lists('name' ,'id' );
             $agents_code=Agent::lists('code' ,'id' );
             $clients_code=Client::lists('code' ,'id' );
             $setups=System::first();//DB::table ('system')->first();
            // $code= Helper::getNextCode("order");

                 $GLOBALS['order_array']=$order;
             if (is_null($order))
				{
					return Redirect::route('order.index');
				}
				//redirect to update form
				//$orders = Order::lists('name', 'id');

             $temp_clients = Client::all();

             $temp_clients->each(function($each_client) // foreach($posts as $post) { }
             {
                 $GLOBALS['second_array'][$each_client->id][0]=$each_client->bank_acc_1;
                 $GLOBALS['second_array'][$each_client->id][1]=$each_client->bank_acc_2;
                 $GLOBALS['second_array'][$each_client->id][2]=$each_client->bank_acc_3;
                 $GLOBALS['second_array'][$each_client->id][3]=$each_client->bank_acc_4;

                 if($each_client->id == $GLOBALS['order_array']->client_id){

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


             $temp_client_bank_accounts  =  $GLOBALS['client_bank_accounts'];

				return View::make('order.edit')
                    ->with('order',$order)
                    ->with('agents',$agents)
                    ->with('clients',$clients)
                    ->with('agents_code',$agents_code)
                    ->with('clients_code',$clients_code)
                    ->with('setups',$setups)
                    ->with('food_groups',$food_groups)

                    ->with('temp_client_bank_accounts',$temp_client_bank_accounts)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Order');
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
             'code'=>'required|unique:order,code,'.$id,
             'from_currency_amount' => 'required|numeric|min:0',
             'to_currency_amount' => 'required|numeric|min:0',
             'comission_amount' => 'required|numeric|min:0',
             'client_bank_acc' => 'required',
         );
        $orders = Input::all();




        $validation = Validator::make($orders, $rules);


        if ($validation->passes())
        {
            $book = Order::find($id);
           // DB::table('agent')->where('id', '=', $book ->agent_id)->update(['amount' => DB::raw('amount + '. $book->from_currency_amount)]);
            $orders['is_credit']=   $orders['is_credit']== 'Yes' ? true:false;
            $book->update($orders);
          //  DB::table('agent')->where('id', '=', $orders ['agent_id'])->update(['amount' => DB::raw('amount - '. $orders['from_currency_amount'])]);
			$user = User::find(Auth::id());

          //  $ai =  \DB::getPdo()->lastInsertId();
          //  \DB::update('update `increment_helper` set `order`='.$ai);

            Log::warning('Order '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('order.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Order Successfully updated.');
        }
        return Redirect::route('order.edit', $id)
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

				 $driver = Order::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Order '.$driver->code.' is deleted. by:'.$user->name);
          //DB::table('agent')->where('id', '=', $driver->agent_id)->update(['amount' => DB::raw('amount + '. $driver->from_currency_amount)]);
             \DB::table('order')->where('id', '=', $id)->delete();
				return Redirect::route('order.index')
					->withInput()
					->with('scs_success', 'Order Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Order');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }

    public function search_order(){


        if (Auth::check())
        {


            $orders=Order::lists('code' ,'id' );



            $view =View::make('order.search_order')
                ->with('orders',$orders)
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

    public function display_order(){


        if (Auth::check())
        {


            $order= Input::all();
            $task = Order::findOrFail($order['order_id']);

            $view = View::make('order.show')->withTask($task);



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