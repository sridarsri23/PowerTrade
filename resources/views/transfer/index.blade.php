@extends('user.agents')
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



        <a href="{!!URL::to('transfer/create')!!}" class="btn" id="new_transfer">New Transfer</a>





    </p>
    @if ($transferList->count())
        <div class="display_table">

            <div class="display_table_heading">Today Transfers</div>




            @foreach ($transferList as $transfer)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Transfer Code</div>
                            <div class="display_table_data_cell">
                                {!! $transfer->code !!}
                            </div>


                        </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                               From Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$transfer->from_agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                               To Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$transfer->to_agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Amount in LKR

                            </div>
                            <div class="display_table_data_cell">

                                {{ $transfer->lkr }}

                            </div>


                        </div>



                    </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">

                                {!! link_to_route('transfer.show', 'View', array($transfer->id),
                            array('class' => 'btn btn-primary view','id' => 'view_transfer')) !!}


                            </div>

                            <div class="display_table_row_buttons">



                            </div>

                            <div class="display_table_row_buttons">


                                {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('transfer.destroy', $transfer->id))) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_transfer')) !!}

                                {!! Form::close() !!}

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Transfers for today yet!</h5>
    @endif
@stop


@section('bottom_DIV')

@stop