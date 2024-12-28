@extends('user.sales')
@section('middle_right_DIV')
	<h4>Create New Invoice</h4>
	{!! Form::open(array('route' => 'invoice.store','files' => true)) !!}
	<ul class="form_UL">
		<li>

			{!! Form::label('sales_id', 'Sales') !!}
			{!!Form::select('sales_id', $sales,'',array('id'=>'sales_id','class' => 'form_element'))!!}
		</li>

		<li>

			{!! Form::label('outlet_id', 'Outlet') !!}
			{!!Form::select('outlet_id', $outlets,'',array('id'=>'outlet_id','class' => 'form_element'))!!}
		</li>





		<li>
			{!! Form::label('code', 'Invoice Code') !!}
			{!! Form::text('code',$code,array('class' => 'form_element')) !!}
		</li>



		<li>
			{!! Form::label('date', 'Invoice Date') !!}
			{!! Form::text('date',\Carbon\Carbon::now(),array('class' => 'form_element','id'=>'date')) !!}

		</li>

		<li>
			{!! Form::label('invoice_no', 'No') !!}
			{!! Form::text('invoice_no','',array('class' => 'form_element')) !!}
		</li>





		<li>
			{!! Form::label('name','Invoice Products')!!}

		</li>
		<hr>
		<table width="100%" border="0" id="invoice_table">
			<tr>
				<th style="text-align: center"> Product</th>
				<th style="text-align: center"> Price</th>
				<th style="text-align: center"> QTY</th>
				<th style="text-align: center"> Sub Total</th>


			</tr>
		@foreach ($productList as $index => $product)

			<tr>

				<td class="invoice_span" style="width: 200px; text-align: left;" >
				{!! Form::label('name',$product->name, array('style'=>'width:200px;'))!!}
				</td>


				<td class="invoice_span" style="width: 100px;">
				{!! Form::text($product->code,$product->maximum_selling_price,array('style'=>'width: 100px;','class' => 'form_elementt','id'=>$product->code)) !!}
				</td>


				<td class="invoice_span" style="width: 50px;" id="qty">
				{!! Form::text($product->id,'0',array('style'=>'width: 50px;','class' => 'form_elementt','id'=>$product->id)) !!}
				</td>

				<td class="invoice_span" style="width: 100px;">
					{!! Form::text($product->id.$product->code,'0',array('style'=>'width: 100px;','class' => 'form_elementt','id'=>$product->id.$product->code)) !!}
				</td>



			</tr>

		@endforeach
		</table>

		<script>
            var $productCodeId = <?php echo json_encode($productCodeId); ?>;
			var total=0;

            $('#qty input').focusout(function () {

            //   var qty = document.getElementById(this.id);
             var qty =$(this).val();
               // var code =  getCode(this.id);
                var codee = $productCodeId[this.id];
                //alert(codee);
                var price = $('#'+codee).val();
               // alert(price);


                var code_element = document.getElementById(this.id+codee);
                var total_element = document.getElementById('total');
                var sub_tot =qty*price;
                code_element.value=sub_tot;
                total = total + sub_tot;
                total_element.value=total;

               // alert($(this).val());
               // $('#myform').data('lastSelected', $(this));
            });




		</script>

		<li>
			{!! Form::label('Invoice Total') !!}
			{!!Form::text('total', '0',array('id'=>'total','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('Previous Credit') !!}
			{!!Form::text('previous_credit', '0',array('id'=>'previous_credit','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('Previous Cheque') !!}
			{!!Form::text('previous_cheque', '0',array('id'=>'previous_cheque','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('note', 'Note') !!}
			{!! Form::textarea('note','',array('class' => 'form_element')) !!}
		</li>



		<li>
			{!! Form::label('Cash') !!}
			{!!Form::text('cash', '0',array('id'=>'cash','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('Cheque') !!}
			{!!Form::text('cheque_value', '0',array('id'=>'cheque_value','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('Credit') !!}
			{!!Form::text('credit', '0',array('id'=>'credit','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('Cheque No') !!}
			{!!Form::text('cheque_no', '0',array('id'=>'cheque_no','class' => 'form_element'))!!}
		</li>


		<li>
			{!! Form::label('cheque_date', 'Cheque Date') !!}
			{!! Form::text('cheque_date',\Carbon\Carbon::now(),array('class' => 'form_element','id'=>'cheque_date')) !!}
		</li>

		<li>

			{!! Form::label('cheque_bank', 'Cheque Bank') !!}
			{!!Form::select('cheque_bank', array('Commercial'=>'Commercial','HNB'=>'HNB','Peoples'=>'Peoples','BOC'=>'BOC','Seylan'=>'Seylan'),'',array('id'=>'cheque_bank','class' => 'form_element'))!!}
		</li>



		<li>
			<a href="{!!URL::to('invoice')!!}" class="btn">Back</a>
			{!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
		</li>





	</ul>


	<script src="{!!URL::to('js/respond.min.js')!!}"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="{!!URL::to('js/responsivemobilemenu.js')!!}"></script>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="{!!URL::to('js/jquery.ezdz.js')!!}"></script>
	<script src="{!!URL::to('js/fotorama.js')!!}"></script>
	<script src="{!!URL::to('js/jquery.datetimepicker.js')!!}"></script>
	<script>
        $('#cheque_date').datetimepicker({

            format:'Y-m-d H:i',
            //defaultDate:'8.12.1986', // it's my birthday
            //defaultDate:'+03.01.1970', // it's my birthday
            //defaultTime:'07:30',
            timepickerScrollbar:true
        });




        $('#date').datetimepicker({

            format:'Y-m-d H:i',
            //defaultDate:'8.12.1986', // it's my birthday
            //defaultDate:'+03.01.1970', // it's my birthday
            //defaultTime:'07:30',
            timepickerScrollbar:true
        });

	</script>

	<script>

        var current_code;
        var default_lorry_code;
        var default_salesman_code;





        //lorry coder
        $("#sales_id").change(function(){
            ///alert("changes");
            var payments_code = <?php echo json_encode($salesList); ?>;
            var outlet_code = <?php echo json_encode($code); ?>;
            var selected_payment_id=$( "#sales_id" ).val();
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
        $("#outlet_id").change(function(){
            ///alert("changes");
            var payments_code = <?php echo json_encode($outletList); ?>;
            var outlet_code = <?php echo json_encode($code); ?>;
            var selected_payment_id=$( "#outlet_id" ).val();
            var code_element = document.getElementById('code');
            var temp=payments_code[selected_payment_id];
            //alert(temp);
            var temp_code=current_code.replace(default_salesman_code,temp)
            code_element.value=temp_code;
            default_salesman_code=temp;
            current_code=temp_code;
            //alert(outlet_code);

			//update previous credit and cheque

        });


        $( document ).ready(function() {
            ///alert("changes");

            var code_element = document.getElementById('code');
            var sales_code = <?php echo json_encode($code); ?>;

            var current_route_code = <?php echo json_encode($salesList); ?>;
            var selected_route_id=$( "#sales_id" ).val();
            var selected_route_code=current_route_code[selected_route_id];
            default_route_code = selected_route_code;

            var salesmans_code = <?php echo json_encode($outletList); ?>;
            var selected_salesman_id=$( "#outlet_id" ).val();
            var selected_salesman_code=salesmans_code[selected_salesman_id];
            default_salesman_code= selected_salesman_code;

            //alert(temp);
            current_code = selected_route_code+"\\"+selected_salesman_code+"\\"+sales_code;
            //var temp_code=default_diesel_code.replace(default_payment_code,temp)
            code_element.value=current_code;
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