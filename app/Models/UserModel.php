<?php

namespace dtc\Models {
    use DB;
    use Hash;
    class UserModel
    {


        public static function insert($values = null)
        {

            //print_r($values);

            $confimration_code = md5($values['email']);// Using email to create confimation code as MD5 to enforce uniqueness.

            $created_on = date("Y-m-d H:i:s");


            /*
            $insert = DB::table('users')->insert(array('name' => $values['userName'],

                'password' => Hash::make($values['passWord']),
                'phone' => $values['phone'],

                'email' => $values['email'], 'confirmation_code' => $confimration_code, 'created_at' => $created_on));
*/



                $temp = false;
            DB::beginTransaction();

            try {
                $insert = DB::table('users')->insert(array('name' => $values['userName'],

                    'password' => Hash::make($values['passWord']),
                    'phone' => $values['phone'],

                    'email' => $values['email'], 'confirmation_code' => $confimration_code, 'created_at' => $created_on));

                $user_id = DB::table('users')->where('email', '=', $values['email'])->pluck('id');
                $idd = DB::getPdo()->lastInsertId();;
               $insert_privileges = DB::table('privileges')->insert(array('employee_id'=> $idd ));
                DB::commit();
                $temp = true;
                // all good
            } catch (\Exception $e) {
                DB::rollback();
                $temp = false;
                // something went wrong
            }



            if ($temp) {


                return true;

            } else {


                return false;

            }

        }


        public static function login($values)
        {


            //print_r($values);

            /*

            * Retrieve password for entered email.

            */

            $pickpassword = DB::table('users')->where('email', '=', $values['email'])->pluck('password');


            /*

            * Check for users existence OR users already registered with entered email.

            */

            if (!$pickpassword) {


                return array(false, "No User Found!");

            } else {


                /*

                * Validate stored-hashed password with entered password.

                */
                $val = $values['passWord'];
                //echo $val.' pw '.$pickpassword[0];

                $checkpassword = Hash::check($val, $pickpassword[0]);


                if ($checkpassword) {

                    $get_user_id = DB::table('users')->where('email', '=', $values['email'])->pluck('id');
                    $email_verified = DB::table('users')->where('email', '=', $values['email'])->pluck('email_verification');

                    return array(true, $get_user_id, $email_verified);


                } else {
                    return array(false, "User Name and Password does not Match!");
                }

                //echo $checkpassword;

            }

        }


        public static function forgot_password($email)
        {


            $email_params = DB::table('users')->where('email', '=', $email)->first();

            if ($email_params) {

                //print_r($check_email);

                return array(true, $email_params);

            } else {

                return array(false);


            }


        }


        public static function reset_password($values)
        {


            $new_pwd = $values['passWord'];

            $code = $values['confirmation_code'];


            //echo $new_pwd . $code;


            $update_pwd = DB::table('users')->where('confirmation_code', '=', $code)
                ->update(array('password' => Hash::make($new_pwd), 'confirmation_code' => md5(date("Y-m-d H:i:s"))));


            if ($update_pwd) {


                return true;

            } else {


                return false;

            }

        }


        public static function verify_email($values)
        {


            $email_verification = true;


            $code = $values;


            $update_pwd = DB::table('users')->where('confirmation_code', '=', $code)
                ->update(array('confirmation_code' => md5(date("Y-m-d H:i:s")), 'email_verification' => $email_verification));


            if ($update_pwd) {


                return true;

            } else {


                return false;

            }

        }


    }

}