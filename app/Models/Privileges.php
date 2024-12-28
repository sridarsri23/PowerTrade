<?php
namespace dtc\Models {
	use Illuminate\Auth\Authenticatable;
	use Illuminate\Auth\Passwords\CanResetPassword;
	use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
	use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
	use Illuminate\Database\Eloquent\Model;

	class Privileges extends Model implements AuthenticatableContract, CanResetPasswordContract{

		use Authenticatable, CanResetPassword;

		protected $fillable = array( 'id', 'dashboard', 'purchasing', 'manufacturing', 'stock', 'sales', 'system', 'product', 'view_product',
			'edit_product', 'delete_product', 'add_stocks_many', 'add_stocks_one', 'remove_stocks_many', 'remove_stocks_one', 'stock_report', 'loading',
			'view_loading', 'edit_loading', 'delete_loading', 'invoice', 'edit_invoice', 'view_invoice', 'delete_invoice', 'new_invoice', 'unloading',
			'view_unloading', 'edit_unloading', 'delete_unloading', 'new_unloading', 'return_product', 'edit_return', 'view_return', 'delete_return',
			'new_return', 'sales_expense', 'edit_expense', 'delete_expense', 'view_expense', 'new_expense',
			'credit_sales_report', 'sales_report', 'route', 'new_route', 'view_route', 'edit_route', 'delete_route',
			'lorry', 'new_lorry', 'view_lorry', 'edit_lorry', 'delete_lorry', 'employee', 'new_employee',
			'view_employee', 'edit_employee', 'delete_employee', 'driver', 'new_driver', 'view_driver', 'edit_driver', 'delete_driver', 'setup',
			'privileges', 'log', 'search_invoice', 'search_outlet', 'new_product', 'new_loading', 'reports', 'outlet', 'new_outlet',
			'view_outlet', 'edit_outlet', 'delete_outlet', 'saless', 'new_sales', 'view_sales', 'edit_sales', 'delete_sales', 'edit_site',
			'delete_site', 'settings','employee_id','created_at','updated_at','advance','view_advance','new_advance','edit_advance','delete_advance','running_expense','view_running_expense','new_running_expense','edit_running_expense','delete_running_expense'
        ,'lorry_expense','view_lorry_expense','new_lorry_expense','edit_lorry_expense','delete_lorry_expense'
        ,'driver_payment','view_driver_payment','new_driver_payment','edit_driver_payment','delete_driver_payment'
        ,'employee_payment','view_employee_payment','new_employee_payment','edit_employee_payment','delete_employee_payment','tour');



		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'privileges';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */



		protected $primaryKey = "id";


		public function employee()
		{
			return $this->belongsTo('dtc\Models\Employee');
		}
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
