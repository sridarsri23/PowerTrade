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



        <a href="{!!URL::to('giving/create')!!}" class="btn" id="new_giving">New Giving</a>





    </p>
    @if ($givingList->count())
        <div class="display_table">

            <div class="display_table_heading">Today Givings</div>




            @foreach ($givingList as $giving)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Giving Code</div>
                            <div class="display_table_data_cell">
                                {!! $giving->code !!}
                            </div>


                        </div>

                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Agent Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Agent::where('id','=',$giving->agent_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Client Name

                            </div>
                            <div class="display_table_data_cell">

                                {!! App\Models\Client::where('id','=',$giving->client_id)->first()['name'] !!}

                            </div>


                        </div>
                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Given Amount

                            </div>
                            <div class="display_table_data_cell">

                                {{ $giving->lkr." LKR" }}

                            </div>


                        </div>


                    </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">

                                {!! link_to_route('giving.show', 'View', array($giving->id),
                            array('class' => 'btn btn-primary view','id' => 'view_giving')) !!}


                            </div>

                            <div class="display_table_row_buttons">


                                {!! link_to_route('giving.edit', 'Edit', array($giving->id),
                                      array('class' => 'btn btn-warning edit','id' => 'edit_giving')) !!}

                            </div>

                            <div class="display_table_row_buttons">


                                {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('giving.destroy', $giving->id))) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_giving')) !!}

                                {!! Form::close() !!}

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Givings for today yet!</h5>
    @endif
@stop


@section('bottom_DIV')

@stop