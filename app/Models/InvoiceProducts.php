<?php
namespace dtc\Models {
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Auth\Passwords\CanResetPassword;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
	use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
	use Illuminate\Database\Eloquent\Model;

	class InvoiceProducts extends Model implements AuthenticatableContract, CanResetPasswordContract{

		use Authenticatable, CanResetPassword;

        protected $fillable = array('id', 'invoice_id',  'product_id', 'price','qty','free_issue');

		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'invoice_products';

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
