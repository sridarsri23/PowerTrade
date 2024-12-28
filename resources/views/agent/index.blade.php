@extends('user.agents')
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
    <h2>	<?php
 $fmt = new NumberFormatter( 'lk_LKR', NumberFormatter::CURRENCY );
        echo 'Total Credit : '.$fmt->formatCurrency($totalCreditAmount, "Rs ");
      //  setlocale(LC_MONETARY, 'en_SG');
      // echo money_format('%i', $totalCreditAmount);
        ?></h2>
<p>



        <a href="{!!URL::to('agent/create')!!}" class="btn" id="new_agent">New Agent</a>





</p>
@if ($productsList->count())
    <div class="display_table">

        <div class="display_table_heading">Agents List</div>




    @foreach ($productsList as $agent)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Agent Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $agent->name !!}

                    </div>


                </div>

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                       Credit Amount</div>
                    <div class="display_table_data_cell">
                        <?php
                        $fmt = new NumberFormatter( 'lk_LKR', NumberFormatter::CURRENCY );
                        echo $fmt->formatCurrency($agent->amount, "Rs ");
                        //  setlocale(LC_MONETARY, 'en_SG');
                        // echo money_format('%i', $totalCreditAmount);
                        ?>
                    </div>


                </div>

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Phone

                    </div>
                    <div class="display_table_data_cell">

                        {!! $agent->phone !!}

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