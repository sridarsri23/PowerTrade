@extends('user.orders')
@section('middle_right_DIV')
    <div class="success_message">
        {!! Session::get('message') !!}


    </div>
    <div class="error_message">
        {!! Session::get('scs_errors') !!}


    </div>
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

    <p>



        <a href="{!!URL::to('order/create')!!}" class="btn" id="new_order">New Order</a>
        <a href="{!!URL::to('createc')!!}" class="btn" id="new_order"  style="width:240px;" >New Order + Client</a>





    </p>
    @if ($orderList->count())
        <div class="display_table">

            <div class="display_table_heading">Today Orders</div>




            @foreach ($orderList as $order)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Order Code</div>
                            <div class="display_table_data_cell">
                                {!! $order->code !!}
                            </div>


                        </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$order->agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Client Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Client::where('id','=',$order->client_id)->first()['name'] !!}

                            </div>

                    </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                               Order Amounts

                            </div>
                            <div class="display_table_data_cell">

                                {!!
                                 'SDR'.'='.$order->from_currency_amount.' | '.'LKR'.'='.$order->to_currency_amount.' | '.'CMN'.'='.$order->comission_amount.' | '.' LKR + CMN = '.($order->to_currency_amount+$order->comission_amount)
                                 !!}

                            </div>


                        </div>
                        </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">

                                {!! link_to_route('order.show', 'View', array($order->id),
                            array('class' => 'btn btn-primary view','id' => 'view_order')) !!}


                            </div>


                            @if(!$order->is_paid_to_agent)
                            <div class="display_table_row_buttons">


                                {!! link_to_route('order.edit', 'Edit', array($order->id),
                                      array('class' => 'btn btn-warning edit','id' => 'edit_order')) !!}

                            </div>

                            <div class="display_table_row_buttons">


                                {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('order.destroy', $order->id))) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_order')) !!}

                                {!! Form::close() !!}

                            </div>
                            @endif

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Orders for today yet!</h5>
    @endif

{{-- Un Settled Alltime Orders --}}
    @if ($unsettled_orderList->count())
        <div class="display_table" id="unsettled_orders_div">

            <div class="display_table_heading">All Time Un-Settled Orders</div>




            @foreach ($unsettled_orderList as $order)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Order Code</div>
                            <div class="display_table_data_cell">
                                {!! $order->code !!}
                            </div>


                        </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$order->agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Client Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Client::where('id','=',$order->client_id)->first()['name'] !!}

                            </div>


                        </div>



                    </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">

                                {!! link_to_route('order.show', 'View', array($order->id),
                            array('class' => 'btn btn-primary view','id' => 'view_order')) !!}


                            </div>


                            @if(!$order->is_paid_to_agent)
                                <div class="display_table_row_buttons">


                                    {!! link_to_route('order.edit', 'Edit', array($order->id),
                                          array('class' => 'btn btn-warning edit','id' => 'edit_order')) !!}

                                </div>

                                <div class="display_table_row_buttons">


                                    {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('order.destroy', $order->id))) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_order')) !!}

                                    {!! Form::close() !!}

                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Previous Un-Settled Orders!</h5>
    @endif

    {{-- Credit Orders --}}
    @if ($credit_orderList->count())
        <div class="display_table" id="credit_orders_div">

            <div class="display_table_heading">Credit Orders</div>




            @foreach ($credit_orderList as $order)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Order Code</div>
                            <div class="display_table_data_cell">
                                {!! $order->code !!}
                            </div>


                        </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$order->agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Client Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Client::where('id','=',$order->client_id)->first()['name'] !!}

                            </div>


                        </div>



                    </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">

                                {!! link_to_route('order.show', 'View', array($order->id),
                            array('class' => 'btn btn-primary view','id' => 'view_order')) !!}


                            </div>


                            @if(!$order->is_paid_to_agent)
                                <div class="display_table_row_buttons">


                                    {!! link_to_route('order.edit', 'Edit', array($order->id),
                                          array('class' => 'btn btn-warning edit','id' => 'edit_order')) !!}

                                </div>

                                <div class="display_table_row_buttons">


                                    {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('order.destroy', $order->id))) !!}
                                    {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_order')) !!}

                                    {!! Form::close() !!}

                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Credit Orders!</h5>
    @endif
@stop


@section('bottom_DIV')

@stop