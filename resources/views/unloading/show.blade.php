@extends('user.sales')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Unloading</h3>
	<div class="display_table">

		<div class="display_table_heading">Unloading Details</div>


		<div class="display_table_master_row">
			<div class="display_table_row">
				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('code', 'Unloading Code' ) !!}</div>
					<div class="display_table_data_cell">{!! $task->code!!}</div>


				</div>
				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('name','Incharge' ) !!}</div>
					<div class="display_table_data_cell">
						{!! dtc\Models\User::where('id','=',$task->incharge_id)->first()['name'] !!}
					</div>


				</div>


				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('industry', 'Date' ) !!}</div>
					<div class="display_table_data_cell">
                        <?php
                        $date = new DateTime($task->date);
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
					<div class="display_table_row_buttons"><a href="{!!URL::to('unloading')!!}" class="btn">{!! 'Back'!!}</a>

					</div>

					{{--
                    <div class="display_table_row_buttons">

                    {!! link_to_route('sales.edit', 'Edit', array($task->id),
                                    array('class' => 'btn btn-warning','id' => 'edit_sales')) !!}

                    </div>
                    <div class="display_table_row_buttons">


                        {!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                              array('sales.destroy', $task->id))) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_sales')) !!}

                        {!! Form::close() !!}

                    </div>
                    --}}
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

	@if ($salesunloadingList->count())
		<div class="display_table" id="dayendDIV">

			<div class="display_table_heading">Product QTYs</div>




			@foreach ($salesunloadingList as $salesproducts)
				<div class="display_table_master_row">
					<div class="display_table_row">


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">

								{!! dtc\Models\Product::where('id','=',$salesproducts->product_id)->first()['name'] !!}
							</div>
							<div class="display_table_data_cell">
								{!! $salesproducts->qty !!}
							</div>


						</div>






					</div>



				</div>
			@endforeach


			<div class="display_table_row">
				<div class="display_table_row_buttons_div">
					<div class="display_table_row_buttons"><a href="{!!URL::to('unloading')!!}" class="btn">{!! 'Back'!!}</a>

					</div>


				</div>
			</div>
		</div>

	@else
		'There are no Unloadings  yet!'
	@endif



@stop