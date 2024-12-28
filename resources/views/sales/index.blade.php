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
    <h2>Sales</h2>


<p>
    @if(Session::get('privileges')['new_sales'])
        <a href="{!!URL::to('sales/create')!!}" class="btn" id="new_sales">New Sales</a>
    @endif

   <!--  <a href="#" class="btn" id="new_sales" style="width: 220px;text-align: right;">New Sales From Previous</a> -->
    </p>

@if ($salesList->count())
    <div class="display_table">

        <div class="display_table_heading">Sales List</div>




    @foreach ($salesList as $sales)
            <div class="display_table_master_row">
            <div class="display_table_row">


                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Sales Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $sales->code !!}

                    </div>


                </div>





            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_sales'])
                            {!! link_to_route('sales.show', 'View', array($sales->id),array('class' => 'btn btn-primary view','id' => 'view_sales')) !!}

                        @endif


                    </div>

                    @if(Session::get('privileges')['edit_sales'])
                    <div class="display_table_row_buttons">

                           
                              {!! link_to_route('sales.edit', 'Edit', array($sales->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_sales')) !!}
                               
                    </div>
                    @endif
                        @if(Session::get('privileges')['delete_sales'])
                    <div class="display_table_row_buttons">

                              
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('sales.destroy', $sales->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_sales')) !!}

                            {!! Form::close() !!}
                                  
                    </div>
                    @endif
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Saless yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop