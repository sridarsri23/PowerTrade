@extends('user.sales')
@section('middle_right_DIV')
	<h4>Edit Sales</h4>

	{!! Form::open(array('route' => array('sales.update', $sales->id) ,'method' => 'PUT','files' => true)) !!}
	<ul class="form_UL">
		<li>

			{!! Form::label('route_id', 'Route') !!}
			{!!Form::select('route_id', $routes,$sales->route_id,array('id'=>'route_id','class' => 'form_element'))!!}
		</li>

		<li>

			{!! Form::label('lorry_id', 'Lorry') !!}
			{!!Form::select('lorry_id', $lorries,$sales->lorry_id,array('id'=>'lorry_id','class' => 'form_element'))!!}
		</li>

		<li>

			{!! Form::label('salesman_id', 'SalesMan') !!}
			{!!Form::select('salesman_id', $employees,$sales->salesman_id,array('id'=>'salesman_id','class' => 'form_element'))!!}
		</li>




		<li>
			{!! Form::label('code', 'Sales Code') !!}
			{!! Form::text('code',$sales->code,array('class' => 'form_element','readonly'=>'readonly','tabindex'=>'-1')) !!}
		</li>


		<li>

			{!! Form::label('driver_id', 'Driver') !!}
			{!!Form::select('driver_id', $drivers,$sales->driver_id,array('id'=>'driver_id','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('start_date', 'Start Date') !!}
			{!! Form::text('start_date',$sales->start_date,array('class' => 'form_element','id'=>'start_date')) !!}



		</li>
		<li>
			{!! Form::label('end_date', 'End Date') !!}
			{!! Form::text('end_date',$sales->end_date,array('class' => 'form_element','id'=>'end_date')) !!}
		</li>



		<script src="{!!URL::to('js/respond.min.js')!!}"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<script type="text/javascript" src="{!!URL::to('js/responsivemobilemenu.js')!!}"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script src="{!!URL::to('js/jquery.ezdz.js')!!}"></script>
		<script src="{!!URL::to('js/fotorama.js')!!}"></script>
		<script src="{!!URL::to('js/jquery.datetimepicker.js')!!}"></script>
		<script>
            $('#start_date').datetimepicker({

                format:'Y-m-d H:i',
                //defaultDate:'8.12.1986', // it's my birthday
                //defaultDate:'+03.01.1970', // it's my birthday
                //defaultTime:'07:30',
                timepickerScrollbar:true
            });




            $('#end_date').datetimepicker({

                format:'Y-m-d H:i',
                //defaultDate:'8.12.1986', // it's my birthday
                //defaultDate:'+03.01.1970', // it's my birthday
                //defaultTime:'07:30',
                timepickerScrollbar:true
            });

		</script>

		<li>
			{!! Form::label('name','Default Selling Prices')!!}

		</li>
		<hr>
		@foreach ($productList as $index => $product)

			<li>


				{!! Form::label('name',$product->name)!!}



				{!! Form::text($product->code,dtc\Models\SalesProducts::where('sales_id','=',$sales->id)->where('product_id','=',$product->id)->first()['cost_price'] ,array('class' => 'form_element','id'=>$product->code)) !!}



			</li>

		@endforeach

		<li>
			<a href="{!!URL::to('sales')!!}" class="btn" tabindex = "-1">Back</a>
			{!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		</li>
	</ul>



	<script>

        var current_code;
        var default_route_code;
        var default_lorry_code;
        var default_salesman_code;
        $("#route_id").change(function(){
           //alert("changes");
            var payments_code = <?php echo json_encode($routesList); ?>;
            var outlet_code = <?php echo json_encode($sales->code); ?>;
            var selected_payment_id=$( "#route_id" ).val();
            var code_element = document.getElementById('code');
            var temp=payments_code[selected_payment_id];
            //alert(temp);
            var temp_code=current_code.replace(default_route_code,temp)
            code_element.value=temp_code;
            current_code=temp_code;
            default_route_code=temp;
            //alert(outlet_code);

        });




        //lorry coder
        $("#lorry_id").change(function(){
            ///alert("changes");
            var payments_code = <?php echo json_encode($lorryList); ?>;
            var outlet_code = <?php echo json_encode($sales->code); ?>;
            var selected_payment_id=$( "#lorry_id" ).val();
            var code_element = document.getElementById('code');
            var temp=payments_code[selected_payment_id];
            //alert(temp);
            var temp_code=current_code.replace(default_lorry_code,temp)
            code_element.value=temp_code;
            current_code=temp_code;
            default_lorry_code= temp;
            //alert(outlet_code);

        });

        //salesman coder
        $("#salesman_id").change(function(){
            ///alert("changes");
            var payments_code = <?php echo json_encode($salesmanList); ?>;
            var outlet_code = <?php echo json_encode($sales->code); ?>;
            var selected_payment_id=$( "#salesman_id" ).val();
            var code_element = document.getElementById('code');
            var temp=payments_code[selected_payment_id];
            //alert(temp);
            var temp_code=current_code.replace(default_salesman_code,temp)
            code_element.value=temp_code;
            default_salesman_code=temp;
            current_code=temp_code;
            //alert(outlet_code);

        });

        $( document ).ready(function() {
            document.getElementById('route_id').focus();

           // var sales_code = <?php echo json_encode($sales->code); ?>;

            var current_route_code = <?php echo json_encode($routesList); ?>;
            var selected_route_id=$( "#route_id" ).val();
            var selected_route_code=current_route_code[selected_route_id];
            default_route_code = selected_route_code;

            var salesmans_code = <?php echo json_encode($salesmanList); ?>;
            var selected_salesman_id=$( "#salesman_id" ).val();
            var selected_salesman_code=salesmans_code[selected_salesman_id];
            default_salesman_code= selected_salesman_code;

            var lorrys_code = <?php echo json_encode($lorryList); ?>;
            var selected_lorry_id=$( "#lorry_id" ).val();
            var selected_lorry_code=lorrys_code[selected_lorry_id];
            default_lorry_code= selected_lorry_code;

        current_code = <?php echo json_encode($sales->code); ?>;
        });
        /*

        $( document ).ready(function() {
            ///alert("changes");

            var code_element = document.getElementById('code');
            var sales_code = <?php echo json_encode($sales->code); ?>;

            var current_route_code = <?php echo json_encode($routesList); ?>;
            var selected_route_id=$( "#route_id" ).val();
            var selected_route_code=current_route_code[selected_route_id];
            default_route_code = selected_route_code;

            var salesmans_code = <?php echo json_encode($salesmanList); ?>;
            var selected_salesman_id=$( "#salesman_id" ).val();
            var selected_salesman_code=salesmans_code[selected_salesman_id];
            default_salesman_code= selected_salesman_code;

            var lorrys_code = <?php echo json_encode($lorryList); ?>;
            var selected_lorry_id=$( "#lorry_id" ).val();
            var selected_lorry_code=lorrys_code[selected_lorry_id];
            default_lorry_code= selected_lorry_code;
            //alert(temp);
            current_code = selected_route_code+"\\"+selected_lorry_code+"\\"+selected_salesman_code+"\\"+sales_code;
            //var temp_code=default_diesel_code.replace(default_payment_code,temp)
            code_element.value=current_code;
            //alert(outlet_code);
        });
*/
	</script>
	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop