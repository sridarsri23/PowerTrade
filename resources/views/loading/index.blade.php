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
    <h2>Loading</h2>
<p>

    @if(Session::get('privileges')['new_loading'])
        <a href="{!!URL::to('loading/create')!!}" class="btn" id="new_loading">New Loading</a>
    @endif








</p>
@if ($loadingList->count())
    <div class="display_table">

        <div class="display_table_heading">Loading List</div>




    @foreach ($loadingList as $loading)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Loading Code

                    </div>
                    <div class="display_table_data_cell">

                        {!! $loading->code !!}

                    </div>


                </div>






            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_loading'])
                            {!! link_to_route('loading.show', 'View', array($loading->id),
         array('class' => 'btn btn-primary view','id' => 'view_loading')) !!}
                        @endif


                                      

                    </div>

                    @if(Session::get('privileges')['edit_loading'])
                    <div class="display_table_row_buttons">

                           
                              {!! link_to_route('loading.edit', 'Edit', array($loading->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_loading')) !!}
                               
                    </div>
                    @endif
                        @if(Session::get('privileges')['delete_loading'])
                    <div class="display_table_row_buttons">

                              
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('loading.destroy', $loading->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_loading')) !!}

                            {!! Form::close() !!}
                                  
                    </div>

                    @endif
                  
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Loadings yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop