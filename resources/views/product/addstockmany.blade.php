@extends('user.stock')
@section('middle_right_DIV')

	<h4>Add Stocks for All/Many Products at Once</h4>



	@if ($productList->count())


		{!! Form::open(array('url' => 'completeaddstockmany','method'=>'put' )) !!}
		<ul class="form_UL">
			@foreach ($productList as $index => $product)

				<li>


					{!! Form::label('name',$product->name)!!}

					{!! Form::text($product->code,0,array('class' => 'form_element','id'=>$product->code)) !!}

             

				</li>

			@endforeach




			<li>
				<a href="{!!URL::to('settle')!!}" class="btn">Back</a>
				{!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
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