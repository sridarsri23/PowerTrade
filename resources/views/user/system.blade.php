@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Options</h2>

	@stop

@section('middle_DIV')


@stop

	@section('middle_left_DIV')

	{!!HTML::image('images/system.png', null, null)!!} 

	<h4 class="side_link_heading">Options</h4>

	@if(Session::get('privileges')['route'])
		{!! HTML::link('routee', 'Route', array('class' => 'side_link','id' => 'setup'))!!}
	@endif

	@if(Session::get('privileges')['outlet'])
		{!! HTML::link('outlet', 'Outlet', array('class' => 'side_link','id' => 'setup'))!!}
	@endif


	@if(Session::get('privileges')['lorry'])
		{!! HTML::link('lorry', 'Lorry', array('class' => 'side_link','id' => 'setup'))!!}
	@endif
	@if(Session::get('privileges')['employee'])
		{!! HTML::link('employee', 'Employee', array('class' => 'side_link','id' => 'employee'))!!}
	@endif

	@if(Session::get('privileges')['driver'])
		{!! HTML::link('driver', 'Driver', array('class' => 'side_link','id' => 'setup'))!!}
	@endif

	@if(Session::get('privileges')['running_expense'])
		{!! HTML::link('running_expense', 'Running Expense', array('class' => 'side_link','id' => 'running_expense'))!!}
	@endif


	{{--
	{!! HTML::link('system/mysetup', 'Setup', array('class' => 'side_link','id' => 'setup'))!!}
	--}}
	@if(Session::get('privileges')['privileges'])
		{!! HTML::link('privileges', 'Privileges', array('class' => 'side_link','id' => 'privileges'))!!}
	@endif
	@if(Session::get('privileges')['log'])
		{!! HTML::link('logs', 'Logs', array('class' => 'side_link','id' => 'privileges', 'target'=>'_blank'))!!}
	@endif









	@stop

@section('middle_right_DIV')

@stop
