@extends('user.system')
@section('middle_right_DIV')

			<h4>{!! 'Edit Route' !!}</h4>
		{!! Form::open(array('route' => array('routee.update', $route->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">


			<li>
				{!! Form::label('code', 'Route Code') !!}
				{!! Form::text('code',$route->code,array('class' => 'form_element','readonly'=>'readonly')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Route Name' )!!}
				{!! Form::text('name',$route->name,array('class' => 'form_element','id'=>'name')) !!}
			</li>

	
			<li>
				<a href="{!!URL::to('routee')!!}" class="btn">{!! 'Back' !!}</a>
		        {!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
			<script>
                $( document ).ready(function() {
                    ///alert("changes");
                    document.getElementById('name').focus();
                });

			</script>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop