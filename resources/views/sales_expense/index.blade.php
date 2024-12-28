@extends('user.sales')
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
    <h2>Sales Expenses</h2>

    <p>

        @if(Session::get('privileges')['new_expense'])

            <a href="{!!URL::to('sales_expense/create')!!}" class="btn" id="new_expense">New Sales Expense</a>
        @endif







    </p>
    @if ($expenseList->count())
        <div class="display_table">

            <div class="display_table_heading">Sales Expenses</div>




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


                                @if(Session::get('privileges')['view_expense'])

                                    {!! link_to_route('sales_expense.show', 'View', array($expense->id),
                             array('class' => 'btn btn-primary view','id' => 'view_expense')) !!}
                                @endif


                            </div>
                            <div class="display_table_row_buttons">


                                @if(Session::get('privileges')['edit_expense'])

                                    {!! link_to_route('sales_expense.edit', 'Edit', array($expense->id),
                             array('class' => 'btn btn-primary view','id' => 'edit_expense')) !!}
                                @endif


                            </div>



                            <div class="display_table_row_buttons">

                                @if(Session::get('privileges')['delete_expense'])
                                {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('sales_expense.destroy', $expense->id))) !!}
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
        <h5>There are no Sales Expenses for today yet!</h5>
    @endif
@stop


@section('bottom_DIV')

@stop