@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Route</h3>
	<div class="display_table">

		<div class="display_table_heading">Route Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
					<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Route Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $task->code!!}</div>


								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Route Name' ) !!}</div>
						<div class="display_table_data_cell">{!! $task->name!!}</div>


					</div>

			

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('routee')!!}" class="btn">{!! 'Back'!!}</a>

								</div>
								<div class="display_table_row_buttons">

								{!! link_to_route('routee.edit', 'Edit', array($task->id),
												array('class' => 'btn btn-warning','id' => 'edit_route')) !!}

								</div>
								<div class="display_table_row_buttons">


									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('routee.destroy', $task->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_route')) !!}

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

	</div>

@stop