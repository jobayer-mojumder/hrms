<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>HRMS</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="{{ url('/') }}/images/nbl-fi-small.png" type="image/x-icon" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <meta property="og:type" content="website">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('public/admin_css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_css/plugins/iCheck/square/blue.css') }}">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <br />
        <div class="login-logo" style="background:#FFFFFF ">
            <a href=""><img  src="{{ url('/') }}/public/admin_images/np-logo-xs.png"></a>
            <h2 class="text-center" style="background:#FBFBFB; color:#005BAA; padding-top:0px; margin-top:0px;"> HRMS</h2>
        </div>
        <div class="panel panel-default">
           <p class="login-box-msg">Reset your Account Password</p>
           <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-xs-12">
                    <div class="text text-right" >
                        <p><a href="{{ route('admin') }}">Go to Home Page</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('public/admin_css/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('public/admin_css/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('public/admin_css/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
  });
});
</script>
</body>
</html>
