@extends('user.orders')
@section('middle_right_DIV')

			<h4>Search Order</h4>
			{!! Form::open(array('url' => 'display_order','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>

				{!! Form::label('order_id', 'Order') !!}
				<div>
				{!!Form::select('order_id', $orders,'',array('data-placeholder'=>'Choose a Order...','id'=>'order_id','class' => 'form_element'))!!}
				</div>
			</li>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				//$("#order_id").chosen();
				$("#order_id").chosen({
					no_results_text: "Oops, nothing found!",
					search_contains: true,
					allow_single_deselect: true
				});
			</script>



			<li>

		        {!! Form::submit('View', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop