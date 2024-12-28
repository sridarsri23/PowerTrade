@extends('user.agents')
@section('middle_right_DIV')
			<h4>Create New Agent</h4>
		{!! Form::open(array('route' => 'agent.store','files' => true)) !!}
		<ul class="form_UL">



			<li>
				{!! Form::label('code', 'Agent Code') !!}
				{!! Form::text('code',$code,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name','',array('class' => 'form_element')) !!}
			</li>
	<li>
				{!! Form::label('full_name', 'Full Name') !!}
				{!! Form::text('full_name','',array('class' => 'form_element')) !!}
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
				{!! Form::label('amount', "Credit Amount") !!}
				{!! Form::text('amount','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('cmn_pcnt', "Commission LKR/SGD") !!}
				{!! Form::text('cmn_pcnt','',array('class' => 'form_element')) !!}
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
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

		    <li>
				<a href="{!!URL::to('agent')!!}" class="btn">Back</a>
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