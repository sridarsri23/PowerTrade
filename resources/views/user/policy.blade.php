@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop



@section('middle_center_div')




<h2 class="sub_heading">Policies/Regulations</h2> 

@stop


@section('middle_left_DIV')

{!!HTML::image('images/giver_icon.png', null, null)!!} 

<h4 class="side_link_heading">Policy</h4>

{!! HTML::link('policy/user', 'My Policies', array('class' => 'side_link'))!!} 
{!! HTML::link('policy/assign_product', 'Assign To Product', array('class' => 'side_link'))!!}





@stop
