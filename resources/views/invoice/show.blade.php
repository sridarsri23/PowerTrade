@extends('user.sales')
@section('middle_right_DIV')
	<h4>View Invoice</h4>

	<ul class="invoice_form_UL">
		<li>

			{!! Form::label('sales_id', 'Sales Code') !!}

				<span class="invoice_show_top">
			{!! dtc\Models\Sales::where('id','=',$invoice->sales_id)->first()['code'] !!}
			</span>
		</li>

		<li>

			{!! Form::label('outlet_id', 'Outlet') !!}
			<span class="invoice_show_top">
			{!! dtc\Models\Outlet::where('id','=',$invoice->outlet_id)->first()['name'] !!}
				</span>
		</li>





		<li>
			{!! Form::label('code', 'Invoice Code') !!}
			<span class="invoice_show_top" style="width: 400px;">
			{!! $invoice->code!!}
			</span>
		</li>



		<li>
			{!! Form::label('date', 'Invoice Date') !!}
			<span class="invoice_show_top">
            <?php
            $date = new DateTime($invoice->date);
            echo $date->format('Y-m-d h:i A');
            ?>
			</span>
		</li>

		<li>
			{!! Form::label('invoice_no', 'Invoice No') !!}
			<span class="invoice_show_top">
			{!! $invoice->invoice_no!!}
			</span>
		</li>




		<hr>
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
			@foreach ($salesinvoiceList as  $invoice_detail)

				<tr>

					<td class="invoice_span" style="width: 200px; text-align: left;" >
						{!! dtc\Models\Product::where('id','=',$invoice_detail->product_id)->first()['name'] !!}
					</td>


					<td class="invoice_span" style="width: 100px;text-align: right;">
						{{ $invoice_detail->price.'.00 Rs' }}
					</td>


					<td class="invoice_span" style="width: 50px;text-align: right;" id="qty">
						{{ $invoice_detail->qty }}
					</td>

					<td class="invoice_span" style="width: 50px;text-align: right;" id="qty">
						{{ $invoice_detail->free_issue }}
					</td>

					<td class="invoice_span" style="width: 100px;text-align: right;">
						{{ ($invoice_detail->qty * $invoice_detail->price).'.00 Rs' }}
					</td>



				</tr>

			@endforeach
		</table>


	<br />
		<li>
			{!! Form::label('Invoice Total') !!}
			<span class="invoice_show" >
			{!! $invoice->total.'.00 Rs'!!}
			</span>
		</li>

		<li>
			{!! Form::label('Discount') !!}
			<span class="invoice_show">
			{!! $invoice->discount.'.00 Rs'!!}
			</span>
		</li>

		<li>

			{!! Form::label('Net Total') !!}

			<span class="invoice_show" style="border-bottom: solid thin black;border-top: solid thin black;">

			{!! ($invoice->total - $invoice->discount).'.00 Rs'!!}
			</span>
		</li>
		<hr />
		<li>
			{!! Form::label('Previous Credit/Balance') !!}
			<span class="invoice_show">
			{!! $invoice->previous_credit.'.00 Rs'!!}
			</span>
		</li>
		<li>
			{!! Form::label('Previous Cheque/Balance') !!}
			<span class="invoice_show">
			{!! $invoice->previous_cheque.'.00 Rs'!!}
			</span>
		</li>

		<li>
			{!! Form::label('Previous Total Credit') !!}
			<span class="invoice_show" style="border-bottom: solid thin black;border-top: solid thin black;">
			{!! ($invoice->previous_cheque+  $invoice->previous_credit).'.00 Rs'!!}
			</span>
		</li>
		<hr />

		<li>
			{!! Form::label('Total Payable Amount') !!}
			<span class="invoice_show" style="border-bottom: solid thin black;border-top: solid thin black;">
			{!! $invoice->total_payable.'.00 Rs'!!}
			</span>
		</li>
		<hr />
		<li>
			{!! Form::label('note', 'Note') !!}
			<span class="invoice_show">
			{!! $invoice->note!!}
			</span>
		</li>



		<li>
			{!! Form::label('Cash') !!}
			<span class="invoice_show">
			{!! $invoice->cash.'.00 Rs'!!}
			</span>
		</li>

		<li>
			{!! Form::label('Credit') !!}
			<span class="invoice_show">
			{!! $invoice->credit.'.00 Rs'!!}
			</span>
		</li>
		<li>
			{!! Form::label('Cheque') !!}
			<span class="invoice_show">
			{!! $invoice->cheque_value.'.00 Rs'!!}
			</span>
		</li>

		<li>
			{!! Form::label('Total Credit') !!}
			<span class="invoice_show" style="border-bottom: solid thin black;border-top: solid thin black;">
			{!! ($invoice->credit + $invoice->cheque_value).'.00 Rs'!!}
			</span>
		</li>

		<hr />
		<li>
			{!! Form::label('Cheque No') !!}
			<span class="invoice_show">
			{!! $invoice->cheque_no!!}
			</span>
		</li>


		<li>
			{!! Form::label('cheque_date', 'Cheque Date') !!}
			<span class="invoice_show">

                <?php
                $date = new DateTime($invoice->cheque_date);
                echo $date->format('Y-m-d h:i A');
                ?>
			</span>
		</li>

		<li>

			{!! Form::label('cheque_bank', 'Cheque Bank') !!}
			<span class="invoice_show">
			{!! $invoice->cheque_bank!!}
			</span>
		</li>



		<li>
			<a href="{!!URL::to('invoice')!!}" class="btn">Back</a>

		</li>

		@if(Session::get('privileges')['edit_invoice'])
			<div class="display_table_row_buttons">


				{!! link_to_route('invoice.edit', 'Edit', array($invoice->id),
                      array('class' => 'btn btn-warning edit','id' => 'edit_invoice')) !!}

			</div>
		@endif
		@if(Session::get('privileges')['delete_invoice'])
			<div class="display_table_row_buttons">


				{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                      array('invoice.destroy', $invoice->id))) !!}
				{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_invoice')) !!}

				{!! Form::close() !!}

			</div>
		@endif
		<script>

            function ConfirmDelete()
            {
                var x = confirm("Are you sure, you want to Delete?");
                if (x)
                    return true;
                else
                    return false;
            }

		</script>




	</ul>


	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop