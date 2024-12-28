@extends('layouts.layout')
@section('bottom_DIV')

<table 	 id="login_table">
 <tbody>
	{!!Form::open(array('url' => 'userReg', 'method' => 'POST'))!!}

			  <tr>
					    <th colspan="2" style="text-align:center;">User Registration</th>

  			</tr>
			<tr>
				<td>{!!Form::label('userName', 'User Name',array('class'=>'form_label'))!!}</td>
				<td>{!!Form::text('userName')!!}</td>

			</tr>
			
			<tr>
				<td>{!!$errors->first('userName')!!}</td>
			</tr>
			

			<tr>
					<td>{!!Form::label('passWord', 'Password',array('class'=>'form_label'))!!}</td>
					<td>{!!Form::password('passWord')!!}</td>
			</tr>

			<tr>
					<td>	{!!$errors->first('passWord')!!}</td>
				</tr>
		<tr>
					<td>{!!Form::label('phone', 'Phone',array('class'=>'form_label'))!!}</td>
					<td>{!!Form::text('phone')!!}</td>
			</tr>

			<tr>
					<td>	{!!$errors->first('phone')!!}</td>
				</tr>
				<tr>
					<td>{!!Form::label('email', 'E Mail',array('class'=>'form_label'))!!}</td>
					<td>{!!Form::email('email')!!}</td>
			</tr>

			<tr>
					<td>	{!!$errors->first('email')!!}</td>
				</tr>
			<tr>
					<td class="table_td_center" colspan="2">{!!Form::submit('Register')!!}
					<a href="{!!URL::to('login')!!}">{!!Form::button('Cancel')!!}</a></td>
			</tr>

	{!!Form::close()!!}
	</tbody>
	</table>
@stop