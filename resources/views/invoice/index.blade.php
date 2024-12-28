@extends('user.sales')
@section('middle_right_DIV')

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
    <h2>Invoices</h2>
<p>


    @if(Session::get('privileges')['new_invoice'])
        <a href="{!!URL::to('search_sales')!!}" class="btn" id="new_invoice">New Invoice</a>
        <a href="{!!URL::to('search_sales_for_many')!!}" class="btn" id="new_invoice">Create Many Invoices</a>
    @endif

{!! Form::open(array('url' => 'search_view_invoice','method'=>'put','style' => 'margin-top:10px;' )) !!}

            <label style="margin-right: 30px;">Search :</label>
            {!!Form::select('invoice_id', $invoices,'',array('data-placeholder'=>'Choose a Invoice','id'=>'invoice_id','class' => 'form_element'))!!}
        {!! Form::submit('Go', array('class' => 'btn btn-primary')) !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>

    <script type="text/javascript">

        $("#invoice_id").chosen({
            no_results_text: "Oops, nothing found!",
            search_contains: false,
            allow_single_deselect: true
        });
    </script>

{!! Form::close() !!}

</p>







@if ($invoiceList->count())
    <div class="display_table">

        <div class="display_table_heading">Invoice List</div>




    @foreach ($invoiceList as $invoice)
            <div class="display_table_master_row">
            <div class="display_table_row">

                <div class="display_table_row_data" contenteditable>

                    <div class="display_table_heading_cell">
                        Invoice No

                    </div>
                    <div class="display_table_data_cell">

                        {!! $invoice->invoice_no !!}

                    </div>


                </div>




            </div>
            <div class="display_table_row">
                <div class="display_table_row_buttons_div">
                    <div class="display_table_row_buttons">
                        @if(Session::get('privileges')['view_invoice'])
                            {!! link_to_route('invoice.show', 'View', array($invoice->id),
                   array('class' => 'btn btn-primary view','id' => 'view_invoice')) !!}
                        @endif





                    </div>

                    @if(Session::get('privileges')['edit_invoice'])
                    <div class="display_table_row_buttons">


                              {!! link_to_route('invoice.edit', 'Edit', array($invoice->id),
                                    array('class' => 'btn btn-warning edit','id' => 'edit_invoice')) !!}

                    </div>
                    @endif
                        @if(Session::get('privileges')['delete_invoice'])
                    <div class="display_table_row_buttons">


                            {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('invoice.destroy', $invoice->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_invoice')) !!}

                            {!! Form::close() !!}

                    </div>
                    @endif
                </div>

            </div>
</div>
    @endforeach
   </div>

@else
'There are no Invoices yet!'
@endif
@stop

    
@section('bottom_DIV')
     
@stop