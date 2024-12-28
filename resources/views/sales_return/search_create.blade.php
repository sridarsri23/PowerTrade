@extends('user.sales')
@section('middle_right_DIV')
	<h4>Create New Sales Return for Invoice: {!! $invoice->code !!}</h4>
	{!! Form::open(array('route' => 'sales_return.store','files' => true)) !!}
	<ul class="form_UL">

		<li>
			{!! Form::label('code', 'Sales Code') !!}
			{!! Form::text('code',$selected_sales->code,array('class' => 'form_element')) !!}
			{!! Form::text('sales_id',$selected_sales->id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
		</li>

		<li>

			{!! Form::label('outlet_id', 'Outlet') !!}
			{!! Form::text('outlet_id',$outlet->name,array('class' => 'form_element')) !!}
			{!! Form::text('outlet_id',$outlet->id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
		</li>



		<li>
			{!! Form::label('code', 'Return Invoice Code') !!}
			{!! Form::text('code',$invoice->code.'\\'.$code,array('class' => 'form_element')) !!}
		</li>
		<li>
			{!! Form::label('invoice_no', 'Invoice No') !!}
			{!! Form::text('invoice_no',$invoice->invoice_no,array('id'=>'invoice_no','class' => 'form_element')) !!}
		</li>



		<li>
			{!! Form::label('date', 'Return Invoice Date') !!}
			{!! Form::text('date',$invoice->date,array('class' => 'form_element','id'=>'date')) !!}

		</li>




		<script>
			$('#is_resellable').click(function(){

				var $this = $(this);
				var x;
				if ($this.is(':checked')) {

					//alert("checked");
					//$('.password_li').show();

					$("#is_sold").attr("disabled", false);

				} else {
					$("#is_sold").attr("disabled", true);


				}

			});



		</script>


		<li>
			{!! Form::label('name','Return Invoice Products')!!}

		</li>
		<hr>
		<table width="100%" border="0" id="invoice_table">
			<tr>
				<th style="text-align: center"> Product</th>
				<th style="text-align: center"> Price</th>
				<th style="text-align: center"> QTY</th>
				<th style="text-align: center"> Sub Total</th>
				<th style="text-align: center"> Re-Sellable?</th>
				<th style="text-align: center"> Is-Sold?</th>


			</tr>


		@foreach ($productList as $index => $product)

			<tr>

				<td class="invoice_span" style="width: 200px; text-align: left;" >
				{!! Form::label('name',$product->name, array('style'=>'width:200px;'))!!}
				</td>


				<td class="invoice_span" style="width: 100px;">
				{!! Form::text($product->code, $product_id_price[$product->id],array('style'=>'width: 100px;','class' => 'form_elementt','id'=>$product->code)) !!}
				</td>


				<td class="invoice_span" style="width: 50px;" id="qty">
				{!! Form::text($product->id,'0',array('style'=>'width: 50px;','class' => 'form_elementt','id'=>$product->id)) !!}
				</td>

				<td class="invoice_span" style="width: 100px;">
					{!! Form::text($product->id.$product->code,'0',array('style'=>'width: 100px;','class' => 'form_elementt','id'=>$product->id.$product->code)) !!}
				</td>

				<td>

					{!! Form::hidden($product->code.'ir'.$product->id , 'No')!!}
					{!! Form::checkbox($product->code.'ir'.$product->id ,'Yes',true,array('class' => 'form_element','id' => $product->code.'ir'.$product->id )) !!}

				</td>
				<td>

					{!! Form::hidden($product->code.'is'.$product->id , 'No')!!}
					{!! Form::checkbox($product->code.'is'.$product->id ,'No',false,array('class' => 'form_element','id' => $product->code.'is'.$product->id )) !!}
					<?php
					  $is_sold_name = $product->code.'is'.$product->id;
					  $is_resellable_name = $product->code.'ir'.$product->id;
					?>

				</td>

				<script>

                    $('#{!! $product->code.'is'.$product->id !!}').click(function(){
                        //alert("clicked");
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#{!! $product->code.'ir'.$product->id !!}').prop('checked', 0);
                        }
                    });

                    $('#{!! $product->code.'ir'.$product->id !!}').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#{!! $product->code.'is'.$product->id !!}').prop('checked', 0);
                        }
                    });


				</script>

			</tr>

		@endforeach
		</table>

		<script>
            var $productCodeId = <?php echo json_encode($productCodeId); ?>;
          //  var product_id_qty = <?php echo json_encode($product_id_qty); ?>;
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
                    var total_payable = document.getElementById('total_payable');
                    var previous_credit = $('#previous_credit').val();



					//var actual_qty =product_id_qty[this.id];
					//	alert(actual_qty);


                    var sub_tot =qty*price;
                    code_element.value=sub_tot;
                    total = total + sub_tot;
				total_element.value=total;
						var tot_payble = parseFloat(previous_credit) - total;
                    total_payable.value=tot_payble;





               // alert($(this).val());
               // $('#myform').data('lastSelected', $(this));
            });




		</script>

		<li>
			{!! Form::label('Return Invoice Total') !!}
			{!!Form::text('total', '0',array('id'=>'total','class' => 'form_element'))!!}
		</li>
		<li>
			{!! Form::label('Previous Credit/Balance') !!}
			{!!Form::text('previous_credit', $outlet->credit,array('id'=>'previous_credit','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('Total Payable Amount') !!}
			{!!Form::text('total_payable', '0',array('id'=>'total_payable','class' => 'form_element'))!!}
		</li>


		<li>
			{!! Form::label('note', 'Note') !!}
			{!! Form::textarea('note', $invoice->note,array('class' => 'form_element')) !!}
		</li>





		<li>
			<a href="{!!URL::to('sales_return')!!}" class="btn">Back</a>
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


	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop