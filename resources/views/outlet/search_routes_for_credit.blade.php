@extends('user.system')
@section('middle_right_DIV')

    <h4>Search Sales for Settle Credit Receiving</h4>
    {!! Form::open(array('url' => 'settle_credit_receiving','method'=>'put' )) !!}
    <ul class="form_UL">



        <li>

            {!! Form::label('sales_id', 'Sales Code') !!}
            <div>
                {!!Form::select('sales_id', $sales,'',array('data-placeholder'=>'Choose a sales','id'=>'sales_id','class' => 'form_element'))!!}
            </div>
        </li>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
        <script src="{!!URL::to('js/chosen.jquery.js')!!}" type="text/javascript"></script>


        <script type="text/javascript">


            //$("#sales_id").chosen();

            $("#sales_id").chosen({
                no_results_text: "Oops, nothing found!",
                search_contains: true,
                allow_single_deselect: true
            });
        </script>



        <li>

            {!! Form::submit('Go', array('class' => 'btn btn-primary')) !!}
        </li>
    </ul>
    {!! Form::close() !!}
    @if ($errors->any())
        <ul>
            {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
        </ul>
    @endif
@stop