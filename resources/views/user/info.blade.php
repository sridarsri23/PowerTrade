@extends('layouts.layout')

@section('top_right_top_top_divi')
<a href="{!!URL::to('login')!!}" class="btn">Login</a>

@stop

@section('top_right_top_bottom_divi')

<a href="{!!URL::to('register')!!}" class="btn">Register</a>


@stop

@section('middle_right_DIV')





	{!!$message!!}



@stop