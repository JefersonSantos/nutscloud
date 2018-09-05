<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NUTSCLOUD - Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="componentes/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="componentes/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="componentes/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bibliotecas/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="text-center" background="bibliotecas/img/fundo5.jpg">

<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <h2 class="text-bold" style="color: #0000cc"><img src="bibliotecas/img/nutscloud.PNG" width="290" height="150"></h2><hr>

    <form action="pages/valida.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="txt_usuario" class="form-control" placeholder="E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="txt_senha" class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12" align="center">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Acessar</button>
        </div>
      </div>
    </form>

    <div class="social-auth-links text-center">
      <!--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Acessar com Google</a>-->
    </div>
    <!-- /.social-auth-links -->

    <a href="#" type="button" data-toggle="modal" data-target="#modal_recupera_senha">Esqueceu a senha?</a><br>
    <a href="pages/cadastre_se.php" class="text-center">Cadastre-se</a>

      <!--INICIO Janela Modal Esqueci a Senha-->
      <div class="modal fade" id="modal_recupera_senha">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                      <h3 align="center"><i class="fa fa-key"></i> Recuperar Senha</h3>
                  </div>
                  <div class="modal-body">
                      <form class="form-horizontal" action="processa_novasenha.php" method="POST">
                          <div>
                              <input class="form-control" name="email_recuperacao" placeholder="Insira seu E-mail">
                          </div><hr>
                          <div class="form actions">
                              <button type="submit" class="btn btn-danger" >Enviar</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <!--FIM Janela Modal para Esqueci a Senha-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="componentes/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="componentes/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function (){
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
