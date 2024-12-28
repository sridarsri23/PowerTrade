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
  var x = confirm('{!!  trans("messages.are_you_sure_you_want_to_delete") !!}');
  if (x)
    return true;
  else
    return false;
  }

</script>

<p>


@if($privileges['new_employee'])
        <a href="{!!URL::to('employee/create')!!}" class="btn" id="new_employee">{!! Lang::get('messages.new_employee') !!}</a>
        <a href="{!!URL::to('employee_payment/create')!!}" class="btn" id="new_employee" style="width: 200px;">{!! 'New Employee Payment' !!}</a>
    @endif




</p>
@if ($employeeList->count())
    <div class="display_table">

        <div class="display_table_heading">{!! Lang::get('messages.employees') !!}</div>




    @foreach ($employeeList as $employee)
            <div class="display_table_master_row">
            <div class="display_table_row">



                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">{!! Lang::get('messages.employee_name') !!}</div>
                    <div class="display_table_data_cell">{!!  $employee->name!!}</div>


                </div>

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">{!! Lang::get('messages.can_login') !!}</div>
                    <div class="display_table_data_cell">{!!  $employee->can_login == 1? 'Yes' : 'No'!!}</div>


                </div>




            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                                        @if($privileges['view_employee'])
                                        {!! link_to_route('employee.show', Lang::get('messages.view'), array($employee->id),
                                    array('class' => 'btn btn-primary view','id' => 'view_employee')) !!}
                                        @endif

                    </div>
                    <div class="display_table_row_buttons">

                              @if($privileges['edit_employee'])
                              {!! link_to_route('employee.edit', Lang::get('messages.edit'), array($employee->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_employee')) !!}
                                @endif
                    </div>
                    <div class="display_table_row_buttons">

                              @if($privileges['delete_employee'])
                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('employee.destroy', $employee->id))) !!}
                            {!! Form::submit(Lang::get('messages.delete'), array('class' => 'btn btn-danger delete','id' => 'delete_employee')) !!}

                            {!! Form::close() !!}
                                  @endif
                    </div>
                  
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
{!! Lang::get('messages.there_are_no_sites') !!}
@endif
@stop

    
@section('bottom_DIV')
     
@stop