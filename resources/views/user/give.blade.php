@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Give</h2> 

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/giver_icon.png', null, null)!!} 

	<h4 class="side_link_heading">Giver</h4>

	{!! HTML::link('giver/product/company', 'Companies', array('class' => 'side_link','id' => 'company'))!!} 
	{!! HTML::link('giver/product/location', 'Locations', array('class' => 'side_link'))!!}
	{!! HTML::link('giver/product/brand', 'Brands', array('class' => 'side_link'))!!}
	{!! HTML::link('giver/product/model', 'Models', array('class' => 'side_link'))!!}
	{!! HTML::link('giver/product', 'Products', array('class' => 'side_link'))!!} 





	@stop

	@section('middle_right_DIV')



	@stop


