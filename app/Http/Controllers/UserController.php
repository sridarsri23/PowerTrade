<?php
namespace dtc\Http\Controllers;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use dtc\Http\Controllers\Controller;

use View;
use Validator;
use Illuminate\Support\Facades\Input;

use Mail;
use Redirect;
use Auth;
use dtc\Models\User;
use dtc\Models\UserModel;
use dtc\Models\Privileges;


class UserController extends Controller{

    function __construct() {
        //parent::__construct();
        Lang::setLocale(Session::get('locale'));
    }
    public function register(){


        return View::make('user.register',array('title'=>'Register'));


    }

    public function userReg(){
        $validate=Validator::make(
            Input::all(),
            array('userName' => 'required|alpha_num',
                'password'=> 'password|min:8',
                'phone'=>'required|min:11|numeric',
                'email'=>'required|unique:users,email')
        );

        if($validate->fails()){
            //echo "Validation Failed";
            //return Redirect::back()->withError($validate);
            return  Redirect::to('register')->withErrors($validate)->withInput(Input::get());
        }
        else{
            //echo "Validation Passed";
            $insertdb=UserModel::insert(Input::all());

            if($insertdb){

                //echo 'Registration Successfull!';
                $confimration_code=md5($_POST['email']);

//email code start
                $send_mail=Mail::send('emails.user.verifyemail', array('first_name'=>$_POST['userName'],
                    'code'=>$confimration_code),
                    function($message){

                        $message->to( $_POST['email']);
                        $message->subject('Email Verification');
                    });

                //email code end

                return Redirect::to('info/Registration Successfull!/Please check your email and verify. Please check in Spam folder also.');

            }
            else{
                //echo 'Registration Failed!';
                return Redirect::to('user/info/Registration Failed!/Registration Failed!.');

            }
        }



    }


    public function login(){


        return View::make('user.login',array('title'=>'Login'));


    }


    public function logout(){


        Auth::logout();
        return View::make('user.login',array('title'=>'Login'));

    }

    public function userLogin(){


        $validate=Validator::make(
            Input::all(),
            array('passWord'=>'required','email'=>'required')
        );

        if($validate->fails()){

            return  Redirect::back()->withErrors($validate)->withInput(Input::get());
        }
        else{

            $checkuser=UserModel::login(Input::all());
            if($checkuser[0]){
                $inputs = Input::all();


                if(!is_null($checkuser[2][0])){//if email verified
                        $user =User::where('email', '=', $inputs['email'])->first();
                    Auth::login($user);
                    //Auth::loginUsingId($checkuser[1]);
                   // Auth::login(User::find($checkuser[1]));

                    // handle auto user logout
                    $user->last_seen_at = Carbon::now()->format('Y-m-d H:i:s');
                    $user->save();
                 //DB::table('users')->where('id', '=', $user->id)->update(array('last_seen_at' => Carbon::now()->format('Y-m-d H:i:s')));



                    $user = User::find(Auth::id());
                    Log::info('User '.$user->name.' is logged in. from IP:');
                    $vals =	User::where('email', '=', $inputs['email'])->first();
                    $privileges = Privileges::where('employee_id','=',Auth::id())->first();;
                    //dump($privileges);
                    //return;
                   Session::put('privileges', $privileges);
                 //   echo $vals['can_login']. " cn";

                    if($vals['can_login']){



                        //send email when someone loged in

                                if($user->id != 16) {
                                    $send_mail = Mail::send('emails.user.sendmail', array('first_name' => $user->name, 'email' => $user->email,
                                        'phone' => $user->phone),
                                        function ($message) {

                                            $message->to('sriwithofficial@gmail.com');
                                            $message->subject('User Loged In to DTC');
                                        });

                                }
                        //email code end

                        return View::make('user.myaccount',array('title'=>'Dashboard'));


                    }
                    else{

                        Auth::logout();
                        $message =  'Sorry,Account not authorized! Please Contact the System Admin';
                        return Redirect::to('login')->withErrors(array('login_error'=> $message));
                    }


                }
                else{//if email not verified yet

                    return Redirect::to('info/Email Verification Failed/Email Verification Failed or Email not verified yet. Check your email to verify. Please check in Spam folder also.');

                }



            }
            else{

                return Redirect::back()-> withErrors( array('login_error'=>$checkuser[1]))->withInput(Input::get());
            }

        }



    }
    public function forgot_password(){
        if(isset($_POST['email'])){

            $checkmail= UserModel::forgot_password(($_POST['email']));

            if($checkmail[0]){
                $send_mail=Mail::send('emails.user.forgotpassword', array('name'=>$checkmail[1]->name,
                    'name'=>$checkmail[1]->name,'code'=>$checkmail[1]->confirmation_code),
                    function($message){

                        $message->to($_POST['email']);
                        $message->subject('Reset Password Request');
                    });

                //echo 'E-Mail sent. Please check your email';

                return Redirect::to('info/E-Mail sent/E-Mail sent. Please check your email');
                /*
                    if($send_mail){
                        echo "E-Mail sent. Please check your email";


                    }

                    else{
                        return Redirect::back()->with('title','Forgot Password')
                    ->withErrors(array('forgot_password_error'=>'Unable to send email. Contact Administrator.'))
                        ->withInput(Input::get());
                    }
                    //echo $checkmail[1]->first_name.$checkmail[1]->last_name.$checkmail[1]->confirmation_code;
            */

            }
            else{
                //echo "Email Not Found";
                return Redirect::back()->with('title','Forgot Password')
                    ->withErrors(array('forgot_password_error'=>'Email Not Found!'))
                    ->withInput(Input::get());

            }
        }
        else{
            return View::make('user.forgotpassword',array('title'=>'Forgot Password'));
        }

    }


    public function set_password($code=null){
        //$check_code=UserModel::set_pwd($code);

        return View::make('user.setpwd')->with('title','Set Password')->with('code',$code) ;
    }


    public function reset_password($code=null){
        $reset_password=UserModel::reset_password(Input::all());


        if($reset_password){
            echo "Password Updated";
        }
        else{

            echo "Password Update Failed, Contact Administrator.";

        }
    }

    public function mining(){

        if (Auth::check())
        {

            $view= View::make('user.mining',array('title'=>'Mining'));

            //return  $view;//->renderSections()['middle_DIV'] ;


            $sections = $view->renderSections();
            return json_encode($sections);
            //return $view;
        }
        else{


            return Redirect::to('login');
        }
    }

    public function office(){

        if (Auth::check())
        {

            $view= View::make('user.office',array('title'=>'Office'));

            //return  $view;//->renderSections()['middle_DIV'] ;


            $sections = $view->renderSections();
            return json_encode($sections);
            //return $view;
        }
        else{


            return Redirect::to('login');
        }
    }

    public function reports(){

        if (Auth::check())
        {

            $view= View::make('user.reports',array('title'=>'Reports'));

            //return  $view;//->renderSections()['middle_DIV'] ;


            $sections = $view->renderSections();
            return json_encode($sections);
            //return $view;
        }
        else{


            return Redirect::to('login');
        }
    }
    public function system(){

        if (Auth::check())
        {

            $view =View::make('user.system',array('title'=>'Options'));

            if (Request::ajax())
            {
                //  $sections = $view->renderSections();
                //	return json_encode($sections);
                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
            // return  $view ->renderSections()['middle_left_DIV'];
        }
        else{
            return Redirect::to('auth/login');
        }
    }


    public function transport(){

        if (Auth::check())
        {

            $view= View::make('user.transport',array('title'=>'Transport'));

            //return  $view;//->renderSections()['middle_DIV'] ;


            $sections = $view->renderSections();
            return json_encode($sections);
            //return $view;
        }
        else{


            return Redirect::to('login');
        }
    }


    public function dashboard(){

        if (Auth::check())
        {

            $view =View::make('user.myaccount',array('title'=>'Dashboard'));

            if (Request::ajax())
            {
                //  $sections = $view->renderSections();
                //	return json_encode($sections);
                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
            // return  $view ->renderSections()['middle_left_DIV'];
        }
        else{
            return Redirect::to('auth/login');
        }
    }
    public function orders(){

        if (Auth::check())
        {

            $view =View::make('user.orders',array('title'=>'Orders'));

            if (Request::ajax())
            {
                //  $sections = $view->renderSections();
                //	return json_encode($sections);
                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
            // return  $view ->renderSections()['middle_left_DIV'];
        }
        else{
            return Redirect::to('auth/login');
        }
    }
    public function clients(){

        if (Auth::check())
        {

            $view =View::make('user.clients',array('title'=>'Clients'));

            if (Request::ajax())
            {
                //  $sections = $view->renderSections();
                //	return json_encode($sections);
                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
            // return  $view ->renderSections()['middle_left_DIV'];
        }
        else{
            return Redirect::to('auth/login');
        }
    }
    public function stock(){

        if (Auth::check())
        {

            $view =View::make('user.stock',array('title'=>'Stock'));

            if (Request::ajax())
            {
                //  $sections = $view->renderSections();
                //	return json_encode($sections);
                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
            // return  $view ->renderSections()['middle_left_DIV'];
        }
        else{
            return Redirect::to('auth/login');
        }
    }

    public function sales(){

        if (Auth::check())
        {

            $view =View::make('user.sales',array('title'=>'Sales'));

            if (Request::ajax())
            {
                //  $sections = $view->renderSections();
                //	return json_encode($sections);
                return  $view->renderSections()['middle_right_DIV'];
            }
            else{

                return  $view;
            }
            // return  $view ->renderSections()['middle_left_DIV'];
        }
        else{
            return Redirect::to('auth/login');
        }
    }



    public function showInfo($title,$message){

        return View::make('user.info',array('title'=>$title, 'message'=>$message));

    }



    public function verifyemail($code=null){
        //echo $code;
        $verify=UserModel::verify_email($code);


        if($verify){
            //echo "Email Verification Successfull!";
            return View::make('user.info',array('title'=>"Email Verification Successfull!", 'message'=>"Email Verification Successfull!"));
        }
        else{

            //echo "Email Verification Failed!,Please Contact Administrator.";
            return View::make('user.info',array('title'=>"Email Verification Failed!", 'message'=>"Email Verification Failed!,Please Contact Administrator."));

        }
    }

}


?>