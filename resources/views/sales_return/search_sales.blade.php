@extends('user.sales')
@section('middle_right_DIV')

			<h4>Search Invoices</h4>
			{!! Form::open(array('url' => 'search_create_sales_return','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>

				{!! Form::label('invoice_id', 'Invoice No') !!}
				<div>
				{!!Form::select('invoice_id', $invoices,'',array('data-placeholder'=>'Choose a Invoice','id'=>'invoice_id','class' => 'form_element'))!!}
				</div>
			</li>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				//$("#sales_id").chosen();

				$("#invoice_id").chosen({
					no_results_text: "Oops, nothing found!",
					search_contains: true,
					allow_single_deselect: true
				});
			</script>



			<li>

		        {!! Form::submit('Go', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop