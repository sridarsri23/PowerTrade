@extends('user.system')
@section('middle_right_DIV')
	<div class="success_message">
		{!! Session::get('message') !!}


	</div>
	<div class="error_message">
		{!! Session::get('scs_errors') !!}


	</div>
@section('middle_right_DIV')



	<h3 class='sub_heading'>{!! 'Employee Details' !!}</h3>
	<div class="display_table">

		<div class="display_table_heading">{!! 'Employee Details' !!}</div>


		<div class="display_table_master_row">
			<div class="display_table_row">


				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('industry', Lang::get('messages.employee_code') ) !!}</div>
					<div class="display_table_data_cell">{!!$task->code !!}</div>


				</div>

				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('industry', Lang::get('messages.name') ) !!}</div>
					<div class="display_table_data_cell">{!!$task->name !!}</div>


				</div>


				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('website', Lang::get('messages.phone') ) !!}</div>
					<div class="display_table_data_cell">{!!   $task->phone !!}</div>

				</div>
				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('website', Lang::get('messages.address') ) !!}</div>
					<div class="display_table_data_cell">{!!   $task->address !!}</div>


				</div>
				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('website', Lang::get('messages.email') ) !!}</div>
					<div class="display_table_data_cell">
						<div class="display_table_data_cell">{!!   $task->email !!}</div>
					</div>


				</div>


				<div class="display_table_row_data" contenteditable>

					<div class="display_table_heading_cell">{!! Form::label('logo', Lang::get('messages.can_login') ) !!}</div>
					<div class="display_table_data_cell">{!!   $task->can_login == true ? 'Yes' : 'No' !!}</div>


				</div>



			</div>
			<div class="display_table_row">
					<div class="display_table_row_buttons_div">
						<div class="display_table_row_buttons"><a href="{!!URL::to('employee')!!}" class="btn">{!! Lang::get('messages.back') !!}</a>

						</div>

						<div class="display_table_row_buttons">
							@if(Session::get('privileges')['edit_employee'])
						{!! link_to_route('employee.edit', Lang::get('messages.edit'), array($task->id),
                                        array('class' => 'btn btn-warning','id' => 'edit_employee')) !!}
								@endif
						</div>

						<div class="display_table_row_buttons">
							@if(Session::get('privileges')['delete_employee'])
								{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                      array('employee.destroy', $task->id))) !!}
								{!! Form::submit(Lang::get('messages.delete'), array('class' => 'btn btn-danger delete','id' => 'delete_employee')) !!}

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

								@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['view_employee_payment'])
									{!! link_to_route('employee_payment.show', Lang::get('messages.view'), array($payment->id),
                                array('class' => 'btn btn-primary view','id' => 'view_employee')) !!}
								@endif

							</div>


							<div class="display_table_row_buttons">

								@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['edit_employee_payment'])
									{!! link_to_route('employee_payment.edit', Lang::get('messages.edit'), array($payment->id),
                                          array('class' => 'btn btn-warning edit','id' => 'edit_employee')) !!}
								@endif
							</div>
							<div class="display_table_row_buttons">

								@if(dtc\Models\Privileges::where('employee_id','=',Auth::id())->first()['delete_employee_payment'])
									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('employee_payment.destroy', $payment->id))) !!}
									{!! Form::submit(Lang::get('messages.delete'), array('class' => 'btn btn-danger delete','id' => 'delete_employee')) !!}

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