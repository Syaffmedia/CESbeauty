<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fonts/font-awesome.min.css">
    <style type="text/css">
    body{
        background:url(gambar/back.jpg);
        background-size: 100%;
    }
        .login-card{
  height: 420px;
  width:300px;
  padding:30px 30px;
  background-color:#00000059;
  border-radius:2px;
  box-shadow:0px 2px 2px rgba(0, 0, 0, 0.3);
}

.login-card .profile-img-card{
  width:150px;
  height:150px;
  margin:0 auto 10px;
  display:block;
  border-radius:50%;
}

.login-card .form-signin input[type=email], .login-card .form-signin input[type=password], .login-card .form-signin input[type=text], .login-card .form-signin button{
  height:44px;
  font-size:16px;
  width:100%;
  display:block;
  margin-bottom:10px;
  z-index:1;
  position:relative;
  box-sizing:border-box;
}

.login-card label{
  color:#000000;
}

.login-card .form-signin .form-control:focus{
  border-color:rgb(104, 145, 162);
  outline:0;
  -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
  box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.login-card .btn.btn-signin{
  font-weight:700;
  height:36px;
  line-height:36px;
  font-size:14px;
  background:rgb(104, 145, 162);
  border-radius:3px;
  border:none;
  transition:all 0.218s;
  padding:0;
}

.login-card .btn.btn-signin:hover, .login-card .btn.btn-signin:active, .login-card .btn.btn-signin:focus{
  background:rgb(12, 97, 33);
}

    </style>
</head>

<body>
    <div class="login-card"><img src="gambar/avatar.png" class="profile-img-card">
        <form  action="logincheck.php" method="post" class="form-signin">
            <h2 class="text-center">login </h2>
            <input style="margin-bottom: 10px;" class="form-control" type="text-center" name="txtUser" placeholder="Username" autofocus="" id="Masukkan Username">
            <input class="form-control" type="password" name="txtPass" placeholder="Password" id="Masukkan Password">
            <div class="checkbox"></div>
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">login</button>
        </form>
    </div>
    <script src="css/jquery/jquery.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>