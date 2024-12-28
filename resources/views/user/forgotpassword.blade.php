@extends('layouts.layout')

@section('bottom_DIV')



<h3>Enter Your Registered Email.</h3>

	{!!Form::open(array('url' => 'forgot_PWD', 'method' => 'PUT'));!!}

				<p>{!!

			Form::label('email', 'E Mail');!!}

			{!!Form::email('email');!!}

			</p>

				{!!$errors->first('email');!!}

			<p>{!!

			Form::submit('Reset Password');!!}

			</p>

			{!!$errors->first('forgot_password_error');!!}

	{!!Form::close();!!}



	

@stop