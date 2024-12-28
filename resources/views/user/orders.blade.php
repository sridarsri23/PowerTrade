@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Orders</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/icons/order.png', null, null)!!}

	<h4 class="side_link_heading">Orders</h4>

	{!! HTML::link('order', 'Orders', array('class' => 'side_link','id' => 'my_orders'))!!}
	{!! HTML::link('search_order', 'Search Order', array('class' => 'side_link','id' => 'search_order'))!!}




	@stop

	@section('middle_right_DIV')



	@stop


