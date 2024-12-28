@extends('user.system')
@section('middle_right_DIV')
			<h4>Create New Driver</h4>
		{!! Form::open(array('route' => 'driver.store','files' => true)) !!}
		<ul class="form_UL">



			<li>
				{!! Form::label('code', 'Driver Code') !!}
				{!! Form::text('code',$code,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name','',array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('phone', 'Phone') !!}
				{!! Form::text('phone','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('address', 'Address') !!}
				{!! Form::textarea('address','',array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

		    <li>
				<a href="{!!URL::to('driver')!!}" class="btn">Back</a>
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