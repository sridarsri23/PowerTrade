@extends('user.sales')
@section('middle_right_DIV')
	<h4>Create Many Invoices for {!! dtc\Models\Sales::where('id','=',$selected_sales_id)->first()['code'] !!}</h4>

			<?php
					if(isset($message)){
				if($message == 'success'){

					echo '<div class="success_message"> Invoice Created Successfully</div>';

				}else{
                    echo '<div class="error_message"> Invoice Creation Failed</div>';

				}

				}
		?>

	{!! Form::open(array('url' => 'invoice_store_next','method'=>'put' ,'files' => true,'name'=>'invoice_form','onsubmit'=>'return validateForm()')) !!}
	<ul class="form_UL">


		<li>

			{!! Form::label('outlet_id', 'Outlet') !!}
			{!!Form::select('outlet_id', $outlets,'',array('id'=>'outlet_id','class' => 'form_element'))!!}
		</li>



		<li>
			{!! Form::label('code', 'Invoice Code') !!}
			{!! Form::text('code',$code,array('class' => 'form_element')) !!}
			{!! Form::text('sales_id',$selected_sales_id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
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
				<th style="text-align: center"> FI</th>
				<th style="text-align: center"> Sub Total</th>


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

				<td class="invoice_span" style="width: 50px;" id="free_issue">
				{!! Form::text(($product->code.'_'.$product->id),'0',array('style'=>'width: 50px;','class' => 'form_elementt','id'=>($product->code.'_'.$product->id))) !!}
				</td>

				<td class="invoice_span" style="width: 100px;">
					{!! Form::text($product->id.$product->code,'0',array('style'=>'width: 100px;','class' => 'form_elementt','id'=>$product->id.$product->code,'tabindex' => "-1",'readonly'=>'readonly')) !!}
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
                    var net_total_element = document.getElementById('net_total');
                    var total_payable = document.getElementById('total_payable');
                    var previous_credit = $('#previous_credit').val();
                    var previous_cheque = $('#previous_cheque').val();


                    var sub_tot =qty*price;
                    code_element.value=sub_tot;
                    total = total + sub_tot;
                    total_element.value=total;
				net_total_element.value=total;
                    var tot_payble = total+parseFloat(previous_credit)+parseFloat(previous_cheque);
                    total_payable.value=tot_payble;




               // alert($(this).val());
               // $('#myform').data('lastSelected', $(this));
            });

			$('#qty input').focusin(function () {

				//alert("in");

				var qty =$(this).val();
				// var code =  getCode(this.id);

					if(qty!=0) {
						var codee = $productCodeId[this.id];
						//alert(codee);
						var price = $('#' + codee).val();
						var subtotal = $('#' + this.id + codee).val();
						// alert(price);


						var code_element = document.getElementById(this.id + codee);
						var qty_element = document.getElementById($(this).attr('id'));
						var total_element = document.getElementById('total');
						var net_total_element = document.getElementById('net_total');
						var total_payable = document.getElementById('total_payable');
						var previous_credit = $('#previous_credit').val();
						var previous_cheque = $('#previous_cheque').val();



						//var sub_tot = qty * price;
						//alert(parseFloat( subtotal));
						total = total - parseFloat( subtotal);

						total_element.value = total;
						net_total_element.value = total;
						var tot_payble = total + parseFloat(previous_credit) - parseFloat(previous_cheque)-parseFloat( subtotal);
						total_payable.value = tot_payble;
						code_element.value = 0;
						qty_element.value = 0;


					}


			});

		</script>

		<li>
			{!! Form::label('Invoice Total') !!}
			{!!Form::text('total', '0',array('id'=>'total','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
		</li>


		<li>
			{!! Form::label('Discount') !!}
			{!!Form::text('discount', '0',array('id'=>'discount','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('Net Total') !!}
			{!!Form::text('net_total', '0',array('id'=>'net_total','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
		</li>

		<li>
			{!! Form::label('Previous Credit/Balance') !!}
			{!!Form::text('previous_credit', '0',array('id'=>'previous_credit','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
		</li>
		<li>
			{!! Form::label('Previous Cheque/Balance') !!}
			{!!Form::text('previous_cheque', '0',array('id'=>'previous_cheque','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
		</li>

		<li>
			{!! Form::label('Total Payable Amount') !!}
			{!!Form::text('total_payable', '0',array('id'=>'total_payable','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
		</li>
		<li>
			{!! Form::label('note', 'Note') !!}
			{!! Form::textarea('note','',array('class' => 'form_element','tabindex' => "-1")) !!}
		</li>



		<li>
			{!! Form::label('Cash') !!}
			{!!Form::text('cash', '0',array('id'=>'cash','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('Credit') !!}
			{!!Form::text('credit', '0',array('id'=>'credit','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
		</li>
		<li>
			{!! Form::label('Cheque') !!}
			{!!Form::text('cheque_value', '0',array('id'=>'cheque_value','class' => 'form_element'))!!}
		</li>

		<li>
			{!! Form::label('Tot Credit (Cheque + Credit)') !!}
			{!!Form::text('total_credit', '0',array('id'=>'total_credit','class' => 'form_element','tabindex' => "-1",'readonly'=>'readonly'))!!}
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
			{!! Form::submit('Next', array('class' => 'btn btn-primary')) !!}
		</li>





	</ul>
	<script>

		$('#discount').focusout(function () {

			//   var qty = document.getElementById(this.id);

			var discount = $('#discount').val();
			var invoice_total = $('#total').val();



			// alert(price);



			var previous_credit = $('#previous_credit').val();
			var previous_cheque = $('#previous_cheque').val();

			var total_prev_credit = parseFloat(previous_credit)+parseFloat(previous_cheque);

			var discounted_total = (parseFloat(invoice_total) -parseFloat(discount)) + parseFloat(total_prev_credit);

			var total_element = document.getElementById('total_payable');
			var net_total_element = document.getElementById('net_total');
			total_element.value=discounted_total;
			net_total_element.value=parseFloat(invoice_total) - parseFloat(discount);



			// alert($(this).val());
			// $('#myform').data('lastSelected', $(this));
		});



        $('#cash').focusout(function () {

            //   var qty = document.getElementById(this.id);

            var cash = $('#cash').val();
            var total_payable = $('#total_payable').val();

            // alert(price);

			var credit = (parseFloat(total_payable) -  parseFloat(cash));

            var credit_element = document.getElementById('credit');
            var total_credit_element = document.getElementById('total_credit');
            credit_element.value=credit;
			total_credit_element.value=credit;



            // alert($(this).val());
            // $('#myform').data('lastSelected', $(this));
        });



		/*

		$('#invoice_no').focusout(function () {

			//   var qty = document.getElementById(this.id);

			var invoice_no = $('#invoice_no').val();


				if(!$.isNumeric(invoice_no)){

					alert("Invoice No Must be Numeric");

					var element= document.getElementById('invoice_no');
					element.focus();
					element.onblur= function() {
						element.focus();
					};

				}
			if(!invoice_no){

				alert("Invoice No Cannot Be Empty");

				var element= document.getElementById('invoice_no');
				element.focus();
				element.onblur= function() {
					element.focus();
				};

			}

			// alert($(this).val());
			// $('#myform').data('lastSelected', $(this));
		});

		*/


		$('#cheque_value').focusout(function () {

            //   var qty = document.getElementById(this.id);

            var credit = $('#credit').val();
            var cheque = $('#cheque_value').val();
           // var invoice_total = $('#total').val();
            //var previous_credit = $('#previous_credit').val();
           // var previous_cheque = $('#previous_cheque').val();
            // alert(price);

            var credit = parseFloat(credit) - parseFloat(cheque);

            var credit_element = document.getElementById('credit');
            var total_credit_element = document.getElementById('total_credit');
			total_credit_element.value=parseFloat(credit) + parseFloat(cheque);
			credit_element.value=credit;



            // alert($(this).val());
            // $('#myform').data('lastSelected', $(this));
        });





	</script>

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

        var outletz_code = <?php echo json_encode($outletList); ?>;
        var outlets_id_credits = <?php echo json_encode($outlets_id_credits); ?>;
        var outlets_id_cheques = <?php echo json_encode($outlets_id_cheques); ?>;



        //salesman coder
        $("#outlet_id").change(function(){
            ///alert("changes");

            var outlet_code = <?php echo json_encode($code); ?>;
            var selected_payment_id=$( "#outlet_id" ).val();
            var code_element = document.getElementById('code');
            var temp=outletz_code[selected_payment_id];
            //alert(temp);
            var temp_code=current_code.replace(default_salesman_code,temp)
            code_element.value=temp_code;
            default_salesman_code=temp;
            current_code=temp_code;
            //alert(outlet_code);



			//update previous credit and cheque

			//alert(outlets_id_credits[selected_payment_id]);
            var prev_cred = document.getElementById('previous_credit');
            var prev_chq = document.getElementById('previous_cheque');
            prev_cred.value=outlets_id_credits[selected_payment_id];
            prev_chq.value=outlets_id_cheques[selected_payment_id];
        });


        $( document ).ready(function() {
            ///alert("changes");
			document.getElementById('invoice_no').focus();

            var code_element = document.getElementById('code');
            var sales_code = <?php echo json_encode($code); ?>;

            var current_route_code = <?php echo json_encode($salesList); ?>;
            var selected_route_id= <?php echo json_encode($selected_sales_id); ?>;
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

            //update previous credit and cheque

            //alert(outlets_id_credits[selected_payment_id]);
            var prev_cred = document.getElementById('previous_credit');
            var prev_chq = document.getElementById('previous_cheque');
            prev_cred.value=outlets_id_credits[selected_salesman_id];
            prev_chq.value=outlets_id_cheques[selected_salesman_id];


            // hide message field

            setTimeout(function(){ $('.success_message').hide(); }, 3000);


        });


		function validateForm() {
			var x = document.forms["invoice_form"]["invoice_no"].value;
			if (x == "") {
				alert("Invoice No Cannot be empty!");
				return false;
				document.getElementById('invoice_no').focus();

			}
			if (!$.isNumeric(x)) {
				alert("Invoice No must be a Number!");
				return false;
				document.getElementById('invoice_no').focus();

			}
		}


	</script>
	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop