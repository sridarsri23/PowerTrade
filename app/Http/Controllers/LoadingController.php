<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use dtc\Models\Giving;
use dtc\Models\Loader;
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
use dtc\Models\Loading;
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


class LoadingController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {

		 if (Auth::check() && Helper::getAuth('loading'))
		 {


				 $loadingList= Loading::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();


				$view =  View::make('loading.index',compact('loadingList'))

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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Loading');
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

		 if (Auth::check() && Helper::getAuth('new_loading'))
		 {


				 $code= Helper::getNextCode("loading");
             $sales=Sales::lists('code' ,'id' );
             $incharges=User::where('id','!=','16')->lists('name' ,'id' );
             $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
             $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
				$view =View::make('loading.create')
					->with('code',$code)
					->with('sales',$sales)
					->with('incharges',$incharges)
					->with('salesList',$salesList)
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
             Session::forget('valRulesLoading');
             Session::put('valRulesLoading', $product_qty_validator_helper);

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Loading');
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
         $loadings = Input::all();

         $rules= Session::get('valRulesLoading');


         $validation = Validator::make($loadings, $rules);


         if ($validation->passes())
         {


             //---------------------------

             $res = false;


             try {

                 DB::beginTransaction();

                 //create loading

                 $loading_id = DB::table('loading')->insertGetId(
                     ['code' => $loadings['code'] ,
                         'sales_id' => $loadings['sales_id'] ,
                         'incharge_id' => $loadings['incharge_id'] ,
                         'date' => $loadings['date'] ,
                         'created_at' => Carbon::today() ]
                 );

                 //insert into  loading_products

                 foreach(  $rules as $OuterKey => $InnerArray){
                     //echo $OuterKey.' - '.$InnerArray;


                     //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$loadings[$OuterKey]);
                     $product_id = Product::where('code','=',$OuterKey)->first();

                     DB::table('loader')->insert(array('loading_id' => $loading_id, 'product_id' => $product_id->id, 'qty'=>$loadings[$OuterKey]));
                     DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$loadings[$OuterKey]);

                 }

                 DB::update('update `increment_helper` set `loading`=loading+1');
             }catch(\Exception $e){
                 dump($e);
                 return;
                 //$temp = false;
                 Session::forget('valRulesLoading');
                 DB::rollback();
                 // return Redirect::to('loading')
                 //      ->withInput()
                 //      ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                 //      ;

                 // something went wrong
             }
             DB::commit();
             Session::forget('valRulesLoading');

             $user = User::find(Auth::id());


             Log::warning('Sales Created by:'.$user->name);
             return Redirect::to('loading')
                 ->withInput()
                 ->withErrors($validation)
                 ->with('scs_success', 'Products Loaded Successfully.');
             // all good


             //-----------------


         }


         return Redirect::to('loading')
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
         if (Auth::check() && Helper::getAuth('view_loading'))
         {

             $task = Loading::findOrFail($id);
             $salesloadingList= Loader::where('loading_id','=',$id)->orderBy('product_id', 'asc')->get();
             // $givingList= Giving::where('sales_id','=',$id)->get();
             return View::make('loading.show')
                 ->withTask($task)
                 ->with('salesloadingList',$salesloadingList);

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

		 if (Auth::check() && Helper::getAuth('edit_loading'))
		 {


             $loading = Loading::findOrFail($id);
             $sales=Sales::where('is_deleted','=',false)->lists('code' ,'id' );
             $incharges=User::where('id','!=','16')->where('is_deleted','=',false)->lists('name' ,'id' );
             $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
             $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
             $view =View::make('loading.edit')
                 ->with('sales',$sales)
                 ->with('incharges',$incharges)
                 ->with('salesList',$salesList)
                 ->with('productList',$productList)
                 ->with('loading',$loading)
             ;
             $product_qty_validator_helper = array();
             // dump($productList);
             foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
             {
                 //echo $each_product->code;

                 $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                 // array_push($product_qty_validator_helper, $each_product->code,'numeric');
             }
             Session::forget('valRulesLoading');
             Session::put('valRulesLoading', $product_qty_validator_helper);

             return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Loading');
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
         $loadings = Input::all();

         $rules= Session::get('valRulesLoading');


         $validation = Validator::make($loadings, $rules);


         if ($validation->passes())
         {


             //---------------------------




             try {

                 DB::beginTransaction();

                 //create loading

                 DB::table('loading')->where('id','=',$id)->update(
                     ['code' => $loadings['code'] ,
                         'sales_id' => $loadings['sales_id'] ,
                         'incharge_id' => $loadings['incharge_id'] ,
                         'date' => $loadings['date'] ,
                         'updated_at' => Carbon::today() ]
                 );

                 //insert into  loading_products

                 foreach(  $rules as $OuterKey => $InnerArray){
                     //echo $OuterKey.' - '.$InnerArray;

                     //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$loadings[$OuterKey]);
                     $product = Product::where('code','=',$OuterKey)->first();
                     $prev_loded_qty =intval( (Loader::where('loading_id','=',$id)->where('product_id','=',$product->id)->first()['qty']));
                     $current_stock = intval($product->qty);
                     $editing_qty = intval($loadings[$OuterKey]);

                     $temp_stock = $current_stock -($editing_qty - $prev_loded_qty);

                    // DB::table('loader')->insert(array('loading_id' => $loading_id, 'product_id' => $product_id->id, 'qty'=>$loadings[$OuterKey]));
                     //DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$loadings[$OuterKey]);

                     DB::table('loader')->where('loading_id','=',$id)->where('product_id','=',$product->id)->update(
                         ['qty' => $loadings[$OuterKey]]
                     );
                     DB::table('product')->where('id','=',$product->id)->update(
                         ['qty' => $temp_stock]
                     );

                 }

                // DB::update('update `increment_helper` set `loading`=loading+1');
             }catch(\Exception $e){
               // dump($e);
              //return;
                 //$temp = false;
                 Session::forget('valRulesLoading');
                 DB::rollback();
                 return Redirect::to('loading')
                    ->withInput()
                     ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                      ;

                 // something went wrong
             }
             DB::commit();
             Session::forget('valRulesLoading');

             $user = User::find(Auth::id());


             Log::warning('Sales Created by:'.$user->name);
             return Redirect::to('loading')
                 ->withInput()
                 ->withErrors($validation)
                 ->with('scs_success', 'Products Edited Successfully.');
             // all good


             //-----------------


         }


         return Redirect::to('loading')
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



				 $driver = Loading::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Loading '.$driver->name.' is deleted. by:'.$user->name);
           //  \DB::table('loading')->where('id', '=', $id)->delete();
             \DB::table('loading')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('loading.index')
					->withInput()
					->with('scs_success', 'Loading '. $driver->code.' Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Loading');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function settle()
    {

        if (Auth::check())
        {


           // $loadingList= Loading::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('loading.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Loading');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


           // $loadingList= Loading::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('loading.settle_loading');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Loading');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>