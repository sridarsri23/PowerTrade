@extends('user.clients')
@section('middle_right_DIV')

			<h4>Search Client</h4>
			{!! Form::open(array('url' => 'display_client','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>

				{!! Form::label('client_id', 'Client') !!}
				<div>
				{!!Form::select('client_id', $clients,'',array('data-placeholder'=>'Choose a Client...','id'=>'client_id','class' => 'form_element'))!!}
				</div>
			</li>


			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				$("#client_id").chosen({
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