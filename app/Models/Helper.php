<?php
namespace dtc\Models {
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Auth\Passwords\CanResetPassword;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
	use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
	use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Session;

    class Helper extends Model implements AuthenticatableContract, CanResetPasswordContract{

		use Authenticatable, CanResetPassword;





		public static function getNextCode($table=null){

			$code=\DB::table ('increment_helper')->select ($table)->first();
			$short_code=\DB::table('entity_short_codes')->select($table)->first();


			$code_num=$code->$table+1;
				return $short_code->$table.$code_num;
			}

		public static function getColumnValue($table=null,$column=null,$id=null){

			$code=\DB::table ($table)->select($column)->first();



			$code_num=$code->$table+1;
				return $code->$table.$code_num;
			}

        public static function getAuth($priv=null){

            $sess_priv = Session::get('privileges')[$priv];

            if($sess_priv != null){

                return $sess_priv;
            }
            else{

                return 0;
            }


        }

	}
}
