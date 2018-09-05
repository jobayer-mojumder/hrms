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

    
    <script type="text/javascript">
       function validateForm(){

        if(document.register.username.value=="")
        {
            alert("Please username can not be blank");
            document.register.username.focus();
            return false;
        }
        if(document.register.password.value=="")
        {
            alert("Please password can not be blank");
            document.register.password.focus();
            return false;
        }
    }


</script>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <br />
        <div class="login-logo" style="background:#FFFFFF ">
            <h2 class="text-center" style="background:#FBFBFB; color:#005BAA; padding-top:0px; margin-top:0px;"> HRMS
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

            <p class="login-box-msg">Sign in to start your session</p>
             @if ($errors->has('email'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('email') }}<br></strong>
                    </span>
                @endif
            @if ($errors->has('password'))
                    <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            <form action="{{ route('login') }}" method="post" id="register" name="register" onSubmit="return validateForm();">
                {{ csrf_field() }}
              <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="text" class="form-control"  placeholder="username"  name="email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
              </div>
          </div>
          <div class="col-xs-4">
              <button type="submit" name="login"  class="btn btn-success btn-block btn-flat">Sign In</button>
          </div>
      </div>
      
      
  </form>
  <div class="row">
    <div class="col-xs-12">
        <div class="text text-right" >

            <a href="{{ route('password.request') }}"><p><font color="red">Forget Your Password ?</font></p></a>
            <p><a href="">Go to Home Page</a></p>
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
      increaseArea: '20%' 
  });
});
</script>
</body>
</html>
