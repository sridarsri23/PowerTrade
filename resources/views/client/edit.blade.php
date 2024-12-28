@extends('user.clients')
@section('middle_right_DIV')

			<h4>{!! 'Edit Client' !!}</h4>
		{!! Form::open(array('route' => array('client.update', $client->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">


			<li>
				{!! Form::label('code', 'Client Code') !!}
				{!! Form::text('code',$client->code,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Client Name' )!!}
				{!! Form::text('name',$client->name,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('full_name', 'Client Full Name' )!!}
				{!! Form::text('full_name',$client->full_name,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('phone','Phone 1' )!!}
				{!! Form::text('phone',$client->phone,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('phone2','Phone 2' )!!}
				{!! Form::text('phone2',$client->phone2,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('email','Email') !!}
				{!! Form::text('email',$client->email,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('address', 'Address') !!}
				{!! Form::textarea('address',$client->address,array('class' => 'form_element')) !!}
			</li>


			<li>
				{!! Form::label('bank_acc_1', 'Bank Account 1') !!}
				{!! Form::text('bank_acc_1',$client->bank_acc_1,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_2', 'Bank Account 2') !!}
				{!! Form::text('bank_acc_2',$client->bank_acc_2,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_3', 'Bank Account 3') !!}
				{!! Form::text('bank_acc_3',$client->bank_acc_3,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_4', 'Bank Account 4') !!}
				{!! Form::text('bank_acc_4',$client->bank_acc_4,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_5', 'Bank Account 5') !!}
				{!! Form::text('bank_acc_5',$client->bank_acc_5,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_6', 'Bank Account 6') !!}
				{!! Form::text('bank_acc_6',$client->bank_acc_6,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_7', 'Bank Account 7') !!}
				{!! Form::text('bank_acc_7',$client->bank_acc_7,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('bank_acc_8', 'Bank Account 8') !!}
				{!! Form::text('bank_acc_8',$client->bank_acc_8,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note',$client->note,array('class' => 'form_element')) !!}
			</li>
			<li>
				<a href="{!!URL::to('client')!!}" class="btn">{!! 'Back' !!}</a>
		        {!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop