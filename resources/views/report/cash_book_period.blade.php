
@yield('user.reports')

@show
@yield('middle_right_DIV')

                <h3>{!! Lang::get('messages.cash_book') !!}</h3>

                        <form class="form-horizontal" role="form" method="PUT" action="period_cash_bookk">
                            <input type="hidden"  />

                            <ul class="form_UL">




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
<script>
    $( document ).ready(function() {
        ///alert("changes");
        $(".chosen-search input").focus();
    });

</script>

@show