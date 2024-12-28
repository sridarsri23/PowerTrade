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
    <h2>Salesmen</h2>
<p>
        <a href="{!!URL::to('agent/create')!!}" class="btn" id="new_agent">New Salesman</a>
    <a href="{!!URL::to('agent/create')!!}" class="btn" id="new_agent" style="width: 250px;text-align: right;">New Salesman Payment</a>

</p>

@if ($productsList->count())
    <div class="display_table">

        <div class="display_table_heading">Salesmen</div>




    @foreach ($productsList as $agent)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Salesman Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $agent->name !!}

                    </div>


                </div>






            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                                       
                                        {!! link_to_route('agent.show', 'View', array($agent->id),
                                    array('class' => 'btn btn-primary view','id' => 'view_agent')) !!}
                                      

                    </div>
                    <div class="display_table_row_buttons">

                           
                              {!! link_to_route('agent.edit', 'Edit', array($agent->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_agent')) !!}
                               
                    </div>
                    <div class="display_table_row_buttons">

                              
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('agent.destroy', $agent->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_agent')) !!}

                            {!! Form::close() !!}
                                  
                    </div>
                  
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Agents yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop