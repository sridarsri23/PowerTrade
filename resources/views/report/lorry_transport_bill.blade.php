
@yield('user.reports')

@show
@yield('middle_right_DIV')

                <h3>{!! Lang::get('messages.lorry_transport_bill') !!}</h3>

                        <form class="form-horizontal" role="form" method="PUT" action="credit_sales">
                            <input type="hidden"  />

                            <ul class="form_UL">


                                <li>
                                    {!! Form::label('driver_id', Lang::get('messages.driver')) !!}

                                    {!!Form::select('driver_id', $drivers,'1',array('id'=>'driver_id','class' => 'form_element'))!!}
                                </li>


                                <li>
                                    {!! Form::label('from', Lang::get('messages.from_date')) !!}

                                    {!!Form::text('from', '',array('id'=>'from','class' => 'form_element'))!!}
                                </li>

                                <li>
                                    {!! Form::label('to', Lang::get('messages.to_date')) !!}

                                    {!!Form::text('to', '',array('id'=>'to','class' => 'form_element'))!!}
                                </li>
                                <script>

                                    $('#driver_id').change(function(){



                                        var drivers_bill_date = <?php echo json_encode($drivers_id_bill_date );?>;
                                        var selected_driver=$( "#driver_id" ).val();
                                       // alert(selected_driver);
                                      //  alert(drivers_bill_date['selected_driver']);


                                        jQuery.each(drivers_bill_date, function( index, value ) {
                                          // console.log( 'site '+index +' user '+ value + ' selected driver'+selected_driver);

                                            if(selected_driver == value ){
                                                //	 alert( index +' '+ value  +' in');
                                             //  var selected_match=value;
                                                $("#from").val(index);
                                                $("#from").attr('disabled',true);
                                               /// console.log( selected_match+' '+value +' '+ index  +' inn');
                                                    /*
                                                $.each(employees, function( indexx, valuee ) {


                                                   	if(selected_match==indexx) {
                                                 alert( ' innnn');

                                                  //  $('#user_id').append('<option value="' + indexx + '">' + valuee + '</option>');

                                                    }
                                                });

                                                */
                                            }
                                            else{
                                                $("#from").val('');
                                                $("#from").attr('disabled',false);

                                            }



                                        });

                                    });

                                    $('#from').datetimepicker({

                                        format:'Y-m-d H:i',
                                        //defaultDate:'8.12.1986', // it's my birthday
                                        //defaultDate:'+03.01.1970', // it's my birthday
                                        defaultTime:'00:00',
                                        timepickerScrollbar:true
                                    });
                                    $('#to').datetimepicker({

                                        format:'Y-m-d H:i',
                                        //defaultDate:'8.12.1986', // it's my birthday
                                        //defaultDate:'+03.01.1970', // it's my birthday
                                       defaultTime:'23:59',
                                        timepickerScrollbar:true
                                    });
                                </script>


                                <li>
                                    {!! Form::hidden('update_bill_date',1) !!}
                                    {!! Form::label('update_bill_date', Lang::get('messages.update_bill_date')) !!}
                                    {!! Form::checkbox('update_bill_date',1,array('class' => 'form_element','id'=>'update_bill_date')) !!}
                                </li>


                                    <li>

                                        <button type="submit" class="btn btn-primary">Generate</button>
                                    </li>



                            </ul>
                        </form>

@show