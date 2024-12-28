@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Lorry</h3>
	<div class="display_table">

		<div class="display_table_heading">Lorry Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Lorry Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $task->code!!}</div>


								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Lorry No' ) !!}</div>
						<div class="display_table_data_cell">{!! $task->no!!}</div>


					</div>


				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('lorry')!!}" class="btn">{!! 'Back'!!}</a>

								</div>

								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['edit_lorry'])

										{!! link_to_route('lorry.edit', 'Edit', array($task->id),
                                              array('class' => 'btn btn-warning edit','id' => 'edit_lorry')) !!}
									@endif


								</div>
								<div class="display_table_row_buttons">


									@if(Session::get('privileges')['delete_lorry'])

										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete("'.$task->no.'")', 'route' =>
                                                array('lorry.destroy', $task->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_lorry')) !!}

										{!! Form::close() !!}
									@endif

								</div>


								<script>

									function ConfirmDelete(no)
									{
									  // alert(no);
										var x = confirm("Are you sure, you want to Delete Lorry :"+no+"?");
										if (x) {
                                            return true;
                                        }
										else {
                                            return false;
                                        }
									}

								</script>

							 </div>
				</div>
		</div>

	</div>
	
	
	{{-- Show Lorry Expenses--}}

	@if ($expenseList->count())
		<div class="display_table" id="dayendDIV">

			<div class="display_table_heading">Lorry Expenses</div>




			@foreach ($expenseList as $expense)
				<div class="display_table_master_row">
					<div class="display_table_row">


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Expense Code</div>
							<div class="display_table_data_cell">
								{!! $expense->code !!}
							</div>


						</div>


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Amount

							</div>
							<div class="display_table_data_cell">

								{!! $expense->amount.'.00 Rs'  !!}

							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Type

							</div>
							<div class="display_table_data_cell">

								{!! $expense->type  !!}

							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Expense Date

							</div>
							<div class="display_table_data_cell">

								{!! $expense->date !!}
							</div>
						</div>

						<div class="display_table_row">
							<div class="display_table_row_buttons_div">


								<div class="display_table_row_buttons">
									@if(Session::get('privileges')['view_lorry_expense'])
										{!! link_to_route('lorry_expense.show', 'View', array($expense->id),
                              array('class' => 'btn btn-primary view','id' => 'view_lorry')) !!}
									@endif




								</div>


								<div class="display_table_row_buttons">
									@if(Session::get('privileges')['edit_lorry_expense'])

										{!! link_to_route('lorry_expense.edit', 'Edit', array($expense->id),
                                              array('class' => 'btn btn-warning edit','id' => 'edit_lorry')) !!}
									@endif




								</div>
								<div class="display_table_row_buttons">
									@if(Session::get('privileges')['delete_lorry_expense'])

										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                                        array('lorry_expense.destroy', $expense->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_lorry')) !!}

										{!! Form::close() !!}
									@endif

										<script>

                                            function ConfirmDelete()
                                            {
                                                // alert(no);
                                                var x = confirm("Are you sure, you want to Delete Lorry Expense ?");
                                                if (x) {
                                                    return true;
                                                }
                                                else {
                                                    return false;
                                                }
                                            }

										</script>

								</div>



							</div>

						</div>

					</div>

				</div>
			@endforeach
		</div>

	@else
		'There are no Lorry Expenses yet!'
	@endif



@stop