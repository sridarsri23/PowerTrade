<?php
namespace dtc\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;
use dtc\Models\Company;
use dtc\Models\Helper;
use dtc\Models\Order;

use dtc\Models\Product;

use SebastianBergmann\Environment\Console;
use View;
use Validator;
use Illuminate\Support\Facades\Input;
use UserModel;
use Mail;
use Redirect;
use Auth;
use dtc\Models\User;
use Request;



class ProductController extends Controller{

	/**
	 * @return mixed
     */
	public function index()
	 {



		 if (Auth::check() && Helper::getAuth('product'))
		 {


             $productsList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();
				 $totalProductCount= Product::count('id');

				$view =  View::make('product.index',compact('productsList'))
                    ->with("totalProductCount",$totalProductCount)
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

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Product');
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

		 if (Auth::check() && Helper::getAuth('new_product'))
		 {


				 $code= Helper::getNextCode("product");


				$view =View::make('product.create')
					->with('code',$code)
				;

			   return $view;//
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Product');
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

		          'name'=>'required|unique:product,name',
		          'code'=>'required|unique:product,code',
                'minimum_cost_price' => 'required|numeric|min:0',
                'maximum_selling_price' => 'required|numeric|min:0|greater_than_field:minimum_cost_price',
				'qty'=>'numeric|min:0',



		    );
		    //get all Product information
		    $products = Input::all();
		    //validate book information with the rules
		 


		  
		      $validation=Validator::make($products,$rules);




		      //get Citiy Id as for the selected City Name
		   

		     // $products['cg_city_cg_city_id'] = $city ->cg_city_id;
		// $products['is_fuel'] = $products['is_fuel']  == 'Yes' ? true : false;

		 
		     		// $products['created_by'] = Auth::id();
		     

		      if($validation->passes())
		      {
		      //save new Product information in the database 
		      //and redirect to index page


				 $prods= Product::create($products);

				 // $privilege =Privileges:: privilege(['driver_id' => $products['id']]);
				  $ai =  \DB::getPdo()->lastInsertId();
				  \DB::update('update `increment_helper` set `product`=product+1');
				


				  $user = User::find(Auth::id());
				  Log::info('Product '.$prods->name.' is created. by:'.$user->name);
		          return Redirect::route('product.index')
		             ->withInput()
		             ->withErrors($validation)
		             ->with('scs_success', 'Product Successfully created.');
		      }
		      //show error message
		      return Redirect::route('product.create')
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
		 if (Auth::check() && Helper::getAuth('view_product'))
		 {

             $productObject = Product::findOrFail($id);
				 return View::make('product.show')
                     ->with('productObject',$productObject);
			 }

		else{

		Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to View Product');
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

		 if (Auth::check() && Helper::getAuth('edit_product'))
		 {

			 //get the current book by i
				$product = Product::find($id);
				if (is_null($product))
				{
					return Redirect::route('product.index');
				}
				//redirect to update form
				//$products = Product::lists('name', 'id');
				return View::make('product.edit', compact('product'));
		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Edit Product');
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

         $products = Input::all();




        $rules=array(
            'name'=> 'required|unique:product,name,'.$products['name'].',name',
            'code'=>'required|unique:product,code,'.$products['code'].',code',
            'minimum_cost_price' => 'required|numeric|min:0',
            'maximum_selling_price' => 'required|numeric|min:0|greater_than_field:minimum_cost_price',
            'qty'=>'numeric',



        );





        $validation = Validator::make($products, $rules);


        if ($validation->passes())
        {
            $prod = Product::find($id);
            $prod->update($products);
			$user = User::find(Auth::id());
			Log::warning('Product '.$prod->name.' is edited. by:'.$user->name);
            return Redirect::route('product.index')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Product Successfully updated.');
        }
        return Redirect::route('product.edit', $id)
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
		 if (Auth::check() && Helper::getAuth('delete_product') )
		 {



				 $driver = Product::find($id);

				 $user = User::find(Auth::id());
				 Log::warning('Product '.$driver->name.' is deleted. by:'.$user->name);
            // \DB::table('product')->where('id', '=', $id)->delete();
             DB::table('product')->where('id','=',$id)->update( array('is_deleted'=>1));
				return Redirect::route('product.index')
					->withInput()
					->with('scs_success', 'Product Successfully deleted.');

		 }

		 else{

			 Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to Delete Product');
			 Session::put("error_message",Lang::get('messages.action_authorized_warning'));
			 return redirect('dashboard');


		 }

	 }


    public function addstockmany()
    {
        //dump("Helllll");
        //Console::info("Hello");
        if (Auth::check() && Helper::getAuth('add_stocks_many'))
        {


            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();

               $product_qty_validator_helper = array();
              // dump($productList);
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
               //echo $each_product->code;

                $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
               // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRules');
            Session::put('valRules', $product_qty_validator_helper);
       //  dump($product_qty_validator_helper);
            $view =  View::make('product.addstockmany')
                ->with('productList',$productList)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Product');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }

        public function stocksreport()
    {
        //dump("Helllll");
        //Console::info("Hello");
        if (Auth::check() && Helper::getAuth('stock_report'))
        {


            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'desc')->get();

               $product_qty_validator_helper = array();
              // dump($productList);
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
               //echo $each_product->code;

             //   $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
               // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            //Session::forget('valRules');
           // Session::put('valRules', $product_qty_validator_helper);
       //  dump($product_qty_validator_helper);
            $view =  View::make('product.stocksreport')
                ->with('productList',$productList)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to access Product');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }


    public function completeaddstockmany()
    {

        $products = Input::all();

        $rules= Session::get('valRules');


        $validation = Validator::make($products, $rules);


              if ($validation->passes())
              {


                  //---------------------------

                  $res = false;


                  try {

                      DB::beginTransaction();
                      foreach(  $rules as $OuterKey => $InnerArray){
                            //echo $OuterKey.' - '.$InnerArray;


                     $res = DB::table('product')->where('code','=',$OuterKey)->increment('qty',$products[$OuterKey]);


                      }

                  }catch(\Exception $e){

                      //$temp = false;
                      Session::forget('valRules');
                      DB::rollback();
                      return Redirect::to('addstockmany')
                          ->withInput()
                          ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                          ;

                      // something went wrong
                  }
                  DB::commit();
                  Session::forget('valRules');

                  $user = User::find(Auth::id());


                  Log::warning('Many Products added by:'.$user->name);
                  return Redirect::to('addstockmany')
                      ->withInput()
                      ->withErrors($validation)
                      ->with('scs_success', 'Products Successfully Added.');
                  // all good


                  //-----------------


              }


              return Redirect::to('addstockmany')
                  ->withInput()
                  ->withErrors($validation)
                  ->with('message', 'There were validation errors.')
                  ->with('scs_errors', 'There were validation errors.');


    }


    public function removestockmany()
    {
        //dump("Helllll");
        //Console::info("Hello");
        if (Auth::check() && Helper::getAuth('remove_stocks_many'))
        {


            $productList= Product::where('is_deleted','=',false)->orderBy('created_at', 'asc')->get();

            $product_qty_validator_helper = array();
            // dump($productList);
            foreach ($productList as $each_product) //->each(function($each_product) // foreach($posts as $post) { }
            {
                //echo $each_product->code;

                $product_qty_validator_helper=array_merge($product_qty_validator_helper,array( $each_product->code =>'required|numeric|min:0'));
                // array_push($product_qty_validator_helper, $each_product->code,'numeric');
            }
            Session::forget('valRules');
            Session::put('valRules', $product_qty_validator_helper);
            //  dump($product_qty_validator_helper);
            $view =  View::make('product.removestockmany')
                ->with('productList',$productList)
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

            Log::warning('Un Authorized Employee '.Auth::user()->name.' trying to remove products');
            Session::put("error_message",Lang::get('messages.action_authorized_warning'));
            return redirect('dashboard');


        }



    }
    public function completeremovestockmany()
    {

        $products = Input::all();

        $rules= Session::get('valRules');


        $validation = Validator::make($products, $rules);


        if ($validation->passes())
        {


            //---------------------------

            $res = false;


            try {

                DB::beginTransaction();
                foreach(  $rules as $OuterKey => $InnerArray){
                    //echo $OuterKey.' - '.$InnerArray;


                    $res = DB::table('product')->where('code','=',$OuterKey)->decrement('qty',$products[$OuterKey]);


                }

            }catch(\Exception $e){

                //$temp = false;
                Session::forget('valRules');
                DB::rollback();
                return Redirect::to('removestockmany')
                    ->withInput()
                    ->with('scs_errors', 'Transaction Failed. Please Try again. Make Sure you have a proper Internet.')
                    ;

                // something went wrong
            }
            DB::commit();
            Session::forget('valRules');

            $user = User::find(Auth::id());


            Log::warning('Many Products removed by:'.$user->name);
            return Redirect::to('removestockmany')
                ->withInput()
                ->withErrors($validation)
                ->with('scs_success', 'Products Successfully Removed.');
            // all good


            //-----------------


        }


        return Redirect::to('addstockmany')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.')
            ->with('scs_errors', 'There were validation errors.');



    }




}






?>