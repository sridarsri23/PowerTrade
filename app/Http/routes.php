<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/', function () {
    return view('welcome');
});
*/
//Route::auth();

Route::get('/', 'UserController@login');


// Authentication routes...
/*
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
*/

Route::any('/','UserController@login');
Route::any('login','UserController@login');
Route::any('logout','UserController@logout');
Route::post('userLogin','UserController@userLogin');
Route::get('register','UserController@register');
Route::post('userReg','UserController@userReg');
Route::get('forgot_password','UserController@forgot_password');

Route::put('forgot_PWD','UserController@forgot_password');
Route::get('setpwd/{code}','UserController@set_password');
Route::get('verifyemail/{code}','UserController@verifyEmail');
Route::put('reset_password','UserController@reset_password');
// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

/*
Route::controllers([
    'password' => 'Auth\PasswordController',
]);
*/
Route::get('dashboard','UserController@dashboard');
Route::post('/language',
    array(
        'before' => 'csrf',
        'as' => 'language-chooser',
        'uses' => 'MyLanguageController@select'
    )
);


Route::get('info/{title}/{message}','UserController@showInfo');
Route::get('orders','UserController@orders');
Route::get('clients','UserController@clients');
Route::get('clients','UserController@clients');
Route::get('agents','UserController@agents');
Route::get('stock','UserController@stock');
Route::get('tour','UserController@sales');
Route::get('system','UserController@system');
Route::get('dashboard','UserController@dashboard');

Route::get('system/mysetup','SystemSettingsController@settings');
Route::get('privileges','SystemSettingsController@privileges');
Route::put('privileges_update','SystemSettingsController@privileges_update');

Route::resource('agent','AgentController');
Route::resource('lorry_expense','LorryExpenseController');
Route::get('settle','AgentSettleController@settle');


Route::get('employee_create_payment','SystemEmployeeController@create_payment');
Route::put('employee_store_payment','SystemEmployeeController@store_payment');
Route::get('driver_create_payment','DriverController@create_payment');
Route::put('driver_store_payment','DriverController@store_payment');
Route::get('lorry_create_expense','LorryController@create_expense');
Route::put('lorry_store_expense','LorryController@store_expense');

Route::resource('product','ProductController');

Route::get('search_client','ClientController@search_client');
Route::put('display_client','ClientController@display_client');

Route::get('search_order','OrderController@search_order');
Route::put('display_order','OrderController@display_order');
Route::get('search_giving','GivingController@search_giving');
Route::put('display_giving','GivingController@display_giving');


Route::get('search_settlement','AgentSettleController@search_settlement');
Route::get('search_sales','InvoiceController@search_sales');
Route::get('search_sales_for_many','InvoiceController@search_sales_for_many');



Route::get('search_sales_for_sales_return','SalesReturnController@search_sales');
Route::put('search_create_sales_return','SalesReturnController@search_create_sales_return');

Route::get('search_invoices_for_cheque','OutletController@search_invoices_for_cheque');
Route::put('search_settle_cheque','OutletController@search_settle_cheque');
Route::put('complete_cheque_settle','OutletController@complete_cheque_settle');

Route::put('search_create','InvoiceController@search_create');
Route::put('search_create_many','InvoiceController@search_create_many');
Route::put('invoice_store_next','InvoiceController@invoice_store_next');
Route::get('search_create_many_next','InvoiceController@search_create_many_next');
Route::get('search_view_invoice_dashboard','InvoiceController@search_view_invoice_dashboard');
Route::get('search_view_outlet_dashboard','OutletController@search_view_outlet_dashboard');
Route::put('search_view_invoice','InvoiceController@search_view_invoice');
Route::put('search_view_outlet','OutletController@search_view_outlet');

Route::get('testmail','AgentSettleController@testMail');
Route::put('display_settlement','AgentSettleController@display_settlement');
Route::put('delete_settlement','AgentSettleController@delete_settlement');



Route::put('completesettle','AgentSettleController@complete_settle');
Route::put('finalize_settle','AgentSettleController@finalize_settle');
Route::resource('client','ClientController');
Route::resource('order','OrderController');
Route::get('createc','OrderController@createc');
Route::get('createu','OrderController@createu');
Route::put('storec','OrderController@storec');
Route::resource('giving','GivingController');
Route::resource('receiving','ReceivingController');
Route::resource('transfer','TransferController');
Route::resource('sales_expense','SalesExpenseController');
Route::resource('loading','LoadingController');
Route::resource('unloading','UnloadingController');
Route::resource('invoice','InvoiceController');
Route::resource('routee','RouteController');
Route::resource('lorry','LorryController');
Route::resource('salesman','SalesManController');
Route::resource('driver','DriverController');
Route::resource('products','ProductController');
Route::resource('employee','SystemEmployeeController');
Route::resource('outlet','OutletController');
Route::get('import_outlet','OutletController@import_outlet');
Route::resource('sales','SalesController');
Route::resource('routee','RouteController');
Route::resource('driver_payment','DriverPaymentController');
Route::resource('running_expense','RunningExpenseController');
Route::get('addstockmany','ProductController@addstockmany');
Route::get('removestockmany','ProductController@removestockmany');
Route::put('completeaddstockmany','ProductController@completeaddstockmany');
Route::put('completeremovestockmany','ProductController@completeremovestockmany');
Route::get('stocksreport','ProductController@stocksreport');
Route::resource('sales_return','SalesReturnController');
Route::resource('employee_payment','EmployeePaymentController');

Route::get('search_routes_for_credit','OutletController@search_routes_for_credit');
Route::put('settle_credit_receiving','OutletController@settle_credit_receiving');
Route::put('complete_settle_credit_receiving','OutletController@complete_settle_credit_receiving');

Route::any('dtclog','ReportsController@dtclog');

Route::get('treport','ReportsController@index');
Route::any('treportt','ReportsController@post');

Route::get('day_sheet_report','ReportsController@day_sheet_index');
Route::any('day_sheet_reportt','ReportsController@day_sheet_post');

Route::get('lorry_transport_bill','ReportsController@lorry_transport_bill_index');
Route::get('credit_sales','ReportsController@credit_sales');
Route::get('sales_report','ReportsController@sales_report');
Route::any('lorry_transport_billl','ReportsController@lorry_transport_bill_post');
Route::any('credit_saless','ReportsController@credit_saless_post');
Route::any('sales_reportt','ReportsController@sales_report_post');

Route::get('normal_sales_report','ReportsController@normal_sales_report');
Route::any('normal_sales_reportt','ReportsController@normal_sales_report_post');
Route::get('sales_balance','ReportsController@sales_balance');
Route::any('sales_balancee','ReportsController@sales_balance_post');

Route::get('period_cash_book','ReportsController@period_cash_book_index');
Route::any('period_cash_bookk','ReportsController@period_cash_book_post');

Route::get('logs', ['uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index', 'middleware' => 'auth']);
Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as'=>'excel-file','uses'=>'FileController@downloadExcelFile'));
