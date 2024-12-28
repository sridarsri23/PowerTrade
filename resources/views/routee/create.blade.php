@extends('user.system')
@section('middle_right_DIV')
			<h4>Create New Route</h4>
		{!! Form::open(array('route' => 'routee.store','files' => true)) !!}
		<ul class="form_UL">



			<li>
				{!! Form::label('code', 'Route Code') !!}
				{!! Form::text('code',$code,array('class' => 'form_element','readonly'=>'readonly')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name','',array('class' => 'form_element','id'=>'name')) !!}
			</li>


		    <li>
				<a href="{!!URL::to('routee')!!}" class="btn" tabindex = "-1">Back</a>
		        {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
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