<?php
namespace dtc\Models {
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Auth\Passwords\CanResetPassword;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
	use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
	use Illuminate\Database\Eloquent\Model;

	class Product extends Model implements AuthenticatableContract, CanResetPasswordContract{

		use Authenticatable, CanResetPassword;

		protected $fillable = array('id', 'name', 'created_at', 'updated_on', 'updated_at', 'is_deleted','code', 'note', 'minimum_cost_price', 'maximum_selling_price', 'qty');

		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'product';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */



		/**
		 * Mapping column names.
		 *
		 */


		/*
public function employees()
{
    return $this->hasMany('SCS\Models\Employee');
}


public function points()
{
return $this->hasMany('SCS\Models\Point');
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
