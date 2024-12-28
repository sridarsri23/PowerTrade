@extends('user.system')
@section('middle_right_DIV')
			<h4>Create New Lorry</h4>
		{!! Form::open(array('route' => 'lorry.store','files' => true)) !!}
		<ul class="form_UL">



			<li>
				{!! Form::label('code', 'Lorry Code') !!}
				{!! Form::text('code',$code,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('no', 'No') !!}
				{!! Form::text('no','',array('class' => 'form_element')) !!}
			</li>


		    <li>
				<a href="{!!URL::to('Lorry')!!}" class="btn" tabindex = "-1">Back</a>
		        {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop