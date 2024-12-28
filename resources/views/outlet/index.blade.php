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
    <h2>Outlets</h2>
<div id="top_para">

    @if(Session::get('privileges')['new_outlet'])
        <a href="{!!URL::to('outlet/create')!!}" class="btn" id="new_outlet">New Outlet</a>
        <a href="{!!URL::to('import_outlet')!!}" class="btn" id="import_outlet">Import From Excel</a>
    @endif

        @if(Session::get('privileges')['delete_outlet'])
            <a href="{!!URL::to('search_invoices_for_cheque')!!}" class="btn" id="new_outlet">Realise Cheque</a>
        @endif
        @if(Session::get('privileges')['delete_outlet'])
            <a href="{!!URL::to('search_routes_for_credit')!!}" class="btn" id="import_outlet">Settle Credit Receiving</a>
        @endif


        {!! Form::open(array('url' => 'search_view_outlet','method'=>'put','style' => 'margin-top:10px;' ,'id'=>'search_form')) !!}

        <label style="margin-right: 30px;">Search :</label>
        {!!Form::select('outlet_id', $outlets,'',array('data-placeholder'=>'Choose a Outlet','id'=>'outlet_id','class' => 'form_element'))!!}
        {!! Form::submit('Go', array('class' => 'btn btn-primary')) !!}

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
        <script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>

        <script type="text/javascript">

            $("#outlet_id").chosen({
                no_results_text: "Oops, nothing found!",
                search_contains: false,
                allow_single_deselect: true
            });

        </script>

        {!! Form::close() !!}

    </div>
    <script>
        $( document ).ready(function() {
            ///alert("changes");
            document.getElementById('new_outlet').focus();
        });

    </script>

@if ($outletsList->count())
    <div class="display_table">

        <div class="display_table_heading">Outlet List</div>




    @foreach ($outletsList as $outlet)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable tabindex = "-1">

                    <div class="display_table_heading_cell">
                        Outlet Name

                    </div>
                    <div class="display_table_data_cell">

                        {!! $outlet->name !!}

                    </div>


                </div>





            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_outlet'])
                            {!! link_to_route('outlet.show', 'View', array($outlet->id),
                                   array('class' => 'btn btn-primary view','id' => 'view_outlet')) !!}
                        @endif

                                      

                    </div>

                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['edit_outlet'])

                            {!! link_to_route('outlet.edit', 'Edit', array($outlet->id),
                                  array('class' => 'btn btn-warning edit','id' => 'edit_outlet')) !!}
                        @endif

                               
                    </div>
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['delete_outlet'])

                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                array('outlet.destroy', $outlet->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_outlet')) !!}

                            {!! Form::close() !!}
                        @endif


                </div>
                </div>
	     
            </div>
</div>
    @endforeach
   </div>

@else
'There are no Outlets yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop