@extends('user.sales')
@section('middle_right_DIV')
	<h4>Edit Loading</h4>
	{!! Form::open(array('route' => array('loading.update', $loading->id) ,'method' => 'PUT','files' => true)) !!}
	<ul class="form_UL">

		<li>

			{!! Form::label('sales_id', 'Sales') !!}
			{!!Form::select('sales_id', $sales,$loading->sales_id,array('id'=>'sales_id','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('code', 'Loading Code') !!}
			{!! Form::text('code',$loading->code,array('class' => 'form_element','readonly'=>'readonly','tabindex'=>'-1')) !!}
		</li>

		<li>
			{!! Form::label('incharge_id', 'Incharge') !!}
			{!!Form::select('incharge_id', $incharges,$loading->incharge_id,array('id'=>'incharge_id','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('date', 'Date') !!}
			{!! Form::text('date',$loading->date,array('class' => 'form_element','id'=>'date')) !!}
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



            $('#date').datetimepicker({

                format:'Y-m-d H:i',
                //defaultDate:'8.12.1986', // it's my birthday
                //defaultDate:'+03.01.1970', // it's my birthday
                //defaultTime:'07:30',
                timepickerScrollbar:true
            });

		</script>


		<li>
			{!! Form::label('name','QTYs')!!}

		</li>
		<hr>
		@foreach ($productList as $index => $product)

			<li>


				{!! Form::label('name',$product->name)!!}


				{!! Form::text($product->code,dtc\Models\Loader::where('loading_id','=',$loading->id)->where('product_id','=',$product->id)->first()['qty'] ,array('class' => 'form_element','id'=>$product->code)) !!}


			</li>

		@endforeach

		<li>
			<a href="{!!URL::to('loading')!!}" class="btn" tabindex = "-1">Back</a>
			{!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		</li>
	</ul>

	<script>
        var current_loading_code;
        var current_sales_code;
        $("#sales_id").change(function(){
            ///alert("changes");
			//alert(current_loading_code);
			//alert(current_sales_code);

            var payments_code = <?php echo json_encode($salesList); ?>;
            var outlet_code = <?php echo json_encode($loading->code); ?>;
            var selected_payment_id=$( "#sales_id" ).val();
            var code_element = document.getElementById('code');
            var temp=payments_code[selected_payment_id];
            //alert(temp);
            var temp_code=current_loading_code.replace(current_sales_code,temp)
            code_element.value=temp_code;
            current_loading_code=temp_code;
            current_sales_code= temp;
            //alert(outlet_code);


        });

        $( document ).ready(function() {
            ///alert("changes");
            document.getElementById('sales_id').focus();
            var current_route_code = <?php echo json_encode($salesList); ?>;
            var selected_route_id=$( "#sales_id" ).val();
            var selected_route_code=current_route_code[selected_route_id];
            current_sales_code = selected_route_code;

           current_loading_code = <?php echo json_encode($loading->code); ?>;
            //alert(outlet_code);
        });


	</script>
	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop