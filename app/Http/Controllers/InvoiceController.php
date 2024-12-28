<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\InvoiceProducts;
use dtc\Models\Loader;
use dtc\Models\Outlet;
use dtc\Models\Product;
use dtc\Models\Route;
use dtc\Models\Sales;
use dtc\Models\SalesProducts;
use dtc\Models\Settlement;
//use http\URL;
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


class InvoiceController extends Controller{

    /**
     * @return mixed
     */
    public function index()
    {

        if (Auth::check() && Helper::getAuth('invoice'))
        {


            $invoiceList= Invoice::where('is_deleted','=',false)->where('is_outlet_deleted','=',false)->where('is_sales_deleted','=',false)->orderBy('id', 'desc')->get();

            $invoices=Invoice::where('is_deleted','=',false)->lists('invoice_no' ,'id' );


            $view =  View::make('invoice.index')
                ->with('invoiceList',$invoiceList)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
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


            $code= Helper::getNextCode("invoice");
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
            $view =View::make('invoice.create')
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
            Session::forget('valRulesInvoice');
            Session::put('valRulesInvoice', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

    public function search_create()
    {

        if (Auth::check() && Helper::getAuth('new_invoice'))
        {

            $search_result = Input::all();
            $selected_sales_id = $search_result['sales_id'];

            $selected_sales = $invoice = Sales::findOrFail($selected_sales_id);


            $code= Helper::getNextCode("invoice");
            $outlets=Outlet::where('route_id','=',$selected_sales->route_id)->lists('name' ,'id' );
            $product_id_price=SalesProducts::where('sales_id','=',$selected_sales_id)->lists('cost_price' ,'product_id' );
            $outlets_id_credits=Outlet::lists('credit' ,'id' );
            $outlets_id_cheques=Outlet::lists('cheque' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productCodeId=Product::where('is_deleted','=','0')->lists('code' ,'id' );
            $outletList=Outlet::where('is_deleted','=','0')->lists('code' ,'id' );
            $sales_product_lists= SalesProducts::where('sales_id','=',$selected_sales_id)->lists('product_id');
            //changed on Aug 16 2020 for bug new added products causing an error of 'index not found'
            $productList= Product::where('is_deleted','=',false)->whereIn('id',$sales_product_lists)->orderBy('created_at', 'asc')->get(); 
            $view =View::make('invoice.search_create')
                ->with('code',$code)
                ->with('outlets',$outlets)
                ->with('salesList',$salesList) 
                ->with('productList',$productList)
                ->with('outletList',$outletList)
                ->with('productCodeId',$productCodeId)
                ->with('outlets_id_credits',$outlets_id_credits)
                ->with('outlets_id_cheques',$outlets_id_cheques)
                ->with('selected_sales_id',$selected_sales_id)
                ->with('product_id_price',$product_id_price)
            ;
            
            $product_qty_validator_helper = array();
          // dump($product_id_price); 
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
                //echo $each_product->code;

                $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                // $product_qty_validator_helper=array_merge($product_qty_validator_helper,array($each_product->id=>'required|numeric|min:0'));
                // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRulesInvoice');
            Session::put('valRulesInvoice', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }

   public function search_view_invoice()
    {

        if (Auth::check() && Helper::getAuth('view_invoice'))
        {
            $vals= Input::all();
            $id = $vals['invoice_id'];

            $invoice = Invoice::findOrFail($id);
            $salesinvoiceList= InvoiceProducts::where('invoice_id','=',$id)->get();
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('invoice.show')
                ->with('invoice',$invoice)
                ->with('salesinvoiceList',$salesinvoiceList);

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }
    public function search_view_invoice_dashboard()
    {

        if (Auth::check() && Helper::getAuth('view_invoice'))
        {


            $invoices=Invoice::where('is_deleted','=',false)->lists('invoice_no' ,'id' );
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('invoice.search_invoice')
                ->with('invoices',$invoices)
                ;


        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }



    public function search_create_many()
    {

        if (Auth::check())
        {

            $search_result = Input::all();
            $selected_sales_id = $search_result['sales_id'];

            $selected_sales = $invoice = Sales::findOrFail($selected_sales_id);


            $code= Helper::getNextCode("invoice");
            $outlets=Outlet::where('route_id','=',$selected_sales->route_id)->lists('name' ,'id' );
            $product_id_price=SalesProducts::where('sales_id','=',$selected_sales_id)->lists('cost_price' ,'product_id' );
            $outlets_id_credits=Outlet::lists('credit' ,'id' );
            $outlets_id_cheques=Outlet::lists('cheque' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productCodeId=Product::where('is_deleted','=','0')->lists('code' ,'id' );
            $outletList=Outlet::where('is_deleted','=','0')->lists('code' ,'id' );
            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
            $view =View::make('invoice.search_create_next')
                ->with('code',$code)
                ->with('outlets',$outlets)
                ->with('salesList',$salesList)
                ->with('productList',$productList)
                ->with('outletList',$outletList)
                ->with('productCodeId',$productCodeId)
                ->with('outlets_id_credits',$outlets_id_credits)
                ->with('outlets_id_cheques',$outlets_id_cheques)
                ->with('selected_sales_id',$selected_sales_id)
                ->with('product_id_price',$product_id_price)
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
            Session::forget('valRulesInvoice');
            Session::put('valRulesInvoice', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }


  //  public function search_create_many_next($sales_id)
   public function search_create_many_next($sales_id, $message , $validation)
    {

        if (Auth::check())
        {

          //  $search_result = Input::all();
           // $selected_sales_id = $search_result['sales_id'];

            $selected_sales = $invoice = Sales::findOrFail($sales_id);


            $code= Helper::getNextCode("invoice");
            $outlets=Outlet::where('route_id','=',$selected_sales->route_id)->lists('name' ,'id' );
            $product_id_price=SalesProducts::where('sales_id','=',$sales_id)->lists('cost_price' ,'product_id' );
            $outlets_id_credits=Outlet::lists('credit' ,'id' );
            $outlets_id_cheques=Outlet::lists('cheque' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productCodeId=Product::where('is_deleted','=','0')->lists('code' ,'id' );
            $outletList=Outlet::where('is_deleted','=','0')->lists('code' ,'id' );
            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();
            $view =View::make('invoice.search_create_next')
                ->with('code',$code)
                ->with('outlets',$outlets)
                ->with('salesList',$salesList)
                ->with('productList',$productList)
                ->with('outletList',$outletList)
                ->with('productCodeId',$productCodeId)
                ->with('outlets_id_credits',$outlets_id_credits)
                ->with('outlets_id_cheques',$outlets_id_cheques)
                ->with('selected_sales_id',$sales_id)
                ->with('product_id_price',$product_id_price)
                ->with('message',$message)
                ->with('validation',$validation)
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
            Session::forget('valRulesInvoice');
            Session::put('valRulesInvoice', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
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
        $invoices = Input::all();

        $rules= Session::get('valRulesInvoice');
        $ruless=array(

            'date'=>'required',
            'invoice_no'=>'required',
            'code'=>'required|unique:invoice,code',
            'cash' => 'required|numeric|min:0',
            'cheque_value' => 'required|numeric|min:0',
            'credit' => 'required|numeric|min:0',
        );

        $ruless=array_merge($ruless,$rules);

        $validation = Validator::make($invoices, $ruless);
       // dump($invoices);
       // dump($rules);

        if ($validation->passes())
        {


            //---------------------------

            $res = false;


            try {

                DB::beginTransaction();

                //create invoice

                $invoice_id = DB::table('invoice')->insertGetId(
                    ['code' => $invoices['code'] ,
                        'sales_id' => $invoices['sales_id'] ,
                        'outlet_id' => $invoices['outlet_id'] ,
                        'date' => $invoices['date'] ,
                        'cheque_date' => $invoices['cheque_date'] ,
                        'invoice_no' => $invoices['invoice_no'] ,
                        'total' => $invoices['total'] ,
                        'note' => $invoices['note'] ,
                        'cash' => $invoices['cash'] ,
                        'cheque_value' => $invoices['cheque_value'] ,
                        'credit' => $invoices['credit'] ,
                        'cheque_no' => $invoices['cheque_no'] ,
                        'cheque_date' => $invoices['cheque_date'] ,
                        'cheque_bank' => $invoices['cheque_bank'] ,
                        'total_payable' => $invoices['total_payable'] ,
                        'previous_credit' => $invoices['previous_credit'] ,
                        'previous_cheque' => $invoices['previous_cheque'] ,
                        'discount' => $invoices['discount'] ,
                        'created_at' => Carbon::today() ]
                );

                //insert into  invoice_products
            // dump($invoices);
           //   return;

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$invoices[$OuterKey]);

//dump(is_numeric($OuterKey));


                            $product_id = Product::where('code','=',$OuterKey)->first();
                          // dump($OuterKey);
                          // dump($product_id->id);
                            DB::table('invoice_products')->insert(array('invoice_id' => $invoice_id, 'product_id' => $product_id->id, 'qty'=>$invoices[$product_id->id], 'price'=>$invoices[$product_id->code],'free_issue'=>$invoices[$product_id->code.'_'.$product_id->id]));
                           // DB::table('product')->where('id','=',$OuterKey)->decrement('qty',($invoices[$product_id[$OuterKey]] + $invoices[$product_id->code.$product_id->id] ));


                   // DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$invoices[$OuterKey]);

                }
                DB::table('outlet')->where('id','=',$invoices['outlet_id'])->update( array('credit'=>$invoices['credit'], 'cheque'=>$invoices['cheque_value']));


                DB::update('update `increment_helper` set `invoice`=invoice+1');
            }catch(\Exception $e){
               //dump($e);
              //  return;
                //$temp = false;
                Session::forget('valRulesInvoice');
                DB::rollback();
           return Redirect::to('invoice')
               ->withInput()
             ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                  ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRulesInvoice');

            $user = User::find(Auth::id());


            Log::warning('Sales Created by:'.$user->name);
            return Redirect::to('invoice')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Invoice Created Successfully.');
            // all good


            //-----------------


        }


        return Redirect::to('invoice')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');
    }

        public function invoice_store_next()
    {
        $invoices = Input::all();

        $rules= Session::get('valRulesInvoice');
        $ruless=array(

            'date'=>'required',
            'invoice_no'=>'required',
            'code'=>'required|unique:invoice,code',
            'cash' => 'required|numeric|min:0',
            'cheque_value' => 'required|numeric|min:0',
            'credit' => 'required|numeric|min:0',
        );

        $ruless=array_merge($ruless,$rules);

        $validation = Validator::make($invoices, $ruless);
       // dump($invoices);
       // dump($rules);

        if ($validation->passes())
        {


            //---------------------------

            $res = false;


            try {

                DB::beginTransaction();

                //create invoice

                $invoice_id = DB::table('invoice')->insertGetId(
                    ['code' => $invoices['code'] ,
                        'sales_id' => $invoices['sales_id'] ,
                        'outlet_id' => $invoices['outlet_id'] ,
                        'date' => $invoices['date'] ,
                        'cheque_date' => $invoices['cheque_date'] ,
                        'invoice_no' => $invoices['invoice_no'] ,
                        'total' => $invoices['total'] ,
                        'note' => $invoices['note'] ,
                        'cash' => $invoices['cash'] ,
                        'cheque_value' => $invoices['cheque_value'] ,
                        'credit' => $invoices['credit'] ,
                        'cheque_no' => $invoices['cheque_no'] ,
                        'cheque_date' => $invoices['cheque_date'] ,
                        'cheque_bank' => $invoices['cheque_bank'] ,
                        'total_payable' => $invoices['total_payable'] ,
                        'previous_credit' => $invoices['previous_credit'] ,
                        'previous_cheque' => $invoices['previous_cheque'] ,
                        'discount' => $invoices['discount'] ,
                        'created_at' => Carbon::today() ]
                );

                //insert into  invoice_products
            // dump($invoices);
           //   return;

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$invoices[$OuterKey]);

//dump(is_numeric($OuterKey));


                            $product_id = Product::where('code','=',$OuterKey)->first();
                          // dump($OuterKey);
                          // dump($product_id->id);
                            DB::table('invoice_products')->insert(array('invoice_id' => $invoice_id, 'product_id' => $product_id->id, 'qty'=>$invoices[$product_id->id], 'price'=>$invoices[$product_id->code],'free_issue'=>$invoices[$product_id->code.'_'.$product_id->id]));
                           // DB::table('product')->where('id','=',$OuterKey)->decrement('qty',($invoices[$product_id[$OuterKey]] + $invoices[$product_id->code.$product_id->id] ));


                   // DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$invoices[$OuterKey]);

                }
                DB::table('outlet')->where('id','=',$invoices['outlet_id'])->update( array('credit'=>$invoices['credit'], 'cheque'=>$invoices['cheque_value']));


                DB::update('update `increment_helper` set `invoice`=invoice+1');
            }catch(\Exception $e){
             //  dump($e);
              //  return;
                //$temp = false;
               // Session::forget('valRulesInvoice');
                DB::rollback();
             return Redirect::to('invoice')
                ->withInput()
                ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                  ;

                // something went wrong
            }
            DB::commit();
           // Session::forget('valRulesInvoice');

            $user = User::find(Auth::id());


            Log::warning('Sales Created by:'.$user->name);

            //return Url::to('search_create_many_next')
            /*
            return redirect('invoice')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Invoice Created Successfully.')
                ->with('sales_id', $invoices['sales_id'] );

        */


          return $this->search_create_many_next($invoices['sales_id'] , 'success',$validation)
            ;
            // all good


            //-----------------


        }


       // return Url::to('search_create_many_next')
        /*
              return redirect('invoice')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');

        */
       return $this->search_create_many_next($invoices['sales_id'] , 'fail', $validation);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if (Auth::check() && Helper::getAuth('view_invoice'))
        {

            $invoice = Invoice::findOrFail($id);
            $salesinvoiceList= InvoiceProducts::where('invoice_id','=',$id)->get();
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('invoice.show')
                ->with('invoice',$invoice)
                ->with('salesinvoiceList',$salesinvoiceList);

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Invoice');
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

        if (Auth::check() && Helper::getAuth('edit_invoice'))
        {
                $invoice = Invoice::findOrFail($id);

            $selected_sales_id = $invoice->sales_id;

            $selected_sales = Sales::findOrFail($selected_sales_id);


            $code= $invoice->code;
            $outlets=Outlet::where('route_id','=',$selected_sales->route_id)->where('is_deleted','=',false)->lists('name' ,'id' );
            $product_id_price=SalesProducts::where('sales_id','=',$selected_sales_id)->lists('cost_price' ,'product_id' );
            $outlets_id_credits=Outlet::lists('credit' ,'id' );
            $outlets_id_cheques=Outlet::lists('cheque' ,'id' );
            $salesList=Sales::where('is_deleted','=','0')->lists('code' ,'id' );
            $productCodeId=Product::lists('code' ,'id' );
            $outletList=Outlet::where('is_deleted','=',false)->lists('code' ,'id' );
            $productList= Product::orderBy('created_at', 'asc')->get();
            $invoicceProductList= InvoiceProducts::where('invoice_id','=',$id)->get();
            $view =View::make('invoice.edit')
                ->with('code',$code)
                ->with('outlets',$outlets)
                ->with('salesList',$salesList)
                ->with('productList',$productList)
                ->with('outletList',$outletList)
                ->with('productCodeId',$productCodeId)
                ->with('outlets_id_credits',$outlets_id_credits)
                ->with('outlets_id_cheques',$outlets_id_cheques)
                ->with('selected_sales_id',$selected_sales_id)
                ->with('product_id_price',$product_id_price)
                ->with('invoice',$invoice)
                ->with('invoicceProductList',$invoicceProductList)
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
            Session::forget('valRulesInvoice');
            Session::put('valRulesInvoice', $product_qty_validator_helper);

            return $view;//
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to edit Invoice');
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

        $rules= Session::get('valRulesInvoice');
        $ruless=array(

            'date'=>'required',
            'invoice_no'=>'required',
            'code'=>'required|unique:invoice,code,'.$id,
            'cash' => 'required|numeric|min:0',
            'cheque_value' => 'required|numeric|min:0',
            'credit' => 'required|numeric|min:0',
        );
        $invoices = Input::all();
        $ruless=array_merge($ruless,$rules);

        $validation = Validator::make($invoices, $ruless);
        // dump($invoices);
        // dump($rules);

        if ($validation->passes())
        {


            //---------------------------

            $res = false;


            try {

                DB::beginTransaction();

                //update invoice

                $temp_invoice = Invoice::findorfail($id);

                    DB::table('invoice')->where('id','=',$id)->update(
                    ['code' => $invoices['code'] ,
                        'outlet_id' => $invoices['outlet_id'] ,
                        'date' => $invoices['date'] ,
                        'cheque_date' => $invoices['cheque_date'] ,
                        'invoice_no' => $invoices['invoice_no'] ,
                        'total' => $invoices['total'] ,
                        'note' => $invoices['note'] ,
                        'cash' => $invoices['cash'] ,
                        'cheque_value' => $invoices['cheque_value'] ,
                        'credit' => $invoices['credit'] ,
                        'cheque_no' => $invoices['cheque_no'] ,
                        'cheque_date' => $invoices['cheque_date'] ,
                        'cheque_bank' => $invoices['cheque_bank'] ,
                        'total_payable' => $invoices['total_payable'] ,
                        'previous_credit' => $invoices['previous_credit'] ,
                        'previous_cheque' => $invoices['previous_cheque'] ,
                        'discount' => $invoices['discount'] ,
                        'updated_at' => Carbon::today() ]
                );

                //insert into  invoice_products
                // dump($invoices);
                //   return;

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$invoices[$OuterKey]);

//dump(is_numeric($OuterKey));


                    $product_id = Product::where('code','=',$OuterKey)->first();
                    // dump($OuterKey);
                    // dump($product_id->id);
                 // DB::table('invoice_products')->update(array('invoice_id' => $id, 'product_id' => $product_id->id, 'qty'=>$invoices[$product_id->id], 'price'=>$invoices[$product_id->code],'free_issue'=>$invoices[$product_id->code.'_'.$product_id->id]));
                    // DB::table('product')->where('id','=',$OuterKey)->decrement('qty',($invoices[$product_id[$OuterKey]] + $invoices[$product_id->code.$product_id->id] ));


                    DB::table('invoice_products')->where('invoice_id','=',$id)->where('product_id','=',$product_id->id)->update(
                        [
                            'qty'=>$invoices[$product_id->id],
                            'price'=>$invoices[$product_id->code],
                            'free_issue'=>$invoices[$product_id->code.'_'.$product_id->id],
                            ]
                    );

                    // DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$invoices[$OuterKey]);

                }
               // $prev_outlet =

                    if ($temp_invoice->outlet_id = $invoices['outlet_id']){ //if outlet not changed
                        $outlet = Outlet::findorfail($invoices['outlet_id']);
                   //$creditt = $outlet->credit - ($temp_invoice->credit - $invoices['credit']);
                 //   $cheque = $outlet->cheque - ($temp_invoice->cheque_value - $invoices['cheque_value']);
                        DB::table('outlet')->where('id','=',$invoices['outlet_id'])->update( array('credit'=> $invoices['credit'], 'cheque'=>$invoices['cheque_value']));

                    }
                    else{ //if outlet changed
                       // $prev_outlet = Outlet::findorfail($temp_invoice->outlet_id);

                       // $prev_creditt = $temp_invoice->previous_credit - ($temp_invoice->credit - $invoices['credit']);
                      //  $prev_cheque = $temp_invoice->previous_cheque - ($temp_invoice->cheque_value - $invoices['cheque_value']);

                        DB::table('outlet')->where('id','=',$temp_invoice->outlet_id)->update( array('credit'=>$temp_invoice->previous_credit, 'cheque'=>$temp_invoice->previous_cheque));
                        DB::table('outlet')->where('id','=',$invoices['outlet_id'])->update( array('credit'=>$invoices['credit'], 'cheque'=>$invoices['cheque_value']));

                    }





               // DB::update('update `increment_helper` set `invoice`=invoice+1');
            }catch(\Exception $e){
                dump($e);
                return;
                //$temp = false;
                Session::forget('valRulesInvoice');
                DB::rollback();
                return Redirect::to('invoice')
                    ->withInput()
                    ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                    ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRulesInvoice');

            $user = User::find(Auth::id());


            Log::warning('Sales Created by:'.$user->name);
            return Redirect::to('invoice')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Invoice Edited Successfully.');
            // all good


            //-----------------


        }


        return Redirect::to('invoice')
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
        if (Auth::check() && Helper::getAuth('delete_invoice'))
        {



            $driver = Invoice::find($id);

            $user = User::find(Auth::id());
            Log::warning('Invoice '.$driver->name.' is deleted. by:'.$user->name);
          //  \DB::table('invoice')->where('id', '=', $id)->delete();
            \DB::table('invoice')->where('id', '=', $id)->update(array('is_deleted' => true));
            return Redirect::route('invoice.index')
                ->withInput()
                ->with('scs_success', 'Invoice '.$driver->code.' Successfully deleted.');

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }


    public function search_sales()
    {


        if (Auth::check())
        {


            $sales=Sales::where('is_deleted','=',false)->orderBy('created_at', 'desc')->lists('code' ,'id' );

           // $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =View::make('invoice.search_sales')
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }



    public function search_sales_for_many()
    {


        if (Auth::check())
        {


            $sales=Sales::where('is_deleted','=',false)->orderBy('created_at', 'desc')->lists('code' ,'id' );

           // $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =View::make('invoice.search_sales_next')
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }


    }


    public function complete_settle()
    {

        if (Auth::check())
        {


            // $invoiceList= Invoice::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('invoice.settle_invoice');



            if (Request::ajax())
            {

                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }



}


?>