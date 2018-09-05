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
    <title>NUTSCLOUD - Usuarios</title>
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
                <li class="treeview">
                    <a href="#"><i class="fa fa-plus-square-o"></i>
                        <span>Cadastro</span>
                    </a>
                    <ul class="treeview-menu"><hr>
                        <li><a href="cadastrar_usuario.php" class="fa fa-check"> Novo Usuario</a></li><hr>
                    </ul>
                </li>
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
                    <h3 align="center" style="color: #204d74">Usuários do Sistema</h3>
                </div>
            <div class="panel-body">

            <div class="col-sm-12 row">

                <div class="row">
                    <div class="col-md-12 table-responsive" align="center">
                        <table class="table table-responsive table-bordered">
                            <thead>
                            <tr class="bg-blue-gradient">
                                <th class="text-center">Código</th>
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                                <!--<th class="text-center">Imagem</th>-->
                                <th class="text-center">Perfil</th>
                                <!--<th class="text-center">Senha</th>-->
                                <th class="text-center">Opções</th>
                            </tr>
                            </thead>
                            <tbody class="table table-responsive table-bordered">
					        <?php include_once( 'conexao/conexao.php' );

					        //Receber o número da página
					        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
					        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

					        //Setar a quantidade de itens por pagina
					        $qnt_result_pg = 2;

					        //calcular o inicio visualização
					        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

					        $result = "SELECT * FROM dn_usuarios INNER JOIN dn_niveis_acesso WHERE 
                                    niveis_acesso_id = id_nivel";

					        $resultado = mysqli_query($conn, $result);

					        while($row = mysqli_fetch_assoc($resultado)){
						        echo '<tr>';
						        echo '<td align="center">'.  $row['id_usuario'] . '</td>';
						        echo '<td align="center">'.  $row['nome']  . '</td>';
						        echo '<td align="center">'.  $row['email']  . '</td>';
						        //echo '<td align="center">'.  $row['imagem']  . '</td>';
						        echo '<td align="center">'.  $row['nome_nivel']  . '</td>';
						        //echo '<td align="center">'.  $row['senha']  . '</td>';
						        echo '<td width=125 align="center">';

						        echo '<a class="btn btn-default" title="Editar" href="editar_usuarios.php?id='.$row['id_usuario'].'"><i class="glyphicon glyphicon-edit"></i></a>';
						        echo ' ';
						        //echo '<a class="btn btn-default" title="Apagar" href="del_usuario.php?id='.$row['id_usuario'].'"><i class="glyphicon glyphicon-remove"></i></a>';

						        echo '</td>';
						        echo '<tr>';
					        }

					        //Paginção - Somar a quantidade de usuários
					        $result_pg = "SELECT COUNT(id_usuario) AS num_result FROM dn_usuarios";
					        $resultado_pg = mysqli_query($conn, $result_pg);
					        $row_pg = mysqli_fetch_assoc($resultado_pg);
					        //echo $row_pg['num_result'];
					        //Quantidade de pagina
					        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

					        //Limitar os link antes depois
					        $max_links = 5;

					        echo '<a type="btn" class="btn btn-default bg-info" title="primeira" href="usuarios.php?pagina=1">Anterior </a> ';

					        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
						        if($pag_ant >= 1){
							        echo "<a href='usuarios.php?pagina=$pag_ant'>$pag_ant </a> ";
						        }
					        }
					        echo "$pagina ";

					        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
						        if($pag_dep <= $quantidade_pg){
							        echo "<a href='usuarios.php?pagina=$pag_dep '>$pag_dep  </a> ";
						        }
					        }
					        echo "<a type='btn' class='btn btn-default bg-info' href='usuarios.php?pagina=$quantidade_pg'>
                                  Próxima</i></a>";

					        $conn->close();

					        ?>
                            </tbody><br>
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