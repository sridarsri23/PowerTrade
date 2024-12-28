@extends('user.system')


@section('middle_right_DIV')

    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
    <div class="display_table">

        <div class="display_table_heading">My Setup</div>
        {!! Form::open(array('url' => 'system/settings_update','method'=>'put' )) !!}


        <div class="display_table_master_row">

            <div class="display_table_row_entity" contenteditable>
                <div class="display_table_heading_cell">
                    {!! Form::label('loading', 'Agent Commission LKR/SGD') !!}


                    <div class="display_table_data_cell">

                        {!! Form::text('agent_commision_pcnt',$setupList->agent_commision_pcnt,array('class' => 'form_element')) !!}
                    </div>

                </div>

            </div>
        </div>



        <div class="display_table_master_row">


        </div>

        <div class="display_table_master_row">

            <div class="display_table_row_entity" contenteditable>
                <div class="display_table_heading_cell">
                    {!! Form::label('loading', 'SGD -> LKR') !!}


                    <div class="display_table_data_cell">

                        {!! Form::text('sd_to_lkr',$setupList->sd_to_lkr,array('class' => 'form_element')) !!}
                    </div>

                </div>

            </div>

        </div>
        <div class="display_table_master_row">

            <div class="display_table_row_entity" contenteditable>
                <div class="display_table_heading_cell">
                    {!! Form::label('loading', 'Capital SDR (Cash In Hand)') !!}


                    <div class="display_table_data_cell">

                        {!! Form::text('capital',$setupList->capital,array('class' => 'form_element')) !!}
                    </div>

                </div>

            </div>

        </div>
        {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}

        {!! Form::close() !!}

    </div>




    @stop