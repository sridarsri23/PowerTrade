@extends('user.system')
@section('middle_right_DIV')

			<h4>{!! Lang::get('messages.edit_employee') !!}</h4>
		{!! Form::open(array('route' => array('employee.update', $employee->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">

			<li>
				{!! Form::label('code', Lang::get('messages.employee_code')) !!}
				{!! Form::text('code',$employee->code,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}
			</li>
			<li>
				{!! Form::label('name', Lang::get('messages.name')) !!}
				{!! Form::text('name',$employee->name,array('class' => 'form_element','id'=> 'employee_name')) !!}
			</li>



			<li>
				{!! Form::label('phone', Lang::get('messages.phone')) !!}
				{!! Form::text('phone',$employee->phone,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('address', Lang::get('messages.address')) !!}
				{!! Form::textarea('address',$employee->address,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('email', Lang::get('messages.email')) !!}
				{!! Form::text('email',$employee->email,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::hidden('can_login', 'No')!!}
				{!! Form::label('can_login', Lang::get('messages.can_login')) !!}
				{!! Form::checkbox('can_login','Yes',$employee->can_login,array('class' => 'form_element','id' => 'can_login')) !!}


			</li>
			<li class="password_li">
				{!! Form::label('password', Lang::get('messages.password',array('id' => 'password_label'))) !!}
				{!! Form::password('password',array('class' => 'form_element','id' => 'password')) !!}

			</li><li class="password_li">
				{!! Form::label('confirm_password', Lang::get('messages.confirm_password',array('id' => 'password_label'))) !!}
				{!! Form::password('confirm_password',array('class' => 'form_element','id' => 'confirm_password')) !!}

			</li>		<script>
                $( document ).ready(function() {
                    ///alert("changes");
                    document.getElementById('employee_name').focus();
                });

			</script>

			<script>
				$('#can_login').click(function(){

					var $this = $(this);
					var x;
					if ($this.is(':checked')) {

						//alert("checked");
						$('.password_li').show();


					} else {
						//alert("checked no");
						$('.password_li').hide();


					}

				});


			</script>

		    <li>
				<a href="{!!URL::to('employee')!!}" class="btn" tabindex = "-1">{!! Lang::get('messages.back') !!}</a>
		        {!! Form::submit(Lang::get('messages.edit'), array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop