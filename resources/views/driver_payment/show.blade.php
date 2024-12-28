@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Driver Payment</h3>
	<div class="display_table">

		<div class="display_table_heading">Driver Payment Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Driver Payment Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $driver_payment->code!!}</div>


								</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('driver', 'Driver' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $driver->name !!}
						</div>


					</div>




							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Amount') !!}</div>
								<div class="display_table_data_cell">
									{!! $driver_payment->amount !!}
								</div>


							</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', ' Date' ) !!}</div>
						<div class="display_table_data_cell">
                            <?php
                            $date = new DateTime($driver_payment->date);
                            echo $date->format('Y-m-d h:i A');
                            ?>
						</div>
					</div>



					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
								<div class="display_table_data_cell">{!! $driver_payment->note!!}</div>


							</div>




						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($driver_payment->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
							</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry','Updated Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($driver_payment->updated_at);
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

									@if(Session::get('privileges')['edit_driver_payment'])
										{!! link_to_route('driver_payment.edit', 'Edit', array($driver_payment->id),
                                            array('class' => 'btn btn-warning','id' => 'edit_driver_payment')) !!}
									@endif



								</div>
								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['delete_driver_payment'])
										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('driver_payment.destroy', $driver_payment->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_driver_payment')) !!}

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