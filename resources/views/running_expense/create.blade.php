@extends('user.system')
@section('middle_right_DIV')

			<h4>Create Running Expense</h4>
		{!! Form::open(array('route' => 'running_expense.store','files' => true)) !!}
		<ul class="form_UL">





			 <li>
		        {!! Form::label('code','Code') !!}
		        {!! Form::text('code',$code,array('class' => 'form_element','id'=>'code')) !!}
		    </li>

			<li>
				{!! Form::label('date', 'Date') !!}
				{!! Form::text('date',\Carbon\Carbon::now(),array('class' => 'form_element','id'=>'date')) !!}


				<script src="{!!URL::to('js/respond.min.js')!!}"></script>
				<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
				<script type="text/javascript" src="{!!URL::to('js/responsivemobilemenu.js')!!}"></script>
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>
				<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
				<script src="{!!URL::to('js/jquery.ezdz.js')!!}"></script>
				<script src="{!!URL::to('js/fotorama.js')!!}"></script>
				<script src="{!!URL::to('js/jquery.datetimepicker.js')!!}"></script>
				<script>

					$('#date').datetimepicker({

						format:'Y-m-d H:i',
						//defaultDate:'8.12.1986', // it's my birthday
						//defaultDate:'+03.01.1970', // it's my birthday
						//defaultTime:'07:30',
						timepickerScrollbar:true
					});

				</script>
			</li>


			<li>

				{!! Form::label('type', 'Type') !!}
				{!!Form::select('type', array('Electricity'=>'Electricity','Water'=>'Water','Tax'=>'Tax','Registration'=>'Registration','Printing'=>'Printing','Stationary'=>'Stationary','Petty Cash'=>'Petty Casy','Other'=>'Other'),'',array('id'=>'type','class' => 'form_element'))!!}
			</li>


			<li>

				{!! Form::label('Expense Amount') !!}


				{!!Form::text('amount', '',array('id'=>'amount','class' => 'form_element'))!!}


			</li>


			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

			<script>

	/*
				jQuery("#amount").blur(function() {
					//alert("hello");
					var vals= $( "#amount" ).val();
					var driver_diesel_element = document.getElementById('sdr');
					if($.isNumeric(vals) && vals>=0){

					return;
					}
					else{
						alert("Enter Numeric and Positive Value");
						driver_diesel_element.value='';
						$( "#amount" ).focus();


					}

				});

				
		*/


			</script>



			<li>
				<a href="{!!URL::to('running_expense')!!}" class="btn">Back</a>
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