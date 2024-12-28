@extends('user.clients')
@section('middle_right_DIV')
			<h4>Create New Client</h4>
		{!! Form::open(array('route' => 'client.store','files' => true)) !!}
		<ul class="form_UL">



			<li>
				{!! Form::label('code', 'Client Code') !!}
				{!! Form::text('code',$code,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Name/Code') !!}
				{!! Form::text('name','',array('class' => 'form_element')) !!}
			</li>
	<li>
				{!! Form::label('full_name', 'Full Name') !!}
				{!! Form::text('full_name','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('phone', 'Phone 1') !!}
				{!! Form::text('phone','',array('class' => 'form_element')) !!}
			</li>
            <li>
                {!! Form::label('phone2', 'Phone 2') !!}
                {!! Form::text('phone2','',array('class' => 'form_element')) !!}
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
				{!! Form::label('bank_acc_1', "Bank Account 1") !!}
				{!! Form::text('bank_acc_1','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_2', "Bank Account 2") !!}
				{!! Form::text('bank_acc_2','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_3', "Bank Account 3") !!}
				{!! Form::text('bank_acc_3','',array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_4', "Bank Account 4") !!}
				{!! Form::text('bank_acc_4','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_5', "Bank Account 5") !!}
				{!! Form::text('bank_acc_5','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_6', "Bank Account 6") !!}
				{!! Form::text('bank_acc_6','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_7', "Bank Account 7") !!}
				{!! Form::text('bank_acc_7','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_8', "Bank Account 8") !!}
				{!! Form::text('bank_acc_8','',array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

		    <li>
				<a href="{!!URL::to('client')!!}" class="btn">Back</a>
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