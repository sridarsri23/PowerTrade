@extends('user.sales')
@section('middle_right_DIV')
	<h4>View Sales Return</h4>
	{!! Form::open(array('route' => 'invoice.store','files' => true)) !!}
	<ul class="invoice_form_UL">
		<li>

			{!! Form::label('sales_id', 'Sales Code') !!}

				<span class="invoice_show">
			{!! dtc\Models\Sales::where('id','=',$sales_return->sales_id)->first()['code'] !!}
			</span>
		</li>

		<li>

			{!! Form::label('outlet_id', 'Outlet') !!}
			<span class="invoice_show">
			{!! dtc\Models\Outlet::where('id','=',$sales_return->outlet_id)->first()['name'] !!}
				</span>
		</li>





		<li>
			{!! Form::label('code', 'Sales Return Code') !!}
			<span class="invoice_show" style="width: 400px;">
			{!! $sales_return->code!!}
			</span>
		</li>



		<li>
			{!! Form::label('date', 'Sales Return Date') !!}
			<span class="invoice_show">
            <?php
            $date = new DateTime($sales_return->date);
            echo $date->format('Y-m-d h:i A');
            ?>
			</span>
		</li>

		<li>
			{!! Form::label('invoice_no', 'Invoice No') !!}
			<span class="invoice_show">
			{!! $sales_return->invoice_no!!}
			</span>
		</li>




		<hr>
		<li>
			{!! Form::label('name','Sales Return Products')!!}

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
			@foreach ($salessales_returnList as  $sales_return_detail)

				<tr>

					<td class="invoice_span" style="width: 200px; text-align: left;" >
						{!! dtc\Models\Product::where('id','=',$sales_return_detail->product_id)->first()['name'] !!}
					</td>


					<td class="invoice_span" style="width: 100px;text-align: right;">
						{{ $sales_return_detail->price.'.00 Rs' }}
					</td>


					<td class="invoice_span" style="width: 50px;text-align: right;" id="qty">
						{{ $sales_return_detail->qty }}
					</td>

					<td class="invoice_span" style="width: 100px;text-align: right;">
						{{ ($sales_return_detail->qty * $sales_return_detail->price).'.00 Rs' }}
					</td>
					<td class="invoice_span" style="width: 100px;text-align: right;">
						{{ $sales_return_detail->is_resellable == '1' ? 'Yes' : 'No'}}
					</td>

					<td class="invoice_span" style="width: 100px;text-align: right;">
						{{ $sales_return_detail->is_sold == '1' ? 'Yes' : 'No'}}
					</td>



				</tr>

			@endforeach
		</table>


	<br />
		<li>
			{!! Form::label('Sales Return Total') !!}
			<span class="invoice_show">
			{!! $sales_return->total.'.00 Rs'!!}
			</span>
		</li>
		<li>
			{!! Form::label('Previous Credit') !!}
			<span class="invoice_show">
			{!! $sales_return->previous_credit.'.00 Rs'!!}
			</span>
		</li>

		<li>
			{!! Form::label('Total Payable Amount') !!}
			<span class="invoice_show">
			{!! $sales_return->total_payable.'.00 Rs'!!}
			</span>
		</li>
		<li>
			{!! Form::label('note', 'Note') !!}
			<span class="invoice_show">
			{!! $sales_return->note!!}
			</span>
		</li>





		<li>
			<a href="{!!URL::to('invoice')!!}" class="btn">Back</a>

		</li>





	</ul>

	{!! Form::close() !!}
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif
@stop