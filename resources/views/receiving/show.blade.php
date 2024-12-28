@extends('user.agents')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Receiving</h3>
	<div class="display_table">

		<div class="display_table_heading">Receiving Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Receiving Code' ) !!}</div>
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

						<div class="display_table_heading_cell">{!! Form::label('industry','Receiving Date' ) !!}</div>
						<div class="display_table_data_cell">

							<?php
							$date = new DateTime($task->date);
							echo $date->format('Y-m-d h:i A');
							?>

						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Currency' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->currency!!}
						</div>


					</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Currency Rate' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->rate!!}
						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Currency Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->currency_amount!!}
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

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Transport Charge' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->kooli !!}
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
								<div class="display_table_row_buttons"><a href="{!!URL::to('receiving')!!}" class="btn">My Receivings</a>

								</div>

								<div class="display_table_row_buttons">



								</div>
								<div class="display_table_row_buttons">


									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('receiving.destroy', $task->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_receiving')) !!}

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