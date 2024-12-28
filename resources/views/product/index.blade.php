@extends('user.stock')
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


    @if(Session::get('privileges')['new_product'])
        <a href="{!!URL::to('product/create')!!}" class="btn" id="new_product">New Product</a>
    @endif




</p>
@if ($productsList->count())
    <div class="display_table">

        <div class="display_table_heading">Products List</div>




    @foreach ($productsList as $product)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Product Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $product->name !!}

                    </div>


                </div>

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        QTY

                    </div>
                    <div class="display_table_data_cell">

                        {!! $product->qty !!}

                    </div>


                </div>




            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_product'])
                                        {!! link_to_route('product.show', 'View', array($product->id),
                                    array('class' => 'btn btn-primary view','id' => 'view_product')) !!}
                                      @endif

                    </div>
                    <div class="display_table_row_buttons">

                        @if(Session::get('privileges')['edit_product'])
                              {!! link_to_route('product.edit', 'Edit', array($product->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_product')) !!}
                               @endif
                    </div>

                    <div class="display_table_row_buttons">

                        @if(Session::get('privileges')['delete_product'])
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('product.destroy', $product->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_product')) !!}
                            @endif
                            {!! Form::close() !!}
                                  
                    </div>
                  
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
There are no Products yet!
@endif
@stop

    
@section('bottom_DIV')
     
@stop