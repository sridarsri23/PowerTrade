@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Lorry Expense</h3>
	<div class="display_table">

		<div class="display_table_heading">Lorry Expense Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Lorry Expense Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $lorry_expense->code!!}</div>


								</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('lorry', 'Lorry' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $lorry->no !!}
						</div>


					</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Type' ) !!}</div>
						<div class="display_table_data_cell">{!! $lorry_expense->type!!}</div>


					</div>


							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Amount') !!}</div>
								<div class="display_table_data_cell">
									{!! $lorry_expense->amount !!}
								</div>


							</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', ' Date' ) !!}</div>
						<div class="display_table_data_cell">
                            <?php
                            $date = new DateTime($lorry_expense->date);
                            echo $date->format('Y-m-d h:i A');
                            ?>
						</div>
					</div>



					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
								<div class="display_table_data_cell">{!! $lorry_expense->note!!}</div>


							</div>




						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($lorry_expense->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
							</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry','Updated Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($lorry_expense->updated_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>


						</div>
				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('lorry')!!}" class="btn">{!! 'Back'!!}</a>

								</div>


								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['edit_lorry_expense'])
										{!! link_to_route('lorry_expense.edit', 'Edit', array($lorry_expense->id),
                                            array('class' => 'btn btn-warning','id' => 'edit_lorry_expense')) !!}
									@endif



								</div>
								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['delete_lorry_expense'])
										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('lorry_expense.destroy', $lorry_expense->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_lorry_expense')) !!}

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