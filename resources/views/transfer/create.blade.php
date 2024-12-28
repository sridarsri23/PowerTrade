@extends('user.agents')
@section('middle_right_DIV')

			<h4>Create Transfer</h4>
		{!! Form::open(array('route' => 'transfer.store','files' => true)) !!}
		<ul class="form_UL">


			<li>

				{!! Form::label('from_agent_id', 'From Agent') !!}
				{!!Form::select('from_agent_id', $agents,'',array('id'=>'from_agent_id','class' => 'form_element'))!!}
			</li>

			<li>

				{!! Form::label('to_agent_id', 'To Agent') !!}
				{!!Form::select('to_agent_id', $agents,'',array('id'=>'agent_id','class' => 'form_element'))!!}
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
		        {!! Form::label('code','Transfer Code') !!}
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

				{!! Form::label('lkr', 'LKR Amount') !!}

				{!!Form::text('lkr', '',array('id'=>'lkr','class' => 'form_element'))!!}


			</li>




			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::hidden('from_agnt_pha') !!}
				{!! Form::hidden('to_agent_pha') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

			<script>


				/*

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

			*/

			</script>


			<li>
				<a href="{!!URL::to('transfer')!!}" class="btn">Back</a>
		        {!! Form::submit('Transfer', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop