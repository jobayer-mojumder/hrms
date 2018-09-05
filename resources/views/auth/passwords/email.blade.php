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
            <h2 class="text-center" style="background:#FBFBFB; color:#005BAA; padding-top:0px; margin-top:0px;"> HRMS</h2>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

            <p class="login-box-msg">Enter your Account Email address</p>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-3 control-label">E-Mail</label>

                    <div class="col-md-9">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="text text-right" >
                        <p><a href="{{ route('admin') }}">Go to Home Page<hr></a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.login-box-body -->
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
