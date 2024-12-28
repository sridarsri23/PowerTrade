@extends('user.agents')
@section('middle_right_DIV')

			<h4>{!! 'Edit Agent' !!}</h4>
		{!! Form::open(array('route' => array('agent.update', $agent->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">


			<li>
				{!! Form::label('code', 'Agent Code') !!}
				{!! Form::text('code',$agent->code,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Agent Name' )!!}
				{!! Form::text('name',$agent->name,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('full_name', 'Agent Full Name' )!!}
				{!! Form::text('full_name',$agent->full_name,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('phone','Phone' )!!}
				{!! Form::text('phone',$agent->phone,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('email','Email') !!}
				{!! Form::text('email',$agent->email,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('address', 'Address') !!}
				{!! Form::textarea('address',$agent->address,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('amount', 'Credit Amount') !!}
				{!! Form::text('amount',$agent->amount,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('cmn_pcnt', 'Commission LKR/SGD') !!}
				{!! Form::text('cmn_pcnt',$agent->cmn_pcnt,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_1', 'Bank Account 1') !!}
				{!! Form::text('bank_acc_1',$agent->bank_acc_1,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_2', 'Bank Account 2') !!}
				{!! Form::text('bank_acc_2',$agent->bank_acc_2,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_3', 'Bank Account 3') !!}
				{!! Form::text('bank_acc_3',$agent->bank_acc_3,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('bank_acc_4', 'Bank Account 4') !!}
				{!! Form::text('bank_acc_4',$agent->bank_acc_4,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note',$agent->note,array('class' => 'form_element')) !!}
			</li>
			<li>
				<a href="{!!URL::to('agent')!!}" class="btn">{!! 'Back' !!}</a>
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