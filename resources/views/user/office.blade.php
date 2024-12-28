@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">{!! Lang::get('messages.office') !!}</h2> 

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/office.png', null, null)!!} 

	<h4 class="side_link_heading">{!! Lang::get('messages.office') !!}</h4>

	@if(Session::get('privileges')['attendance'])
	{!! HTML::link('office/attendance', Lang::get('messages.attendance'), array('class' => 'side_link','id' => 'attendance'))!!}
	@endif
	@if(Session::get('privileges')['payment_request'])
	{!! HTML::link('office/payment_request', Lang::get('messages.payment_request'), array('class' => 'side_link','id' => 'payment_request'))!!}
	@endif
	@if(Session::get('privileges')['payment'])
	{!! HTML::link('office/payment', Lang::get('messages.payment'), array('class' => 'side_link','id' => 'payment'))!!}
	@endif
	@if(Session::get('privileges')['advance'])
	{!! HTML::link('office/advance', Lang::get('messages.advance'), array('class' => 'side_link','id' => 'advance'))!!}
	@endif
	@if(Session::get('privileges')['point_incharge'])
	{!! HTML::link('office/point_incharge', Lang::get('messages.point_incharge'), array('class' => 'side_link','id' => 'point_incharge'))!!}
	@endif
	@if(Session::get('privileges')['order'])
	{!! HTML::link('office/order', Lang::get('messages.order'), array('class' => 'side_link','id' => 'order'))!!}
	@endif





	@stop

	@section('middle_right_DIV')



	@stop


