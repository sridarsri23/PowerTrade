@extends('user.system')
@section('middle_right_DIV')
	<div class="success_message">
		{!! Session::get('message') !!}


	</div>
	<div class="error_message">
		{!! Session::get('scs_errors') !!}


	</div>
@section('middle_right_DIV')

	<h4>Edit Lorry Expense</h4>


	{!! Form::open(array('route' => array('lorry_expense.update', $lorry_expense->id) ,'method' => 'PUT','files' => true)) !!}
	<ul class="form_UL">


		<li>

			{!! Form::label('lorry_id', 'Lorry') !!}
			{!!Form::select('lorry_id',$lorry_nos,$lorry->no,array('id'=>'lorry_id','class' => 'form_element'))!!}
		</li>




		<li>
			{!! Form::label('code','Code') !!}
			{!! Form::text('code',$lorry_expense->code,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}
		</li>

		<li>

			{!! Form::label('type', 'Type') !!}
			{!!Form::select('type', array('Maintenance'=>'Maintenance','Repair'=>'Repair','Upgrade'=>'Upgrade','Other'=>'Other'),$lorry_expense->type,array('id'=>'type','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('date', 'Date') !!}
			{!! Form::text('date',$lorry_expense->date,array('class' => 'form_element','id'=>'date')) !!}


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

			{!! Form::label('Expense Amount') !!}

			{!!Form::text('amount', $lorry_expense->amount,array('id'=>'amount','class' => 'form_element'))!!}


		</li>


		<li>
			{!! Form::label('note', 'Note') !!}
			{!! Form::textarea('note',$lorry_expense->note,array('class' => 'form_element')) !!}
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


		<script>

			var lorry_code;
			var current_lorrry_exp_code;
            $("#lorry_id").change(function(){
                ///alert("changes");
                var payments_code = <?php echo json_encode($lorryList); ?>;

                var selected_payment_id=$( "#lorry_id" ).val();
                var code_element = document.getElementById('code');
                var temp=payments_code[selected_payment_id];
                current_lorrry_exp_code = $( "#code" ).val();
              // alert(current_lorrry_exp_code);
              // alert(lorry_code);
                var temp_code=current_lorrry_exp_code.replace(lorry_code,temp);
                code_element.value=temp_code;
                current_lorrry_exp_code=temp_code;
                lorry_code = temp;
                //alert(outlet_code);

            });


            $( document ).ready(function() {
                ///alert("changes");
                lorry_code = <?php echo json_encode($lorry->code); ?>;
            });

		</script>


		<li>
			<a href="{!!URL::to('lorry.show/'.$lorry->id)!!}" class="btn" tabindex="-1">Back</a>
			{!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		</li>
	</ul>
	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop