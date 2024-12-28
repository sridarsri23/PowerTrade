@extends('layouts.my_account_layout')


@section('middle_left_DIV')

{!!HTML::image('images/giver_icon.png', null, null)!!} 

<h4 class="side_link_heading">Transporter</h4>

{!! HTML::link('transport/transport_medium', 'Transport Medium', array('class' => 'side_link'))!!} 
{!! HTML::link('transport/troute', 'Routes', array('class' => 'side_link'))!!} 






@stop
	@section('middle_right_DIV')



	@stop