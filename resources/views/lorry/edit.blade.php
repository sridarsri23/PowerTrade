@extends('user.system')
@section('middle_right_DIV')

			<h4>{!! 'Edit Lorry' !!}</h4>
		{!! Form::open(array('route' => array('lorry.update', $lorry->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">


			<li>
				{!! Form::label('code', 'Lorry Code') !!}
				{!! Form::text('code',$lorry->code,array('class' => 'form_element','readonly'=>'readonly')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Lorry No' )!!}
				{!! Form::text('name',$lorry->no,array('class' => 'form_element','id'=>'lorry_no')) !!}
			</li>

			<li>
				<a href="{!!URL::to('lorry')!!}" class="btn"  class="btn" tabindex = "-1">{!! 'Back' !!}</a>
		        {!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>	<script>
                $( document ).ready(function() {
                    ///alert("changes");
                    document.getElementById('lorry_no').focus();
                });

			</script>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop