@extends('user.sales')
@section('middle_right_DIV')

	<?php

	if (Session::has('success_message'))
	{

		echo '<span class="success_message">'. Session::get('success_message').'</span>';
		Session::forget('success_message');
	}

	if (Session::has('error_message'))
	{
		echo '<span class="error_message">'. Session::get('error_message').'</span>';
		Session::forget('error_message');
	}



	?>
			<h4>Search Sales For Many Invoices</h4>
			{!! Form::open(array('url' => 'search_create_many','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>

				{!! Form::label('sales_id', 'Sales Code') !!}
				<div>
				{!!Form::select('sales_id', $sales,'',array('data-placeholder'=>'Choose a Sale','id'=>'sales_id','class' => 'form_element'))!!}
				</div>
			</li>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				//$("#sales_id").chosen();

				$("#sales_id").chosen({
					no_results_text: "Oops, nothing found!",
					search_contains: true,
					allow_single_deselect: true
				});
			</script>

			<script>
                $( document ).ready(function() {
                    ///alert("changes");
                    $(".chosen-search input").focus();
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