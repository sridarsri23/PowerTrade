
@extends('user.sales')

@section('middle_right_DIV')

                <h3>{!! 'Credit Sales by Route' !!}</h3>

                        <form class="form-horizontal" role="form" method="PUT" action="credit_saless">
                            <input type="hidden"  />

                            <ul class="form_UL">


                                <li>
                                    {!! Form::label('route_id', 'Route Name') !!}

                                    {!!Form::select('route_id', $routes,'1',array('id'=>'route_id','class' => 'form_element'))!!}
                                </li>



                                    <li>

                                        <button type="submit" class="btn btn-primary">Generate</button>
                                    </li>



                            </ul>
                        </form>
                <script>
                    $( document ).ready(function() {
                        ///alert("changes");
                        $("#route_id").focus();
                    });

                </script>
@stop
@section('bottom_DIV')

@stop