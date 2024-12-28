@extends('user.clients')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Client</h3>
	<div class="display_table">

		<div class="display_table_heading">Client Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Client Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $task->code!!}</div>


								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Client Name' ) !!}</div>
						<div class="display_table_data_cell">{!! $task->name!!}</div>


					</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('full_name','Full Name' ) !!}</div>
								<div class="display_table_data_cell">
									{!!$task->full_name !!}
								</div>


							</div>
							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Phone 1') !!}</div>
								<div class="display_table_data_cell">
									{!! $task->phone !!}
								</div>


							</div>
                        <div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Phone 2') !!}</div>
								<div class="display_table_data_cell">
									{!! $task->phone2 !!}
								</div>


							</div>

								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('industry', 'Email' ) !!}</div>
									<div class="display_table_data_cell">
										{!!$task->email!!}</div>


								</div>


							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Address' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->address !!}</div>


							</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 1' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_1!!}</div>


							</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 2' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_2!!}</div>


							</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 3' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_3!!}</div>


							</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 4' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_4!!}</div>


							</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 5' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_5!!}</div>


							</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 6' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_6!!}</div>


							</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 7' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_7!!}</div>


							</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Bank Account 8' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->bank_acc_8!!}</div>


							</div>

						<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->note!!}</div>


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
								<div class="display_table_row_buttons"><a href="{!!URL::to('client')!!}" class="btn">My Clients</a>

								</div>
								<div class="display_table_row_buttons">

								{!! link_to_route('client.edit', 'Edit', array($task->id),
												array('class' => 'btn btn-warning','id' => 'edit_client')) !!}

								</div>

							 </div>
				</div>
		</div>

	</div>

	@if ($orderList->count())
		<div class="display_table">

			<div class="display_table_heading">Order History</div>




			@foreach ($orderList as $order)
				<div class="display_table_master_row">
					<div class="display_table_row">


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Order Code</div>
							<div class="display_table_data_cell">
								{!! $order->code !!}
							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Agent Name

							</div>
							<div class="display_table_data_cell">

								{!! App\Models\Agent::where('id','=',$order->agent_id)->first()['name'] !!}

							</div>


						</div>
						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Date

							</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($order->date);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>


						</div>



					</div>
					<div class="display_table_row">
						<div class="display_table_row_buttons_div">
							<div class="display_table_row_buttons">

								{!! link_to_route('order.show', 'View', array($order->id),
                            array('class' => 'btn btn-primary view','id' => 'view_order')) !!}


							</div>


							<div class="display_table_row_buttons">


								{!! link_to_route('order.edit', 'Edit', array($order->id),
                                      array('class' => 'btn btn-warning edit','id' => 'edit_order')) !!}

							</div>
							<div class="display_table_row_buttons">


								{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('order.destroy', $order->id))) !!}
								{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_order')) !!}

								{!! Form::close() !!}

							</div>
								<div class="display_table_row_buttons">


									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('client.destroy', $order->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_client')) !!}

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
			@endforeach
		</div>

	@else
		<h5>There are no Orders for this client yet!</h5>
	@endif
@stop