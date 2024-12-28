@extends('user.clients')
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



        <a href="{!!URL::to('client/create')!!}" class="btn" id="new_client">New Client</a>





</p>
@if ($clientList->count())
    <div class="display_table">

        <div class="display_table_heading">Clients List</div>




    @foreach ($clientList as $client)
            <div class="display_table_master_row">
            <div class="display_table_row">


                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                       Client Code</div>
                    <div class="display_table_data_cell">
                        {!! $client->code !!}
                    </div>


                </div>

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Client Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $client->name !!}

                    </div>


                </div>
                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Phone

                    </div>
                    <div class="display_table_data_cell">

                        {!! $client->phone !!}

                    </div>


                </div>



            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                                       
                                        {!! link_to_route('client.show', 'View', array($client->id),
                                    array('class' => 'btn btn-primary view','id' => 'view_client')) !!}
                                      

                    </div>
                    <div class="display_table_row_buttons">

                           
                              {!! link_to_route('client.edit', 'Edit', array($client->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_client')) !!}
                               
                    </div>
                    <div class="display_table_row_buttons">

                              
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('client.destroy', $client->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_client')) !!}

                            {!! Form::close() !!}
                                  
                    </div>
                  
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Clients yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop