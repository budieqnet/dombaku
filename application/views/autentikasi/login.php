<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | DombaKu</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?=base_url('back_assets/')?>plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?=base_url('back_assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url('back_assets/')?>css/adminlte.min.css">
        <script src="<?=base_url('back_assets/')?>plugins/jquery/jquery.min.js"></script>
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-success">
                <div class="card-header text-center">
                    <a href="<?=base_url()?>" class="h1">DombaKu</a> 
                </div>
                <div class="card-body">
                    <!-- <p class="login-box-msg">USER</p> -->
                    <?= $this->session->flashdata('pesan') ?>
                    <form action="<?=base_url()?>index.php/autentikasi/proses_login" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="user" id="user" placeholder="User">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mt-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    
        <!-- Bootstrap 4 -->
        <script src="<?=base_url('back_assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url('back_assets/')?>js/adminlte.min.js"></script>
        <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
        </script>
    </body>
</html>
