@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Running Expense</h3>
	<div class="display_table">

		<div class="display_table_heading">Running Expense Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Code' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->code !!}
						</div>


					</div>



					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Type' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->type !!}
						</div>


					</div>
							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Amount' ) !!}</div>
								<div class="display_table_data_cell">
									{!! $task->amount. ".00 Rs" !!}
								</div>


							</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
						<div class="display_table_data_cell">

							{!! 	$task->note !!}
						</div>


					</div>



					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry','Date' ) !!}</div>
						<div class="display_table_data_cell">

							<?php
							$date = new DateTime($task->date);
							echo $date->format('Y-m-d h:i A');
							?>

						</div>


					</div>






						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created At' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($task->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
							</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Updated At' ) !!}</div>
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
								<div class="display_table_row_buttons">
								<a href="{!!URL::to('running_expense')!!}" class="btn">Back</a>

								</div>

								<div class="display_table_row_buttons">

								@if(Session::get('privileges')['edit_running_expense'])
									{!! link_to_route('running_expense.edit', 'Edit', array($task->id),
								array('class' => 'btn btn-primary view','id' => 'edit_running_expense')) !!}
								@endif

								</div>


								<div class="display_table_row_buttons">

								@if(Session::get('privileges')['delete_running_expense'])
								{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
									array('running_expense.destroy', $task->id))) !!}
								{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_running_expense')) !!}

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