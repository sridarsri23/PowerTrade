<?php
namespace dtc\Http\Controllers;


use dtc\Models\DriverPayment;
use dtc\Models\Giving;
use dtc\Models\Sales;
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
use dtc\Models\Driver;
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


class DriverController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('driver'))
		 {


				 $driverList= Driver::where('is_deleted','=','0')->orderBy('created_at', 'desc')->get();

				$view =  View::make('driver.index',compact('driverList'))
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

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Driver');
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

		 if (Auth::check() && Helper::getAuth('new_driver'))
		 {


				 $code= Helper::getNextCode("driver");


				$view =View::make('driver.create')
					->with('code',$code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Driver');
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
		          'code'=>'required|unique:driver,code',
				'phone'=>'numeric|digits_between:9,13',
				'email'=>'email',


		    );
		    //get all Driver information
		    $drivers = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($drivers,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $drivers['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $drivers['is_fuel'] = $drivers['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $drivers['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Driver information in the database 
		      //and redirect to index page


				 $empl= Driver::create($drivers);

				 // $privilege =Privileges:: privilege(['driver_id' => $drivers['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `driver`=driver+1');
				


				  $user = User::find(Auth::id());
				  Log::info('Driver '.$empl->name.' is created. by:'.$user->name);
		          return Redirect::route('driver.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Driver Successfully created.');
		      }
		      //show error message
		      return Redirect::route('driver.create')
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
		 if (Auth::check() && Helper::getAuth('view_driver'))
		 {
             $paymentList= DriverPayment::where('driver_id','=',$id)->where('is_deleted','=',false)->get();
			 $task = Driver::findOrFail($id);
				 return View::make('driver.show')
                     ->withTask($task)
                     ->with('paymentList',$paymentList);
			 }

		else{

		Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to View Driver');
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

		 if (Auth::check() && Helper::getAuth('edit_driver'))
		 {

			 //get the current book by i
				$driver = Driver::find($id);
				if (is_null($driver))
				{
					return Redirect::route('driver.index');
				}
				//redirect to update form
				//$drivers = Driver::lists('name', 'id');
				return View::make('driver.edit', compact('driver'))
					;
		 }

		 else{

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Edit Driver');
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
            'phone'=>'numeric|digits_between:9,13',
            'email'=>'email|required',



        );
        $drivers = Input::all();




        $validation = Validator::make($drivers, $rules);


        if ($validation->passes())
        {
            $book = Driver::find($id);
            $book->update($drivers);
			$user = User::find(Auth::id());
			Log::warning('Driver '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('driver.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Driver '.$book->name.' Successfully updated.');
        }
        return Redirect::route('driver.edit', $id)
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
		 if (Auth::check() && Helper::getAuth('delete_driver') )
		 {



				 $driver = Driver::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Driver '.$driver->name.' is deleted. by:'.$user->name);
            // \DB::table('driver')->where('id', '=', $id)->delete();
             \DB::table('driver')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('driver.index')
					->withInput()
					->with('scs_success', 'Driver '.$driver->name.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to Delete Driver');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $driverList= Driver::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('driver.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Driver');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $driverList= Driver::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('driver.settle_driver');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Driver');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }

    public function create_payment()
    {

        if (Auth::check())
        {


            $code= Helper::getNextCode("driver_payment");
            $drivers_names=Driver::where('id','!=','16')->lists('name' ,'id' );
            $drivers=Driver::lists('code' ,'id' );
            $sales=Sales::lists('code' ,'id' );
            $driverList=Driver::where('is_deleted','=','0')->lists('code' ,'id' );


//example usage.


            /*
            $food_groups = array(
                '2' => array('bread', 'rice', 'oatmeal'),
                '3' => array('kidney beans', 'lentils', 'split peas'),
            );
*/
            $view =View::make('driver.create_payment')
                ->with('code',$code)
                ->with('drivers',$drivers)
                ->with('sales',$sales)
                ->with('driverList',$driverList)
                ->with('drivers_names',$drivers_names)
            ;

            return $view;//
        }

        else{

            Log::warning('Un Authorized Driver '.Auth::user()->name.' trying to access Sales Expense');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function store_payment()
    {
        //create a rule validation
        $rules=array(

            'date'=>'required',
            'code'=>'required|unique:sales_expense,code',
            'amount' => 'required|numeric|min:0',
        );
        //get all SalesExpense information
        $expenses = Input::all();


        $validation=Validator::make($expenses,$rules);


        if($validation->passes())
        {
            //save new SalesExpense information in the database
            //and redirect to index page


            $empl= DriverPayment::create($expenses);
            //$GLOBALS['expense_array']=   $expenses ;
            // $privilege =Privileges:: privilege(['driver_id' => $expenses['id']]);

            \DB::update('update `increment_helper` set `driver_payment`=`driver_payment`+1');




            $user = User::find(Auth::id());
            Log::info('Driver Payment '.$empl->code.' is created. by:'.$user->name);
            //return Redirect::route('sales_expense.index')

            return redirect('driver/'.$empl->driver_id)
                ->withErrors($validation)
                ->with('scs_success', 'Driver Payment Successfully created.');
        }
        //show error message
        return redirect('driver_create_payment')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'Some fields are incomplete.')
            ->with('scs_errors', 'Some fields are incomplete.');
    }

}


?>