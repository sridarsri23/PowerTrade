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


class ReturningController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check())
		 {


				 $agentList= Agent::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				 $totalCreditAmount= Agent::sum('amount');

				$view =  View::make('sales_return.index',compact('agentList'))
                    ->with("totalCreditAmount",$totalCreditAmount)
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Agent');
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


				 $code= Helper::getNextCode("agent");


				$view =View::make('agent.create')
					->with('code',$code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Agent');
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
		          'code'=>'required|unique:agent,code',
                'amount' => 'numeric|min:0',
                'cmn_pcnt' => 'numeric|min:0',
				'phone'=>'numeric|digits_between:9,13',
				'email'=>'email|required',


		    );
		    //get all Agent information
		    $agents = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($agents,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $agents['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $agents['is_fuel'] = $agents['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $agents['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Agent information in the database 
		      //and redirect to index page


				 $empl= Agent::create($agents);

				 // $privilege =Privileges:: privilege(['driver_id' => $agents['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `agent`=agent+1');
				


				  $user = User::find(Auth::id());
				  Log::info('Agent '.$empl->name.' is created. by:'.$user->name);
		          return Redirect::route('agent.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Agent Successfully created.');
		      }
		      //show error message
		      return Redirect::route('agent.create')
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

			 $task = Agent::findOrFail($id);
             $settlementList= Settlement::where('agent_id','=',$id)->get();
             $givingList= Giving::where('agent_id','=',$id)->get();
				 return View::make('agent.show')
                     ->withTask($task)
                     ->with("settlementList",$settlementList)
                     ->with("givingList",$givingList);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Agent');
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
				$agent = Agent::find($id);
				if (is_null($agent))
				{
					return Redirect::route('agent.index');
				}
				//redirect to update form
				//$agents = Agent::lists('name', 'id');
				return View::make('agent.edit', compact('agent'))
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Agent');
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
            'code'=>'required|unique:agent,code,'.$id,
            'amount' => 'numeric|min:0',
            'cmn_pcnt' => 'numeric|min:0',
            'phone'=>'numeric|digits_between:9,13',
            'email'=>'email|required',



        );
        $agents = Input::all();




        $validation = Validator::make($agents, $rules);


        if ($validation->passes())
        {
            $book = Agent::find($id);
            $book->update($agents);
			$user = User::find(Auth::id());
			Log::warning('Agent '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('agent.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Agent Successfully updated.');
        }
        return Redirect::route('agent.edit', $id)
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



				 $driver = Agent::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Agent '.$driver->name.' is deleted. by:'.$user->name);
             \DB::table('agent')->where('id', '=', $id)->delete();
				return Redirect::route('agent.index')
					->withInput()
					->with('scs_success', 'Agent Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Agent');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $agentList= Agent::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('agent.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Agent');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $agentList= Agent::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('agent.settle_agent');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Agent');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>