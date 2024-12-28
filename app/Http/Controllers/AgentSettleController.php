<?php
namespace dtc\Http\Controllers;


use dtc\Models\Client;
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
use dtc\Models\Agent;
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
 $settle_order_array=array();
$third_array=array();
$acc_groups=array();
$client_bank_accounts=array();
$settlement_id=null;
use Carbon\Carbon;

class AgentSettleController extends Controller{

    public function settle()
    {

        if (Auth::check())
        {


            $temp_agents = Agent::all();

            $temp_agents->each(function($each_agent) // foreach($posts as $post) { }
            {
                //do something
                // echo  $each_agent->id .' '.$each_agent->bank_acc_1;
                // $food_groups[$each_agent->id] = array();
                //  $food_groups[$each_agent->id][]=array($each_agent->bank_acc_1,$each_agent->bank_acc_2);
                // $food_groups=array($each_agent->id=> array($each_agent->bank_acc_1,$each_agent->bank_acc_2));


                $GLOBALS['third_array'][$each_agent->id][0]=$each_agent->bank_acc_1;
                $GLOBALS['third_array'][$each_agent->id][1]=$each_agent->bank_acc_2;
                $GLOBALS['third_array'][$each_agent->id][2]=$each_agent->bank_acc_3;
                $GLOBALS['third_array'][$each_agent->id][3]=$each_agent->bank_acc_4;
            }
            );
            /*
            $food_groups = array(
                '2' => array('bread', 'rice', 'oatmeal'),
                '3' => array('kidney beans', 'lentils', 'split peas'),
            );
*/
            $acc_groups=$GLOBALS['third_array'];

           // $agentList= Agent::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
            $agents=Agent::lists('name' ,'id' );
           $orderList=Order::lists('code' ,'id' )->where('id','=','0');
            $view =  View::make('agent.settle')
            ->with('agents',$agents)
            ->with('orderList',$orderList)
            ->with('acc_groups',$acc_groups)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to settle Agent');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }


    public function complete_settle()
    {

        if (Auth::check())
        {


            $rules=array(
                'agent_bank_acc'=>'required',
            );
            $result= Input::all();




            $validation = Validator::make($result, $rules);


            if ($validation->passes())
            {

                $agents=Agent::lists('name' ,'id' )->where('id','=','0');
                $tempagent=Agent::where('id','=',$result['agent_id'])->first();
                $orderList=Order::whereDate('date', '=', $result['date'])->where('agent_id','=',$result['agent_id'])->where('is_paid_to_agent','=',0)->orderBy('created_at', 'desc')->get();;
                $code= $tempagent->code.'/'.Helper::getNextCode("settlement");
                $view =  View::make('agent.settle')
                    ->with('agents',$agents)
                    ->with('orderList',$orderList)
                    ->with('agent_id', $result['agent_id'])
                    ->with('date', $result['date'])
                    ->with('agent_bank_acc', $result['agent_bank_acc'])
                    ->with('code',$code)

                ;



                if (Request::ajax())
                {

                    return  $view->renderSections()['middle_right_DIV'];
                }
                else{

                    return  $view;
                }

            }

            return Redirect::to('settle')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'There were validation errors.')
                ->with('scs_errors', 'There were validation errors.');

            // $agentList= Agent::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to settle Agent');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }
    public function finalize_settle()
    {


        $GLOBALS['settle_order_array'] = Input::all();


        $rewult= DB::transaction(function () {
            $settlement_id = DB::table('settlement')->insertGetId(
                ['lkr' => $GLOBALS['settle_order_array']['total_lkr'] ,
                'sdr' => $GLOBALS['settle_order_array']['total_sdr'] ,
                'cmn' => $GLOBALS['settle_order_array']['total_cmn'] ,
                'date' => $GLOBALS['settle_order_array']['date'] ,
                'agent_bank_acc' => $GLOBALS['settle_order_array']['agent_bank_acc'] ,
                'code' => $GLOBALS['settle_order_array']['code'] ,
                'note' => $GLOBALS['settle_order_array']['note'] ,
                'pha' => $GLOBALS['settle_order_array']['pha']  ,
                'created_at' => Carbon::today() ,
                'agent_id' =>$GLOBALS['settle_order_array']['agent_id'] ]
            );

            $GLOBALS['settlement_id'] = $settlement_id;
            $ai =  \DB::getPdo()->lastInsertId();
            \DB::update('update `increment_helper` set `settlement`='.$ai);

            DB::table('agent')->where('id', '=', $GLOBALS['settle_order_array']['agent_id'])->update(['amount' => DB::raw('amount - '. ($GLOBALS['settle_order_array']['total_lkr'] + $GLOBALS['settle_order_array']['total_cmn']))]);
                foreach ( $GLOBALS['settle_order_array']  as $index => $order) {

                    if (strpos((string)$index, 'ord') !== false) {


                        DB::table('order')->where('id', '=', $order)->update(['is_paid_to_agent' => true,'settlement_id' => $settlement_id]);
                    }


                }



            });




        if( is_null($rewult)){

            $user = User::find(Auth::id());


                /*
                 *
                 * Send Mail to agent on day end
                 */
                  ;
           $mailresult = Mail::send('email.dayend', $GLOBALS['settle_order_array'] , function($message) {
                $agent = Agent::find($GLOBALS['settle_order_array']['agent_id']);
                $message->to($agent->email, $agent->fullname)->subject(
                    'Day End Code :'.$GLOBALS['settle_order_array']['code'].
                    'Date :'.$GLOBALS['settle_order_array']['date']
                );
            });

            if(  $mailresult){

                \DB::update('update `settlement` set `ismailed`='.true.', maileddate='.$GLOBALS['settle_order_array']['date']. ' where id='.$GLOBALS['settlement_id'] );
            }

            Log::warning('Agent '.$GLOBALS['settle_order_array'] ['agent_id'].' is settled for '.$GLOBALS['settle_order_array'] ['date'].' by:'.$user->name);
            return Redirect::to('settle')
                ->withInput()
                ->with('scs_success', 'Agent Successfully Settled.');


}

        else{
           // throw new \Exception('Day-End Transaction Error!');

            return Redirect::to('settle')
                ->withInput()
                ->with('message', 'Agent Settling Failed.')
                ->with('scs_errors', 'Agent Settling Failed.');


        }
        
    }
    public function search_settlement(){


        if (Auth::check())
        {


            $settlements=Settlement::lists('code' ,'id' );



            $view =View::make('agent.search_settlement')
                ->with('settlements',$settlements)
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

    public function display_settlement(){


        if (Auth::check())
        {


            $result= Input::all();


      $settlement=Settlement::find($result['settlement_id']);

                $agents=Agent::lists('name' ,'id' );
                $tempagent=Agent::where('id','=',$settlement->agent_id)->first();
                $orderList=Order::where('settlement_id','=',$settlement->id)->where('is_paid_to_agent','=',1)->orderBy('created_at', 'desc')->get();;
               // $code= $tempagent->code.'/'.Helper::getNextCode("settlement");

            $GLOBALS['order_array']=$settlement;
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

                if($each_client->id == $GLOBALS['order_array']->agent_id){

                    $GLOBALS['client_bank_accounts']= array(
                        $each_client->bank_acc_1=>$each_client->bank_acc_1,
                        $each_client->bank_acc_2=>$each_client->bank_acc_2,
                        $each_client->bank_acc_3=>$each_client->bank_acc_3,
                        $each_client->bank_acc_4=>$each_client->bank_acc_4,
                    );
                }
            }
            );
     $acc_groups=$GLOBALS['third_array'];
            $temp_client_bank_accounts=$GLOBALS['client_bank_accounts'];

            $agents_code=Agent::lists('code' ,'id' );
                $view =  View::make('agent.show_settlement')
                    ->with('agents',$agents)
                    ->with('orderList',$orderList)
                    ->with('settlement', $settlement)
                    ->with('acc_groups', $acc_groups)
                    ->with('agents_code', $agents_code)
                    ->with('temp_client_bank_accounts', $temp_client_bank_accounts)

                ;



                if (Request::ajax())
                {

                    return  $view->renderSections()['middle_right_DIV'];
                }
                else{

                    return  $view;
                }

            // $agentList= Agent::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to settle Agent');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function delete_settlement(){
        $result= Input::all();



        $user = User::find(Auth::id());

        $GLOBALS['settlement_id']=$result['settlement_id'];

        $rewult= DB::transaction(function () {
            $settlement = Settlement::find( $GLOBALS['settlement_id']);

            DB::table('agent')->where('id', '=', $settlement->agent_id)->update(['amount' => DB::raw( 'amount + '.($settlement -> lkr + $settlement -> cmn) )]);
            $orders=Order::where('settlement_id','=',$settlement->id)->get();
            foreach ( $orders as $order) {

                    DB::table('order')->where('settlement_id', '=', $settlement->id)->update(['is_paid_to_agent' => false,'settlement_id' => null]);

            }

            \DB::table('settlement')->where('id', '=', $settlement->id)->delete();



        });


        if( is_null($rewult)){

            $user = User::find(Auth::id());

            Log::warning('Settlement '.$GLOBALS['settlement_id'].' is deleted by '.$user->name);
            return Redirect::to('settle')
                ->withInput()
                ->with('scs_success', 'Agent Successfully Deleted.');


        }

        else{


            return Redirect::to('settle')
                ->withInput()
                ->with('message', 'Settlement Deleting Failed.')
                ->with('scs_errors', 'Settlement Deleting Failed.');


        }
    }

    public function testMail(){
            echo 'Mail';
        $data = [

            'firstname' => 'Neon'

        ];
        Mail::send('email.dayend',$data , function($message) {
            $message->to('dirraz@gmail.com', 'Jon Doe')->subject('Welcome to the Laravel 4 Auth App!');
        });

        return;

    }


}


?>