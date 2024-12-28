@extends('user.agents')
@section('middle_right_DIV')

			<h4>View Day End</h4>

            @if ($orderList->count())


            {!! Form::open(array('url' => 'finalize_settle','method'=>'put' )) !!}
            <ul class="form_UL">
                    <h4> Day End Details </h4>

                <li>

                    {!! Form::label('agent_id', 'Agent') !!}
                    {!!Form::select('agent_id', $agents,$settlement->agent_id,array('id'=>'agent_id','class' => 'form_element','disabled'=>'disabled'))!!}
                </li>
                <script>




                    $("#agent_id").change(function(){

                        var sites_code = <?php echo json_encode($agents_code); ?>;
                        var selected_site_id=$( "#agent_id" ).val();
                        var employee_code=$( "#code" ).val();
                        var code_element = document.getElementById('code');
                        var res = default_full_point_code.replace(default_site_code, sites_code[selected_site_id]);
                        code_element.value=res;//sites_code[selected_site_id]+'/';

                        default_site_code=sites_code[selected_site_id];
                        default_full_point_code=res;
                        default_full_point_code_helper=res;



                        var foods = <?php echo json_encode($acc_groups); ?>;
                        $('#agent_bank_acc').html('');

                        jQuery.each(foods, function( index, value ) {
                            //console.log( 'site '+index +' user '+ value + ' selected site'+selected_vehicle);
                            //	alert("in");
                            //alert( index +' '+ value  +' in');
                            if(selected_site_id == index ){
                                //alert( foods[selected_company_id][0]);
                                // alert( foods[selected_company_id][1]);
                                // alert( foods[selected_company_id][2]);
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][0] + '">' +  foods[selected_site_id][0] + '</option>');
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][1] + '">' +  foods[selected_site_id][1] + '</option>');
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][2] + '">' +  foods[selected_site_id][2] + '</option>');
                                $('#agent_bank_acc').append('<option value="' +  foods[selected_site_id][3] + '">' +  foods[selected_site_id][3] + '</option>');
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

                    var default_site_code;
                    var default_company_code;
                    var default_driver_type_code;
                    var default_full_point_code;
                    var default_full_point_code_helper;

                    $( document ).ready(function() {
                        var sites_code = <?php echo json_encode($agents_code); ?>;
                        var selected_site_id=$( "#agent_id" ).val();


                        var coder = <?php echo json_encode($settlement->code); ?>;
                        var code_element = document.getElementById('code');
                        default_site_code=sites_code[selected_site_id];
                        default_full_point_code=default_site_code+'/'+coder;
                        code_element.value=default_full_point_code;
                        default_full_point_code_helper=default_full_point_code;
                        //$("#client_id").prepend("<option value='' selected='selected'>Choose Client</option>");

                    });

                </script>
                <li>
                    {!! Form::label('code', 'Day End Code') !!}
                    {!! Form::text('code',$settlement->code,array('class' => 'form_element','readonly'=>'readonly')) !!}
                </li>


                <li>
                    {!! Form::label('date', 'Date') !!}
                    {!! Form::text('date',$settlement->date,array('class' => 'form_element','id'=>'date','readonly'=>'readonly')) !!}

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
                            //defaultDate:'8.12.1986', // it's my birthday
                            //defaultDate:'+03.01.1970', // it's my birthday
                            //defaultTime:'07:30',
                            //timepickerScrollbar:true
                        });

                    </script>
                </li>


                <li>


                    {!! Form::label('agent_bank_acc','Client Bank Account') !!}

                    {!!Form::select('agent_bank_acc', $temp_client_bank_accounts, $settlement->agent_bank_acc,array('id'=>'agent_bank_acc','class' => 'form_element','disabled'=>'disabled'))!!}
                </li>

            <?php $total_lkr=0 ?>
                <?php $total_sdr=0 ?>
                <?php  $total_cmn=0 ?>

                @foreach ($orderList as $index => $order)

                <li>
                    {!! Form::hidden('ord'.$index, $order->id) !!}
                    {!! Form::label('code',App\Models\Client::where('id','=',$order->client_id)->first()['name'].' : '.$order->code) !!}

                    {!! Form::text('code','SDR'.'='.$order->from_currency_amount.' | '.'LKR'.'='.$order->to_currency_amount.' | '.'CMN'.'='.$order->comission_amount,array('class' => 'form_element','id'=>'code','readonly'=>'readonly')) !!}

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
                    {!! Form::textarea('note',$settlement->note,array('class' => 'form_element','readonly'=>'readonly')) !!}
                </li>





            {!! Form::close() !!}

                    <li>

                        <a href="{!!URL::to('search_settlement')!!}" class="btn">Back</a>

            {!! Form::open(array('method'=>'put' , 'onsubmit' => 'return ConfirmDelete()', 'url' =>
       'delete_settlement')) !!}

            {!! Form::hidden('settlement_id',$settlement->id)!!}
            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_settlement')) !!}

            {!! Form::close() !!}

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
                    </li>
            </ul>
            @else
                <h5>No Results!</h5>
            @endif
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop