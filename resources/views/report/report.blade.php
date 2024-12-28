
@yield('user.reports')

@show
@yield('middle_right_DIV')

                <h3>{!! Lang::get('messages.company_bill') !!}</h3>

                        <form class="form-horizontal" role="form" method="PUT" action="treportt">
                            <input type="hidden"  />

                            <ul class="form_UL">


                                <li>
                                    {!! Form::label('company_id', Lang::get('messages.company')) !!}

                                    {!!Form::select('company_id', $companies,'1',array('id'=>'company_id','class' => 'form_element'))!!}
                                </li>

                                <li>
                                    {!! Form::label('order_id', Lang::get('messages.po_number')) !!}

                                    {!!Form::select('order_id', $orders,'1',array('id'=>'order_id','class' => 'form_element'))!!}
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

                                        <button type="submit" class="btn btn-primary">Generate</button>
                                    </li>



                            </ul>
                        </form>

@show