@extends('user.sales')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Loading</h3>
	<div class="display_table">

		<div class="display_table_heading">Loading Details</div>


		<div class="display_table_master_row">
			<div class="display_table_row">
				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('code', 'Loading Code' ) !!}</div>
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
					<div class="display_table_row_buttons"><a href="{!!URL::to('loading')!!}" class="btn">{!! 'Back'!!}</a>

					</div>

					@if(Session::get('privileges')['edit_loading'])
						<div class="display_table_row_buttons">


							{!! link_to_route('loading.edit', 'Edit', array($loading->id),
                                  array('class' => 'btn btn-warning edit','id' => 'edit_loading')) !!}

						</div>
					@endif
					@if(Session::get('privileges')['delete_loading'])
						<div class="display_table_row_buttons">


							{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                  array('loading.destroy', $loading->id))) !!}
							{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_loading')) !!}

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

	@if ($salesloadingList->count())
		<div class="display_table" id="dayendDIV">

			<div class="display_table_heading">Product QTYs</div>




			@foreach ($salesloadingList as $salesproducts)
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
					<div class="display_table_row_buttons"><a href="{!!URL::to('loading')!!}" class="btn">{!! 'Back'!!}</a>

					</div>


				</div>
			</div>
		</div>

	@else
		'There are no Loadings  yet!'
	@endif



@stop