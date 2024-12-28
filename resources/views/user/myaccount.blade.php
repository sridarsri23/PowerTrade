@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Dashboard</h2>

	@stop

@section('middle_DIV')
		
			
		@stop

	@section('middle_left_DIV')

	{!!HTML::image('images/dashboard.png', null, null)!!} 

	<h4 class="side_link_heading">Dashboard</h4>

	{{--- HTML::link('myaccount/dashboard', Lang::get('messages.indicators'), array('class' => 'side_link','id' => 'indicators'))!!} --}}




	{{-- <a href="{!!URL::to('createc')!!}" class="btn" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%; " id="new_order">New Order + Client</a>

		@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['new_employee'])
	--}}

	@if(Session::get('privileges')['new_invoice'])
		<a href="invoice/create" class="btn" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%; " id="new_invoice">New Invoice</a>
	@endif


	@if(Session::get('privileges')['new_loading'])
	<a href="loading/create" class="btn" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%; " id="new_loading">New Loading</a>
	@endif


		@if(Session::get('privileges')['new_expense'])
	<a href="sales_expense/create" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%;" class="btn" id="new_sales_expense">New Sales Expense</a>
		@endif

	@if(Session::get('privileges')['new_driver_payment'])
	<a href="sales_expense/create" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%;" class="btn" id="new_sales_expense">New Driver Payment</a>
	@endif

	@if(Session::get('privileges')['view_invoice'])
	<a href="search_view_invoice_dashboard" style="width:180px;height:45px;font-size:18px;text-align:center;background-size: 10%;"  class="btn" id="settle_agent">Search Invoice</a>
	@endif
	@if(Session::get('privileges')['view_outlet'])
	<a href="search_view_outlet_dashboard" style="width:180px;height:45px;font-size:18px;text-align:center;background-size: 10%;"  class="btn" id="settle_agent">Search Outlet</a>
	@endif





	@stop

	@section('middle_right_DIV')


				<?php
						
						if (Session::has('success_message'))
							{

							    echo '<span class="success_message">'. Session::get('success_message').'</span>';
							    Session::forget('success_message');
							}
								
						if (Session::has('error_message'))
							{
							    echo '<span class="error_message">'. Session::get('error_message').'</span>';
							    Session::forget('error_message');
							}
														
						
			
					?>

				<div id="dashboard_wrapper">

					<h3> [[ Dashboard Content Area ]]</h3>

{{--
					<div id="dashboard_loading_div" class="fluid dashboard_div">
						<h4 class="dashboard__heading">Orders</h4>
							<div class="dashboard_div_img">
								{!! HTML::image('images/icons/order.png', null) !!}

							</div>

						<div class="dashboard_div_content">
							<ul>

								<li>
									{!!'SDR -> LKR Rate'. ' : '.App\Models\System::first()['sd_to_lkr']!!}
								</li>

								<li>
									{!!'Orders Count'. ' : '.\DB::table('order')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->count('id')!!}
								</li>
								<li>
									{!!'Total Orders LKR'. ' : '.\DB::table('order')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('to_currency_amount')!!}
								</li>
								<li>
									{!!'Total Orders SDR'. ' : '.\DB::table('order')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('from_currency_amount')!!}
								</li>
								<li>
									{!!'Total Orders Commission'. ' : '.\DB::table('order')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('comission_amount')!!}
								</li>
								<li>
									{!!'Total Un-Settled Orders LKR'. ' : '.\DB::table('order')->where('is_paid_to_agent','=',false)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('to_currency_amount')!!}
								</li>
								<li>
									{!!'Total Un-Settled  Orders SDR'. ' : '.\DB::table('order')->where('is_paid_to_agent','=',false)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('from_currency_amount')!!}
								</li>
								<li>
									{!!'Total Un-Settled Orders Commission'. ' : '.\DB::table('order')->where('is_paid_to_agent','=',false)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('comission_amount')!!}
								</li>

								<li>
									{!!'Credit Orders Count'. ' : '.\DB::table('order')->whereDate('is_credit', '=', true)->count('id')!!}
								</li>
								<li>
									{!!'Total Credit Orders LKR'. ' : '.\DB::table('order')->where('is_credit','=',true)->sum('to_currency_amount')!!}
								</li>
								<li>
									{!!'Total Credit Orders SDR'. ' : '.\DB::table('order')->where('is_credit','=',true)->sum('from_currency_amount')!!}
								</li>

							</ul>

						</div>


					</div>


					<div id="dashboard_loading_div" class="fluid dashboard_div">
						<h4 class="dashboard__heading">Today Settlements</h4>
							<div class="dashboard_div_img">
								{!! HTML::image('images/icons/settle_agnt.png', null) !!}

							</div>

						<div class="dashboard_div_content">
							<ul>

								<li>
									{!!'Agent Commission LKR/SDR'. ' : '.App\Models\System::first()['agent_commision_pcnt']!!}
								</li>
								<li>
									{!!'Settlement Count'. ' : '.\DB::table('settlement')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->count('id')!!}
								</li>

								<li>
									{!!'Total Day End LKR'. ' : '.\DB::table('settlement')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('lkr')!!}
								</li>
								<li>
									{!!'Total Day End SDR'. ' : '.\DB::table('settlement')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('sdr')!!}
								</li>
								<li>
									{!!'Total Day End Commission'. ' : '.\DB::table('settlement')->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('cmn')!!}
								</li>

							</ul>

						</div>


					</div>

                    @php

                        $agentList =App\Models\Agent::all();
                    @endphp

                    @foreach ($agentList as $agent)

                        <div id="dashboard_loading_div" class="fluid dashboard_div">
                            <h4 class="dashboard__heading">{!!  $agent->name .' | '.$agent->code!!}</h4>
                            <div class="dashboard_div_img">
                                {!! HTML::image('images/icons/agnt.png', null) !!}

                            </div>

                            <div class="dashboard_div_content">
                                <ul>

                                    <li>
                                        {!!'Credit Amount'. ' : '.  $agent->amount !!}
                                    </li>
                                    <li>
                                        {!!'Today Orders Count'. ' : '.\DB::table('order')->where('agent_id','=', $agent->id)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->count('id')!!}
                                    </li>
                                    <li>
                                        {!!'Today Settlement Count'. ' : '.\DB::table('settlement')->where('agent_id','=', $agent->id)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->count('id')!!}
                                    </li>

                                    <li>
                                        {!!'Today Total Day End LKR'. ' : '.\DB::table('settlement')->where('agent_id','=', $agent->id)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('lkr')!!}
                                    </li>
                                    <li>
                                        {!!'Today Total Day End SDR'. ' : '.\DB::table('settlement')->where('agent_id','=', $agent->id)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('sdr')!!}
                                    </li>
                                    <li>
                                        {!!'Today Total Day End Commission'. ' : '.\DB::table('settlement')->where('agent_id','=', $agent->id)->whereDate('date', '=', \Carbon\Carbon::today()->toDateString())->sum('cmn')!!}
                                    </li>

                                </ul>

                            </div>


                        </div>

                    @endforeach
--}}

			</div>


	@stop


