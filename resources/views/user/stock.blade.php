@extends('layouts.my_account_layout')

@section('top_right_top_top_divi')



@stop
	@section('middle_center_div')




	<h2 class="sub_heading">Products & Stocks</h2>

	@stop

@section('middle_DIV')
		
			
		@stop



	@section('middle_left_DIV')

	{!!HTML::image('images/icons/product.png', null, null)!!}

	<h4 class="side_link_heading">Products & Stocks</h4>
	@if(Session::get('privileges')['product'])
		{!! HTML::link('products', 'Products', array('class' => 'side_link','id' => 'product'))!!}
	@endif

	@if(Session::get('privileges')['add_stocks_many'])
	{!! HTML::link('addstockmany', 'Add Stocks Many', array('class' => 'side_link','id' => 'add_stocks_many'))!!}
	@endif
	@if(Session::get('privileges')['remove_stocks_many'])
{!! HTML::link('removestockmany', 'Remove Stocks Many', array('class' => 'side_link','id' => 'remove_stocks_many'))!!}
	@endif

@if(Session::get('privileges')['stock_report'])
{!! HTML::link('stocksreport', 'Stocks Report', array('class' => 'side_link','id' => 'stock_report'))!!}
@endif

	{{--

		{!! HTML::link('#', 'Add Stock One', array('class' => 'side_link','id' => 'my_agent'))!!}
		{!! HTML::link('#', 'Remove Stock One', array('class' => 'side_link','id' => 'my_agent'))!!}



    {!! HTML::link('settle', 'New Day End', array('class' => 'side_link','id' => 'settle_agent'))!!}
    {!! HTML::link('search_settlement', 'Search Day End', array('class' => 'side_link','id' => 'search_settlement'))!!}
    {!! HTML::link('giving', 'Givings', array('class' => 'side_link','id' => 'my_givings'))!!}
    {!! HTML::link('search_giving', 'Search Giving', array('class' => 'side_link','id' => 'search_giving'))!!}
    {!! HTML::link('receiving', 'Receivings', array('class' => 'side_link','id' => 'my_receiving'))!!}
    {!! HTML::link('transfer', 'Transfer', array('class' => 'side_link','id' => 'transfer'))!!}
    --}}


	@stop

	@section('middle_right_DIV')



	@stop


