@extends('user.system')
@section('middle_right_DIV')
	<div class="success_message">
		{!! Session::get('message') !!}


	</div>
	<div class="error_message">
		{!! Session::get('scs_errors') !!}


	</div>
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Driver</h3>
	<div class="display_table">

		<div class="display_table_heading">Driver Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Driver Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $task->code!!}</div>


								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Driver Name' ) !!}</div>
						<div class="display_table_data_cell">{!! $task->name!!}</div>


					</div>

							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Phone') !!}</div>
								<div class="display_table_data_cell">
									{!! $task->phone !!}
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
								<div class="display_table_row_buttons"><a href="{!!URL::to('driver')!!}" class="btn">{!! 'Back'!!}</a>

								</div>


								<div class="display_table_row_buttons">
									@if(Session::get('privileges')['edit_driver'])

										{!! link_to_route('driver.edit', 'Edit', array($task->id),
                                              array('class' => 'btn btn-warning edit','id' => 'edit_driver')) !!}
									@endif


								</div>
								<div class="display_table_row_buttons">


									@if(Session::get('privileges')['delete_driver'])

										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                                 array('driver.destroy', $task->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_driver')) !!}

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

	{{-- Show Payments--}}

	@if ($paymentList->count())
		<div class="display_table" id="dayendDIV">

			<div class="display_table_heading">{{ 'Payments For '.$task->name }}</div>




			@foreach ($paymentList as $payment)
				<div class="display_table_master_row">
					<div class="display_table_row">



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Sales</div>
							<div class="display_table_data_cell">
								{!!  dtc\Models\Sales::where('id','=',$payment->sales_id)->first()['code'] !!}
							</div>


						</div>
						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Settlement Code</div>
							<div class="display_table_data_cell">
								{!! $payment->code !!}
							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Payment Amount

							</div>
							<div class="display_table_data_cell">

								{!! $payment->amount.'.00 Rs'!!}

							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Day-End Date

							</div>
							<div class="display_table_data_cell">

								{!! $payment->date !!}
							</div>
						</div>
						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Note

							</div>
							<div class="display_table_data_cell">

								{!! $payment->note !!}
							</div>
						</div>


					</div>

					<div class="display_table_row">
						<div class="display_table_row_buttons_div">
						
							<div class="display_table_row_buttons">

								@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['view_driver_payment'])
									{!! link_to_route('driver_payment.show', Lang::get('messages.view'), array($payment->id),
                                array('class' => 'btn btn-primary view','id' => 'view_driver_payment')) !!}
								@endif

							</div>


							<div class="display_table_row_buttons">

								@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['edit_driver_payment'])
									{!! link_to_route('driver_payment.edit', Lang::get('messages.edit'), array($payment->id),
                                          array('class' => 'btn btn-warning edit','id' => 'edit_driver_payment')) !!}
								@endif
							</div>
							<div class="display_table_row_buttons">

								@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['delete_driver_payment'])
									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('driver_payment.destroy', $payment->id))) !!}
									{!! Form::submit(Lang::get('messages.delete'), array('class' => 'btn btn-danger delete','id' => 'delete_driver_payment')) !!}

									{!! Form::close() !!}
								@endif
							</div>

							

						</div>

					</div>

				</div>
			@endforeach
		</div>

	@else
		'There are no Payments yet!'
	@endif

@stop