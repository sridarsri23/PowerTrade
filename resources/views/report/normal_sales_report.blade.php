
@extends('user.sales')

@section('middle_right_DIV')

                <h3>{!! 'Sales Report' !!}</h3>

                        <form class="form-horizontal" role="form" method="PUT" action="normal_sales_reportt">
                            <input type="hidden"  />

                            <ul class="form_UL">


                                <li>
                                    {!! Form::label('sales_id', 'Sales Code') !!}

                                    {!!Form::select('sales_id', $sales,'1',array('id'=>'sales_id','class' => 'form_element'))!!}
                                </li>



                                    <li>

                                        <button type="submit" class="btn btn-primary">Generate</button>
                                    </li>



                            </ul>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
                            <script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


                            <script type="text/javascript">


                                //$("#sales_id").chosen();

                                $("#sales_id").chosen({
                                    no_results_text: "Oops, nothing found!",
                                    search_contains: true,
                                    allow_single_deselect: true
                                });
                            </script>
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