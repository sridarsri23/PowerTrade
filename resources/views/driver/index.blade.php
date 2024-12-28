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
    <h2>Drivers</h2>
<p>

    @if(Session::get('privileges')['new_driver'])
        <a href="{!!URL::to('driver/create')!!}" class="btn" id="new_driver">New Driver</a>
    @endif

        @if(Session::get('privileges')['new_driver_payment'])
            <a href="{!!URL::to('driver_create_payment')!!}" class="btn" id="new_employee" style="width: 200px;">{!! 'New Driver Payment' !!}</a>
        @endif

    </p>

@if ($driverList->count())
    <div class="display_table">

        <div class="display_table_heading">Driver List</div>




    @foreach ($driverList as $driver)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Driver Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $driver->name !!}

                    </div>


                </div>





            </div>


            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_driver'])
                            {!! link_to_route('driver.show', 'View', array($driver->id),
                                    array('class' => 'btn btn-primary view','id' => 'view_driver')) !!}
                        @endif

                                      

                    </div>


                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['edit_driver'])

                            {!! link_to_route('driver.edit', 'Edit', array($driver->id),
                                  array('class' => 'btn btn-warning edit','id' => 'edit_driver')) !!}
                        @endif


                               
                    </div>
                    <div class="display_table_row_buttons">

                        @if(Session::get('privileges')['delete_driver'])

                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                     array('driver.destroy', $driver->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_driver')) !!}

                            {!! Form::close() !!}
                        @endif

                                  
                    </div>

                </div>
	     
            </div>


</div>
    @endforeach
   </div>

@else
'There are no Drivers yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop