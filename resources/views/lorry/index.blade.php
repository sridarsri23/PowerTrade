@extends('user.system')
@section('middle_right_DIV')

    <div class="success_message">
        {!! Session::get('message') !!}


    </div>
    <div class="error_message">
        {!! Session::get('scs_errors') !!}


    </div>
<script>
    function ConfirmDelete(no)
    {
        // alert(no);
        var x = confirm("Are you sure, you want to Delete Lorry: "+no+"?");
        if (x) {
            return true;
        }
        else {
            return false;
        }
    }

</script>
    <h2>Lorries</h2>
<p>

    @if(Session::get('privileges')['new_lorry'])
        <a href="{!!URL::to('lorry/create')!!}" class="btn" id="new_lorry">New Lorry</a>
    @endif


        @if(Session::get('privileges')['new_lorry_expense'])
            <a href="{!!URL::to('lorry_expense/create')!!}" class="btn" id="new_employee" style="width: 200px;">{!! 'New Lorry Expense' !!}</a>
        @endif





</p>
@if ($lorryList->count())
    <div class="display_table">

        <div class="display_table_heading">Lorry List</div>




    @foreach ($lorryList as $lorry)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Lorry Code

                    </div>
                    <div class="display_table_data_cell">

                        {!! $lorry->code !!}

                    </div>


                </div>


                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Lorry No

                    </div>
                    <div class="display_table_data_cell">

                        {!! $lorry->no !!}

                    </div>


                </div>



            </div>


            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_lorry'])
                            {!! link_to_route('lorry.show', 'View', array($lorry->id),
                  array('class' => 'btn btn-primary view','id' => 'view_lorry')) !!}
                        @endif


                                      

                    </div>
                    <div class="display_table_row_buttons">
                    @if(Session::get('privileges')['edit_lorry'])

                        {!! link_to_route('lorry.edit', 'Edit', array($lorry->id),
                              array('class' => 'btn btn-warning edit','id' => 'edit_lorry')) !!}
                    @endif




                     </div>
                     <div class="display_table_row_buttons">
                         @if(Session::get('privileges')['delete_lorry'])

                             {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete("'.$lorry->no.'")', 'route' =>
                                             array('lorry.destroy', $lorry->id))) !!}
                             {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_lorry')) !!}

                             {!! Form::close() !!}
                         @endif



                     </div>



                 </div>

             </div>


 </div>
     @endforeach
    </div>

 @else
 'There are no Lorries yet!'
 @endif
 @stop


 @section('bottom_DIV')

 @stop