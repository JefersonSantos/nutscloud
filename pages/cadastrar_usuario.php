<?php
session_start();
include_once("seguranca.php");
include_once( "conexao/conexao.php" );
seguranca_adm();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NUTSCLOUD - Cadastrar Usuario</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../componentes/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../componentes/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../componentes/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../bibliotecas/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../bibliotecas/css/skins/skin-blue.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Barra lateral, título, collapse.-->
        <a href="painel_inicial.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">NC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">NUTSCLOUD</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <div class="main-sidebar">
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper container-fluid">
            <br>
            <section class="content-header">
                <div class="col-md-12">
                    <a class="btn btn-default row" href="usuarios.php"> Voltar</a><br><br>
                </div>
            </section>

        <div class="col-md-8" align="left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74"><i class="fa fa-user-circle"></i> Cadastro de Usuários</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="processa_usuario.php">
                        <div class="row" align="center">
                            <div class="col-xs-2">
                                <label>Nome:</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="text" name="nome" class="form-control"><br>
                            </div>

                            <div class="col-xs-2">
                                <label>E-mail:</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="text" name="email" class="form-control"><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Imagem:</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="file" name="imagem" class="form-control"><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Senha:</label>
                            </div>
                            <div class="col-xs-10">
                                <input type="password" name="senha" placeholder="Insira a senha" class="form-control"><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Perfil:</label>
                            </div>
                            <div class="col-xs-10">
                                <select name="nivel" class="form-control">
                                    <option value=" ">Selecione</option>
					                <?php
					                $result_niveis_acessos ="SELECT * FROM dn_niveis_acesso";

					                $resultado_niveis_acesso = mysqli_query($conn,$result_niveis_acessos);

					                while ($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){?>
                                        <option value="<?php echo $row_niveis_acessos['id_nivel']; ?>"><?php echo $row_niveis_acessos['nome_nivel'];?>
                                        </option> <?php
					                }
					                ?>
                                </select><br><br>
                            </div><br><br>

                            <div class="col-sm-12">
                                <input type="submit" value="Salvar" class="btn btn-success">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="js/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/docs.min.js"></script>
            </div>
        </div>
    </div>
</section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<script src="../componentes/jquery/dist/jquery.min.js"></script>
<script src="../componentes/bootstrap/dist/js/bootstrap.min.js"></script><!-- AdminLTE App -->
<script src="../bibliotecas/js/adminlte.min.js"></script>

</body>

</html>