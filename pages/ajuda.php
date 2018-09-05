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
    <title>NUTSCLOUD - Agenda</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../componentes/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../componentes/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../componentes/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../bibliotecas/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
		  page. However, you can choose any other skin. Make sure you
		  apply the skin class to the body tag so the changes take effect. -->
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
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="col-md-12">
                <a class="btn btn-default row" href="painel_inicial.php"> Voltar</a><br><br>
            </div><br>
        </section>

        <!-- Main content -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74">Central de Ajuda</h3>
                </div>
            <div class="panel-body">
                <div class="col-sm-12 row">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <a href="#" data-toggle="collapse" data-target="#demo"><h4>1. Como cadastrar novo usuário?</h4></a>
                        <div id="#p1" data-toggle="collapse">
                            <ul>
                                <li>Para cadastrar um novo usuário na tela inicial clique na opção "Usuários".</li><br>
                                <li>após isso no painel lateral identifique a opção <i class="fa fa-plus-square"></i> Cadastro e clique nela.</li><br>
                                <li>Clique na opção <i class="fa fa-check"></i> Novo Usuário e preencha as informações.</li><hr>
                            </ul>

                        </div>

                        <a href="#" data-toggle="collapse" data-target="#demo"><h4>2. Como editar usuario cadastrado?</h4></a>
                        <div id="#p1" data-toggle="collapse">
                            <ul>
                                <li>Para editar um usuário cadastrado, vá na tabela de usuarios cadastrados e clique na opção <i class="fa fa-edit"></i></li><br>
                                <li>Após isso no painel lateral identifique a opção <i class="fa fa-plus-square"></i> Cadastro e clique nela.<li><br>
                                <li>Clique na opção <i class="fa fa-check"></i>Novo Usuário e preencha as informações.</li>
                            </ul>
                        </div>
                    </div><br>
                </div>
            </div>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../componentes/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../componentes/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../bibliotecas/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>