@extends('user.sales')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Sales</h3>
	<div class="display_table">

		<div class="display_table_heading">Sales Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Sales Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $task->code!!}</div>


								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Route' ) !!}</div>
						<div class="display_table_data_cell">
							{!! dtc\Models\Route::where('id','=',$task->route_id)->first()['name'] !!}
						</div>


					</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Lorry' ) !!}</div>
						<div class="display_table_data_cell">
							{!! dtc\Models\Lorry::where('id','=',$task->lorry_id)->first()['no'] !!}
						</div>


					</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Salesman' ) !!}</div>
						<div class="display_table_data_cell">
							{!! dtc\Models\User::where('id','=',$task->salesman_id)->first()['name'] !!}
						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Driver' ) !!}</div>
						<div class="display_table_data_cell">
							{!! dtc\Models\Driver::where('id','=',$task->driver_id)->first()['name'] !!}
						</div>


					</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Start Date' ) !!}</div>
						<div class="display_table_data_cell">
							<?php
							$date = new DateTime($task->start_date);
							echo $date->format('Y-m-d h:i A');
							?>
						</div>
					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'End Date' ) !!}</div>
						<div class="display_table_data_cell">
							<?php
							$date = new DateTime($task->end_date);
							echo $date->format('Y-m-d h:i A');
							?>
						</div>
					</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($task->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
							</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry','Updated Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($task->updated_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>


						</div>
				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('sales')!!}" class="btn">{!! 'Back'!!}</a>

								</div>

								@if(Session::get('privileges')['edit_sales'])
									<div class="display_table_row_buttons">


										{!! link_to_route('sales.edit', 'Edit', array($task->id),
                                              array('class' => 'btn btn-warning edit','id' => 'edit_sales')) !!}

									</div>
								@endif
								@if(Session::get('privileges')['delete_sales'])
									<div class="display_table_row_buttons">


										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                              array('sales.destroy', $task->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_sales')) !!}

										{!! Form::close() !!}

									</div>
								@endif
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
	
	
	{{-- Show Sales Products Costs--}}

	@if ($salesproductsList->count())
		<div class="display_table" id="dayendDIV">

			<div class="display_table_heading">Product Selling Prices</div>




			@foreach ($salesproductsList as $salesproducts)
				<div class="display_table_master_row">
					<div class="display_table_row">


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">

								{!! dtc\Models\Product::where('id','=',$salesproducts->product_id)->first()['name'] !!}
							</div>
							<div class="display_table_data_cell">
								{!! $salesproducts->cost_price.".00 Rs" !!}
							</div>


						</div>






					</div>

				</div>
			@endforeach

			<div class="display_table_row">
				<div class="display_table_row_buttons_div">
					<div class="display_table_row_buttons"><a href="{!!URL::to('sales')!!}" class="btn">{!! 'Back'!!}</a>

					</div>


				</div>
			</div>
		</div>


	@else
		'There are no Sales Products yet!'
	@endif



@stop