@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">{!! Lang::get('messages.reports') !!}</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/reports.png', null, null)!!} 

	<h4 class="side_link_heading">{!! Lang::get('messages.reports') !!}</h4>
	@if(Session::get('privileges')['day_sheet'])
	{!! HTML::link('day_sheet_report', Lang::get('messages.day_sheet'), array('class' => 'side_link','id' => 'day_sheet'))!!}
	@endif
	@if(Session::get('privileges')['cash_book'])
	{!! HTML::link('period_cash_book', Lang::get('messages.cash_book'), array('class' => 'side_link','id' => 'cash_book'))!!}
	@endif

	@if(Session::get('privileges')['lorry_transport_bill'])
	{!! HTML::link('lorry_transport_bill', Lang::get('messages.lorry_transport_bill'), array('class' => 'side_link','id' => 'lorry_transport_bill'))!!}
	@endif
	@if(Session::get('privileges')['company_bill'])
	{!! HTML::link('treport', Lang::get('messages.company_bill'), array('class' => 'side_link','id' => 'company_bill','target'=>'_top'))!!}
	@endif
	@if(Session::get('privileges')['log'])
	{!! HTML::link('logs', Lang::get('messages.log'), array('class' => 'side_link','id' => 'log','target'=>'_blank'))!!}
	@endif




	@stop

	@section('middle_right_DIV')



	@stop


