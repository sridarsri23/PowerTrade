@extends('user.system')
@section('middle_right_DIV')
	<h4>Settle/Realise Cheque Noo: {!! $invoice->cheque_no !!}</h4>

	{!! Form::open(array('url' => 'complete_cheque_settle','method'=>'put' )) !!}
	<ul class="form_UL">

		<li>
			{!! Form::label('code', 'Invoice Code') !!}
			{!! Form::text('code',$invoice->code,array('class' => 'form_element')) !!}
		</li>

		<li>
			{!! Form::label('code', 'Invoice No') !!}
			{!! Form::text('invoice_no',$invoice->invoice_no,array('class' => 'form_element')) !!}
		</li>

		<li>
			{!! Form::label('date', 'Invoice Date') !!}
			{!! Form::text('date',$invoice->date,array('class' => 'form_element','id'=>'date')) !!}

		</li>


		<li>

			{!! Form::label('outlet', 'Outlet Name') !!}
			{!! Form::text('outlet',dtc\Models\Outlet::where('id','=',$invoice->outlet_id)->first()['name'],array('class' => 'form_element')) !!}
			{!! Form::text('invoice_id',$invoice->id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
			{!! Form::text('outlet_id',$invoice->outlet_id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
		</li>



		<li>
			{!! Form::label('code', 'Cheque No') !!}
			{!! Form::text('cheque_no',$invoice->cheque_no,array('class' => 'form_element')) !!}
		</li>
		<li>
			{!! Form::label('cheque_value', 'Cheque Value') !!}
			{!! Form::text('cheque_value',$invoice->cheque_value,array('id'=>'cheque_value','class' => 'form_element')) !!}
		</li>



		<li>
			{!! Form::label('date', 'Cheque Date') !!}
			{!! Form::text('date',$invoice->cheque_date,array('class' => 'form_element','id'=>'date')) !!}

		</li>





		<li>
			<a href="{!!URL::to('outlet')!!}" class="btn">Back</a>
			{!! Form::submit('Settle/Realise', array('class' => 'btn btn-primary','style'=>'width:200px;')) !!}
		</li>





	</ul>






	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop