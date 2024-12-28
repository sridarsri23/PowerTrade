@extends('user.stock')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Product</h3>
	<div class="display_table">

		<div class="display_table_heading">Product Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>
									<div class="display_table_heading_cell">{!! Form::label('code', 'Product Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $productObject->code!!}</div>
								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Product Name' ) !!}</div>
						<div class="display_table_data_cell">{!! $productObject->name!!}</div>


					</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('qty','QTY' ) !!}</div>
								<div class="display_table_data_cell">
									{!!$productObject->qty !!}
								</div>


					</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('minimum_cost_price', 'Default Cost Price') !!}</div>
								<div class="display_table_data_cell">
									{!! $productObject->minimum_cost_price !!}
								</div>


					</div>

						<div class="display_table_row_data" contenteditable>

										<div class="display_table_heading_cell">{!! Form::label('maximum_selling_price', 'Default Selling Price' ) !!}</div>
										<div class="display_table_data_cell">
											{!!$productObject->maximum_selling_price!!}</div>


						</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('note', 'Note' ) !!}</div>
						<div class="display_table_data_cell">
							{!!$productObject->note!!}</div>


					</div>

					<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($productObject->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
					</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry','Updated Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($productObject->updated_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>


						</div>
				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('product')!!}" class="btn">{!! 'Back'!!}</a>

								</div>
								<div class="display_table_row_buttons">
									@if(Session::get('privileges')['edit_product'])
								{!! link_to_route('product.edit', 'Edit', array($productObject->id),
												array('class' => 'btn btn-warning','id' => 'edit_product')) !!}
									@endif
								</div>
								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['delete_product'])
									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('product.destroy', $productObject->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_product')) !!}

									{!! Form::close() !!}
									@endif
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

							 </div>
				</div>
		</div>

	</div>
	

@stop