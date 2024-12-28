@extends('user.orders')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Order</h3>
	<div class="display_table">

		<div class="display_table_heading">Order Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Order Code' ) !!}</div>
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

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Client Name' ) !!}</div>
						<div class="display_table_data_cell">
							{!! App\Models\Client::where('id','=',$task->client_id)->first()['name'] !!}
						</div>


					</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry','Order Date' ) !!}</div>
						<div class="display_table_data_cell">

							<?php
							$date = new DateTime($task->date);
							echo $date->format('Y-m-d h:i A');
							?>

						</div>


					</div>



					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'From Currency Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->from_currency_amount!!}
						</div>


					</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'From Currency Rate' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->currency_rate!!}
						</div>


					</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'To Currency Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->to_currency_amount!!}
						</div>


					</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Commission Ratio/%' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->commission_pcnt !!}
						</div>


					</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Agent Commission Amount' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->comission_amount !!}
						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Is Paid to Agent?' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->is_paid_to_agent==1?'Yes':'No' !!}
						</div>


					</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Client Bank Account' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $task->client_bank_acc !!}
						</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Agent Bank Account' ) !!}</div>
						<div class="display_table_data_cell">
							{!! App\Models\Settlement::where('id','=',$task->settlement_id)->first()['agent_bank_acc'] !!}
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
								<div class="display_table_row_buttons"><a href="{!!URL::to('order')!!}" class="btn">My Orders</a>

								</div>
								@if(!$task->is_paid_to_agent)
								<div class="display_table_row_buttons">

								{!! link_to_route('order.edit', 'Edit', array($task->id),
												array('class' => 'btn btn-warning','id' => 'edit_order')) !!}

								</div>

									<div class="display_table_row_buttons">


										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                              array('order.destroy', $task->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_order')) !!}

										{!! Form::close() !!}

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
									@endif

							 </div>
				</div>
		</div>

	</div>
@stop