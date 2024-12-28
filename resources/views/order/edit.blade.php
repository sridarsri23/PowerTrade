@extends('user.orders')
@section('middle_right_DIV')

			<h4>Edit Order</h4>
			{!! Form::open(array('route' => array('order.update', $order->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">


			<li>

				{!! Form::label('agent_id', 'Agent') !!}
				{!!Form::select('agent_id', $agents,$order->agent_id,array('id'=>'agent_id','class' => 'form_element'))!!}
			</li>

			<li>

				{!! Form::label('client_id', 'Client') !!}
				<div>
				{!!Form::select('client_id', $clients,$order->client_id,array('data-placeholder'=>'Choose a Client...','id'=>'client_id','class' => 'form_element'))!!}
				</div>
			</li>



			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
			<script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


			<script type="text/javascript">
				/*
				var config = {
					'.chosen-select'           : {},
					'.chosen-select-deselect'  : {allow_single_deselect:true},
					'.chosen-select-no-single' : {disable_search_threshold:10},
					'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
					'.chosen-select-width'     : {width:"95%"}
				};
				for (var selector in config) {
					$(selector).chosen(config[selector]);
				};
*/
				$("#client_id").chosen();
			</script>

			<script>




				$("#agent_id").change(function(){

					var sites_code = <?php echo json_encode($agents_code); ?>;
					var selected_site_id=$( "#agent_id" ).val();
					var employee_code=$( "#code" ).val();
					var code_element = document.getElementById('code');
					var res = default_full_point_code.replace(default_site_code, sites_code[selected_site_id]);
					code_element.value=res;//sites_code[selected_site_id]+'/';

					default_site_code=sites_code[selected_site_id];
					default_full_point_code=res;
					default_full_point_code_helper=res;
				});

				var default_site_code;
				var default_company_code;
				var default_driver_type_code;
				var default_full_point_code;
				var default_full_point_code_helper;

				$("#client_id").change(function(){

					var companies_code = <?php echo json_encode($clients_code); ?>;
					var selected_company_id=$( "#client_id" ).val();
					var employee_code=$( "#code" ).val();

					var code_element = document.getElementById('code');

					var res = default_full_point_code_helper.replace(default_company_code, companies_code[selected_company_id]);
					code_element.value=res;//companies_code[selected_site_id]+'/';
					default_company_code=companies_code[selected_company_id];
					default_full_point_code_helper=res;
					default_full_point_code=res;

					var foods = <?php echo json_encode($food_groups); ?>;
					$('#client_bank_acc').html('');

					jQuery.each(foods, function( index, value ) {
						//console.log( 'site '+index +' user '+ value + ' selected site'+selected_vehicle);
					//	alert("in");
					//alert( index +' '+ value  +' in');
						if(selected_company_id == index ){
								 //alert( foods[selected_company_id][0]);
								// alert( foods[selected_company_id][1]);
								// alert( foods[selected_company_id][2]);
							$('#client_bank_acc').append('<option value="' +  foods[selected_company_id][0] + '">' +  foods[selected_company_id][0] + '</option>');
							$('#client_bank_acc').append('<option value="' +  foods[selected_company_id][1] + '">' +  foods[selected_company_id][1] + '</option>');
							$('#client_bank_acc').append('<option value="' +  foods[selected_company_id][2] + '">' +  foods[selected_company_id][2] + '</option>');
							$('#client_bank_acc').append('<option value="' +  foods[selected_company_id][3] + '">' +  foods[selected_company_id][3] + '</option>');
						//	var selected_match=value;

							//$.each(employees, function( indexx, valuee ) {
							//console.log( selected_match+' '+valuee +' '+ indexx  +' inn');

							//	if(selected_match==indexx) {
							//	alert( ' innnn');
							//$("#driver_id").val(selected_match);
							//$('#user_id').append('<option value="' + indexx + '">' + valuee + '</option>');


							//}
							//});
						}});


				});

				$( document ).ready(function() {
					var sites_code = <?php echo json_encode($agents_code); ?>;
					var selected_site_id=$( "#agent_id" ).val();
					var companies_code = <?php echo json_encode($clients_code); ?>;
					var selected_company_id=$( "#client_id" ).val();


					var code_element = document.getElementById('code');
					var coder =code_element.value;
					default_site_code=sites_code[selected_site_id];
					default_company_code=companies_code[selected_company_id];
					default_full_point_code=coder;
					code_element.value=default_full_point_code;
					default_full_point_code_helper=default_full_point_code;
					//$("#client_id").prepend("<option value='' selected='selected'>Choose Client</option>");

				});

			</script>
		



			 <li>
		        {!! Form::label('code','Order Code') !!}
		        {!! Form::text('code',$order->code,array('class' => 'form_element','id'=>'code')) !!}
		    </li>

			<li>
				{!! Form::label('date', 'Date') !!}
				{!! Form::text('date',$order->date,array('class' => 'form_element','id'=>'date')) !!}

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

				{!! Form::label('from_currency_amount', 'From Currency Amount') !!}

				{!!Form::text('from_currency_amount',$order->from_currency_amount,array('id'=>'from_currency_amount','class' => 'form_element'))!!}


			</li>
			<li>

                {!! Form::hidden('currency_rate', $setups->sd_to_lkr) !!}
                {!! Form::hidden('commission_pcnt', $setups->agent_commision_pcnt) !!}
                {!! Form::label('sd_to_lkr', 'From Currency Rate : '.$setups->sd_to_lkr) !!}
				{!! Form::button('Convert into To Currency', array('id' => 'sdr_btn','class' => 'form_element')) !!}

			</li>
			<li>

				{!! Form::label('to_currency_amount', 'To Currency Amount') !!}

				{!!Form::text('to_currency_amount', $order->to_currency_amount,array('id'=>'to_currency_amount','class' => 'form_element'))!!}

			</li>
			<li>

                {!! Form::label('sd_to_lkr', 'To Currency Rate : '.round((1/$setups->sd_to_lkr), 2)) !!}
				{!! Form::button('Convert to From Currency', array('id' => 'lkr_btn','class' => 'form_element')) !!}

			</li>

			<li>

				{!! Form::label('comission_amount', 'Agent Commission Amount') !!}

				{!!Form::text('comission_amount', $order->comission_amount,array('id'=>'comission_amount','class' => 'form_element'))!!}

			</li>


			<li>


				{!! Form::label('client_bank_acc','Client Bank Account') !!}

				{!!Form::select('client_bank_acc', $temp_client_bank_accounts,$order->client_bank_acc,array('id'=>'client_bank_acc','class' => 'form_element'))!!}
			</li>


			<script>


				$('#sdr_btn').click(function(){
					//alert("The paragraph was clicked.");
					var setups = <?php echo json_encode($setups); ?>;
					var entered_from_currency_amount=$( "#from_currency_amount" ).val();
					var sdr_to_lkr_rate= setups['sd_to_lkr'];
					var to_currency_amount_element = document.getElementById('to_currency_amount');
					var temp1=entered_from_currency_amount*sdr_to_lkr_rate;
					var result=Math.round(temp1 * 100) / 100;
					to_currency_amount_element.value=result;

					var comm_pcnt=setups['agent_commision_pcnt'];
					var agent_commision_element = document.getElementById('comission_amount');
					agent_commision_element.value=entered_from_currency_amount*comm_pcnt;

				});

				$('#lkr_btn').click(function(){
					//alert("The paragraph was clicked.");
					var setups = <?php echo json_encode($setups); ?>;
					var entered_to_currency_amount=$( "#to_currency_amount" ).val();
					var lkr_to_sd_rate= setups['sd_to_lkr'];
					var from_currency_amount_element = document.getElementById('from_currency_amount');
					var temp2=entered_to_currency_amount/lkr_to_sd_rate;
					var result=Math.round(temp2 * 100) / 100;
					from_currency_amount_element.value=result;
					var comm_pcnt=setups['agent_commision_pcnt'];
					var agent_commision_element = document.getElementById('comission_amount');
					agent_commision_element.value=result*comm_pcnt;


				});


			</script>

			<li>  {!! Form::hidden('is_credit',false) !!}
				{!! Form::label('is_credit', 'Is Credit?') !!}
				{!! Form::checkbox('is_credit','Yes',$order->is_credit,array('class' => 'form_element','id'=>'is_credit')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note',$order->note,array('class' => 'form_element')) !!}
			</li>

			<script>


				jQuery("#from_currency_amount").blur(function() {
					//alert("hello");
					var vals= $( "#from_currency_amount" ).val();
					var driver_diesel_element = document.getElementById('from_currency_amount');
					if($.isNumeric(vals) && vals>=0){

					return;
					}
					else{
						alert("Enter Numeric and Positive Value");
						driver_diesel_element.value='';
						$( "#from_currency_amount" ).focus();


					}

				});

				
				jQuery("#to_currency_amount").blur(function() {
					//alert("hello");
					var vals= $( "#to_currency_amount" ).val();
					var driver_advance_element = document.getElementById('to_currency_amount');
					if($.isNumeric(vals) && vals>=0){

						return;
					}
					else{
						alert("Enter Numeric and Positive Value");
						driver_advance_element.value='';
						$( "#to_currency_amount" ).focus();


					}

				});

				jQuery("#comission_amount").blur(function() {
					//alert("hello");
					var vals= $( "#comission_amount" ).val();
					var driver_advance_element = document.getElementById('comission_amount');
					if($.isNumeric(vals) && vals>=0){

						return;
					}
					else{
						alert("Enter Numeric and Positive Value");
						driver_advance_element.value='';
						$( "#comission_amount" ).focus();


					}

				});

			</script>


			<li>
				<a href="{!!URL::to('order')!!}" class="btn">Back</a>
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