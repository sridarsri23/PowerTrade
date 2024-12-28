@extends('user.system')


@section('middle_right_DIV')

	{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
		<div class="display_table">
		
		<div class="display_table_heading">User Privilegess</div>
			{!! Form::open(array('url' => 'privileges_update','method'=>'put' )) !!}


			<div class="display_table_master_row">

				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>
						 <div class="display_table_heading_cell">{!! Form::label('type', 'User') !!}</div>


						 <div class="display_table_data_cell">
							 {!!

				  Form::select('type', $usersList, '1',array('id'=>'employee_id','name'=>'employee_id','class' => 'form_element'))!!}
						 </div>

					</div>

				</div>

			</div>

				{{-- product start--}}
			<div class="display_table_master_row">

				<div class="display_table_row_entity" contenteditable>
					<div class="display_table_heading_cell">{!! Form::hidden('product', 'No')!!}
						{!! Form::label('product','Product') !!}


						<div class="display_table_data_cell">
							{!! Form::checkbox('product','Yes',$my_privilegeList->product,array('class' => 'form_element','id' => 'product')) !!}
						</div>

					</div>

				</div>

				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">
							{!! Form::hidden('new_product', 'No')!!}
							{!! Form::label('new_product', Lang::get('messages.new_product')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('new_product','Yes',$my_privilegeList->new_product,array('class' => 'form_element','id' => 'new_product')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('view_product', 'No')!!}
							{!! Form::label('view_product', Lang::get('messages.view_product')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('view_product','Yes',$my_privilegeList->view_product,array('class' => 'form_element','id' => 'view_product')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('edit_product', 'No')!!}
							{!! Form::label('edit_product', Lang::get('messages.edit_product')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('edit_product','Yes',$my_privilegeList->edit_product,array('class' => 'form_element','id' => 'edit_product')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('delete_product', 'No')!!}
							{!! Form::label('delete_product', Lang::get('messages.delete_product')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('delete_product','Yes',$my_privilegeList->delete_product,array('class' => 'form_element','id' => 'delete_product')) !!}
							</div>

						</div>

					</div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('add_stocks_many', 'No')!!}
                            {!! Form::label('add_stocks_many', Lang::get('messages.add_stocks_many')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('add_stocks_many','Yes',$my_privilegeList->add_stocks_many,array('class' => 'form_element','id' => 'add_stocks_many')) !!}
                            </div>

                        </div>

                    </div>


                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('remove_stocks_many', 'No')!!}
                            {!! Form::label('remove_stocks_many', Lang::get('messages.remove_stocks_many')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('remove_stocks_many','Yes',$my_privilegeList->remove_stocks_many,array('class' => 'form_element','id' => 'remove_stocks_many')) !!}
                            </div>

                        </div>

                    </div>



				</div>

				<script>

					$('#product').click(function(){
						var $this = $(this);
						var x;
						if ($this.is(':checked')) {
							$('#new_product').prop('checked', 1);
							$('#view_product').prop('checked', 1);
							$('#edit_product').prop('checked', 1);
							$('#delete_product').prop('checked', 1);
							$('#add_stocks_many').prop('checked', 1);
							$('#remove_stocks_many').prop('checked', 1);
						} else {
							$('#new_product').prop('checked', 0);
							$('#view_product').prop('checked', 0);
							$('#edit_product').prop('checked',0);
							$('#delete_product').prop('checked', 0);
                            $('#add_stocks_many').prop('checked', 0);
                            $('#remove_stocks_many').prop('checked', 0);
                        } else {
						}
					});


				</script>
		

				</div>
				{{-- end product--}}




            {{-- outlet start--}}
            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('outlet', 'No')!!}
                        {!! Form::label('outlet','Outlet') !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('outlet','Yes',$my_privilegeList->product,array('class' => 'form_element','id' => 'outlet')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">
                            {!! Form::hidden('new_outlet', 'No')!!}
                            {!! Form::label('new_outlet', 'New Outlet, Import From Excel') !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_outlet','Yes',$my_privilegeList->new_outlet,array('class' => 'form_element','id' => 'new_outlet')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_outlet', 'No')!!}
                            {!! Form::label('view_outlet', Lang::get('messages.view_outlet')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_outlet','Yes',$my_privilegeList->view_outlet,array('class' => 'form_element','id' => 'view_outlet')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_outlet', 'No')!!}
                            {!! Form::label('edit_outlet', Lang::get('messages.edit_outlet')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_outlet','Yes',$my_privilegeList->edit_outlet,array('class' => 'form_element','id' => 'edit_outlet')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_outlet', 'No')!!}
                            {!! Form::label('delete_outlet', 'Delete Outlet, Realise Cheque, Settle Credit Receiving') !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_outlet','Yes',$my_privilegeList->delete_outlet,array('class' => 'form_element','id' => 'delete_outlet')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#outlet').click(function(){
                        var $this = $(this);
                        var x;
                        if ($this.is(':checked')) {
                            $('#new_outlet').prop('checked', 1);
                            $('#view_outlet').prop('checked', 1);
                            $('#edit_outlet').prop('checked', 1);
                            $('#delete_outlet').prop('checked', 1);
                        } else {
                            $('#new_outlet').prop('checked', 0);
                            $('#view_outlet').prop('checked', 0);
                            $('#edit_outlet').prop('checked',0);
                            $('#delete_outlet').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end outlet--}}


	

            {{-- start loading --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('loading', 'No')!!}
                        {!! Form::label('loading', Lang::get('messages.loading')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('loading','Yes',$my_privilegeList->loading,array('class' => 'form_element','id' => 'loading')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_loading', 'No')!!}
                            {!! Form::label('new_loading', Lang::get('messages.new_loading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_loading','Yes',$my_privilegeList->new_loading,array('class' => 'form_element','id' => 'new_loading')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_loading', 'No')!!}
                            {!! Form::label('view_loading', Lang::get('messages.view_loading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_loading','Yes',$my_privilegeList->view_loading,array('class' => 'form_element','id' => 'view_loading')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_loading', 'No')!!}
                            {!! Form::label('edit_loading', Lang::get('messages.edit_loading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_loading','Yes',$my_privilegeList->edit_loading,array('class' => 'form_element','id' => 'edit_loading')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_loading', 'No')!!}
                            {!! Form::label('delete_loading', Lang::get('messages.delete_loading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_loading','Yes',$my_privilegeList->delete_loading,array('class' => 'form_element','id' => 'delete_loading')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#loading').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_loading').prop('checked', 1);
                            $('#view_loading').prop('checked', 1);
                            $('#edit_loading').prop('checked', 1);
                            $('#delete_loading').prop('checked', 1);
                        } else {
                            $('#new_loading').prop('checked', 0);
                            $('#view_loading').prop('checked', 0);
                            $('#edit_loading').prop('checked',0);
                            $('#delete_loading').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end loading --}}

            
            
            {{-- start sales --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('sales', 'No')!!}
                        {!! Form::label('sales', Lang::get('messages.sales')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('saless','Yes',$my_privilegeList->saless,array('class' => 'form_element','id' => 'saless')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_sales', 'No')!!}
                            {!! Form::label('new_sales', Lang::get('messages.new_sales')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_sales','Yes',$my_privilegeList->new_sales,array('class' => 'form_element','id' => 'new_sales')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_sales', 'No')!!}
                            {!! Form::label('view_sales', Lang::get('messages.view_sales')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_sales','Yes',$my_privilegeList->view_sales,array('class' => 'form_element','id' => 'view_sales')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_sales', 'No')!!}
                            {!! Form::label('edit_sales', Lang::get('messages.edit_sales')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_sales','Yes',$my_privilegeList->edit_sales,array('class' => 'form_element','id' => 'edit_sales')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_sales', 'No')!!}
                            {!! Form::label('delete_sales', Lang::get('messages.delete_sales')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_sales','Yes',$my_privilegeList->delete_sales,array('class' => 'form_element','id' => 'delete_sales')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#sales').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_sales').prop('checked', 1);
                            $('#view_sales').prop('checked', 1);
                            $('#edit_sales').prop('checked', 1);
                            $('#delete_sales').prop('checked', 1);
                        } else {
                            $('#new_sales').prop('checked', 0);
                            $('#view_sales').prop('checked', 0);
                            $('#edit_sales').prop('checked',0);
                            $('#delete_sales').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end sales --}}


            
            
            {{-- start invoice --}}

			<div class="display_table_master_row">

				<div class="display_table_row_entity" contenteditable>
					<div class="display_table_heading_cell">{!! Form::hidden('invoice', 'No')!!}
						{!! Form::label('invoice', Lang::get('messages.invoice')) !!}


						<div class="display_table_data_cell">
							{!! Form::checkbox('invoice','Yes',$my_privilegeList->invoice,array('class' => 'form_element','id' => 'invoice')) !!}
						</div>

					</div>

				</div>

				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('new_invoice', 'No')!!}
							{!! Form::label('new_invoice', Lang::get('messages.new_invoice')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('new_invoice','Yes',$my_privilegeList->new_invoice,array('class' => 'form_element','id' => 'new_invoice')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('view_invoice', 'No')!!}
							{!! Form::label('view_invoice', Lang::get('messages.view_invoice')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('view_invoice','Yes',$my_privilegeList->view_invoice,array('class' => 'form_element','id' => 'view_invoice')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('edit_invoice', 'No')!!}
							{!! Form::label('edit_invoice', Lang::get('messages.edit_invoice')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('edit_invoice','Yes',$my_privilegeList->edit_invoice,array('class' => 'form_element','id' => 'edit_invoice')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('delete_invoice', 'No')!!}
							{!! Form::label('delete_invoice', Lang::get('messages.delete_invoice')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('delete_invoice','Yes',$my_privilegeList->delete_invoice,array('class' => 'form_element','id' => 'delete_invoice')) !!}
							</div>

						</div>

					</div>



				</div>

				<script>

					$('#invoice').click(function(){
						var $this = $(this);

						if ($this.is(':checked')) {
							$('#new_invoice').prop('checked', 1);
							$('#view_invoice').prop('checked', 1);
							$('#edit_invoice').prop('checked', 1);
							$('#delete_invoice').prop('checked', 1);
						} else {
							$('#new_invoice').prop('checked', 0);
							$('#view_invoice').prop('checked', 0);
							$('#edit_invoice').prop('checked',0);
							$('#delete_invoice').prop('checked', 0);
						}
					});


				</script>


			</div>
			{{-- end invoice --}}

            {{-- start unloading --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('unloading', 'No')!!}
                        {!! Form::label('unloading', Lang::get('messages.unloading')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('unloading','Yes',$my_privilegeList->unloading,array('class' => 'form_element','id' => 'unloading')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_unloading', 'No')!!}
                            {!! Form::label('new_unloading', Lang::get('messages.new_unloading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_unloading','Yes',$my_privilegeList->new_unloading,array('class' => 'form_element','id' => 'new_unloading')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_unloading', 'No')!!}
                            {!! Form::label('view_unloading', Lang::get('messages.view_unloading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_unloading','Yes',$my_privilegeList->view_unloading,array('class' => 'form_element','id' => 'view_unloading')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_unloading', 'No')!!}
                            {!! Form::label('edit_unloading', Lang::get('messages.edit_unloading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_unloading','Yes',$my_privilegeList->edit_unloading,array('class' => 'form_element','id' => 'edit_unloading')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_unloading', 'No')!!}
                            {!! Form::label('delete_unloading', Lang::get('messages.delete_unloading')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_unloading','Yes',$my_privilegeList->delete_unloading,array('class' => 'form_element','id' => 'delete_unloading')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#unloading').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_unloading').prop('checked', 1);
                            $('#view_unloading').prop('checked', 1);
                            $('#edit_unloading').prop('checked', 1);
                            $('#delete_unloading').prop('checked', 1);
                        } else {
                            $('#new_unloading').prop('checked', 0);
                            $('#view_unloading').prop('checked', 0);
                            $('#edit_unloading').prop('checked',0);
                            $('#delete_unloading').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end unloading --}}

            {{-- start return --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('return_product', 'No')!!}
                        {!! Form::label('return_product', Lang::get('messages.return_product')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('return_product','Yes',$my_privilegeList->return,array('class' => 'form_element','id' => 'return_product')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_sales_return', 'No')!!}
                            {!! Form::label('new_sales_return', Lang::get('messages.new_sales_return')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_sales_return','Yes',$my_privilegeList->new_sales_return,array('class' => 'form_element','id' => 'new_sales_return')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_sales_return', 'No')!!}
                            {!! Form::label('view_sales_return', Lang::get('messages.view_sales_return')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_sales_return','Yes',$my_privilegeList->view_sales_return,array('class' => 'form_element','id' => 'view_sales_return')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_sales_return', 'No')!!}
                            {!! Form::label('edit_sales_return', Lang::get('messages.edit_sales_return')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_sales_return','Yes',$my_privilegeList->edit_sales_return,array('class' => 'form_element','id' => 'edit_sales_return')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_sales_return', 'No')!!}
                            {!! Form::label('delete_sales_return', Lang::get('messages.delete_sales_return')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_sales_return','Yes',$my_privilegeList->delete_sales_return,array('class' => 'form_element','id' => 'delete_sales_return')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#return_product').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_sales_return').prop('checked', 1);
                            $('#view_sales_return').prop('checked', 1);
                            $('#edit_sales_return').prop('checked', 1);
                            $('#delete_sales_return').prop('checked', 1);
                        } else {
                            $('#new_sales_return').prop('checked', 0);
                            $('#view_sales_return').prop('checked', 0);
                            $('#edit_sales_return').prop('checked',0);
                            $('#delete_sales_return').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end sales return --}}

            {{-- start sales_expense --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('sales_expense', 'No')!!}
                        {!! Form::label('sales_expense', 'Sales Expense') !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('sales_expense','Yes',$my_privilegeList->sales_expense,array('class' => 'form_element','id' => 'sales_expense')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_expense', 'No')!!}
                            {!! Form::label('new_expense', Lang::get('messages.new_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_expense','Yes',$my_privilegeList->new_expense,array('class' => 'form_element','id' => 'new_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_expense', 'No')!!}
                            {!! Form::label('view_expense', Lang::get('messages.view_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_expense','Yes',$my_privilegeList->view_expense,array('class' => 'form_element','id' => 'view_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_expense', 'No')!!}
                            {!! Form::label('edit_expense', Lang::get('messages.edit_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_expense','Yes',$my_privilegeList->edit_expense,array('class' => 'form_element','id' => 'edit_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_expense', 'No')!!}
                            {!! Form::label('delete_expense', Lang::get('messages.delete_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_expense','Yes',$my_privilegeList->delete_expense,array('class' => 'form_element','id' => 'delete_expense')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

               $('#sales_expense').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_expense').prop('checked', 1);
                            $('#view_expense').prop('checked', 1);
                            $('#edit_expense').prop('checked', 1);
                            $('#delete_expense').prop('checked', 1);
                        } else {
                            $('#new_expense').prop('checked', 0);
                            $('#view_expense').prop('checked', 0);
                            $('#edit_expense').prop('checked',0);
                            $('#delete_expense').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            sales_expensed expense --}}





            {{-- start route --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('route', 'No')!!}
                        {!! Form::label('route', Lang::get('messages.route')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('route','Yes',$my_privilegeList->route,array('class' => 'form_element','id' => 'route')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_route', 'No')!!}
                            {!! Form::label('new_route', Lang::get('messages.new_route')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_route','Yes',$my_privilegeList->new_route,array('class' => 'form_element','id' => 'new_route')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_route', 'No')!!}
                            {!! Form::label('view_route', Lang::get('messages.view_route')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_route','Yes',$my_privilegeList->view_route,array('class' => 'form_element','id' => 'view_route')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_route', 'No')!!}
                            {!! Form::label('edit_route', Lang::get('messages.edit_route')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_route','Yes',$my_privilegeList->edit_route,array('class' => 'form_element','id' => 'edit_route')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_route', 'No')!!}
                            {!! Form::label('delete_route', Lang::get('messages.delete_route')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_route','Yes',$my_privilegeList->delete_route,array('class' => 'form_element','id' => 'delete_route')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#route').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_route').prop('checked', 1);
                            $('#view_route').prop('checked', 1);
                            $('#edit_route').prop('checked', 1);
                            $('#delete_route').prop('checked', 1);
                        } else {
                            $('#new_route').prop('checked', 0);
                            $('#view_route').prop('checked', 0);
                            $('#edit_route').prop('checked',0);
                            $('#delete_route').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end route --}}



            {{-- start lorry --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('lorry', 'No')!!}
                        {!! Form::label('lorry', Lang::get('messages.lorry')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('lorry','Yes',$my_privilegeList->lorry,array('class' => 'form_element','id' => 'lorry')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_lorry', 'No')!!}
                            {!! Form::label('new_lorry', Lang::get('messages.new_lorry')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_lorry','Yes',$my_privilegeList->new_lorry,array('class' => 'form_element','id' => 'new_lorry')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_lorry', 'No')!!}
                            {!! Form::label('view_lorry', Lang::get('messages.view_lorry')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_lorry','Yes',$my_privilegeList->view_lorry,array('class' => 'form_element','id' => 'view_lorry')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_lorry', 'No')!!}
                            {!! Form::label('edit_lorry', Lang::get('messages.edit_lorry')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_lorry','Yes',$my_privilegeList->edit_lorry,array('class' => 'form_element','id' => 'edit_lorry')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_lorry', 'No')!!}
                            {!! Form::label('delete_lorry', Lang::get('messages.delete_lorry')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_lorry','Yes',$my_privilegeList->delete_lorry,array('class' => 'form_element','id' => 'delete_lorry')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#lorry').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_lorry').prop('checked', 1);
                            $('#view_lorry').prop('checked', 1);
                            $('#edit_lorry').prop('checked', 1);
                            $('#delete_lorry').prop('checked', 1);
                        } else {
                            $('#new_lorry').prop('checked', 0);
                            $('#view_lorry').prop('checked', 0);
                            $('#edit_lorry').prop('checked',0);
                            $('#delete_lorry').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end lorry --}}




            {{-- start employee --}}

            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('employee', 'No')!!}
                        {!! Form::label('employee', Lang::get('messages.employee')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('employee','Yes',$my_privilegeList->employee,array('class' => 'form_element','id' => 'employeee')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_employee', 'No')!!}
                            {!! Form::label('new_employee', Lang::get('messages.new_employee')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_employee','Yes',$my_privilegeList->new_employee,array('class' => 'form_element','id' => 'new_employee')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_employee', 'No')!!}
                            {!! Form::label('view_employee', Lang::get('messages.view_employee')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_employee','Yes',$my_privilegeList->view_employee,array('class' => 'form_element','id' => 'view_employee')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_employee', 'No')!!}
                            {!! Form::label('edit_employee', Lang::get('messages.edit_employee')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_employee','Yes',$my_privilegeList->edit_employee,array('class' => 'form_element','id' => 'edit_employee')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_employee', 'No')!!}
                            {!! Form::label('delete_employee', Lang::get('messages.delete_employee')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_employee','Yes',$my_privilegeList->delete_employee,array('class' => 'form_element','id' => 'delete_employee')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#employeee').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_employee').prop('checked', 1);
                            $('#view_employee').prop('checked', 1);
                            $('#edit_employee').prop('checked', 1);
                            $('#delete_employee').prop('checked', 1);
                        } else {
                            $('#new_employee').prop('checked', 0);
                            $('#view_employee').prop('checked', 0);
                            $('#edit_employee').prop('checked',0);
                            $('#delete_employee').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end employee --}}

			{{-- start driver --}}
            <div class="display_table_master_row">

				<div class="display_table_row_entity" contenteditable>
					<div class="display_table_heading_cell">{!! Form::hidden('driver', 'No')!!}
						{!! Form::label('driver', Lang::get('messages.driver')) !!}


						<div class="display_table_data_cell">
							{!! Form::checkbox('driver','Yes',$my_privilegeList->driver,array('class' => 'form_element','id' => 'driver')) !!}
						</div>

					</div>

				</div>

				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('new_driver', 'No')!!}
							{!! Form::label('new_driver', Lang::get('messages.new_driver')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('new_driver','Yes',$my_privilegeList->new_driver,array('class' => 'form_element','id' => 'new_driver')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('view_driver', 'No')!!}
							{!! Form::label('view_driver', Lang::get('messages.view_driver')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('view_driver','Yes',$my_privilegeList->view_driver,array('class' => 'form_element','id' => 'view_driver')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('edit_driver', 'No')!!}
							{!! Form::label('edit_driver', Lang::get('messages.edit_driver')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('edit_driver','Yes',$my_privilegeList->edit_driver,array('class' => 'form_element','id' => 'edit_driver')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('delete_driver', 'No')!!}
							{!! Form::label('delete_driver', Lang::get('messages.delete_driver')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('delete_driver','Yes',$my_privilegeList->delete_driver,array('class' => 'form_element','id' => 'delete_driver')) !!}
							</div>

						</div>

					</div>



				</div>

				<script>

					$('#driver').click(function(){
						var $this = $(this);

						if ($this.is(':checked')) {
							$('#new_driver').prop('checked', 1);
							$('#view_driver').prop('checked', 1);
							$('#edit_driver').prop('checked', 1);
							$('#delete_driver').prop('checked', 1);
						} else {
							$('#new_driver').prop('checked', 0);
							$('#view_driver').prop('checked', 0);
							$('#edit_driver').prop('checked',0);
							$('#delete_driver').prop('checked', 0);
						}
					});


				</script>


			</div>
			{{-- end driver --}}


            {{-- start running_expense --}}
            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('running_expense', 'No')!!}
                        {!! Form::label('running_expense', Lang::get('messages.running_expense')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('running_expense','Yes',$my_privilegeList->running_expense,array('class' => 'form_element','id' => 'running_expense')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_running_expense', 'No')!!}
                            {!! Form::label('new_running_expense', Lang::get('messages.new_running_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_running_expense','Yes',$my_privilegeList->new_running_expense,array('class' => 'form_element','id' => 'new_running_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_running_expense', 'No')!!}
                            {!! Form::label('view_running_expense', Lang::get('messages.view_running_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_running_expense','Yes',$my_privilegeList->view_running_expense,array('class' => 'form_element','id' => 'view_running_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_running_expense', 'No')!!}
                            {!! Form::label('edit_running_expense', Lang::get('messages.edit_running_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_running_expense','Yes',$my_privilegeList->edit_running_expense,array('class' => 'form_element','id' => 'edit_running_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_running_expense', 'No')!!}
                            {!! Form::label('delete_running_expense', Lang::get('messages.delete_running_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_running_expense','Yes',$my_privilegeList->delete_running_expense,array('class' => 'form_element','id' => 'delete_running_expense')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#running_expense').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_running_expense').prop('checked', 1);
                            $('#view_running_expense').prop('checked', 1);
                            $('#edit_running_expense').prop('checked', 1);
                            $('#delete_running_expense').prop('checked', 1);
                        } else {
                            $('#new_running_expense').prop('checked', 0);
                            $('#view_running_expense').prop('checked', 0);
                            $('#edit_running_expense').prop('checked',0);
                            $('#delete_running_expense').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end running_expense --}}
            
            
            {{-- start lorry_expense --}}
            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('lorry_expense', 'No')!!}
                        {!! Form::label('lorry_expense', Lang::get('messages.lorry_expense')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('lorry_expense','Yes',$my_privilegeList->lorry_expense,array('class' => 'form_element','id' => 'lorry_expense')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_lorry_expense', 'No')!!}
                            {!! Form::label('new_lorry_expense', Lang::get('messages.new_lorry_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_lorry_expense','Yes',$my_privilegeList->new_lorry_expense,array('class' => 'form_element','id' => 'new_lorry_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_lorry_expense', 'No')!!}
                            {!! Form::label('view_lorry_expense', Lang::get('messages.view_lorry_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_lorry_expense','Yes',$my_privilegeList->view_lorry_expense,array('class' => 'form_element','id' => 'view_lorry_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_lorry_expense', 'No')!!}
                            {!! Form::label('edit_lorry_expense', Lang::get('messages.edit_lorry_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_lorry_expense','Yes',$my_privilegeList->edit_lorry_expense,array('class' => 'form_element','id' => 'edit_lorry_expense')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_lorry_expense', 'No')!!}
                            {!! Form::label('delete_lorry_expense', Lang::get('messages.delete_lorry_expense')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_lorry_expense','Yes',$my_privilegeList->delete_lorry_expense,array('class' => 'form_element','id' => 'delete_lorry_expense')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#lorry_expense').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_lorry_expense').prop('checked', 1);
                            $('#view_lorry_expense').prop('checked', 1);
                            $('#edit_lorry_expense').prop('checked', 1);
                            $('#delete_lorry_expense').prop('checked', 1);
                        } else {
                            $('#new_lorry_expense').prop('checked', 0);
                            $('#view_lorry_expense').prop('checked', 0);
                            $('#edit_lorry_expense').prop('checked',0);
                            $('#delete_lorry_expense').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end lorry_expense --}}

            {{-- start employee_payment --}}
            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('employee_payment', 'No')!!}
                        {!! Form::label('employee_payment', Lang::get('messages.employee_payment')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('employee_payment','Yes',$my_privilegeList->employee_payment,array('class' => 'form_element','id' => 'employee_payment')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_employee_payment', 'No')!!}
                            {!! Form::label('new_employee_payment', Lang::get('messages.new_employee_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_employee_payment','Yes',$my_privilegeList->new_employee_payment,array('class' => 'form_element','id' => 'new_employee_payment')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_employee_payment', 'No')!!}
                            {!! Form::label('view_employee_payment', Lang::get('messages.view_employee_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_employee_payment','Yes',$my_privilegeList->view_employee_payment,array('class' => 'form_element','id' => 'view_employee_payment')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_employee_payment', 'No')!!}
                            {!! Form::label('edit_employee_payment', Lang::get('messages.edit_employee_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_employee_payment','Yes',$my_privilegeList->edit_employee_payment,array('class' => 'form_element','id' => 'edit_employee_payment')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_employee_payment', 'No')!!}
                            {!! Form::label('delete_employee_payment', Lang::get('messages.delete_employee_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_employee_payment','Yes',$my_privilegeList->delete_employee_payment,array('class' => 'form_element','id' => 'delete_employee_payment')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#employee_payment').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_employee_payment').prop('checked', 1);
                            $('#view_employee_payment').prop('checked', 1);
                            $('#edit_employee_payment').prop('checked', 1);
                            $('#delete_employee_payment').prop('checked', 1);
                        } else {
                            $('#new_employee_payment').prop('checked', 0);
                            $('#view_employee_payment').prop('checked', 0);
                            $('#edit_employee_payment').prop('checked',0);
                            $('#delete_employee_payment').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end employee_payment --}}


            {{-- start driver_payment --}}
            <div class="display_table_master_row">

                <div class="display_table_row_entity" contenteditable>
                    <div class="display_table_heading_cell">{!! Form::hidden('driver_payment', 'No')!!}
                        {!! Form::label('driver_payment', Lang::get('messages.driver_payment')) !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('driver_payment','Yes',$my_privilegeList->driver_payment,array('class' => 'form_element','id' => 'driver_payment')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row">

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('new_driver_payment', 'No')!!}
                            {!! Form::label('new_driver_payment', Lang::get('messages.new_driver_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('new_driver_payment','Yes',$my_privilegeList->new_driver_payment,array('class' => 'form_element','id' => 'new_driver_payment')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('view_driver_payment', 'No')!!}
                            {!! Form::label('view_driver_payment', Lang::get('messages.view_driver_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('view_driver_payment','Yes',$my_privilegeList->view_driver_payment,array('class' => 'form_element','id' => 'view_driver_payment')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('edit_driver_payment', 'No')!!}
                            {!! Form::label('edit_driver_payment', Lang::get('messages.edit_driver_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('edit_driver_payment','Yes',$my_privilegeList->edit_driver_payment,array('class' => 'form_element','id' => 'edit_driver_payment')) !!}
                            </div>

                        </div>

                    </div>

                    <div class="display_table_row_data" contenteditable>
                        <div class="display_table_heading_cell">{!! Form::hidden('delete_driver_payment', 'No')!!}
                            {!! Form::label('delete_driver_payment', Lang::get('messages.delete_driver_payment')) !!}


                            <div class="display_table_data_cell">
                                {!! Form::checkbox('delete_driver_payment','Yes',$my_privilegeList->delete_driver_payment,array('class' => 'form_element','id' => 'delete_driver_payment')) !!}
                            </div>

                        </div>

                    </div>



                </div>

                <script>

                    $('#driver_payment').click(function(){
                        var $this = $(this);

                        if ($this.is(':checked')) {
                            $('#new_driver_payment').prop('checked', 1);
                            $('#view_driver_payment').prop('checked', 1);
                            $('#edit_driver_payment').prop('checked', 1);
                            $('#delete_driver_payment').prop('checked', 1);
                        } else {
                            $('#new_driver_payment').prop('checked', 0);
                            $('#view_driver_payment').prop('checked', 0);
                            $('#edit_driver_payment').prop('checked',0);
                            $('#delete_driver_payment').prop('checked', 0);
                        }
                    });


                </script>


            </div>
            {{-- end driver_payment --}}
            
            
            

            {{-- start reports --}}

			<div class="display_table_master_row">

				<div class="display_table_row_entity" contenteditable>
					<div class="display_table_heading_cell">{!! Form::hidden('reports', 'No')!!}
						{!! Form::label('reports', Lang::get('messages.reports')) !!}


					</div>

				</div>

				<div class="display_table_row">

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('stock_report', 'No')!!}
							{!! Form::label('stock_report', 'Stock Report') !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('stock_report','Yes',$my_privilegeList->stock_report,array('class' => 'form_element','id' => 'stock_report')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('credit_sales_report', 'No')!!}
							{!! Form::label('credit_sales_report', 'Credit Sales Report') !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('credit_sales_report','Yes',$my_privilegeList->credit_sales_report,array('class' => 'form_element','id' => 'credit_sales_report')) !!}
							</div>

						</div>

					</div>

					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('sales_report', 'No')!!}
							{!! Form::label('sales_report', 'Sales Report, Sales Tally Report, Sales Profit Report') !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('sales_report','Yes',$my_privilegeList->sales_report,array('class' => 'form_element','id' => 'sales_report')) !!}
							</div>

						</div>

					</div>


					<div class="display_table_row_data" contenteditable>
						<div class="display_table_heading_cell">{!! Form::hidden('log', 'No')!!}
							{!! Form::label('log', Lang::get('messages.log')) !!}


							<div class="display_table_data_cell">
								{!! Form::checkbox('log','Yes',$my_privilegeList->log,array('class' => 'form_element','id' => 'log')) !!}
							</div>

						</div>

					</div>



				</div>

				<script>

					$('#reports').click(function(){
						var $this = $(this);

						if ($this.is(':checked')) {
							$('#stock_report').prop('checked', 1);
							$('#credit_sales_report').prop('checked', 1);
							$('#sales_report').prop('checked', 1);
							$('#log').prop('checked', 1);
						} else {
							$('#stock_report').prop('checked', 0);
							$('#credit_sales_report').prop('checked', 0);
							$('#sales_report').prop('checked',0);
							$('#log').prop('checked', 0);
						}
					});


				</script>


			</div>
			{{-- end reports --}}




			{{-- start settings --}}

			<div class="display_table_master_row">

                <div class="display_table_row_entity"  style="border-bottom-left-radius:10px;margin-bottom: 5px;" contenteditable>
                    <div class="display_table_heading_cell">
                        {!! Form::hidden('purchasing', 'No')!!}
                        {!! Form::label('purchasing', 'Purchasing') !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('purchasing','Yes',$my_privilegeList->purchasing,array('class' => 'form_element','id' => 'purchasing')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row_entity"  style="border-bottom-left-radius:10px;margin-bottom: 5px;" contenteditable>
                    <div class="display_table_heading_cell">
                        {!! Form::hidden('manufacturing', 'No')!!}
                        {!! Form::label('manufacturing', 'Manufacturing') !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('manufacturing','Yes',$my_privilegeList->manufacturing,array('class' => 'form_element','id' => 'manufacturing')) !!}
                        </div>

                    </div>

                </div>


                <div class="display_table_row_entity"  style="border-bottom-left-radius:10px;margin-bottom: 5px;" contenteditable>
                    <div class="display_table_heading_cell">
                        {!! Form::hidden('stock', 'No')!!}
                        {!! Form::label('stock', 'Stock') !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('stock','Yes',$my_privilegeList->stock,array('class' => 'form_element','id' => 'stock')) !!}
                        </div>

                    </div>

                </div>

                <div class="display_table_row_entity"  style="border-bottom-left-radius:10px;margin-bottom: 5px;" contenteditable>
                    <div class="display_table_heading_cell">
                        {!! Form::hidden('tour', 'No')!!}
                        {!! Form::label('tour', 'Tour') !!}


                        <div class="display_table_data_cell">
                            {!! Form::checkbox('tour','Yes',$my_privilegeList->tour,array('class' => 'form_element','id' => 'tour')) !!}
                        </div>

                    </div>

                </div>

				<div class="display_table_row_entity"  style="border-bottom-left-radius:10px;margin-bottom: 5px;" contenteditable>
					<div class="display_table_heading_cell">
						{!! Form::hidden('settings', 'No')!!}
						{!! Form::label('settings', 'Options') !!}


						<div class="display_table_data_cell">
							{!! Form::checkbox('settings','Yes',$my_privilegeList->settings,array('class' => 'form_element','id' => 'settings')) !!}
						</div>

					</div>

				</div>


                <div class="display_table_row_entity" style="border-bottom-left-radius:10px;margin-bottom: 5px;" contenteditable>


                    <div class="display_table_heading_cell">
                        {!! Form::hidden('privileges', 'No')!!}
                        {!! Form::label('privileges', 'Privileges') !!}


                        <div class="display_table_data_cell" style="border-bottom-left-radius:10px;margin-bottom: 5px;">
                            {!! Form::checkbox('privileges','Yes',$my_privilegeList->privileges,array('class' => 'form_element','id' => 'privileges')) !!}
                        </div>

                    </div>

                </div>
			</div>
			{{-- end settings --}}

			{!! Form::submit(Lang::get('messages.edit'), array('class' => 'btn btn-primary')) !!}

			{!! Form::close() !!}
	</div>
		<script>



			$("#employee_id").change(function(){
				//alert("helll");


				//$('#all_categories_id').remove();


				var privilege_id_employee_id_list = <?php echo json_encode($privilege_id_employee_id_list); ?>;//'category_id', 'super_category_id');
				var privilegeList = <?php echo json_encode($privilegeList); ?>;
				var create_site=<?php echo json_encode($privilegeList[0]['create_site']); ?>
				//var theArray = JSON.parse(privilegeList);

				//$('#cg_city_cg_city_id').html('');// assumed : clear select

				var selected_employee_id=$( "#employee_id" ).val();



					//alert(index+" "+value['view_site'] );
					//alert(privilegeList[selected_employee_id]['new_product'] );



				jQuery.each(privilegeList, function( index, value ) {
					//alert(selected_employee_id+" "+index+" "+value['employee_id'] );
					if (selected_employee_id == value['employee_id']) {

						//alert(value['new_site']);
					console.log(index + " " +selected_employee_id + " " + value['edit_product'] + " in");
						//$('#delete_product').is(value['delete_product']);


						//$('input[name=new_site]').attr('checked', value['new_site'] == 0 ? false : true);
						//$('input[name=privilege_id]').attr('value', value['id'] == 0 ? false : true);
						//$('input[name=product]').attr('checked', value['product'] == 0 ? false : true);
                        $('#product').prop('checked',  value['product'] == 0 ? false : true);

						//$('input[name=new_product]').attr('checked', value['new_product'] == 0 ? false : true);
                        $('#new_product').prop('checked',  value['new_product'] == 0 ? false : true);

						//$('input[name=view_product]').attr('checked', value['view_product'] == 0 ? false : true);
                        $('#view_product').prop('checked',  value['view_product'] == 0 ? false : true);

						//$('input[name=edit_product]').attr('checked', value['edit_product'] == 0 ? false : true);
                        $('#edit_product').prop('checked',  value['edit_product'] == 0 ? false : true);

						//$('input[name=delete_product]').attr('checked', value['delete_product'] == 0 ? false : true);
                        $('#delete_product').prop('checked',  value['delete_product'] == 0 ? false : true);

                        $('#add_stocks_many').prop('checked',  value['add_stocks_many'] == 0 ? false : true);

                        //$('input[name=delete_product]').attr('checked', value['delete_product'] == 0 ? false : true);
                        $('#remove_stocks_many').prop('checked',  value['remove_stocks_many'] == 0 ? false : true);
							//$('input[name=delete_product]').attr('checked', value['delete_product'] == 0 ? false : true);
						//$('input[name=loading]').attr('checked', value['loading'] == 0 ? false : true);
                        $('#loading').prop('checked',  value['loading'] == 0 ? false : true);

						//$('input[name=new_loading]').attr('checked', value['new_loading'] == 0 ? false : true);
                        $('#new_loading').prop('checked',  value['new_loading'] == 0 ? false : true);

						//$('input[name=view_loading]').attr('checked', value['view_loading'] == 0 ? false : true);
                        $('#view_loading').prop('checked',  value['view_loading'] == 0 ? false : true);

						//$('input[name=edit_loading]').attr('checked', value['edit_loading'] == 0 ? false : true);
                        $('#edit_loading').prop('checked',  value['edit_loading'] == 0 ? false : true);


						//$('input[name=delete_loading]').attr('checked', value['delete_loading'] == 0 ? false : true);
                        $('#delete_loading').prop('checked',  value['delete_loading'] == 0 ? false : true);

						
						//$('input[name=invoice]').attr('checked', value['invoice'] == 0 ? false : true);
                        $('#invoice').prop('checked',  value['invoice'] == 0 ? false : true);

						//$('input[name=new_invoice]').attr('checked', value['new_invoice'] == 0 ? false : true);
                        $('#new_invoice').prop('checked',  value['new_invoice'] == 0 ? false : true);

						//$('input[name=view_invoice]').attr('checked', value['view_invoice'] == 0 ? false : true);
                        $('#view_invoice').prop('checked',  value['view_invoice'] == 0 ? false : true);

						//$('input[name=edit_invoice]').attr('checked', value['edit_invoice'] == 0 ? false : true);
                        $('#edit_invoice').prop('checked',  value['edit_invoice'] == 0 ? false : true);

						//$('input[name=delete_invoice]').attr('checked', value['delete_invoice'] == 0 ? false : true);
                        $('#delete_invoice').prop('checked',  value['delete_invoice'] == 0 ? false : true);


						//$('input[name=driver]').attr('checked', value['driver'] == 0 ? false : true);
                        $('#driver').prop('checked',  value['driver'] == 0 ? false : true);

						//$('input[name=new_driver]').attr('checked', value['new_driver'] == 0 ? false : true);
                        $('#new_driver').prop('checked',  value['new_driver'] == 0 ? false : true);

						//$('input[name=view_driver]').attr('checked', value['view_driver'] == 0 ? false : true);
                        $('#view_driver').prop('checked',  value['view_driver'] == 0 ? false : true);

						//$('input[name=edit_driver]').attr('checked', value['edit_driver'] == 0 ? false : true);
                        $('#edit_driver').prop('checked',  value['edit_driver'] == 0 ? false : true);

						//$('input[name=delete_driver]').attr('checked', value['delete_driver'] == 0 ? false : true);
                        $('#delete_driver').prop('checked',  value['delete_driver'] == 0 ? false : true);


						//$('input[name=lorry]').attr('checked', value['lorry'] == 0 ? false : true);
                        $('#lorry').prop('checked',  value['lorry'] == 0 ? false : true);

						//$('input[name=new_lorry]').attr('checked', value['new_lorry'] == 0 ? false : true);
                        $('#new_lorry').prop('checked',  value['new_lorry'] == 0 ? false : true);

						//$('input[name=view_lorry]').attr('checked', value['view_lorry'] == 0 ? false : true);
                        $('#view_lorry').prop('checked',  value['view_lorry'] == 0 ? false : true);

						//$('input[name=edit_lorry]').attr('checked', value['edit_lorry'] == 0 ? false : true);
                        $('#edit_lorry').prop('checked',  value['edit_lorry'] == 0 ? false : true);

						//$('input[name=delete_lorry]').attr('checked', value['delete_lorry'] == 0 ? false : true);
                        $('#delete_lorry').prop('checked',  value['delete_lorry'] == 0 ? false : true);


						//$('input[name=unloading]').attr('checked', value['unloading'] == 0 ? false : true);
                        $('#unloading').prop('checked',  value['unloading'] == 0 ? false : true);

						//$('input[name=new_unloading]').attr('checked', value['new_unloading'] == 0 ? false : true);
                        $('#new_unloading').prop('checked',  value['new_unloading'] == 0 ? false : true);

						//$('input[name=view_unloading]').attr('checked', value['view_unloading'] == 0 ? false : true);
                        $('#view_unloading').prop('checked',  value['view_unloading'] == 0 ? false : true);

						//$('input[name=edit_unloading]').attr('checked', value['edit_unloading'] == 0 ? false : true);
                        $('#edit_unloading').prop('checked',  value['edit_unloading'] == 0 ? false : true);

						//$('input[name=delete_unloading]').attr('checked', value['delete_unloading'] == 0 ? false : true);
                        $('#delete_unloading').prop('checked',  value['delete_unloading'] == 0 ? false : true);


						//$('input[name=return]').attr('checked', value['return'] == 0 ? false : true);
                        $('#return_product').prop('checked',  value['return_product'] == 0 ? false : true);

						//$('input[name=new_sales_return]').attr('checked', value['new_sales_return'] == 0 ? false : true);
                        $('#new_sales_return').prop('checked',  value['new_sales_return'] == 0 ? false : true);

						//$('input[name=view_sales_return]').attr('checked', value['view_sales_return'] == 0 ? false : true);
                        $('#view_sales_return').prop('checked',  value['view_sales_return'] == 0 ? false : true);

						//$('input[name=edit_sales_return]').attr('checked', value['edit_sales_return'] == 0 ? false : true);
                        $('#product').prop('checked',  value['product'] == 0 ? false : true);

						//$('input[name=delete_sales_return]').attr('checked', value['delete_sales_return'] == 0 ? false : true);
                        $('#edit_sales_return').prop('checked',  value['edit_sales_return'] == 0 ? false : true);
                        $('#delete_sales_return').prop('checked',  value['delete_sales_return'] == 0 ? false : true);

						
						//$('insales_expensee=expense]').attr('checked'sales_expense['expense'] == 0 ? false : true);
                   //sales_expense
                        $( '#sales_expense').prop('checked',sales_expense['sales_expense'] == 0 ? false : true);

						//$('input[name=new_expense]').attr('checked', value['new_expense'] == 0 ? false : true);
                        $('#new_expense').prop('checked',  value['new_expense'] == 0 ? false : true);

						//$('input[name=view_expense]').attr('checked', value['view_expense'] == 0 ? false : true);
                        $('#view_expense').prop('checked',  value['view_expense'] == 0 ? false : true);

						//$('input[name=edit_expense]').attr('checked', value['edit_expense'] == 0 ? false : true);
                        $('#edit_expense').prop('checked',  value['edit_expense'] == 0 ? false : true);

						//$('input[name=delete_expense]').attr('checked', value['delete_expense'] == 0 ? false : true);
                        $('#delete_expense').prop('checked',  value['delete_expense'] == 0 ? false : true);

						//$('input[name=point_incharge]').attr('checked', value['point_incharge'] == 0 ? false : true);
						//$('input[name=new_point_incharge]').attr('checked', value['new_point_incharge'] == 0 ? false : true);
						//$('input[name=view_point_incharge]').attr('checked', value['view_point_incharge'] == 0 ? false : true);
					//	$('input[name=edit_point_incharge]').attr('checked', value['edit_point_incharge'] == 0 ? false : true);
						//$('input[name=delete_point_incharge]').attr('checked', value['delete_point_incharge'] == 0 ? false : true);
//
						//$('input[name=order]').attr('checked', value['order'] == 0 ? false : true);
					//	$('input[name=new_order]').attr('checked', value['new_order'] == 0 ? false : true);
					//	$('input[name=view_order]').attr('checked', value['view_order'] == 0 ? false : true);
					//	$('input[name=edit_order]').attr('checked', value['edit_order'] == 0 ? false : true);
					//	$('input[name=delete_order]').attr('checked', value['delete_order'] == 0 ? false : true);

						//$('input[name=employee]').attr('checked', value['employee'] == 0 ? false : true);
                        $('#employee').prop('checked',  value['employee'] == 0 ? false : true);

						//$('input[name=new_employee]').attr('checked', value['new_employee'] == 0 ? false : true);
                        $('#new_employee').prop('checked',  value['new_employee'] == 0 ? false : true);

						//$('input[name=view_employee]').attr('checked', value['view_employee'] == 0 ? false : true);
                        $('#view_employee').prop('checked',  value['view_employee'] == 0 ? false : true);

						//$('input[name=edit_employee]').attr('checked', value['edit_employee'] == 0 ? false : true);
                        $('#edit_employee').prop('checked',  value['edit_employee'] == 0 ? false : true);

						//$('input[name=delete_employee]').attr('checked', value['delete_employee'] == 0 ? false : true);
                        $('#delete_employee').prop('checked',  value['delete_employee'] == 0 ? false : true);

                        
						//$('input[name=outlet]').attr('checked', value['outlet'] == 0 ? false : true);
                        $('#outlet').prop('checked',  value['outlet'] == 0 ? false : true);

						//$('input[name=new_outlet]').attr('checked', value['new_outlet'] == 0 ? false : true);
                        $('#new_outlet').prop('checked',  value['new_outlet'] == 0 ? false : true);

						//$('input[name=view_outlet]').attr('checked', value['view_outlet'] == 0 ? false : true);
                        $('#view_outlet').prop('checked',  value['view_outlet'] == 0 ? false : true);

						//$('input[name=edit_outlet]').attr('checked', value['edit_outlet'] == 0 ? false : true);
                        $('#edit_outlet').prop('checked',  value['edit_outlet'] == 0 ? false : true);

						//$('input[name=delete_outlet]').attr('checked', value['delete_outlet'] == 0 ? false : true);
                        $('#delete_outlet').prop('checked',  value['delete_outlet'] == 0 ? false : true);
                        
    
						//$('input[name=saless]').attr('checked', value['saless'] == 0 ? false : true);
                        $('#sales').prop('checked',  value['sales'] == 0 ? false : true);

						//$('input[name=new_sales]').attr('checked', value['new_sales'] == 0 ? false : true);
                        $('#new_sales').prop('checked',  value['new_sales'] == 0 ? false : true);

						//$('input[name=view_sales]').attr('checked', value['view_sales'] == 0 ? false : true);
                        $('#view_sales').prop('checked',  value['view_sales'] == 0 ? false : true);

						//$('input[name=edit_sales]').attr('checked', value['edit_sales'] == 0 ? false : true);
                        $('#edit_sales').prop('checked',  value['edit_sales'] == 0 ? false : true);

						//$('input[name=delete_sales]').attr('checked', value['delete_sales'] == 0 ? false : true);
                        $('#delete_sales').prop('checked',  value['delete_sales'] == 0 ? false : true);



						//$('input[name=point]').attr('checked', value['point'] == 0 ? false : true);
					//	$('input[name=new_point]').attr('checked', value['new_point'] == 0 ? false : true);
					//	$('input[name=view_point]').attr('checked', value['view_point'] == 0 ? false : true);
					//	$('input[name=edit_point]').attr('checked', value['edit_point'] == 0 ? false : true);
					//	$('input[name=delete_point]').attr('checked', value['delete_point'] == 0 ? false : true);


					//	$('input[name=company]').attr('checked', value['company'] == 0 ? false : true);
					//	$('input[name=new_company]').attr('checked', value['new_company'] == 0 ? false : true);
					//	$('input[name=view_company]').attr('checked', value['view_company'] == 0 ? false : true);
					//	$('input[name=edit_company]').attr('checked', value['edit_company'] == 0 ? false : true);
					//	$('input[name=delete_company]').attr('checked', value['delete_company'] == 0 ? false : true);


					//	$('input[name=site]').attr('checked', value['site'] == 0 ? false : true);
					//	$('input[name=new_site]').attr('checked', value['new_site'] == 0 ? false : true);
					//	$('input[name=view_site]').attr('checked', value['view_site'] == 0 ? false : true);
					//	$('input[name=edit_site]').attr('checked', value['edit_site'] == 0 ? false : true);
					//	$('input[name=delete_site]').attr('checked', value['delete_site'] == 0 ? false : true);


						//$('input[name=route]').attr('checked', value['route'] == 0 ? false : true);
                        $('#route').prop('checked',  value['route'] == 0 ? false : true);

						//$('input[name=new_route]').attr('checked', value['new_route'] == 0 ? false : true);
                        $('#new_route').prop('checked',  value['new_route'] == 0 ? false : true);

						//$('input[name=view_route]').attr('checked', value['view_route'] == 0 ? false : true);
                        $('#view_route').prop('checked',  value['view_route'] == 0 ? false : true);

						//$('input[name=edit_route]').attr('checked', value['edit_route'] == 0 ? false : true);
                        $('#edit_route').prop('checked',  value['edit_route'] == 0 ? false : true);

						//$('input[name=delete_route]').attr('checked', value['delete_route'] == 0 ? false : true);
                        $('#delete_route').prop('checked',  value['delete_route'] == 0 ? false : true);



                        //$('input[name=driver_payment]').attr('checked', value['driver_payment'] == 0 ? false : true);
                        $('#driver_payment').prop('checked',  value['driver_payment'] == 0 ? false : true);

                        //$('input[name=new_driver_payment]').attr('checked', value['new_driver_payment'] == 0 ? false : true);
                        $('#new_driver_payment').prop('checked',  value['new_driver_payment'] == 0 ? false : true);

                        //$('input[name=view_driver_payment]').attr('checked', value['view_driver_payment'] == 0 ? false : true);
                        $('#view_driver_payment').prop('checked',  value['view_driver_payment'] == 0 ? false : true);

                        //$('input[name=edit_driver_payment]').attr('checked', value['edit_driver_payment'] == 0 ? false : true);
                        $('#edit_driver_payment').prop('checked',  value['edit_driver_payment'] == 0 ? false : true);

                        //$('input[name=delete_driver_payment]').attr('checked', value['delete_driver_payment'] == 0 ? false : true);
                        $('#delete_driver_payment').prop('checked',  value['delete_driver_payment'] == 0 ? false : true);



                        //$('input[name=employee_payment]').attr('checked', value['employee_payment'] == 0 ? false : true);
                        $('#employee_payment').prop('checked',  value['employee_payment'] == 0 ? false : true);

                        //$('input[name=new_employee_payment]').attr('checked', value['new_employee_payment'] == 0 ? false : true);
                        $('#new_employee_payment').prop('checked',  value['new_employee_payment'] == 0 ? false : true);

                        //$('input[name=view_employee_payment]').attr('checked', value['view_employee_payment'] == 0 ? false : true);
                        $('#view_employee_payment').prop('checked',  value['view_employee_payment'] == 0 ? false : true);

                        //$('input[name=edit_employee_payment]').attr('checked', value['edit_employee_payment'] == 0 ? false : true);
                        $('#edit_employee_payment').prop('checked',  value['edit_employee_payment'] == 0 ? false : true);

                        //$('input[name=delete_employee_payment]').attr('checked', value['delete_employee_payment'] == 0 ? false : true);
                        $('#delete_employee_payment').prop('checked',  value['delete_employee_payment'] == 0 ? false : true);



                        //$('input[name=running_expense]').attr('checked', value['running_expense'] == 0 ? false : true);
                        $('#running_expense').prop('checked',  value['running_expense'] == 0 ? false : true);

                        //$('input[name=new_running_expense]').attr('checked', value['new_running_expense'] == 0 ? false : true);
                        $('#new_running_expense').prop('checked',  value['new_running_expense'] == 0 ? false : true);

                        //$('input[name=view_running_expense]').attr('checked', value['view_running_expense'] == 0 ? false : true);
                        $('#view_running_expense').prop('checked',  value['view_running_expense'] == 0 ? false : true);

                        //$('input[name=edit_running_expense]').attr('checked', value['edit_running_expense'] == 0 ? false : true);
                        $('#edit_running_expense').prop('checked',  value['edit_running_expense'] == 0 ? false : true);

                        //$('input[name=delete_running_expense]').attr('checked', value['delete_running_expense'] == 0 ? false : true);
                        $('#delete_running_expense').prop('checked',  value['delete_running_expense'] == 0 ? false : true);



                        //$('input[name=lorry_expense]').attr('checked', value['lorry_expense'] == 0 ? false : true);
                        $('#lorry_expense').prop('checked',  value['lorry_expense'] == 0 ? false : true);

                        //$('input[name=new_lorry_expense]').attr('checked', value['new_lorry_expense'] == 0 ? false : true);
                        $('#new_lorry_expense').prop('checked',  value['new_lorry_expense'] == 0 ? false : true);

                        //$('input[name=view_lorry_expense]').attr('checked', value['view_lorry_expense'] == 0 ? false : true);
                        $('#view_lorry_expense').prop('checked',  value['view_lorry_expense'] == 0 ? false : true);

                        //$('input[name=edit_lorry_expense]').attr('checked', value['edit_lorry_expense'] == 0 ? false : true);
                        $('#edit_lorry_expense').prop('checked',  value['edit_lorry_expense'] == 0 ? false : true);

                        //$('input[name=delete_lorry_expense]').attr('checked', value['delete_lorry_expense'] == 0 ? false : true);
                        $('#delete_lorry_expense').prop('checked',  value['delete_lorry_expense'] == 0 ? false : true);
                        
                        

						//$('input[name=stock_report]').attr('checked', value['stock_report'] == 0 ? false : true);
                        $('#stock_report').prop('checked',  value['stock_report'] == 0 ? false : true);

						//$('input[name=credit_sales_report]').attr('checked', value['credit_sales_report'] == 0 ? false : true);
                        $('#credit_sales_report').prop('checked',  value['credit_sales_report'] == 0 ? false : true);

						//$('input[name=sales_report]').attr('checked', value['sales_report'] == 0 ? false : true);
                        $('#sales_report').prop('checked',  value['sales_report'] == 0 ? false : true);
						//$('input[name=lorry_transport_bill]').attr('checked', value['lorry_transport_bill'] == 0 ? false : true);
						//$('input[name=logs]').attr('checked', value['logs'] == 0 ? false : true);
                        $('#log').prop('checked',  value['log'] == 0 ? false : true);

						//$('input[name=settings]').attr('checked', value['settings'] == 0 ? false : true);
                        $('#settings').prop('checked',  value['settings'] == 0 ? false : true);
                        $('#manufacturing').prop('checked',  value['manufacturing'] == 0 ? false : true);
                        $('#purchasing').prop('checked',  value['purchasing'] == 0 ? false : true);
                        $('#tour').prop('checked',  value['tour'] == 0 ? false : true);
                        $('#stock').prop('checked',  value['stock'] == 0 ? false : true);

						//$('input[name=privileges]').attr('checked', value['privileges'] == 0 ? false : true);
                        $('#privileges').prop('checked',  value['privileges'] == 0 ? false : true);

					

					}});



			})   ;



			$( document ).ready(function() {
				var element = document.getElementById('employee_id');
				//element.value =<?php echo json_encode(Auth::id()); ?>;// 28;  Auth::id()
			});

		</script>
@stop