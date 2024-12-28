@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Get</h2> 

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/giver_icon.png', null, null)!!} 

	<h4 class="side_link_heading">Getter</h4>

	{!! HTML::link('getter/company', 'Company', array('class' => 'side_link'))!!} 
	{!! HTML::link('getter/location', 'Locations', array('class' => 'side_link'))!!} 
	{!! HTML::link('getter/allproducts', 'All Products', array('class' => 'side_link','id' => 'company'))!!} 
	{!! HTML::link('getter/filter', 'Filter', array('class' => 'side_link'))!!}
	{!! HTML::link('getter/interest_list', 'Interest List', array('class' => 'side_link'))!!}
	




	@stop

	@section('middle_right_DIV')



	@stop


