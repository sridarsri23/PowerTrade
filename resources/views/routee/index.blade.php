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
    <h2>Routes</h2>
<p>



    @if(Session::get('privileges')['new_route'])
        <a href="{!!URL::to('routee/create')!!}" class="btn" id="new_route">New Route</a>
    @endif







</p>
    <script>
        $( document ).ready(function() {
            ///alert("changes");
            document.getElementById('new_route').focus();
        });

    </script>
@if ($routeList->count())
    <div class="display_table">

        <div class="display_table_heading">Route List</div>




    @foreach ($routeList as $routee)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable tabindex = "-1">

                    <div class="display_table_heading_cell" tabindex = "-1">
                        Route Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $routee->name !!}

                    </div>


                </div>
                <div class="display_table_row_data" contenteditable tabindex = "-1">

                    <div class="display_table_heading_cell">
                      Code

                    </div>
                    <div class="display_table_data_cell" tabindex = "-1">

                        {!! $routee->code !!}

                    </div>


                </div>





            </div>

            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_route'])
                            {!! link_to_route('routee.show', 'View', array($routee->id),
                   array('class' => 'btn btn-primary view','id' => 'view_routee')) !!}
                        @endif

                                      

                    </div>
                    <div class="display_table_row_buttons">

                        @if(Session::get('privileges')['edit_route'])

                            {!! link_to_route('routee.edit', 'Edit', array($routee->id),
                                  array('class' => 'btn btn-warning edit','id' => 'edit_routee')) !!}
                        @endif

                               
                    </div>
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['delete_route'])

                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                   array('routee.destroy', $routee->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_routee')) !!}

                            {!! Form::close() !!}

                        @endif
                              

                    </div>
                  
                </div>

	     
            </div>

</div>
    @endforeach
   </div>

@else
'There are no Routes yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop