@extends('user.system')
@section('middle_right_DIV')
			<h4>Create New Outlet</h4>
		{!! Form::open(array('route' => 'outlet.store','files' => true)) !!}
		<ul class="form_UL">

			<li>

				{!! Form::label('route_id', 'Route') !!}
				{!!Form::select('route_id', $routes,'',array('id'=>'route_id','class' => 'form_element'))!!}
			</li>

			<li>
				{!! Form::label('code', 'Outlet Code') !!}
				{!! Form::text('code',$code,array('class' => 'form_element','readonly'=>'readonly')) !!}
			</li>




			<li>
				{!! Form::label('name', 'Name') !!}
				{!! Form::text('name','',array('class' => 'form_element','id'=>'name')) !!}
			</li>
			<li>
				{!! Form::label('phone', 'Phone') !!}
				{!! Form::text('phone','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('email', 'Email') !!}
				{!! Form::text('email','',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('address', 'Address') !!}
				{!! Form::textarea('address','',array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('credit', 'Credit') !!}
				{!! Form::text('credit','0',array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('cheque', 'Cheque') !!}
				{!! Form::text('cheque','0',array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note','',array('class' => 'form_element')) !!}
			</li>

		    <li>
				<a href="{!!URL::to('outlet')!!}" class="btn" class="btn" tabindex = "-1">Back</a>
		        {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
		    </li>


		</ul>

			<script>
				$("#route_id").change(function(){
					///alert("changes");
					var payments_code = <?php echo json_encode($routesList); ?>;
					var outlet_code = <?php echo json_encode($code); ?>;
					var selected_payment_id=$( "#route_id" ).val();
					var code_element = document.getElementById('code');
					var temp=payments_code[selected_payment_id];
					//alert(temp);
					//var temp_code=default_diesel_code.replace(default_payment_code,temp)
					code_element.value=temp+"\\"+outlet_code;
						//alert(outlet_code);

				});

				$( document ).ready(function() {
					///alert("changes");
					var payments_code = <?php echo json_encode($routesList); ?>;
					var outlet_code = <?php echo json_encode($code); ?>;
					var selected_payment_id=$( "#route_id" ).val();
					var code_element = document.getElementById('code');
					var temp=payments_code[selected_payment_id];
					//alert(temp);
					//var temp_code=default_diesel_code.replace(default_payment_code,temp)
					code_element.value=temp+"\\"+outlet_code;
					//alert(outlet_code);
				});


			</script>

			<script>
                $( document ).ready(function() {
                    ///alert("changes");
                    document.getElementById('name').focus();
                });

			</script>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop