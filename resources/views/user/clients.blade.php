@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Clients</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/icons/client.png', null, null)!!}

	<h4 class="side_link_heading">Clients</h4>

	{!! HTML::link('client', 'Clients', array('class' => 'side_link','id' => 'my_client'))!!}
	{!! HTML::link('search_client', 'Search Client', array('class' => 'side_link','id' => 'search_client'))!!}




	@stop

	@section('middle_right_DIV')



	@stop


