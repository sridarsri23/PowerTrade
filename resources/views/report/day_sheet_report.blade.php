@extends('user.sales')

@section('middle_right_DIV')

                <h3>{!! 'Sales Report' !!}</h3>

                        <form class="form-horizontal" role="form" method="PUT" action="day_sheet_reportt">
                            <input type="hidden"  />

                            <ul class="form_UL">


                                <li>
                                    {!! Form::label('from', 'From') !!}

                                    {!!Form::text('from', '',array('id'=>'from','class' => 'form_element'))!!}
                                </li>

                                <li>
                                    {!! Form::label('to', 'To' )!!}

                                    {!!Form::text('to', '',array('id'=>'to','class' => 'form_element'))!!}
                                </li>
                                <script src="{!!URL::to('js/respond.min.js')!!}"></script>
                                <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
                                <script type="text/javascript" src="{!!URL::to('js/responsivemobilemenu.js')!!}"></script>
                                <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
                                <script src="{!!URL::to('js/jquery.ezdz.js')!!}"></script>
                                <script src="{!!URL::to('js/fotorama.js')!!}"></script>
                                <script src="{!!URL::to('js/jquery.datetimepicker.js')!!}"></script>

                                <script>

                                    $('#from').datetimepicker({

                                        format:'Y-m-d',
                                        //defaultDate:'8.12.1986', // it's my birthday
                                        //defaultDate:'+03.01.1970', // it's my birthday
                                        //defaultTime:'00:00',
                                        //timepickerScrollbar:true
                                        timepicker:false
                                    });
                                    $('#to').datetimepicker({

                                        format:'Y-m-d',
                                        //defaultDate:'8.12.1986', // it's my birthday
                                        //defaultDate:'+03.01.1970', // it's my birthday
                                        //defaultTime:'00:00',
                                        //timepickerScrollbar:true
                                        timepicker:false
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

@stop
@section('bottom_DIV')

@stop