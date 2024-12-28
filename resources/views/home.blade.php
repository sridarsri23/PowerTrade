@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Dashboardd</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/dashboard.png', null, null)!!} 

	<h4 class="side_link_heading">Dashboard</h4>

	{{--- HTML::link('myaccount/dashboard', Lang::get('messages.indicators'), array('class' => 'side_link','id' => 'indicators'))!!} --}}



	<a href="{!!URL::to('mining/loading/create')!!}" class="btn" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%; " id="new_loading">New Payment Request</a>



	<a href="{!!URL::to('mining/expense/create')!!}" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%;" class="btn" id="new_expense">New Payment Request</a>



	<a href="{!!URL::to('office/attendance/create')!!}" style="width:180px;height:45px;font-size:14px;text-align:right;background-size: 20%;"  class="btn" id="new_attendance">New Payment Request</a>



	<a href="{!!URL::to('office/payment_request/create')!!}" style="width:180px;height:45px;font-size:11px;text-align:right;vertical-align:center;background-size: 18%;"  class="btn" id="new_payment_request">New Payment Request</a>




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


					<div id="dashboard_loading_div" class="fluid dashboard_div">
						<h4 class="dashboard__heading">{!! Lang::get('messages.loading') !!}</h4>
							<div class="dashboard_div_img">
								{!! HTML::image('images/icons/loading.png', null) !!}

							</div>
							<div class="dashboard_div_content">
								<ul>
									<li>
										{!! Lang::get('messages.alltime_loading'). ' : '.\DB::table('loading')->where('is_deleted','=',false)->sum('loading_qty')!!}
									</li>
									<li>
										{!! Lang::get('messages.alltime_not_confirmed_loading'). ' : '.\DB::table('loading')->where('is_deleted','=',false)->where('is_confirmed','=',false)->sum('loading_qty')!!}
									</li>
									<li>
										{!! Lang::get('messages.alltime_actual_loading'). ' : '.\DB::table('loading')->where('is_deleted','=',false)->where('is_confirmed','=',true)->sum('loading_qty')!!}
									</li>
									<li>
										{!!Lang::get('messages.today_total_loading'). ' : '.\DB::table('loading')->where('is_deleted','=',false)->whereDate('loading_time', '=', \Carbon\Carbon::today()->toDateString())->sum('loading_qty')!!}
									</li>
									<li>
										{!!Lang::get('messages.today_not_confirmed_loading'). ' : '.\DB::table('loading')->where('is_deleted','=',false)->where('is_confirmed','=',false)->whereDate('loading_time', '=', \Carbon\Carbon::today()->toDateString())->sum('loading_qty')!!}
									</li>
									<li>
										{!! Lang::get('messages.today_actual_loading'). ' : '.\DB::table('loading')->where('is_deleted','=',false)->where('is_confirmed','=',true)->whereDate('loading_time', '=', \Carbon\Carbon::today()->toDateString())->sum('loading_qty')!!}
									</li>


								</ul>

							</div>


					</div>





			</div>


	@stop


