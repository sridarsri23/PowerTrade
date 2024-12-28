<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use dtc\Http\Controllers\Controller;
use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\InvoiceProducts;
use dtc\Models\SalesReturn;
use dtc\Models\SalesReturnProducts;
use dtc\Models\Loader;
use dtc\Models\Outlet;
use dtc\Models\Product;
use dtc\Models\Route;
use dtc\Models\Sales;
use dtc\Models\SalesProducts;
use dtc\Models\Settlement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
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


class SalesReturnController extends Controller{

    /**
     * @return mixed
     */
    public function index()
    {

        if (Auth::check())
        {


            $sales_returnList= SalesReturn::where('is_deleted','=',false)->orderBy('id', 'desc')->get();


            $view =  View::make('sales_return.index',compact('sales_returnList'))

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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access SalesReturn');
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


            $code= Helper::getNextCode("sales_return");
            $sales=Sales::lists('code' ,'id' );
            $salescode_routeid=Sales::lists('route_id' ,'code' );
            $outlets=Outlet::lists('name' ,'id' );
            $route_id_outlets_id=Outlet::lists('route_id' ,'id' );
            $outlets_id_credits=Outlet::lists('credit' ,'id' );
            $outlets_id_cheques=Outlet::lists('cheque' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productCodeId=Product::where('is_deleted','=','0')->lists('code' ,'id' );
            $outletList=Outlet::where('is_deleted','=','0')->lists('code' ,'id' );
            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
            $view =View::make('sales_return.create')
                ->with('code',$code)
                ->with('sales',$sales)
                ->with('outlets',$outlets)
                ->with('salesList',$salesList)
                ->with('productList',$productList)
                ->with('outletList',$outletList)
                ->with('productCodeId',$productCodeId)
                ->with('salescode_routeid',$salescode_routeid)
                ->with('route_id_outlets_id',$route_id_outlets_id)
                ->with('outlets_id_credits',$outlets_id_credits)
                ->with('outlets_id_cheques',$outlets_id_cheques)
            ;
            $product_qty_validator_helper = array();
            // dump($productList);
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
                //echo $each_product->code;

                $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                // $product_qty_validator_helper=array_merge($product_qty_validator_helper,array($each_product->id=>'required|numeric|min:0'));
                // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRulesSalesReturn');
            Session::put('valRulesSalesReturn', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access SalesReturn');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function search_create_sales_return()
    {

        if (Auth::check())
        {

            $search_result = Input::all();
            $selected_invoice_id = $search_result['invoice_id'];
            $selected_invoice =  Invoice::findOrFail($selected_invoice_id);
            $selected_sales = Sales::findOrFail($selected_invoice->sales_id);
            $selected_outlet = Outlet::findOrFail($selected_invoice->outlet_id);


            $code= Helper::getNextCode("sales_return");
            $sales_code = $selected_sales->code;
            $product_id_price=InvoiceProducts::where('invoice_id','=',$selected_invoice_id)->lists('price' ,'product_id' );
            $product_id_qty=InvoiceProducts::where('invoice_id','=',$selected_invoice_id)->lists('qty' ,'product_id' );
            $productCodeId=Product::where('is_deleted','=','0')->lists('code' ,'id' );
            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
            $view =View::make('sales_return.search_create')
                ->with('code',$code)
                ->with('outlet',$selected_outlet)
                ->with('sales_code',$sales_code)
                ->with('productList',$productList)
                ->with('productCodeId',$productCodeId)
                ->with('selected_sales',$selected_sales)
                ->with('product_id_price',$product_id_price)
                ->with('product_id_qty',$product_id_qty)
                ->with('invoice',$selected_invoice)
            ;
            $product_qty_validator_helper = array();
            // dump($productList);
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
                //echo $each_product->code;

                $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                // $product_qty_validator_helper=array_merge($product_qty_validator_helper,array($each_product->id=>'required|numeric|min:0'));
                // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRulesSalesReturn');
            Session::put('valRulesSalesReturn', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access SalesReturn');
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
        $sales_returns = Input::all();

        $rules= Session::get('valRulesSalesReturn');
        $ruless=array(

            'date'=>'required',
            'invoice_no'=>'required',
            'code'=>'required|unique:sales_return,code',
            'total_payable' => 'required|numeric',
            'total' => 'required|numeric|min:0',
            'previous_credit' => 'required|numeric',
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

                $sales_return_id = DB::table('sales_return')->insertGetId(
                    ['code' => $sales_returns['code'] ,
                        'sales_id' => $sales_returns['sales_id'] ,
                        'outlet_id' => $sales_returns['outlet_id'] ,
                        'date' => $sales_returns['date'] ,
                        'total' => $sales_returns['total'] ,
                        'total_payable' => $sales_returns['total_payable'] ,
                        'previous_credit' => $sales_returns['previous_credit'] ,
                        'invoice_no' => $sales_returns['invoice_no'] ,
                        'created_at' => Carbon::today() ]
                );

                //insert into  sales_return_products

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$sales_returns[$OuterKey]);

//dump(is_numeric($OuterKey));

                    /*

                    if(is_numeric($OuterKey)){
                        $product_id = Product::where('id','=',$OuterKey)->first();
                        DB::table('sales_return_products')->insert(array('sales_return_id' => $sales_return_id, 'product_id' => $product_id->id, 'qty'=>$sales_returns[$product_id[$OuterKey]], 'price'=>$sales_returns[$OuterKey]));
                    }
                    else{

                    */
                        $product_id = Product::where('code','=',$OuterKey)->first();
                        // dump($OuterKey);
                        // dump($product_id->id);
                        $sales_returns[$product_id->code.'ir'.$product_id->id] = $sales_returns[$product_id->code.'ir'.$product_id->id]  == 'Yes' ? true : false;
                        $sales_returns[$product_id->code.'is'.$product_id->id] = $sales_returns[$product_id->code.'is'.$product_id->id]  == 'Yes' ? true : false;
                        DB::table('sales_return_products')->insert(array('sales_return_id' => $sales_return_id, 'product_id' => $product_id->id, 'qty'=>$sales_returns[$product_id->id], 'price'=>$sales_returns[$product_id->code],'is_resellable'=>$sales_returns[$product_id->code.'ir'.$product_id->id] ,'is_sold'=>$sales_returns[$product_id->code.'is'.$product_id->id]));
                    //}

                    // DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$sales_returns[$OuterKey]);

                    //if not sellable and
                    if(!$sales_returns[$product_id->code.'ir'.$product_id->id]){
                        DB::table('product')->where('id','=',$product_id->id)->decrement('qty',$sales_returns[$product_id->id]);

                    }


                }
                DB::table('outlet')->where('id','=',$sales_returns['outlet_id'])->update( array('credit'=>$sales_returns['total_payable']));

                DB::update('update `increment_helper` set `sales_return`=sales_return+1');
            }catch(\Exception $e){
                dump($e);
                //  return;
                //$temp = false;
                Session::forget('valRulesSalesReturn');
                DB::rollback();
                // return Redirect::to('sales_return')
                //    ->withInput()
                //    ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRulesSalesReturn');

            $user = User::find(Auth::id());


            Log::warning('Sales Created by:'.$user->name);
            return Redirect::to('sales_return')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Sales Return Created Successfully.');
            // all good


            //-----------------


        }

          //  dump($validation);
       // return;
        return Redirect::to('sales_return')
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
        if (Auth::check())
        {

            $sales_return = SalesReturn::findOrFail($id);
            $salessales_returnList= SalesReturnProducts::where('qty','!=','0')->where('sales_return_id','=',$id)->get();
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('sales_return.show')
                ->with('sales_return',$sales_return)
                ->with('salessales_returnList',$salessales_returnList);

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

        if (Auth::check())
        {

            //get the current book by i
            $sales_return = SalesReturn::find($id);
            if (is_null($sales_return))
            {
                return Redirect::route('sales_return.index');
            }
            //redirect to update form
            //$sales_returns = SalesReturn::lists('name', 'id');
            return View::make('sales_return.edit', compact('sales_return'))
                ;
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit SalesReturn');
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
            'code'=>'required|unique:sales_return,code,'.$id,
            'amount' => 'numeric|min:0',
            'cmn_pcnt' => 'numeric|min:0',
            'phone'=>'numeric|digits_between:9,13',
            'email'=>'email|required',



        );
        $sales_returns = Input::all();




        $validation = Validator::make($sales_returns, $rules);


        if ($validation->passes())
        {
            $book = SalesReturn::find($id);
            $book->update($sales_returns);
            $user = User::find(Auth::id());
            Log::warning('SalesReturn '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('sales_return.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'SalesReturn Successfully updated.');
        }
        return Redirect::route('sales_return.edit', $id)
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



            $driver = SalesReturn::find($id);

            $user = User::find(Auth::id());
            Log::warning('SalesReturn '.$driver->name.' is deleted. by:'.$user->name);
            \DB::table('sales_return')->where('id', '=', $id)->delete();
            return Redirect::route('sales_return.index')
                ->withInput()
                ->with('scs_success', 'SalesReturn Successfully deleted.');

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete SalesReturn');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }


    public function search_sales()
    {


        if (Auth::check())
        {


            $invoices=Invoice::where('is_deleted','=',false)->orderBy('invoice_no', 'desc')->lists('invoice_no' ,'id' );

            // $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =View::make('sales_return.search_sales')
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access SalesReturn');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }
    public function complete_settle()
    {

        if (Auth::check())
        {


            // $sales_returnList= SalesReturn::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('sales_return.settle_sales_return');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access SalesReturn');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>