@extends('user.system')
@section('middle_right_DIV')
	<div class="success_message">
		{!! Session::get('message') !!}


	</div>
	<div class="error_message">
		{!! Session::get('scs_errors') !!}


	</div>
@section('middle_right_DIV')

	<h4>Create Lorry Expense</h4>

	{!! Form::open(array('route' => 'lorry_expense.store','files' => true)) !!}
	<ul class="form_UL">


		<li>

			{!! Form::label('lorry_id', 'Lorry') !!}
			{!!Form::select('lorry_id', $lorry_nos,'',array('id'=>'lorry_id','class' => 'form_element'))!!}
		</li>




		<li>
			{!! Form::label('code','Code') !!}
			{!! Form::text('code',$code,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}
		</li>

		<li>

			{!! Form::label('type', 'Sales') !!}
			{!!Form::select('type', array('Maintenance'=>'Maintenance','Repair'=>'Repair','Upgrade'=>'Upgrade','Other'=>'Other'),'',array('id'=>'type','class' => 'form_element'))!!}
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

		<script>
            $("#lorry_id").change(function(){
                ///alert("changes");
                var payments_code = <?php echo json_encode($lorryList); ?>;
                var outlet_code = <?php echo json_encode($code); ?>;
                var selected_payment_id=$( "#lorry_id" ).val();
                var code_element = document.getElementById('code');
                var temp=payments_code[selected_payment_id];
                //alert(temp);
                //var temp_code=default_diesel_code.replace(default_payment_code,temp)
                code_element.value=temp+"\\"+outlet_code;
                //alert(outlet_code);

            });

            $( document ).ready(function() {
                ///alert("changes");
                var payments_code = <?php echo json_encode($lorryList); ?>;
                var outlet_code = <?php echo json_encode($code); ?>;
                var selected_payment_id=$( "#lorry_id" ).val();
                var code_element = document.getElementById('code');
                var temp=payments_code[selected_payment_id];
                //alert(temp);
                //var temp_code=default_diesel_code.replace(default_payment_code,temp)
                code_element.value=temp+"\\"+outlet_code;
                //alert(outlet_code);

                $( document ).ready(function() {
                    ///alert("changes");
                    document.getElementById('lorry_id').focus();
                });
            });


		</script>


		<li>
			<a href="{!!URL::to('lorry')!!}" class="btn" tabindex="-1">Back</a>
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