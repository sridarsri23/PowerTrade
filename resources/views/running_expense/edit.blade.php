@extends('user.system')
@section('middle_right_DIV')

			<h4>Edit Running Expense</h4>
			{!! Form::open(array('route' => array('running_expense.update', $running_expense->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">




			

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>










			 <li>
		        {!! Form::label('code','Running Expense Code') !!}
		        {!! Form::text('code',$running_expense->code,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}
		    </li>

			<li>
				{!! Form::label('date', 'Date') !!}
				{!! Form::text('date',$running_expense->date,array('class' => 'form_element','id'=>'date')) !!}

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

				{!! Form::label('amount', 'SalesRunning Expense') !!}

				{!!Form::text('amount',$running_expense->amount,array('id'=>'amount','class' => 'form_element'))!!}


			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note',$running_expense->note,array('class' => 'form_element')) !!}
			</li>

			<script>


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

				




			</script>


			<li>
		
				<a href="{!!URL::to('running_expense')!!}" class="btn" tabindex = "-1">Back</a>
		        {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop