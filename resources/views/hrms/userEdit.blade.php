
@extends('layouts.master')

@section('content')
<div class="table-responsive">
	<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 ALIGN=right class="table table-striped">
		<tr>
			<td>
				<span style="font-size:18px; font-family:trebuchet MS, Tahoma,Arial; color:#525fb8; font-weight:bold">Edit USER</span>
			</td>
		</tr>
		<tr><td height=10></td></tr>

		@if ($errors->any())
		<tr>
			<td>
				@foreach ($errors->all() as $error)
				<div style="color: red;">{{ $error }}</div>
				@endforeach
			</td>
		</tr>
		<tr><td height=10></td></tr>
		@endif
		
		<tr>
			<td valign=top>

				@foreach ($user as $user_data)
				<form method=post action="{{ url('user_edit/'.$user_data->id) }}" enctype="multipart/form-data" name="myform" id="myform">
					{{ csrf_field() }}
					<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 style="border-collapse: collapse" bordercolor="#e4e4e4" bgcolor=f2f2f2 align=left width="80%">
						<tr><td>
							<TABLE CELLSPACING=0 CELLPADDING=0 BORDER=0 ALIGN=center class="table table-striped" width="100%">

								<tr>
									<td class=bodytext>Name</td>
									<td>
										<input type=text name="name" required value="{{ $user_data->name
										}}" maxlength="50" size=50 class="form-control">
									</td>
								</tr>

								<tr>
									<td class=bodytext>Email</td>
									<td>
										<input type=text name="email"  required value="{{ $user_data->email
										}}" maxlength="250" size=86 class="form-control">
									</td>
								</tr>

								<tr>
									<td class=bodytext valign=top>Image</td>
									<td class=bodytext valign=top>
										<input  type="file"  size=50 class="form-control" name="image" required>
									</td>
								</tr>

								<tr>
									<td class=bodytext valign=top>Group</td>
									<td class=bodytext valign=top>
										<select name="group" required>
											<option value="" >Select</option>
											<option value="admin" @if($user_data->group=='admin'): {{ 'selected' }} @endif>Admin</option>
										</select>
									</td>
								</tr>

								<tr>
									<td class=bodytext valign=top>Published</td>
									<td class=bodytext valign=top>
										<select name=status>
											<option value=1 @if($user_data->status==1): {{ 'selected' }} @endif >Yes</option>
											<option value=0 @if($user_data->status==0): {{ 'selected' }} @endif>No</option>
										</select>
									</td>
								</tr>

								<tr>
									<td class=bodytext></td>													
									<td>
										<button class="btn btn-success" type="submit" name="submit">Save</button>
									</td>
								</tr>
								<tr><td height=20></td></tr>
							</TABLE>
						</td></tr>																								
					</TABLE>
				</form>
				@endforeach
			</td>
		</tr>
		<tr><td height=10></td></tr>
	</TABLE>
</div>

@endsection