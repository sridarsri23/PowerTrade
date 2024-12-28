@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Employee Payment</h3>
	<div class="display_table">

		<div class="display_table_heading">Employee Payment Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Employee Payment Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $employee_payment->code!!}</div>


								</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('employee', 'Employee' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $employee->name !!}
						</div>


					</div>




							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Amount') !!}</div>
								<div class="display_table_data_cell">
									{!! $employee_payment->amount !!}
								</div>


							</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', ' Date' ) !!}</div>
						<div class="display_table_data_cell">
                            <?php
                            $date = new DateTime($employee_payment->date);
                            echo $date->format('Y-m-d h:i A');
                            ?>
						</div>
					</div>



					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
								<div class="display_table_data_cell">{!! $employee_payment->note!!}</div>


							</div>




						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($employee_payment->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
							</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry','Updated Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($employee_payment->updated_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>


						</div>
				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('employee')!!}" class="btn">{!! 'Back'!!}</a>

								</div>


								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['edit_employee_payment'])
										{!! link_to_route('employee_payment.edit', 'Edit', array($employee_payment->id),
                                            array('class' => 'btn btn-warning','id' => 'edit_employee_payment')) !!}
									@endif



								</div>
								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['delete_employee_payment'])
										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('employee_payment.destroy', $employee_payment->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_employee_payment')) !!}

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