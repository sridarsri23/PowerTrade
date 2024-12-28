@extends('user.agents')
@section('middle_right_DIV')

			<h4>Search Day End</h4>
			{!! Form::open(array('url' => 'display_settlement','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>

				{!! Form::label('settlement_id', 'Day End') !!}
				<div>
				{!!Form::select('settlement_id', $settlements,'',array('data-placeholder'=>'Choose a Day End...','id'=>'settlement_id','class' => 'form_element'))!!}
				</div>
			</li>

			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">


				$("#settlement_id").chosen();
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