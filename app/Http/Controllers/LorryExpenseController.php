<?php
namespace dtc\Http\Controllers;


use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\Lorry;
use dtc\Models\LorryExpense;

use dtc\Models\LorryExpenseProducts;
use dtc\Models\Product;
use dtc\Models\Sales;
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


class LorryExpenseController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('lorry_expense'))
		 {


				 $lorry_expensesList= LorryExpense::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				// $totalCreditAmount= LorryExpense::sum('amount');
             $lorry_expenses=LorryExpense::where('is_deleted','=',false)->lists('name' ,'id' );
				$view =  View::make('lorry_expense.index')
                    ->with('lorry_expensesList',$lorry_expensesList)
                    ->with('lorry_expenses',$lorry_expenses)
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access LorryExpense');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }



	 }

	 public function create()
	 {
         if (Auth::check()&& Helper::getAuth('new_lorry_expense'))
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
             $view =View::make('lorry_expense.create')
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
	 /**
	  * Display the specified resource.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function show($id)
	 {
		 if (Auth::check() && Helper::getAuth('view_lorry_expense'))
		 {

             $lorry_expense = LorryExpense::findOrFail($id);
            // $givingList= Giving::where('agent_id','=',$id)->get();
             $lorry= Lorry::where('id','=',$lorry_expense->lorry_id)->first();
				 return View::make('lorry_expense.show')
                     ->with("lorry_expense",$lorry_expense)
                     ->with("lorry",$lorry)
                     ;
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Lorry Expense');
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

		 if (Auth::check() && Helper::getAuth('edit_lorry_expense'))
		 {

			 //get the current book by i
				$lorry_expense = LorryExpense::find($id);
             $lorry = Lorry::findOrFail($lorry_expense->lorry_id);
             $lorry_nos=Lorry::lists('no' ,'id' );
             $lorries=Lorry::lists('code' ,'id' );
             $lorryList=Lorry::where('is_deleted','=','0')->lists('code' ,'id' );
				if (is_null($lorry_expense))
				{
					return Redirect::route('lorry.index');
				}
				//redirect to update form
				//$lorry_expenses = LorryExpense::lists('name', 'id');
				return View::make('lorry_expense.edit')
                    ->with('lorry_expense',$lorry_expense)
                    ->with('lorry',$lorry)
                    ->with('lorry_nos',$lorry_nos)
                    ->with('lorries',$lorries)
                    ->with('lorryList',$lorryList)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Lorry Expense');
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

            'amount' => 'numeric|min:0',


        );
        $lorry_expenses = Input::all();




        $validation = Validator::make($lorry_expenses, $rules);


        if ($validation->passes())
        {
            $book = LorryExpense::find($id);

            $book->update($lorry_expenses);
			$user = User::find(Auth::id());
			Log::warning('LorryExpense '.$book->code.' is edited. by:'.$user->name);
            return Redirect::route('lorry.show',$book->lorry_id)
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Lorry Expense '.$book->code.'Successfully Edited.');
        }
        return Redirect::route('lorry_expense.edit', $id)
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
		 if (Auth::check()  && Helper::getAuth('delete_lorry_expense'))
		 {



				 $driver = LorryExpense::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('LorryExpense '.$driver->code.' is deleted. by:'.$user->name);
            // \DB::table('lorry_expense')->where('id', '=', $id)->delete();

             \DB::table('lorry_expense')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('lorry.show',$driver->lorry_id)
					->withInput()
					->with('scs_success', 'Lorry Expense  '.$driver->code.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Lorry Expense');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


}


?>