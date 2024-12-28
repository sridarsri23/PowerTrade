@extends('user.system')
@section('middle_right_DIV')

			<h4>{!! 'Edit Outlet' !!}</h4>
		{!! Form::open(array('route' => array('outlet.update', $outlet->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">

			<li>

				{!! Form::label('route_id', 'Route') !!}
				{!! Form::text('code',dtc\Models\Route::where('id','=',$outlet->route_id)->first()['name'] ,array('class' => 'form_element','readonly'=>'readonly')) !!}

			</li>
			<li>
				{!! Form::label('code', 'Outlet Code') !!}
				{!! Form::text('code',$outlet->code,array('class' => 'form_element','readonly'=>'readonly')) !!}
			</li>

			<li>
				{!! Form::label('name', 'Outlet Name' )!!}
				{!! Form::text('name',$outlet->name,array('class' => 'form_element','id'=>'outlet_name')) !!}
			</li>



			<li>
				{!! Form::label('phone','Phone' )!!}
				{!! Form::text('phone',$outlet->phone,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('email','Email') !!}
				{!! Form::text('email',$outlet->email,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('address', 'Address') !!}
				{!! Form::textarea('address',$outlet->address,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('credit', 'Credit') !!}
				{!! Form::text('credit',$outlet->credit,array('class' => 'form_element')) !!}
			</li>
			<li>
				{!! Form::label('cheque', 'Cheque') !!}
				{!! Form::text('cheque',$outlet->cheque,array('class' => 'form_element')) !!}
			</li>

			<li>
				{!! Form::label('note', 'Note') !!}
				{!! Form::textarea('note',$outlet->note,array('class' => 'form_element')) !!}
			</li>
			<li>
				<a href="{!!URL::to('outlet')!!}" class="btn">{!! 'Back' !!}</a>
		        {!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		    </li>
			<script>
				$("#route_id").change(function(){
					///alert("changes");
					var payments_code = <?php echo json_encode($routesList); ?>;
					var outlet_code = <?php echo json_encode($outlet->code); ?>;
					var selected_payment_id=$( "#route_id" ).val();
					var code_element = document.getElementById('code');
					var temp=payments_code[selected_payment_id];
					//alert(temp);
					//var temp_code=default_diesel_code.replace(default_payment_code,temp)
					code_element.value=temp+"\\"+outlet_code;
					//alert(outlet_code);

				});



			</script>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop