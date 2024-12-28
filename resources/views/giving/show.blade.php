@extends('user.agents')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Giving</h3>
	<div class="display_table">

		<div class="display_table_heading">Giving Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Giving Code' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->code !!}
						</div>


					</div>
							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Agent Name' ) !!}</div>
								<div class="display_table_data_cell">
									{!! App\Models\Agent::where('id','=',$task->agent_id)->first()['name'] !!}
								</div>


							</div>



					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry','Giving Date' ) !!}</div>
						<div class="display_table_data_cell">

							<?php
							$date = new DateTime($task->date);
							echo $date->format('Y-m-d h:i A');
							?>

						</div>


					</div>



					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'SDR Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->sdr!!}
						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'LKR Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->lkr!!}
						</div>


					</div>




					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Agent Bank Account' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->agent_bank_acc !!}
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

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
							<div class="display_table_data_cell">

								{!! 	$task->note !!}
							</div>


						</div>
				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('giving')!!}" class="btn">My Givings</a>

								</div>

								<div class="display_table_row_buttons">

								{!! link_to_route('giving.edit', 'Edit', array($task->id),
												array('class' => 'btn btn-warning','id' => 'edit_giving')) !!}

								</div>
								<div class="display_table_row_buttons">


									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('giving.destroy', $task->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_giving')) !!}

									{!! Form::close() !!}

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