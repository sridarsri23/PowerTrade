@extends('user.sales')
@section('middle_right_DIV')

			<h4>Search Outlets</h4>
			{!! Form::open(array('url' => 'search_view_outlet','method'=>'put' )) !!}
		<ul class="search_form_UL">



			<li>


				<label style="margin-right: 30px;">Search Outlet :</label>
				{!!Form::select('outlet_id', $outlets,'',array('data-placeholder'=>'Choose a Outlet','id'=>'outlet_id','class' => 'form_element'))!!}
				{!! Form::submit('Go', array('class' => 'btn btn-primary')) !!}
			</li>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				//$("#outlet_id").chosen();

				$("#outlet_id").chosen({
					no_results_text: "Oops, nothing found!",
					search_contains: true,
					allow_single_deselect: true
				});
			</script>



			<li>


		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop