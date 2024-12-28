@extends('layouts.layout')

@section('middle_right_DIV')
	<div class="success_message">
		{!! Session::get('message') !!}
		{{ Session::forget('message')}}

	</div>
	<div class="error_message">
		{!! Session::get('scs_errors') !!}
		{{ Session::forget('scs_errors')}}

		<ul class="login_form_UL">
	{!!Form::open(array('url' => 'userLogin', 'method' => 'POST', 'name' => '_token' , 'value'=>csrf_token() ))!!}
			<li>
				

			{!!Form::label('email', 'E Mail',array('class'=>'form_label'))!!}
			{!!Form::email('email','',array('class'=>'form_field'))!!}
			</li>

			<li>
	
	{!!$errors->first('email')!!}
				</li>
			<li>

			
			{!!Form::label('passWord', 'Password',array('class'=>'form_label'))!!}
			{!!Form::password('passWord',array('class'=>'form_field'))!!}

			</li>
			<li>
		{!!$errors->first('passWord')!!}

			</li>
	<li>
		
				{!!Form::submit('Login', array('class' => 'form_button'))!!}  <a  href="#">{!!Form::button('Cancel', array('class' => 'form_button'))!!}</a>

		</li>



			<li>{!!$errors->first('login_error')!!}	</li>
			<li>
	<a href="{!!URL::to('forgot_password')!!}" >Forgot Password?</a>
			</li>
			<br />
			<li>
		<a href="{!!URL::to('register')!!}">Register</a>


			</li>
{!!Form::close()!!}
</ul>





@stop

@section('middle_left_DIV')

<h3 style="color:#537b9f">Prioritized Modules</h3>

<ul align="left">
  <li>Products & Stocks</li>
  <li>Lorry</li>
  <li>Driver</li>
  <li>Loading</li>
  <li>Sales</li>
  <li>Unloading</li>
	<li>Expenses</li>
  <li>Returns</li>
  <li>Reports</li>
</ul>


<h3 style="color:#537b9f">Targeted Modules</h3>
<ul align="left">
  <li>Supplier</li>
  <li>Purchasing</li>
  <li>RAW Inventory</li>
	<li>Labour</li>
	<li>RAW Inventory</li>
	<li>Supplier Return</li>
 
</ul>
@stop

@section('bottom_DIV')
	<h6><a href="https://www.sridarsri.com"> <img src="images/logo_199x100.png" /></a> </h6>
			<h6> All Rights Reserved <a href="sridarsri.com">©Sridar | Sri  </a></h6>

@stop