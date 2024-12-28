@extends('user.system')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Outlet</h3>
	<div class="display_table">

		<div class="display_table_heading">Outlet Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Outlet Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $outlet->code!!}</div>


								</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('route', 'Route' ) !!}</div>
						<div class="display_table_data_cell">
							{!! $route->name!!}
						</div>


					</div>


					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Outlet Name' ) !!}</div>
						<div class="display_table_data_cell">{!! $outlet->name!!}</div>


					</div>


							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('phone', 'Phone') !!}</div>
								<div class="display_table_data_cell">
									{!! $outlet->phone !!}
								</div>


							</div>

								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('industry', 'Email' ) !!}</div>
									<div class="display_table_data_cell">
										{!!$outlet->email!!}</div>


								</div>


							<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Address' ) !!}</div>
								<div class="display_table_data_cell">{!! $outlet->address !!}</div>


							</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Credit' ) !!}</div>
						<div class="display_table_data_cell">
							{!!$outlet->credit.'.00 Rs'!!}</div>


					</div>

					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('industry', 'Cheque' ) !!}</div>
						<div class="display_table_data_cell">
							{!!$outlet->cheque.'.00 Rs'!!}</div>


					</div>


						<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Note' ) !!}</div>
								<div class="display_table_data_cell">{!! $outlet->note!!}</div>


							</div>




						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry', 'Created Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($outlet->created_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>
							</div>



						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">{!! Form::label('industry','Updated Date' ) !!}</div>
							<div class="display_table_data_cell">
								<?php
								$date = new DateTime($outlet->updated_at);
								echo $date->format('Y-m-d h:i A');
								?>
							</div>


						</div>
				</div>

				<div class="display_table_row">
							<div class="display_table_row_buttons_div">
								<div class="display_table_row_buttons"><a href="{!!URL::to('outlet')!!}" class="btn">{!! 'Back'!!}</a>

								</div>


								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['edit_outlet'])
										{!! link_to_route('outlet.edit', 'Edit', array($outlet->id),
                                            array('class' => 'btn btn-warning','id' => 'edit_outlet')) !!}
									@endif



								</div>
								<div class="display_table_row_buttons">

									@if(Session::get('privileges')['delete_outlet'])
										{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('outlet.destroy', $outlet->id))) !!}
										{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_outlet')) !!}

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