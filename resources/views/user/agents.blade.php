@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Agents</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/icons/agnt.png', null, null)!!}

	<h4 class="side_link_heading">Agents</h4>

	{!! HTML::link('agent', 'Agents', array('class' => 'side_link','id' => 'my_agent'))!!}

	{!! HTML::link('settle', 'New Day End', array('class' => 'side_link','id' => 'settle_agent'))!!}
	{!! HTML::link('search_settlement', 'Search Day End', array('class' => 'side_link','id' => 'search_settlement'))!!}
	{!! HTML::link('giving', 'Givings', array('class' => 'side_link','id' => 'my_givings'))!!}
	{!! HTML::link('search_giving', 'Search Giving', array('class' => 'side_link','id' => 'search_giving'))!!}
	{!! HTML::link('receiving', 'Receivings', array('class' => 'side_link','id' => 'my_receiving'))!!}
	{!! HTML::link('transfer', 'Transfer', array('class' => 'side_link','id' => 'transfer'))!!}


	@stop

	@section('middle_right_DIV')



	@stop


