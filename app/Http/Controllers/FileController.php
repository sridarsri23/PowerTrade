<?php
namespace dtc\Http\Controllers;
use Carbon\Carbon;
use dtc\Models\Helper;
use dtc\Models\Route;
use dtc\User;
use Illuminate\Http\Request;
use dtc\Http\Controllers\Controller;
use dtc\Models\OutletImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Redirect;

class FileController extends Controller {
    public function importExportExcelORCSV(){
        return view('file_import_export');
    }
    public function importFileIntoDB(Request $request){
        if($request->hasFile('sample_file')){
            $path = $request->file('sample_file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                if ($request->isMethod('post')) {
                    $outlets = $request->all();
                    $route = Route::find($outlets['route_id']);


                    foreach ($data as $key => $value) {
                        $outlet_code = $route->code . '\\' . Helper::getNextCode("outlet");
                        $arr[] = ['name' => $value->name, 'email' => $value->email, 'phone' => $value->phone, 'address' => $value->address, 'note' => $value->note, 'credit' => $value->credit, 'cheque' => $value->cheque, 'code' => $outlet_code,'route_id' =>$route->id,'created_at'=>Carbon::now()];
                        \DB::update('update `increment_helper` set `outlet`=outlet+1');
                    }
                }
                if(!empty($arr)){



                        \DB::table('outlet')->insert($arr);



                   // dd('Insert Record successfully.');
                    $user = User::find(Auth::id());
                    Log::info('Outlets Imported . by:'.$user->name);
                    return Redirect::route('outlet.index')
                        ->with('scs_success', 'Outlet Successfully Imported.');
                }
            }
        }
       // dd('Request data does not have any files to import.');
        return Redirect::route('outlet.index')
            ->with('scs_errors', 'Outlets Import Failed.');
    }
    public function downloadExcelFile($type){
        $products = OutletImport::where('id','=',11)->get();
        return \Excel::create('expertphp_demo', function($excel) use ($products) {
            $excel->sheet('sheet name', function($sheet) use ($products)
            {
                $sheet->fromArray($products);
            });
        })->download($type);
    }
}
