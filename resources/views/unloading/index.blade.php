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
    <h2>Unloading</h2>
<p>

    @if(Session::get('privileges')['new_unloading'])
        <a href="{!!URL::to('unloading/create')!!}" class="btn" id="new_unloading">New unloading</a>
    @endif







</p>
@if ($unloadingList->count())
    <div class="display_table">

        <div class="display_table_heading">Unloading List</div>




    @foreach ($unloadingList as $unloading)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Unloading Code

                    </div>
                    <div class="display_table_data_cell">

                        {!! $unloading->code !!}

                    </div>


                </div>






            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_unloading'])
                            {!! link_to_route('unloading.show', 'View', array($unloading->id),
                         array('class' => 'btn btn-primary view','id' => 'view_unloading')) !!}
                        @endif


                                      

                    </div>

                    @if(Session::get('privileges')['edit_unloading'])
                        <div class="display_table_row_buttons">


                            {!! link_to_route('unloading.edit', 'Edit', array($unloading->id),
                                  array('class' => 'btn btn-warning edit','id' => 'edit_unloading')) !!}

                        </div>
                    @endif
                    @if(Session::get('privileges')['delete_unloading'])
                        <div class="display_table_row_buttons">


                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('unloading.destroy', $unloading->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_unloading')) !!}

                            {!! Form::close() !!}

                        </div>

                    @endif
                  
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Unloadings yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop