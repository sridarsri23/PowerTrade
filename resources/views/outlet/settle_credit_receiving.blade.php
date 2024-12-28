@extends('user.system')
@section('middle_right_DIV')
	<h4>Settle Credit Receiving on Sales: {!! $sales->code !!}</h4>
	{!! Form::open(array('url' => 'complete_settle_credit_receiving','method'=>'put' )) !!}
	<ul class="form_UL">

		<li>
			{!! Form::label('code', 'Sales Code') !!}
			{!! Form::text('code',$sales->code,array('class' => 'form_element')) !!}
			{!! Form::text('sales_id',$sales->id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
		</li>

		<li>
			{!! Form::label('code', 'Route Name') !!}
			{!! Form::text('code',$route->name,array('class' => 'form_element')) !!}
			{!! Form::text('route_id',$route->id,array('class' => 'form_element','hidden'=> 'hidden')) !!}
		</li>





		<li>
			{!! Form::label('name','Outlets')!!}

		</li>
		<hr>
		<table width="100%" border="0" id="invoice_table">
			<tr>
				<th style="text-align: center"> Outlet</th>
				<th style="text-align: center"> Cash Credit</th>
				<th style="text-align: center"> Credit Recieved</th>
				<th style="text-align: center"> Balance</th>

			</tr>


		@foreach ($outletList as $index => $outlet)

			<tr>

				<td class="invoice_span" style="width: 200px; text-align: left;" >
				{!! Form::label('name',$outlet->name, array('style'=>'width:200px;'))!!}
				</td>


				<td class="invoice_span" style="width: 100px;">
				{!! Form::text($outlet->id.'pcr', $outlet->credit,array('style'=>'width: 100px;','class' => 'form_elementt','id' => $outlet->id.'pcr')) !!}
				</td>

				<td class="invoice_span" style="width: 100px;" id="credit">
				{!! Form::text($outlet->id.'cr', 0,array('style'=>'width: 100px;','class' => 'form_elementt','id' => $outlet->id.'cr')) !!}
				</td>

				<td class="invoice_span" style="width: 100px;">
				{!! Form::text($outlet->id.'crb', $outlet->credit,array('style'=>'width: 100px;','class' => 'form_elementt','id' => $outlet->id.'crb')) !!}
				</td>






			</tr>

		@endforeach
		</table>

		<script>


			var total=0;


            $('#credit input').focusout(function () {

            //   var qty = document.getElementById(this.id);
             var credit =$(this).val();
               var credit_id = $(this).attr('id')
               // var code =  getCode(this.id);
					var balance_id = credit_id.replace('cr','crb');
					var previous_credit_id = credit_id.replace('cr','pcr');

                var previous_credit =  $('#'+previous_credit_id+'').val();
               // alert(previous_credit);
                   // var codee = null // $productCodeId[this.id];
                    //alert(codee);
                   // var price = $('#'+codee).val();
               		//	var baln
                   // alert(credit_id);


                    var balance_element = document.getElementById(balance_id);

                balance_element.value = parseFloat(previous_credit) - parseFloat(credit);
                var total_element = document.getElementById('total');
                total = parseFloat(total) + parseFloat(credit);
                total_element.value = total;









               // alert($(this).val());
               // $('#myform').data('lastSelected', $(this));
            });




		</script>

		<li>
			{!! Form::label('Total Credit Received') !!}
			{!!Form::text('total', '0',array('id'=>'total','class' => 'form_element'))!!}
		</li>




		<li>
			<a href="{!!URL::to('search_routes_for_credit')!!}" class="btn">Back</a>
			{!! Form::submit('Settle', array('class' => 'btn btn-primary')) !!}
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