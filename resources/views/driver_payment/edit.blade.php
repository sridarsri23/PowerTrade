@extends('user.system')
@section('middle_right_DIV')
	<div class="success_message">
		{!! Session::get('message') !!}


	</div>
	<div class="error_message">
		{!! Session::get('scs_errors') !!}


	</div>
@section('middle_right_DIV')

	<h4>Edit Driver Payment</h4>


	{!! Form::open(array('route' => array('driver_payment.update', $driver_payment->id) ,'method' => 'PUT','files' => true)) !!}
	<ul class="form_UL">


		<li>

			{!! Form::label('driver_id', 'Employee') !!}
			{!!Form::select('driver_id',$driver_nos,$driver_payment->driver_id,array('id'=>'driver_id','class' => 'form_element'))!!}
		</li>




		<li>
			{!! Form::label('code','Code') !!}
			{!! Form::text('code',$driver_payment->code,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}
		</li>

		<li>

			{!! Form::label('type', 'Type') !!}
			{!!Form::select('type', array('Maintenance'=>'Maintenance','Repair'=>'Repair','Upgrade'=>'Upgrade','Other'=>'Other'),$driver_payment->type,array('id'=>'type','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('date', 'Date') !!}
			{!! Form::text('date',$driver_payment->date,array('class' => 'form_element','id'=>'date')) !!}


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

			{!!Form::text('amount', $driver_payment->amount,array('id'=>'amount','class' => 'form_element'))!!}


		</li>


		<li>
			{!! Form::label('note', 'Note') !!}
			{!! Form::textarea('note',$driver_payment->note,array('class' => 'form_element')) !!}
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

			var driver_code;
			var current_lorrry_exp_code;
            $("#driver_id").change(function(){
                ///alert("changes");
                var payments_code = <?php echo json_encode($driverList); ?>;

                var selected_payment_id=$( "#driver_id" ).val();
                var code_element = document.getElementById('code');
                var temp=payments_code[selected_payment_id];
                current_lorrry_exp_code = $( "#code" ).val();
              // alert(current_lorrry_exp_code);
              // alert(driver_code);
                var temp_code=current_lorrry_exp_code.replace(driver_code,temp);
                code_element.value=temp_code;
                current_lorrry_exp_code=temp_code;
                driver_code = temp;
                //alert(outlet_code);

            });


            $( document ).ready(function() {
                ///alert("changes");
                driver_code = <?php echo json_encode($driver->code); ?>;
            });

		</script>


		<li>
			<a href="{!!URL::to('driver.show/'.$driver_payment->id)!!}" class="btn" tabindex="-1">Back</a>
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