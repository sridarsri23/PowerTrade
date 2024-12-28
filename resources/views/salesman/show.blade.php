@extends('user.agents')
@section('middle_right_DIV')



	<h3 class='sub_heading'>View Agent</h3>
	<div class="display_table">

		<div class="display_table_heading">Agent Details</div>


		<div class="display_table_master_row">
				<div class="display_table_row">
								<div class="display_table_row_data" contenteditable>

									<div class="display_table_heading_cell">{!! Form::label('code', 'Agent Code' ) !!}</div>
									<div class="display_table_data_cell">{!! $task->code!!}</div>


								</div>
					<div class="display_table_row_data" contenteditable>

						<div class="display_table_heading_cell">{!! Form::label('name','Agent Name' ) !!}</div>
						<div class="display_table_data_cell">{!! $task->name!!}</div>


					</div>

					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('full_name','Full Name' ) !!}</div>
								<div class="display_table_data_cell">
									{!!$task->full_name !!}
								</div>


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

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Credit Amount' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->amount !!}</div>


							</div>
					<div class="display_table_row_data" contenteditable>

								<div class="display_table_heading_cell">{!! Form::label('industry', 'Commision LKR/SGD' ) !!}</div>
								<div class="display_table_data_cell">{!! $task->cmn_pcnt !!}</div>


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
								<div class="display_table_row_buttons"><a href="{!!URL::to('agent')!!}" class="btn">{!! 'Back'!!}</a>

								</div>
								<div class="display_table_row_buttons">

								{!! link_to_route('agent.edit', 'Edit', array($task->id),
												array('class' => 'btn btn-warning','id' => 'edit_agent')) !!}

								</div>
								<div class="display_table_row_buttons">


									{!! Form::open(array('method'=> 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'route' =>
                                          array('agent.destroy', $task->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger delete','id' => 'delete_agent')) !!}

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
	
	
	{{-- Show Settlements--}}

	@if ($settlementList->count())
		<div class="display_table" id="dayendDIV">

			<div class="display_table_heading">Day-Ends</div>




			@foreach ($settlementList as $settlement)
				<div class="display_table_master_row">
					<div class="display_table_row">


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Settlement Code</div>
							<div class="display_table_data_cell">
								{!! $settlement->code !!}
							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Total Day-End Amount (TDEA)

							</div>
							<div class="display_table_data_cell">

								{!! $settlement->lkr +  $settlement->cmn !!}

							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Day-End Date

							</div>
							<div class="display_table_data_cell">

								{!! $settlement->date !!}
							</div>
						</div>
						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Agent Bank Acc

							</div>
							<div class="display_table_data_cell">

								{!! $settlement->agent_bank_acc !!}
							</div>
						</div>


					</div>

				</div>
			@endforeach
		</div>

	@else
		'There are no Day-Ends yet!'
	@endif


	{{-- Show Givings--}}

	@if ($givingList->count())
		<div class="display_table" id="givingsDIV">

			<div class="display_table_heading">Givings</div>




			@foreach ($givingList as $settlement)
				<div class="display_table_master_row">
					<div class="display_table_row">


						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Giving Code</div>
							<div class="display_table_data_cell">
								{!! $settlement->code !!}
							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Giving Amount LKR

							</div>
							<div class="display_table_data_cell">

								{!! $settlement->lkr !!}

							</div>


						</div>

						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Given Date

							</div>
							<div class="display_table_data_cell">

								{!! $settlement->date !!}
							</div>
						</div>
						<div class="display_table_row_data" contenteditable>

							<div class="display_table_heading_cell">
								Agent Bank Acc

							</div>
							<div class="display_table_data_cell">

								{!! $settlement->agent_bank_acc !!}
							</div>
						</div>



					</div>

				</div>
			@endforeach
		</div>

	@else
		'There are no Givings yet!'
	@endif
@stop