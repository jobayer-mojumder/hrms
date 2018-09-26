@extends('layouts.master')

@section('content')
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h4 class="box-title">Password Change</h4>
				</div>
				
				@if(Session::has('msg'))
				<div class="col-sm-10 col-sm-offset-3">
					<br>
					<p style="color: blue">{!! session('msg') !!}</p>
					<br>
				</div>			
				@endif

				@if ($errors->any())
				<div class="col-sm-10 col-sm-offset-3">
					<br>
					@foreach ($errors->all() as $error)
					<div style="color: red;">{{ $error }}</div>
					@endforeach
					<br>
				</div>			
				@endif

				<form class="form-horizontal" method="post" action="{{ route('adminPassword') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="box-body">

						<div class="form-group">
							<label for="title" class="col-sm-3 control-label">New Password</label>
							<div class="col-sm-4">
								<input id="password" type="password" name="password" value="" maxlength="250" size=50 class="form-control" required="required">
							</div>
						</div>

						<div class="form-group" id="confirm">
							<label for="title" class="col-sm-3 control-label">Confirm New Password</label>
							<div class="col-sm-4">
								<input id="password-confirm" type="password" maxlength="250" size=50 class="form-control" name="password_confirmation" required="required">
							</div>
						</div>
					</div>

					<div class="box-footer">
						<div class="col-sm-12"> 
							<div class="col-sm-4 col-md-offset-3">
								<button id="update" type="submit" class="btn btn-info"> Update </button>
							</div>
						</div>
					</div>
					<br>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		$('#password-confirm').keyup(function(){
			var value1 = $('#password').val();
			var value2 = $('#password-confirm').val();
			if(!value2 || value1 != value2){
				console.log('danger');
				$('#confirm').addClass('has-error');
				$('#confirm').removeClass('has-success');
				$('#update').attr('disabled','disabled');
			}else{
				console.log('success');
				$('#confirm').addClass('has-success');
				$('#confirm').removeClass('has-error');
				$('#update').removeAttr('disabled');
			}
		});
	});

</script>
@endsection