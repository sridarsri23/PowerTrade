@extends('layouts.layout')

@section('middle_right_DIV')





	{!!Form::open(array('url' => 'reset_password', 'method' => 'PUT'));!!}

				<p>{!!

			Form::label('passWord', 'Pass Word');!!}

			{!!Form::password('passWord');!!}

			</p>

			{!!$errors->first('passWord');!!}



				{!!Form::hidden('confirmation_code',$code);!!}

			<p>{!!

			Form::submit('Reset Password');!!}

			</p>

			{!!$errors->first('set_pwd_error');!!}

	{!!Form::close();!!}



@stop