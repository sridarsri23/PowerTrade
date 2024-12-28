<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use dtc\Models\Driver;
use dtc\Models\Giving;
use dtc\Models\Lorry;
use dtc\Models\Product;
use dtc\Models\Route;
use dtc\Models\SalesProducts;
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
use dtc\Models\Sales;
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


class SalesController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('sales'))
		 {


				 $salesList= Sales::where('is_deleted','=',false)->orderBy('id', 'desc')->get();
				// $totalCreditAmount= Sales::sum('amount');

				$view =  View::make('sales.index',compact('salesList'))
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Sales');
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

		 if (Auth::check() && Helper::getAuth('new_sales'))
		 {


             $routesList=Route::where('is_deleted','=','0')->lists('code' ,'id' );
             $lorryList=Lorry::where('is_deleted','=','0')->lists('code' ,'id' );
             $salesmanList=User::where('is_deleted','=','0')->where('id','!=','16')->lists('code' ,'id' );
             $driverList=Driver::where('is_deleted','=','0')->lists('code' ,'id' );
             $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();


				 $code= Helper::getNextCode("sales");
             $lorries=Lorry::lists('no' ,'id' );
             $drivers=Driver::lists('name' ,'id' );
             $employees=User::where('id','!=','16')->lists('name' ,'id' );
             $routes=Route::lists('name' ,'id' );
				$view =View::make('sales.create')
					->with('code',$code)
					->with('lorries',$lorries)
					->with('drivers',$drivers)
					->with('employees',$employees)
					->with('routes',$routes)
					->with('routesList',$routesList)
					->with('lorryList',$lorryList)
					->with('salesmanList',$salesmanList)
					->with('driverList',$driverList)
					->with('productList',$productList)
				;

             $product_qty_validator_helper = array();
             // dump($productList);
             foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
             {
                 //echo $each_product->code;

                 $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                 // array_push($product_qty_validator_helper, $each_product->code,'numeric');
             }
             Session::forget('valRulesSales');
             Session::put('valRulesSales', $product_qty_validator_helper);

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Sales');
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
         $products = Input::all();

         $rules= Session::get('valRulesSales');


         $validation = Validator::make($products, $rules);


         if ($validation->passes())
         {


             //---------------------------

             $res = false;


             try {

                 DB::beginTransaction();

                 //create sales

                 $sales_id = DB::table('sales')->insertGetId(
                     ['code' => $products['code'] ,
                         'lorry_id' => $products['lorry_id'] ,
                         'driver_id' => $products['driver_id'] ,
                         'salesman_id' => $products['salesman_id'] ,
                         'route_id' => $products['route_id'] ,
                         'start_date' => $products['start_date'] ,
                         'end_date' => $products['end_date'] ,
                         'created_at' => Carbon::today() ]
                 );

                 //insert into  sales_products

                 foreach(  $rules as $OuterKey => $InnerArray){
                     //echo $OuterKey.' - '.$InnerArray;


                     //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$products[$OuterKey]);
                     $product_id = Product::where('code','=',$OuterKey)->first();

                     DB::table('sales_products')->insert(array('sales_id' => $sales_id, 'product_id' => $product_id->id, 'cost_price'=>$products[$OuterKey]));
                     //DB::table('sales_products')->insert(array('sales_id' => $sales_id, 'product_id' => $product_id, 'cost_price'=>$products[$OuterKey]));


                 }

                 DB::update('update `increment_helper` set `sales`=sales+1');
             }catch(\Exception $e){
                    //dump($e);
                    return;
                 //$temp = false;
                 Session::forget('valRulesSales');
                 DB::rollback();
                return Redirect::to('sales')
                     ->withInput()
                    ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                   ;

                 // something went wrong
             }
             DB::commit();
             Session::forget('valRulesSales');

             $user = User::find(Auth::id());


             Log::warning('Sales Created by:'.$user->name);
             return Redirect::to('sales')
                 ->withInput()
                 ->withErrors($validation)
                 ->with('scs_success', 'Sales Created Successfully.');
             // all good


             //-----------------


         }


         return Redirect::to('sales')
             ->withInput()
             ->withErrors($validation)
             ->with('message', 'There were validation errors.')
             ->with('scs_errors', 'There were validation errors.');
	 }
	 /**
	  * Display the specified resource.
	  *
	  * @param  int  $id
	  * @return Response
	  */
	 public function show($id)
	 {
		 if (Auth::check() && Helper::getAuth('view_sales'))
		 {

			 $task = Sales::findOrFail($id);
          $salesproductsList= SalesProducts::where('sales_id','=',$id)->orderBy('product_id', 'asc')->get();
            // $givingList= Giving::where('sales_id','=',$id)->get();
				 return View::make('sales.show')
                     ->withTask($task)
                     ->with('salesproductsList',$salesproductsList);

			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Sales');
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

		 if (Auth::check() && Helper::getAuth('edit_sales'))
		 {

             $sales= Sales::find($id);
             $routesList=Route::where('is_deleted','=','0')->lists('code' ,'id' );
             $lorryList=Lorry::where('is_deleted','=','0')->lists('code' ,'id' );
             $salesmanList=User::where('is_deleted','=','0')->where('id','!=','16')->lists('code' ,'id' );
             $driverList=Driver::where('is_deleted','=','0')->lists('code' ,'id' );
             $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();




             $lorries=Lorry::lists('no' ,'id' );
             $drivers=Driver::lists('name' ,'id' );
             $employees=User::where('id','!=','16')->lists('name' ,'id' );
             $routes=Route::lists('name' ,'id' );
             $view =View::make('sales.edit')
                 ->with('lorries',$lorries)
                 ->with('drivers',$drivers)
                 ->with('employees',$employees)
                 ->with('routes',$routes)
                 ->with('routesList',$routesList)
                 ->with('lorryList',$lorryList)
                 ->with('salesmanList',$salesmanList)
                 ->with('driverList',$driverList)
                 ->with('productList',$productList)
                 ->with('sales',$sales)
             ;

             $product_qty_validator_helper = array();
             // dump($productList);
             foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
             {
                 //echo $each_product->code;

                 $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                 // array_push($product_qty_validator_helper, $each_product->code,'numeric');
             }
             Session::forget('valRulesSales');
             Session::put('valRulesSales', $product_qty_validator_helper);
				return $view
					;
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Sales');
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
	 /*
	 public function update($id)
	 {
	  //create a rule validation
        $rules=array(
            'code'=>'required|unique:sales,code,'.$id,





        );
        $saless = Input::all();




        $validation = Validator::make($saless, $rules);


        if ($validation->passes())
        {
            $book = Sales::find($id);
            $book->update($saless);
			$user = User::find(Auth::id());
			Log::warning('Sales '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('sales.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Sales '.$book->name.' Successfully updated.');
        }
        return Redirect::route('sales.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');
	 }
	 */
	 	 public function update($id)
	 {
         $products = Input::all();

         $rules= Session::get('valRulesSales');


         $validation = Validator::make($products, $rules);

$sale = Sales::find($id);
         if ($validation->passes())
         {


             //---------------------------

             $res = false;


             try {

                 DB::beginTransaction();

                 //create sales
                 DB::table('sales')->where('id','=',$id)->update(
                     ['code' => $products['code'] ,
                         'lorry_id' => $products['lorry_id'] ,
                         'driver_id' => $products['driver_id'] ,
                         'salesman_id' => $products['salesman_id'] ,
                         'route_id' => $products['route_id'] ,
                         'start_date' => $products['start_date'] ,
                         'end_date' => $products['end_date'] ,
                         'updated_at' => Carbon::today() ]
                 );

                 //insert into  sales_products

                 foreach(  $rules as $OuterKey => $InnerArray){
                     //echo $OuterKey.' - '.$InnerArray;


                     //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$products[$OuterKey]);
                     $sales_product = Product::where('code','=',$OuterKey)->first();

                   //  DB::table('sales_products')->insert(array('sales_id' => $sales_id, 'product_id' => $product_id->id, 'cost_price'=>$products[$OuterKey]));
                     //DB::table('sales_products')->insert(array('sales_id' => $sales_id, 'product_id' => $product_id, 'cost_price'=>$products[$OuterKey]));
                     DB::table('sales_products')->where('sales_id','=',$id)->where('product_id','=',$sales_product->id)->update(
                         ['cost_price' => $products[$OuterKey]]
                     );

                 }

                 //DB::update('update `increment_helper` set `sales`=sales+1');
             }catch(\Exception $e){
                 //dump($e);
               //  return;
                 //$temp = false;
                 Session::forget('valRulesSales');
                 DB::rollback();
                 return Redirect::to('sales')
                     ->withInput()
                     ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                     ;

                 // something went wrong
             }
             DB::commit();
             Session::forget('valRulesSales');

             $user = User::find(Auth::id());


             Log::warning('Sales '.$sale->code.' Edited by:'.$user->name);
             return Redirect::to('sales')
                 ->withInput()
                 ->withErrors($validation)
                 ->with('scs_success', 'Sales '.$sale->code.' Edited Successfully.');
             // all good


             //-----------------


         }


         return Redirect::to('sales')
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
		 if (Auth::check() && Helper::getAuth('delete_sales'))
		 {



				 $driver = Sales::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Sales '.$driver->name.' is deleted. by:'.$user->name);
            // \DB::table('sales')->where('id', '=', $id)->delete();
             \DB::table('sales')->where('id','=',$id)->update( array('is_deleted'=>1));
             \DB::table('invoice')->where('sales_id','=',$id)->update( array('is_sales_deleted'=>1));
				return Redirect::route('sales.index')
					->withInput()
					->with('scs_success', 'Sales '. $driver->code.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Sales:');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $salesList= Sales::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('sales.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Sales');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $salesList= Sales::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('sales.settle_sales');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Sales');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>