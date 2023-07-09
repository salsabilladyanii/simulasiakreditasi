<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page" style="align-items: normal;">
        <div class="row">
            <div class="col-sm-12" style="margin-top:-100px;">
                <img src="{{ asset('assets/images/logo.png') }}" style="height: 150px;">
            </div>
            <div class="col-sm-8" style="align-self: center;">
                <div>
                    <h1>
                        <center>
                            Sistem Simulasi Akreditasi <br> INSTITUT TEKNOLOGI SUMATERA
                        </center>
                    </h1>
                </div>
               
            </div>
            <div class="col-sm-4">
                <div class="login-box">
                    
                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body" style="background: #c0a143;">
                            <div class="login-logo">
                                <h4 class="login-box-msg">SIAKRED LOGIN</h4>
                            </div>
                            @include('layouts.partials.notification')
                            <hr>
                            <form method="POST" action="{{ URL::to('login/dologin') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                    <div class="input-group-append">
                                        
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <div class="input-group-append">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-default btn-block" style="color:#c0a143;">Login</button> <br>
                                    </div>
                                    <!-- /.col --> 
                                    {{-- <div class="col-12" style="text-align: -webkit-center;">
                                        <a href="{{ URL::to('register') }}" class="btn btn-default btn-block text-center" style="color:#c0a143;width: max-content;">Buat Akun Baru</a>
                                    </div> --}}
                                    <!-- /.col -->
                                </div>
                            </form>

                            
                            <p class="mb-0">
                                
                            </p>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
                <!-- /.login-box -->
            </div>
        </div>
       
        

        <!-- jQuery -->
        <script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminlte') }}/dist/js/adminlte.min.js"></script>

    </body>
</html>
