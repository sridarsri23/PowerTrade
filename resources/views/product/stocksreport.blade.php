@extends('user.stock')
@section('middle_right_DIV')

	<h4>Stocks Report</h4>



	@if ($productList->count())


		{!! Form::open(array('url' => 'completeaddstockmany','method'=>'put' )) !!}
		<ul class="form_UL">
			@foreach ($productList as $index => $product)

				<li>


					{!! Form::label('name',$product->name)!!}

					{!! Form::text($product->code,$product->qty,array('class' => 'form_element','id'=>$product->code,"disabled"=>"disabled")) !!}

             

				</li>

			@endforeach




			<li>
				<a href="{!!URL::to('stock')!!}" class="btn">Back</a>

			</li>
		</ul>
		{!! Form::close() !!}



	@else
		<h5>No Results!</h5>
	@endif
	@if ($errors->any())
		<ul>
			{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
	@endif

@stop