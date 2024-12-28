@extends('user.system')
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
    <h2>Running Expenses</h2>

    <p>



        <a href="{!!URL::to('running_expense/create')!!}" class="btn" id="new_expense">New Running Expense</a>





    </p>
    @if ($expenseList->count())
        <div class="display_table">

            <div class="display_table_heading">Running Expenses</div>




            @foreach ($expenseList as $expense)
                <div class="display_table_master_row">
                    <div class="display_table_row">


                        <div class="display_table_row_data" contenteditable>

                            <div class="display_table_heading_cell">
                                Expense Code</div>
                            <div class="display_table_data_cell">
                                {!! $expense->code !!}
                            </div>


                        </div>



                    </div>
                    <div class="display_table_row">
                        <div class="display_table_row_buttons_div">
                            <div class="display_table_row_buttons">
                                @if(Session::get('privileges')['view_running_expense'])
                                {!! link_to_route('running_expense.show', 'View', array($expense->id),
                            array('class' => 'btn btn-primary view','id' => 'view_expense')) !!}
                            @endif
    
                            </div>
                            <div class="display_table_row_buttons">
                                @if(Session::get('privileges')['edit_running_expense'])
                                {!! link_to_route('running_expense.edit', 'Edit', array($expense->id),
                            array('class' => 'btn btn-primary view','id' => 'edit_expense')) !!}
                            @endif
    
                            </div>

                              
                            <div class="display_table_row_buttons">

                                @if(Session::get('privileges')['delete_running_expense'])
                                {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('running_expense.destroy', $expense->id))) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_expense')) !!}

                                {!! Form::close() !!}
                                @endif
                            </div>
                                  
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @else
        <h5>There are no Running Expenses for yet!</h5>
    @endif
@stop


@section('bottom_DIV')

@stop