<?php

namespace dtc\Models{
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Auth\Passwords\CanResetPassword;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
	use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
	use Illuminate\Database\Eloquent\Model;

	class Employee extends Model implements AuthenticatableContract, CanResetPasswordContract{

		use Authenticatable, CanResetPassword;

		protected $fillable = array( 'id', 'name', 'email', 'full_name', 'password', 'phone', 'confirmation_code', 'created_on', 'updated_on', 'updated_at', 'remember_token', 'email_verification', 'can_login', 'reason', 'status','is_deleted','address','code');

		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'users';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */

		protected $hidden = array('password', 'remember_token');


		public function privileges()
		{
			return $this->hasOne('dtc\Models\Privileges');
		}



		/**
		 * Mapping column names.
		 *
		 */

		/*
                protected $primaryKey = "id";

                public function privileges()
                {
                    return $this->hasMany('Privileges','id','id');
                }

                      public function locations()
                  {
                      return $this->hasMany('Location','created_by','active_entity_id');
                  }

                          public function companies()
                  {
                      return $this->hasMany('Company','active_entity_active_entity_id','active_entity_id');
                  }

                             public function brands()
                  {
                      return $this->hasMany('Brand','active_entity_active_entity_id','active_entity_id');
                  }

                                 public function models()
                  {
                      return $this->hasMany('Model','active_entity_active_entity_id','active_entity_id');
                  }

                                   public function products()
                  {
                      return $this->hasMany('Product','active_entity_active_entity_id','active_entity_id');
                  }
                                  public function transports()
                  {
                      return $this->hasMany('Transport','active_entity_active_entity_id','active_entity_id');
                  }
                              public function routees()
                  {
                      return $this->hasMany('TRoute','active_entity_active_entity_id','active_entity_id');
                  }
                      public function policies()
                  {
                      return $this->hasMany('Policy','active_entity_active_entity_id','active_entity_id');
                  }
                  */
	}
}
