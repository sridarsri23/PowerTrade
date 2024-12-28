@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">{!! Lang::get('messages.mining') !!}</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/mining.png', null, null)!!} 

	<h4 class="side_link_heading">{!! Lang::get('messages.mining') !!}</h4>
	@if(Session::get('privileges')['loading'])
	{!! HTML::link('mining/loading', Lang::get('messages.loading'), array('class' => 'side_link','id' => 'loading'))!!}
	@endif
	@if(Session::get('privileges')['expense'])
	{!! HTML::link('mining/expense', Lang::get('messages.expense'), array('class' => 'side_link','id' => 'expense'))!!}
	@endif
	@if(Session::get('privileges')['diesel'])
	{!! HTML::link('mining/diesel', Lang::get('messages.diesel'), array('class' => 'side_link','id' => 'diesel'))!!}
	@endif
	@if(Session::get('privileges')['driver'])
	{!! HTML::link('mining/driver', Lang::get('messages.driver'), array('class' => 'side_link','id' => 'driver'))!!}
	@endif
	@if(Session::get('privileges')['vehicle'])
	{!! HTML::link('mining/vehicle', Lang::get('messages.vehicle'), array('class' => 'side_link','id' => 'vehicle'))!!} 
	@endif




	@stop

	@section('middle_right_DIV')



	@stop


