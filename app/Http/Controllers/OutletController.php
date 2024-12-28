<?php
namespace dtc\Http\Controllers;


use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\Outlet;
use dtc\Models\OutletProducts;
use dtc\Models\Product;
use dtc\Models\Route;
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


class OutletController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('outlet'))
		 {


				 $outletsList= Outlet::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				// $totalCreditAmount= Outlet::sum('amount');
             $outlets=Outlet::where('is_deleted','=',false)->lists('name' ,'id' );
				$view =  View::make('outlet.index')
                    ->with('outletsList',$outletsList)
                    ->with('outlets',$outlets)
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Outlet');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }



	 }

    public function search_view_outlet()
    {

        if (Auth::check() && Helper::getAuth('view_outlet'))
        {
            $vals= Input::all();
            $id = $vals['outlet_id'];

            $outlet = Outlet::findOrFail($id);
            $route= Route::where('id','=',$outlet->route_id)->first();
            return View::make('outlet.show')
                ->with('outlet',$outlet)
                ->with('route',$route);


        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Outlet');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }
    public function search_view_outlet_dashboard()
    {

        if (Auth::check() && Helper::getAuth('view_outlet'))
        {


            $outlets=Outlet::where('is_deleted','=',false)->lists('name' ,'id' );
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('outlet.search_outlet')
                ->with('outlets',$outlets)
                ;

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Outlet');
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

		 if (Auth::check() && Helper::getAuth('new_outlet'))
		 {

             $routesList=Route::where('is_deleted','=','0')->lists('code' ,'id' );
				 $code= Helper::getNextCode("outlet");
             $routes=Route::lists('name' ,'id' );
				$view =View::make('outlet.create')
					->with('code',$code)
					->with('routes',$routes)
					->with('routesList',$routesList)

				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Outlet');
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
		          'code'=>'required|unique:outlet,code',
                'credit' => 'numeric|min:0',
                'cheque' => 'numeric|min:0',
				'phone'=>'numeric|digits_between:9,13',


		    );
		    //get all Outlet information
		    $outlets = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($outlets,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $outlets['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $outlets['is_fuel'] = $outlets['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $outlets['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Outlet information in the database 
		      //and redirect to index page


				 $empl= Outlet::create($outlets);

				 // $privilege =Privileges:: privilege(['driver_id' => $outlets['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `outlet`=outlet+1');


                //  $temp_point= Point::create($points);
                //  $ai =  \DB::getPdo()->lastInsertId();
                //  \DB::update('update `increment_helper` set `point`='.$ai);
                //  $route = Route::find( $outlets['route_id'] );
                //  $route->outlets()->save($empl);



				  $user = User::find(Auth::id());
				  Log::info('Outlet '.$empl->name.' is created. by:'.$user->name);
		          return Redirect::route('outlet.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Outlet Successfully created.');
		      }
		      //show error message
		      return Redirect::route('outlet.create')
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
		 if (Auth::check() && Helper::getAuth('view_outlet'))
		 {

             $outlet = Outlet::findOrFail($id);
            // $givingList= Giving::where('agent_id','=',$id)->get();
             $route= Route::where('id','=',$outlet->route_id)->first();
				 return View::make('outlet.show')
                     ->with("outlet",$outlet)
                     ->with("route",$route)
                     ;
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Outlet');
		Session::put("error_message",Lang::get('messages.action_authorized_warning'));
		return redirect('dashboard');


		}
	 }


    public function import_outlet()
    {
        if (Auth::check())
        {

            $routes=Route::lists('name' ,'id' );
            return View::make('outlet.import_outlet')
                ->with('routes',$routes)
                ;
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Import Outlets');
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

		 if (Auth::check() && Helper::getAuth('edit_outlet'))
		 {

			 //get the current book by i
				$outlet = Outlet::find($id);
             $routesList=Route::where('is_deleted','=','0')->lists('code' ,'id' );
             $routes=Route::lists('name' ,'id' );
				if (is_null($outlet))
				{
					return Redirect::route('outlet.index');
				}
				//redirect to update form
				//$outlets = Outlet::lists('name', 'id');
				return View::make('outlet.edit')
                    ->with('outlet',$outlet)
                    ->with('routesList',$routesList)
                    ->with('routes',$routes)
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Outlet');
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
            'code'=>'required|unique:outlet,code,'.$id,
            'cheque' => 'numeric|min:0',
            'credit' => 'numeric|min:0',
            'phone'=>'numeric|digits_between:9,13',
            'email'=>'email|required',



        );
        $outlets = Input::all();




        $validation = Validator::make($outlets, $rules);


        if ($validation->passes())
        {
            $book = Outlet::find($id);
            $book->update($outlets);
			$user = User::find(Auth::id());
			Log::warning('Outlet '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('outlet.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Outlet '.$book->name.'Successfully Edited.');
        }
        return Redirect::route('outlet.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');
	 }
	 public function complete_cheque_settle()
	 {
	  //create a rule validation
         $invoice = Input::all();
        $rules=array(
            'invoice_no'=>'required',

        );





        $validation = Validator::make($invoice, $rules);


        if ($validation->passes())
        {



            //DB::table('outlet')->where('id','=',$invoice['outlet_id'])->update( array( 'cheque'=>$invoice['cheque_value']));
            DB::table('outlet')->where('id','=',$invoice['outlet_id'])->decrement('cheque',$invoice['cheque_value']);
            DB::table('invoice')->where('id','=',$invoice['invoice_id'])->update( array('is_settled'=>1));


			$user = User::find(Auth::id());
			Log::warning('Outlet '.$invoice['invoice_no'].' Cheque Settled. by:'.$user->name);
            return Redirect::to('outlet')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Cheque Settled Successfully.');
        }
         return Redirect::to('search_settle_cheque')
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
		 if (Auth::check()  && Helper::getAuth('delete_outlet'))
		 {



				 $driver = Outlet::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Outlet '.$driver->name.' is deleted. by:'.$user->name);
            // \DB::table('outlet')->where('id', '=', $id)->delete();

             \DB::table('outlet')->where('id','=',$id)->update( array('is_deleted'=>1));
             \DB::table('invoice')->where('outlet_id','=',$id)->update( array('is_outlet_deleted'=>1));
				return Redirect::route('outlet.index')
					->withInput()
					->with('scs_success', 'Outlet  '.$driver->name.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Outlet');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $outletList= Outlet::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('outlet.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Outlet');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $outletList= Outlet::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('outlet.settle_outlet');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Outlet');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



    public function search_invoices_for_cheque()
    {


        if (Auth::check())
        {


            $invoices=Invoice::where('is_deleted','=',false)->where('is_settled','=','0')->where('cheque_no','!=','0')->orderBy('invoice_no', 'desc')->lists('cheque_no' ,'id' );

            // $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =View::make('outlet.search_invoices_for_cheque')
                ->with('invoices',$invoices)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Settle Cheque');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function search_settle_cheque()
    {

        if (Auth::check())
        {

            $search_result = Input::all();
            $selected_invoice_id = $search_result['invoice_id'];
            $selected_invoice =  Invoice::findOrFail($selected_invoice_id);


            $view =View::make('outlet.search_settle_cheque')
                ->with('invoice',$selected_invoice)
            ;


            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Settle Cheque');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function search_routes_for_credit()
    {






        if (Auth::check())
        {


            $sales=Sales::where('is_deleted','=',0)->lists('code','id');

            $view =View::make('outlet.search_routes_for_credit')
                ->with('sales',$sales)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Settle Credit Receiving');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }

    public function settle_credit_receiving()
    {

        if (Auth::check())
        {

            $search_result = Input::all();
            $selected_sales_id = $search_result['sales_id'];
            $selected_sales=  Sales::findOrFail($selected_sales_id);
            $selected_route =  Route::findOrFail($selected_sales->route_id);


            $outletList= Outlet::where('is_deleted','=',0)->where('route_id','=',$selected_route->id)->orderBy('created_at', 'asc')->get();
            $view =View::make('outlet.settle_credit_receiving')
                ->with('outletList',$outletList)
                ->with('route',$selected_route)
                ->with('sales',$selected_sales)
            ;
            $product_qty_validator_helper = array();
            // dump($productList);
            foreach ($outletList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
                //echo $each_product->code;

               // $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
             $product_qty_validator_helper=array_merge($product_qty_validator_helper,array($each_product->id.'cr'=>'required|numeric|min:0'));
                // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRulesCreditReceiving');
            Session::put('valRulesCreditReceiving', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Credit Receiving');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function complete_settle_credit_receiving()
    {
        $sales_returns = Input::all();

        $rules= Session::get('valRulesCreditReceiving');
        $ruless=array(

            'total' => 'required|numeric|min:0',

        );

        $ruless=array_merge($ruless,$rules);

        $validation = Validator::make($sales_returns, $ruless);
        // dump($sales_returns);
        // dump($rules);

        if ($validation->passes())
        {


            //---------------------------

            $res = false;



            try {

                DB::beginTransaction();

                //create sales_return


                //insert into  sales_return_products

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$sales_returns[$OuterKey]);

//dump(is_numeric($OuterKey));



                       $outlet_id = (int)trim($OuterKey,'cr');
                         // $outlet = Outlet::where('id','=',$outlet_id)->first();
                        //dump($outlet_id);
                        // dump($outlet->id);
                        DB::table('credit_recieve')->insert(array('sales_id' => $sales_returns['sales_id'], 'outlet_id' => $outlet_id, 'credit'=>$sales_returns[$outlet_id.'cr']));


                    // DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$sales_returns[$OuterKey]);
                    DB::table('outlet')->where('id','=',$outlet_id)->update( array('credit'=>$sales_returns[$outlet_id.'crb']));

                }

            }catch(\Exception $e){
              //  dump($e);
                //  return;
                //$temp = false;
                Session::forget('valRulesCreditReceiving');
                DB::rollback();
                // return Redirect::to('sales_return')
                //    ->withInput()
                //    ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRulesCreditReceiving');

            $user = User::find(Auth::id());


            Log::warning('Credit Receiving Settled by:'.$user->name);
            return Redirect::to('outlet')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Credit Receiving Settled Successfully.');
            // all good


            //-----------------


        }

        //  dump($validation);
        // return;
        return Redirect::to('settle_credit_receiving')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');
    }
}


?>