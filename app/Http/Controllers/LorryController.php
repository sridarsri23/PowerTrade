<?php
namespace dtc\Http\Controllers;


use dtc\Models\Giving;
use dtc\Models\LorryExpense;
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
use dtc\Models\Lorry;
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


class LorryController extends Controller{

	/**
	 * @return mixed
     */



	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('lorry'))
		 {


				 $lorryList= Lorry::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

				$view =  View::make('lorry.index',compact('lorryList'))
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Lorry');
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

		 if (Auth::check() && Helper::getAuth('new_lorry'))
		 {


				 $code= Helper::getNextCode("lorry");


				$view =View::make('lorry.create')
					->with('code',$code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Lorry');
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

		          'no'=>'required|unique:lorry,no',
		          'code'=>'required|unique:lorry,code',


		    );
		    //get all Lorry information
		    $lorrys = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($lorrys,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $lorrys['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $lorrys['is_fuel'] = $lorrys['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $lorrys['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Lorry information in the database 
		      //and redirect to index page


				 $empl= Lorry::create($lorrys);

				 // $privilege =Privileges:: privilege(['driver_id' => $lorrys['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `lorry`=lorry+1');
				


				  $user = User::find(Auth::id());
				  Log::info('Lorry '.$empl->name.' is created. by:'.$user->name);
		          return Redirect::route('lorry.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Lorry Successfully created.');
		      }
		      //show error message
		      return Redirect::route('lorry.create')
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
		 if (Auth::check() && Helper::getAuth('view_lorry'))
		 {

			 $task = Lorry::findOrFail($id);
             $expenseList= LorryExpense::where('lorry_id','=',$id)->where('is_deleted','=',false)->get();
				 return View::make('lorry.show')
                     ->withTask($task)
                     ->with("expenseList",$expenseList);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Lorry');
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

		 if (Auth::check() && Helper::getAuth('edit_lorry'))
		 {

			 //get the current book by i
				$lorry = Lorry::find($id);
				if (is_null($lorry))
				{
					return Redirect::route('lorry.index');
				}
				//redirect to update form
				//$lorrys = Lorry::lists('name', 'id');
				return View::make('lorry.edit', compact('lorry'))
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Lorry');
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
            'no'=>'required'



        );
        $lorrys = Input::all();




        $validation = Validator::make($lorrys, $rules);


        if ($validation->passes())
        {
            $book = Lorry::find($id);
            $book->update($lorrys);
			$user = User::find(Auth::id());
			Log::warning('Lorry '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('lorry.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Lorry Successfully updated.');
        }
        return Redirect::route('lorry.edit', $id)
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
		 if (Auth::check()  && Helper::getAuth('delete_lorry'))
		 {



				 $driver = Lorry::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Lorry '.$driver->name.' is deleted. by:'.$user->name);
             //\DB::table('lorry')->where('id', '=', $id)->delete();
        \DB::table('lorry')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('lorry.index')
					->withInput()
					->with('scs_success', 'Lorry Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Lorry');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $lorryList= Lorry::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('lorry.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Lorry');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $lorryList= Lorry::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('lorry.settle_lorry');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Lorry');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }


    public function create_expense()
    {

        if (Auth::check())
        {


            $code= Helper::getNextCode("lorry_expense");
            $lorry_nos=Lorry::lists('no' ,'id' );
            $lorries=Lorry::lists('code' ,'id' );
            $lorryList=Lorry::where('is_deleted','=','0')->lists('code' ,'id' );


//example usage.


            /*
            $food_groups = array(
                '2' => array('bread', 'rice', 'oatmeal'),
                '3' => array('kidney beans', 'lentils', 'split peas'),
            );
*/
            $view =View::make('lorry.create_expense')
                ->with('code',$code)
                ->with('lorries',$lorries)
                ->with('lorryList',$lorryList)
                ->with('lorry_nos',$lorry_nos)
            ;

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Lorry Expense');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function store_expense()
    {
        //create a rule validation
        $rules=array(

            'date'=>'required',
            'code'=>'required|unique:lorry_expense,code',
            'amount' => 'required|numeric|min:0',
        );
        //get all SalesExpense information
        $expenses = Input::all();


        $validation=Validator::make($expenses,$rules);


        if($validation->passes())
        {
            //save new SalesExpense information in the database
            //and redirect to index page


            $empl= LorryExpense::create($expenses);
            //$GLOBALS['expense_array']=   $expenses ;
            // $privilege =Privileges:: privilege(['driver_id' => $expenses['id']]);

            \DB::update('update `increment_helper` set `lorry_expense`=`lorry_expense`+1');




            $user = User::find(Auth::id());
            Log::info('Lorry Expense '.$empl->code.' is created. by:'.$user->name);
            //return Redirect::route('sales_expense.index')

            return redirect('lorry/'.$empl->lorry_id)
                ->withErrors($validation)
                ->with('scs_success', 'Lorry Expense Successfully created.');
        }
        //show error message
        return redirect('lorry_create_expense')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Some fields are incomplete.')
            ->with('scs_errors', 'Some fields are incomplete.');
    }

}


?>