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



        <a href="{!!URL::to('receiving/create')!!}" class="btn" id="new_receiving">New Receiving</a>





    </p>
    @if ($receivingList->count())
        <div class="display_table">

            <div class="display_table_heading">Today Receivings</div>




            @foreach ($receivingList as $receiving)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Receiving Code</div>
                            <div class="display_table_data_cell">
                                {!! $receiving->code !!}
                            </div>


                        </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$receiving->agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Currency

                            </div>
                            <div class="display_table_data_cell">

                                {{ $receiving->currency_amount." ". $receiving->currency." @ " .$receiving->rate }}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Received Amount in SDR

                            </div>
                            <div class="display_table_data_cell">

                                {{ $receiving->sdr." SDR" }}

                            </div>


                        </div>


                    </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">

                                {!! link_to_route('receiving.show', 'View', array($receiving->id),
                            array('class' => 'btn btn-primary view','id' => 'view_receiving')) !!}


                            </div>

                            <div class="display_table_row_buttons">



                            </div>

                            <div class="display_table_row_buttons">


                                {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('receiving.destroy', $receiving->id))) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_receiving')) !!}

                                {!! Form::close() !!}

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Receivings for today yet!</h5>
    @endif
@stop


@section('bottom_DIV')

@stop