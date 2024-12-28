<?php
namespace dtc\Models {
    use Illuminate\Auth\Authenticatable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Auth\Passwords\CanResetPassword;
    use Illuminate\Foundation\Auth\Access\Authorizable;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
    use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

    class User extends Model implements AuthenticatableContract,
        AuthorizableContract,
        CanResetPasswordContract
    {
        use Authenticatable, Authorizable, CanResetPassword;

		protected $fillable = array( 'id', 'name', 'email', 'full_name', 'password', 'confirmation_code', 'created_at', 'updated_on', 'updated_at', 'remember_token', 'email_verification', 'group_id', 'site_id', 'can_login', 'reason', 'status','is_deleted','address','code','phone','address','last_seen_at');

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

		/**
		 * Mapping column names.
		 *
		 */


		protected $primaryKey = "id";



		/*
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