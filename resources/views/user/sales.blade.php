@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Sales Tour</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/icons/tour.png', null, null)!!}

	<h4 class="side_link_heading">Tour</h4>
	@if(Session::get('privileges')['sales'])
		{!! HTML::link('sales', 'Sales', array('class' => 'side_link','id' => 'my_agent'))!!}
	@endif


	@if(Session::get('privileges')['loading'])
		{!! HTML::link('loading', 'Loading', array('class' => 'side_link','id' => 'my_agent'))!!}
	@endif

	@if(Session::get('privileges')['invoice'])
		{!! HTML::link('invoice', 'Invoice', array('class' => 'side_link','id' => 'settle_agent'))!!}
	@endif

	@if(Session::get('privileges')['unloading'])
		{!! HTML::link('unloading', 'Unloading', array('class' => 'side_link','id' => 'search_settlement'))!!}
	@endif


	@if(Session::get('privileges')['sales_return'])
		{!! HTML::link('sales_return', 'Sales Return', array('class' => 'side_link','id' => 'my_givings'))!!}
	@endif


	@if(Session::get('privileges')['sales_expense'])
		{!! HTML::link('sales_expense', 'Sales Expense', array('class' => 'side_link','id' => 'search_giving'))!!}
	@endif


	<hr/>


	@if(Session::get('privileges')['sales_report'])
		{!! HTML::link('normal_sales_report', 'Sales Report', array('class' => 'side_link','id' => 'normal_sales_report'))!!}
	@endif

	@if(Session::get('privileges')['credit_sales_report'])
		{!! HTML::link('credit_sales', 'Credit Balance Report', array('class' => 'side_link','id' => 'credit_sales'))!!}
	@endif



	@if(Session::get('privileges')['sales_report'])
		{!! HTML::link('sales_balance', 'Sales Tally Report', array('class' => 'side_link','id' => 'sales_balance'))!!}
	@endif
	@if(Session::get('privileges')['sales_report'])
		{!! HTML::link('sales_report', 'Sales Profit Report', array('class' => 'side_link','id' => 'sales_report'))!!}
	@endif





	@stop

	@section('middle_right_DIV')



	@stop


