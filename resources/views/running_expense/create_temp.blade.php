@extends('user.agents')
@section('middle_right_DIV')

			<h4>Create Giving</h4>
		{!! Form::open(array('route' => 'giving.store','files' => true)) !!}
		<ul class="form_UL">


			<li>

				{!! Form::label('agent_id', 'Agent') !!}
				{!!Form::select('agent_id', $agents,'',array('id'=>'agent_id','class' => 'form_element'))!!}
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


					var foods = <?php echo json_encode($acc_groups); ?>;
					$('#agent_bank_acc').html('');

					jQuery.each(foods, function( index, value ) {
						//console.log( 'site '+index +' user '+ value + ' selected site'+selected_vehicle);
						//	alert("in");
						//alert( index +' '+ value  +' in');
						if(selected_site_id == index ){
							//alert( foods[selected_company_id][0]);
							// alert( foods[selected_company_id][1]);
							// alert( foods[selected_company_id][2]);
							$('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][0] + '">' +  foods[selected_site_id][0] + '</option>');
							$('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][1] + '">' +  foods[selected_site_id][1] + '</option>');
							$('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][2] + '">' +  foods[selected_site_id][2] + '</option>');
							$('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][3] + '">' +  foods[selected_site_id][3] + '</option>');
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

				var default_site_code;
				var default_company_code;
				var default_driver_type_code;
				var default_full_point_code;
				var default_full_point_code_helper;


				$( document ).ready(function() {
					var sites_code = <?php echo json_encode($agents_code); ?>;
					var selected_site_id=$( "#agent_id" ).val();


					var coder = <?php echo json_encode($code); ?>;
					var code_element = document.getElementById('code');
					default_site_code=sites_code[selected_site_id];

					default_full_point_code=default_site_code+'/'+coder;
					code_element.value=default_full_point_code;
					default_full_point_code_helper=default_full_point_code;
					//$("#client_id").prepend("<option value='' selected='selected'>Choose Client</option>");

				});

			</script>
		



			 <li>
		        {!! Form::label('code','Giving Code') !!}
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

				{!! Form::label('sdr', 'SDR Amount') !!}

				{!!Form::text('sdr', '',array('id'=>'sdr','class' => 'form_element'))!!}


			</li>
			<li>

                {!! Form::hidden('currency_rate', $setups->sd_to_lkr) !!}
                {!! Form::hidden('commission_pcnt', $setups->agent_commision_pcnt) !!}
                {!! Form::label('sd_to_lkr', 'SDR Rate : '.$setups->sd_to_lkr) !!}
				{!! Form::button('Convert to LKR', array('id' => 'sdr_btn','class' => 'form_element')) !!}

			</li>
			<li>

				{!! Form::label('lkr', 'LKR Amount') !!}

				{!!Form::text('lkr', '',array('id'=>'lkr','class' => 'form_element'))!!}

			</li>
			<li>

                {!! Form::label('sd_to_lkr', 'LKR Rate : '.round((1/$setups->sd_to_lkr), 2)) !!}
				{!! Form::button('Convert to SDR', array('id' => 'lkr_btn','class' => 'form_element')) !!}

			</li>




			<li>


				{!! Form::label('agent_bank_acc','Agent Bank Account') !!}

				{!!Form::select('agent_bank_acc', array(), '',array('id'=>'agent_bank_acc','class' => 'form_element'))!!}
			</li>


			<script>


				$('#sdr_btn').click(function(){
					//alert("The paragraph was clicked.");
					var setups = <?php echo json_encode($setups); ?>;
					var entered_sdr=$( "#sdr" ).val();
					var sdr_to_lkr_rate= setups['sd_to_lkr'];
					var lkr_element = document.getElementById('lkr');
					var temp1=entered_sdr*sdr_to_lkr_rate;
					var result=Math.round(temp1 * 100) / 100;
					lkr_element.value=result;


				});

				$('#lkr_btn').click(function(){
					//alert("The paragraph was clicked.");
					var setups = <?php echo json_encode($setups); ?>;
					var entered_lkr=$( "#lkr" ).val();
					var lkr_to_sd_rate= setups['sd_to_lkr'];
					var sdr_element = document.getElementById('sdr');
					var temp2=entered_lkr/lkr_to_sd_rate;
					var result=Math.round(temp2 * 100) / 100;
					sdr_element.value=result;


				});


			</script>



			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

			<script>


				jQuery("#sdr").blur(function() {
					//alert("hello");
					var vals= $( "#sdr" ).val();
					var driver_diesel_element = document.getElementById('sdr');
					if($.isNumeric(vals) && vals>=0){

					return;
					}
					else{
						alert("Enter Numeric and Positive Value");
						driver_diesel_element.value='';
						$( "#sdr" ).focus();


					}

				});

				
				jQuery("#lkr").blur(function() {
					//alert("hello");
					var vals= $( "#lkr" ).val();
					var driver_advance_element = document.getElementById('lkr');
					if($.isNumeric(vals) && vals>=0){

						return;
					}
					else{
						alert("Enter Numeric and Positive Value");
						driver_advance_element.value='';
						$( "#lkr" ).focus();


					}

				});



			</script>


			<li>
				<a href="{!!URL::to('giving')!!}" class="btn">Back</a>
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