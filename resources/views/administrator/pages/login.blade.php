<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('/')}}" >

    <title>Airi Admin Login</title>

    <!-- Bootstrap -->
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{route('admin.login')}}" method="POST">
              @csrf
              <h1>Login</h1>
                @if (session('alert'))
                  <h5 class="text-danger">{{session('alert')}}</h5>
                @endif
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                @if ($errors->first('email'))
                  <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                @if ($errors->first('password'))
                  <p class="text-danger">{{$errors->first('password')}}</p>
                @endif
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
                  <h1><i class="fa fa-paw"></i> A i r i</h1>
                  <p>©2016 All Rights Reserved . Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
