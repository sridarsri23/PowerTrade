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
    <h2>Sales Returns</h2>
<p>



        <a href="{!!URL::to('search_sales_for_sales_return')!!}" class="btn" id="new_sales_return">New Sales Return</a>





</p>
@if ($sales_returnList->count())
    <div class="display_table">

        <div class="display_table_heading">Sales Return List</div>




    @foreach ($sales_returnList as $sales_return)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Invoice No

                    </div>
                    <div class="display_table_data_cell">

                        {!! $sales_return->invoice_no !!}

                    </div>


                </div>






            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                                       
                                        {!! link_to_route('sales_return.show', 'View', array($sales_return->id),
                                    array('class' => 'btn btn-primary view','id' => 'view_sales_return')) !!}
                                      

                    </div>

                    {{--
                    <div class="display_table_row_buttons">

                           
                              {!! link_to_route('sales_return.edit', 'Edit', array($sales_return->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_sales_return')) !!}
                               
                    </div>
                    <div class="display_table_row_buttons">

                              
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('sales_return.destroy', $sales_return->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_sales_return')) !!}

                            {!! Form::close() !!}
                                  
                    </div>
                  --}}
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Sales Returns yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop