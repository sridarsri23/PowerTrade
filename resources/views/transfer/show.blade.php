@extends('user.agents')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Transfer</h3>
	<div class="display_table">

		<div class="display_table_heading">Transfer Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Transfer Code' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->code !!}
						</div>


					</div>
							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'From Agent' ) !!}</div>
								<div class="display_table_data_cell">
									{!! App\Models\Agent::where('id','=',$task->from_agent_id)->first()['name'] !!}
								</div>


							</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'To Agent' ) !!}</div>
								<div class="display_table_data_cell">
									{!! App\Models\Agent::where('id','=',$task->to_agent_id)->first()['name'] !!}
								</div>


							</div>



					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry','Transfer Date' ) !!}</div>
						<div class="display_table_data_cell">

							<?php
							$date = new DateTime($task->date);
							echo $date->format('Y-m-d h:i A');
							?>

						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->lkr. " LKR"!!}
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
								<div class="display_table_row_buttons"><a href="{!!URL::to('transfer')!!}" class="btn">My Transfers</a>

								</div>

								<div class="display_table_row_buttons">



								</div>
								<div class="display_table_row_buttons">


									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('transfer.destroy', $task->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_transfer')) !!}

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