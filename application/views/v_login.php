<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CodeChamp</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/css.css">

</head>

<!-- <body style="background-image:url(image/123.jpg); background-size:cover; background-attachment: fixed;"> -->

<body>
    <div class="login-box">
        <div class="login-box-body">

            <div class="login-logo">
                <img src="<?= base_url('assets/') ?>dist/img/codechamplogo.png" alt="" width="35%"><br>
                <a href="#">CodeChamp</a>
            </div><!-- /.login-logo -->



            <div class="text-center">
                <h1 class="">Masuk</h1>
                <p style="margin-bottom: 50px;">Silahkan masukkan username dan password anda</p>
            </div>
            <form action="<?php echo base_url('auth') ?>" method="post">
                <div class="form-group has-feedback">
                    <center><input type="text" class="form-control input-login" style="border-radius: 10px;" placeholder="Username" name="username">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?></center>

                </div>
                <div class="form-group has-feedback">
                    <center><input type="password" class="form-control input-login" style="border-radius: 10px;" placeholder="Password" name="password">
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?></center>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <center><button type="submit" class="btn btn-success btn-login">Masuk</button></center>
                    </div><!-- /.col -->
                </div>
            </form>
            <br><br>

            <?= $this->session->flashdata('message'); ?>

            <div align="center">

                    <!-- Baru di CodeChamp ? -->
                    <!-- <a href="<?= base_url('register'); ?>">Buat akun disini.</a> -->
                    <button class="btn btn-primary" type="submit" disabled>Register Menyusul</button></br>
                </div>
                <div align="center" style="margin-top: 5px;">
                    <a href="<?= base_url('beranda'); ?>">
                        <button class="btn btn-primary" type="submit">Kembali ke Halaman Beranda</button></br>
                    </a>
                </div>
            </div>
        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 3 -->
    <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>

    <script type="text/javascript">
        $('.alert-message').alert().delay(3000).slideUp('slow');
    </script>
</body>

</html>