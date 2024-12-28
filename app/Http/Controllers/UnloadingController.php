<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use dtc\Http\Controllers\Controller;
use dtc\Models\Giving;
use dtc\Models\Loader;
use dtc\Models\Product;
use dtc\Models\Route;
use dtc\Models\Sales;
use dtc\Models\Settlement;
use dtc\Models\Unloader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Models\Company;
use dtc\Models\Helper;
use dtc\Models\Order;
use dtc\Models\Site;
use dtc\Models\Unloading;
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


class UnloadingController extends Controller{

    /**
     * @return mixed
     */
    public function index()
    {

        if (Auth::check() && Helper::getAuth('unloading'))
        {


            $unloadingList= Unloading::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();


            $view =  View::make('unloading.index',compact('unloadingList'))

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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Unloading');
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

        if (Auth::check() && Helper::getAuth('new_unloading'))
        {


            $code= Helper::getNextCode("unloading");
            $sales=Sales::lists('code' ,'id' );
            $incharges=User::where('id','!=','16')->lists('name' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
            $view =View::make('unloading.create')
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
            Session::forget('valRulesUnloading');
            Session::put('valRulesUnloading', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Unloading');
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
        $unloadings = Input::all();

        $rules= Session::get('valRulesUnloading');


        $validation = Validator::make($unloadings, $rules);


        if ($validation->passes())
        {


            //---------------------------

            $res = false;


            try {

                DB::beginTransaction();

                //create unloading

                $unloading_id = DB::table('unloading')->insertGetId(
                    ['code' => $unloadings['code'] ,
                        'sales_id' => $unloadings['sales_id'] ,
                        'incharge_id' => $unloadings['incharge_id'] ,
                        'date' => $unloadings['date'] ,
                        'created_at' => Carbon::today() ]
                );

                //insert into  unloading_products

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$unloadings[$OuterKey]);
                    $product_id = Product::where('code','=',$OuterKey)->first();

                    DB::table('unloader')->insert(array('unloading_id' => $unloading_id, 'product_id' => $product_id->id, 'qty'=>$unloadings[$OuterKey]));
                    DB::table('product')->where('code','=',$OuterKey)->increment('qty',$unloadings[$OuterKey]);

                }

                DB::update('update `increment_helper` set `unloading`=unloading+1');
            }catch(\Exception $e){
                dump($e);
                return;
                //$temp = false;
                Session::forget('valRulesUnloading');
                DB::rollback();
                // return Redirect::to('unloading')
                //      ->withInput()
                //      ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                //      ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRulesUnloading');

            $user = User::find(Auth::id());


            Log::warning('Sales Created by:'.$user->name);
            return Redirect::to('unloading')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Products Loaded Successfully.');
            // all good


            //-----------------


        }


        return Redirect::to('unloading')
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
        if (Auth::check() && Helper::getAuth('view_unloading'))
        {

            $task = Unloading::findOrFail($id);
            $salesunloadingList= Unloader::where('unloading_id','=',$id)->orderBy('product_id', 'asc')->get();
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('unloading.show')
                ->withTask($task)
                ->with('salesunloadingList',$salesunloadingList);

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


            $unloading = Unloading::findOrFail($id);
            $sales=Sales::where('is_deleted','=',false)->lists('code' ,'id' );
            $incharges=User::where('id','!=','16')->where('is_deleted','=',false)->lists('name' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
            $view =View::make('unloading.edit')
                ->with('sales',$sales)
                ->with('incharges',$incharges)
                ->with('salesList',$salesList)
                ->with('productList',$productList)
                ->with('unloading',$unloading)
            ;
            $product_qty_validator_helper = array();
            // dump($productList);
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
                //echo $each_product->code;

                $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRulesUnloading');
            Session::put('valRulesUnloading', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Unloading');
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
        $unloadings = Input::all();

        $rules= Session::get('valRulesUnloading');


        $validation = Validator::make($unloadings, $rules);


        if ($validation->passes())
        {


            //---------------------------




            try {

                DB::beginTransaction();

                //create unloading

                DB::table('unloading')->where('id','=',$id)->update(
                    ['code' => $unloadings['code'] ,
                        'sales_id' => $unloadings['sales_id'] ,
                        'incharge_id' => $unloadings['incharge_id'] ,
                        'date' => $unloadings['date'] ,
                        'updated_at' => Carbon::today() ]
                );

                //insert into  unloading_products

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;

                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$unloadings[$OuterKey]);
                    $product = Product::where('code','=',$OuterKey)->first();
                    $prev_loded_qty =intval( (Unloader::where('unloading_id','=',$id)->where('product_id','=',$product->id)->first()['qty']));
                    $current_stock = intval($product->qty);
                    $editing_qty = intval($unloadings[$OuterKey]);

                    $temp_stock = $current_stock +($editing_qty - $prev_loded_qty);

                    // DB::table('unloader')->insert(array('unloading_id' => $unloading_id, 'product_id' => $product_id->id, 'qty'=>$unloadings[$OuterKey]));
                    //DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$unloadings[$OuterKey]);

                    DB::table('unloader')->where('unloading_id','=',$id)->where('product_id','=',$product->id)->update(
                        ['qty' => $unloadings[$OuterKey]]
                    );
                    DB::table('product')->where('id','=',$product->id)->update(
                        ['qty' => $temp_stock]
                    );

                }

                // DB::update('update `increment_helper` set `unloading`=unloading+1');
            }catch(\Exception $e){
                dump($e);
                return;
                //$temp = false;
                Session::forget('valRulesUnloading');
                DB::rollback();
                return Redirect::to('unloading')
                    ->withInput()
                    ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                    ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRulesUnloading');

            $user = User::find(Auth::id());


            Log::warning('Sales Created by:'.$user->name);
            return Redirect::to('unloading')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Products Edited Successfully.');
            // all good


            //-----------------


        }


        return Redirect::to('unloading')
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
        if (Auth::check() && Helper::getAuth('delete_unloading'))
        {



            $driver = Unloading::find($id);

            $user = User::find(Auth::id());
            Log::warning('Unloading '.$driver->name.' is deleted. by:'.$user->name);
            \DB::table('unloading')->where('id','=',$id)->update( array('is_deleted'=>1));
           // \DB::table('unloading')->where('id', '=', $id)->delete();
            return Redirect::route('unloading.index')
                ->withInput()
                ->with('scs_success', 'Unloading '.$driver->name.'  Successfully deleted.');

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Unloading');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }


    public function settle()
    {

        if (Auth::check())
        {


            // $unloadingList= Unloading::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('unloading.settle');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Unloading');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function complete_settle()
    {

        if (Auth::check())
        {


            // $unloadingList= Unloading::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('unloading.settle_unloading');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Unloading');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>