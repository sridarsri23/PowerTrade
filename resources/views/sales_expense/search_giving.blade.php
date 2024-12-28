@extends('user.agents')
@section('middle_right_DIV')

			<h4>Search Giving</h4>
			{!! Form::open(array('url' => 'display_giving','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>

				{!! Form::label('giving_id', 'Giving') !!}
				<div>
				{!!Form::select('giving_id', $givings,'',array('data-placeholder'=>'Choose a Giving...','id'=>'giving_id','class' => 'form_element'))!!}
				</div>
			</li>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				$("#giving_id").chosen();
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