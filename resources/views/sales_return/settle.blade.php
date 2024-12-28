@extends('user.agents')
@section('middle_right_DIV')

    <h4>Day End - Settle Agent</h4>
            @if ($agents->count())
			{!! Form::open(array('url' => 'completesettle','method'=>'put' )) !!}
		<ul class="form_UL">



			<li>
				{!! Form::label('date', 'Date') !!}
				{!! Form::text('date',\Carbon\Carbon::now()->format('Y-m-d'),array('class' => 'form_element','id'=>'date')) !!}

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
						format:'Y-m-d',
						//defaultDate:'2016-07-31', // it's my birthday
						//defaultDate:'+03.01.1970', // it's my birthday
						//defaultTime:'07:30',
						//timepickerScrollbar:false
                        timepicker:false,

					});

				</script>
			</li>

			<li>

				{!! Form::label('agent_id', 'Agent') !!}
				{!!Form::select('agent_id', $agents,'',array('id'=>'agent_id','class' => 'form_element'))!!}
			</li>

            <li>


                {!! Form::label('agent_bank_acc','Agent Bank Account') !!}

                {!!Form::select('agent_bank_acc', array(), '',array('id'=>'agent_bank_acc','class' => 'form_element'))!!}
            </li>

                <script>



                    $("#agent_id").change(function(){

                        var selected_company_id=$( "#agent_id" ).val();
                        var foods = <?php echo json_encode($acc_groups); ?>;
                        $('#agent_bank_acc').html('');

                        jQuery.each(foods, function( index, value ) {
                            //console.log( 'site '+index +' user '+ value + ' selected site'+selected_vehicle);
                            //	alert("in");
                         // alert( index +' '+ value  +' in');
                            if(selected_company_id == index ){
                                //alert( foods[selected_company_id][0]);
                                // alert( foods[selected_company_id][1]);
                                // alert( foods[selected_company_id][2]);
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_company_id][0] + '">' +  foods[selected_company_id][0] + '</option>');
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_company_id][1] + '">' +  foods[selected_company_id][1] + '</option>');
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_company_id][2] + '">' +  foods[selected_company_id][2] + '</option>');
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_company_id][3] + '">' +  foods[selected_company_id][3] + '</option>');
                                //	var selected_match=value;

                                //$.each(employees, function( indexx, valuee ) {
                                //console.log( selected_match+' '+valuee +' '+ indexx  +' inn');

                                //	if(selected_match==indexx) {
                                //	alert( ' innnn');
                                //$("#driver_id").val(selected_match);
                                //$('#user_id').append('<option value="' + indexx + '">' + valuee + '</option>');


                                //}
                                //});
                            }});


                    });

                </script>
			<li>

		        {!! Form::submit('Go', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}




            @endif



            @if ($orderList->count())


            {!! Form::open(array('url' => 'finalize_settle','method'=>'put' )) !!}
            <ul class="form_UL">
                    <h4> {!! App\Models\Agent::where('id','=',$agent_id)->first()['name'].' | '.$date.' | '.$agent_bank_acc!!} </h4>


                <li>
                    {!! Form::label('code', 'Day End Code') !!}
                    {!! Form::text('code',$code,array('class' => 'form_element')) !!}
                </li>
                <?php $total_lkr=0 ?>
                <?php $total_sdr=0 ?>
                <?php  $total_cmn=0 ?>

                {!! Form::hidden('agent_id', $agent_id) !!}
                {!! Form::hidden('date', $date) !!}
                {!! Form::hidden('agent_bank_acc', $agent_bank_acc) !!}
                {!! Form::hidden('pha', App\Models\Agent::where('id','=',$agent_id)->first()['amount']) !!}

                @foreach ($orderList as $index => $order)

                <li>
                    {!! Form::hidden('ord'.$index, $order->id) !!}
                    {!! Form::label('code',App\Models\Client::where('id','=',$order->client_id)->first()['name'].' : '.$order->code) !!}

                    {!! Form::text('codee','SDR'.'='.$order->from_currency_amount.' | '.'LKR'.'='.$order->to_currency_amount.' | '.'CMN'.'='.$order->comission_amount,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}

                    <?php $total_lkr=$total_lkr+ $order->to_currency_amount ?>
                    <?php $total_sdr=$total_sdr+ $order->from_currency_amount ?>
                        <?php $total_cmn=$total_cmn+ $order->comission_amount ?>

                </li>

                @endforeach

                <li>
                    {!! Form::label('total_sdr','Total SDR') !!}
                    {!! Form::text('total_sdr',$total_sdr,array('class' => 'form_element','id'=>'total_sdr','readonly'=>'readonly')) !!}
                </li>

                <li>
                    {!! Form::label('total_lkr','Total LKR') !!}
                    {!! Form::text('total_lkr',$total_lkr,array('class' => 'form_element','id'=>'total_lkr','readonly'=>'readonly')) !!}
                </li>

                <li>
                    {!! Form::label('total_cmn','Total Commission') !!}
                    {!! Form::text('total_cmn',$total_cmn,array('class' => 'form_element','id'=>'total_cmn','readonly'=>'readonly')) !!}
                </li>
                <li>
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::textarea('note','',array('class' => 'form_element')) !!}
                </li>


                <li>
                    <a href="{!!URL::to('settle')!!}" class="btn">Back</a>
                    {!! Form::submit('Settle', array('class' => 'btn btn-primary')) !!}
                </li>
            </ul>
            {!! Form::close() !!}



            @else
                <h5>No Results!</h5>
            @endif
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop