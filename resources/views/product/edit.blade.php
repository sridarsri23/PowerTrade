@extends('user.stock')
@section('middle_right_DIV')

			<h4>{!! 'Edit Product' !!}</h4>
		{!! Form::open(array('route' => array('product.update', $product->id) ,'method' => 'PUT','files' => true)) !!}
		<ul class="form_UL">


			<li>
				{!! Form::label('code', 'Product Code') !!}
				{!! Form::text('code',$product->code,array('class' => 'form_element')) !!}
			</li>

                    <li>
                        {!! Form::label('name', 'Product Name' )!!}
                        {!! Form::text('name',$product->name,array('class' => 'form_element')) !!}
                    </li>

                    <li>
                        {!! Form::label('qty', 'QTY') !!}
                        {!! Form::text('qty',$product->qty,array('class' => 'form_element')) !!}
                    </li>
                    <li>
                        {!! Form::label('minimum_cost_price', 'Default Cost Price') !!}
                        {!! Form::text('minimum_cost_price',$product->minimum_cost_price,array('class' => 'form_element')) !!}
                    </li>

                    <li>
                        {!! Form::label('maximum_selling_price', 'Default Selling Price') !!}
                        {!! Form::text('maximum_selling_price',$product->maximum_selling_price,array('class' => 'form_element')) !!}
                    </li>
			
                                <li>
                                    {!! Form::label('note', 'Note') !!}
                                    {!! Form::textarea('note',$product->note,array('class' => 'form_element')) !!}
                                </li>
			<li>
				<a href="{!!URL::to('product')!!}" class="btn">{!! 'Back' !!}</a>
		        {!! Form::submit('Edit', array('class' => 'btn btn-primary')) !!}
		    </li>
		</ul>
		{!! Form::close() !!}
		@if ($errors->any())
		<ul>
		    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		</ul>
		@endif
@stop