<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use dtc\Models\Giving;
use dtc\Models\Invoice;
use dtc\Models\Loader;
use dtc\Models\Outlet;
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


class InvoiceControllerr extends Controller{

    /**
     * @return mixed
     */
    public function index()
    {

        if (Auth::check())
        {


            $invoiceList= Invoice::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();


            $view =  View::make('invoice.index',compact('invoiceList'))

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
            $outlets=Outlet::where('id','!=','16')->lists('name' ,'id' );
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
                        'created_at' => Carbon::today() ]
                );

                //insert into  invoice_products

                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    //$res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$invoices[$OuterKey]);

//dump(is_numeric($OuterKey));

                        if(is_numeric($OuterKey)){
                            $product_id = Product::where('id','=',$OuterKey)->first();
                            DB::table('invoice_products')->insert(array('invoice_id' => $invoice_id, 'product_id' => $product_id->id, 'qty'=>$invoices[$product_id[$OuterKey]], 'price'=>$invoices[$OuterKey]));
                        }
                        else{
                            $product_id = Product::where('code','=',$OuterKey)->first();
                          // dump($OuterKey);
                          // dump($product_id->id);
                            DB::table('invoice_products')->insert(array('invoice_id' => $invoice_id, 'product_id' => $product_id->id, 'qty'=>$invoices[$product_id->id], 'price'=>$invoices[$product_id->code]));
                        }

                    DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$invoices[$OuterKey]);

                }

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
                ->with('scs_success', 'Products Loaded Successfully.');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if (Auth::check())
        {

            $task = Invoice::findOrFail($id);
            $salesinvoiceList= Loader::where('invoice_id','=',$id)->get();
            // $givingList= Giving::where('sales_id','=',$id)->get();
            return View::make('invoice.show')
                ->withTask($task)
                ->with('salesinvoiceList',$salesinvoiceList);

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
            $invoice = Invoice::find($id);
            if (is_null($invoice))
            {
                return Redirect::route('invoice.index');
            }
            //redirect to update form
            //$invoices = Invoice::lists('name', 'id');
            return View::make('invoice.edit', compact('invoice'))
                ;
        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Invoice');
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
            'code'=>'required|unique:invoice,code,'.$id,
            'amount' => 'numeric|min:0',
            'cmn_pcnt' => 'numeric|min:0',
            'phone'=>'numeric|digits_between:9,13',
            'email'=>'email|required',



        );
        $invoices = Input::all();




        $validation = Validator::make($invoices, $rules);


        if ($validation->passes())
        {
            $book = Invoice::find($id);
            $book->update($invoices);
            $user = User::find(Auth::id());
            Log::warning('Invoice '.$book->name.' is edited. by:'.$user->name);
            return Redirect::route('invoice.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Invoice Successfully updated.');
        }
        return Redirect::route('invoice.edit', $id)
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



            $driver = Invoice::find($id);

            $user = User::find(Auth::id());
            Log::warning('Invoice '.$driver->name.' is deleted. by:'.$user->name);
            \DB::table('invoice')->where('id', '=', $id)->delete();
            return Redirect::route('invoice.index')
                ->withInput()
                ->with('scs_success', 'Invoice Successfully deleted.');

        }

        else{

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Invoice');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }

    }


    public function settle()
    {

        if (Auth::check())
        {


            // $invoiceList= Invoice::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

            $view =  View::make('invoice.settle');



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