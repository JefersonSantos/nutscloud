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
            <span class="logo-mini">DN</span>
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

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">



        </section>
        <!-- /.sidebar -->
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="col-md-12">
                <a class="btn btn-default" href="usuarios.php"> Voltar</a><br><br>
            </div><br>

            <div class="col-md-8" align="left">
                <div class="panel panel-default">
                    <div class="panel-heading panel-success " >
                        <h3 align="center" style="color: #204d74"><i class="fa fa-edit"></i> Editar Usuário</h3>
                    </div>

                    <div class="panel-body">

                        <form method="POST" action="atualiza_usuario.php">
					        <?php
					        include_once('conexao/conexao.php');

					        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

					        $result = "SELECT * FROM dn_usuarios INNER JOIN dn_niveis_acesso 
                                 ON niveis_acesso_id=id_nivel WHERE id_usuario = '$id'";
					        $resposta = mysqli_query($conn, $result);
					        $row = mysqli_fetch_assoc($resposta);
					        ?>
                            <div class="form-signin" align="left">

                                <div class="col-md-4">
                                    <label>Código: </label><input type="text" name="id_usuario" placeholder="Código" class="form-control" value="<?php echo $row['id_usuario'] ?>"><br>
                                </div><br><br>

                                <div class="col-md-10">
                                    <label>Nome: </label>  <input type="text" name="nome" placeholder="Altere o nome" class="form-control" value="<?php echo $row['nome'] ?>"><br>
                                </div><br><br>

                                <div class="col-md-10">
                                    <label>E-mail: </label><input type="text" name="email" placeholder="Altere seu e-mail" class="form-control" value="<?php echo $row['email'] ?>"><br>
                                </div><br><br>

                                <div class="col-md-6">
                                    <label>Senha:</label><input type="text" name="senha" placeholder="Altere a senha" class="form-control" value="<?php echo $row['senha'] ?>"><br>
                                </div><br><br>

                                <div class="col-md-6">
                                    <label>Perfil:</label> <?php echo $row['nome_nivel']?>
                                    <select name="nivel" class="form-control">
                                        <option value=" ">Alterar</option>
								        <?php
								        $result_niveis_acessos ="SELECT * FROM dn_niveis_acesso";

								        $resultado_niveis_acesso = mysqli_query($conn,$result_niveis_acessos);

								        while ($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){?>
                                            <option value="<?php echo $row_niveis_acessos['id_nivel']; ?>"><?php echo $row_niveis_acessos['nome_nivel'];?>
                                            </option> <?php
								        }
								        ?>
                                    </select>
                                </div><br><br>

                                <div class="col-md-12" align="center">
                                    <input type="submit" value="Atualizar" class="btn btn-success">
                                    <a href="usuarios.php" type="button" class="btn btn-danger">Cancelar</a>
                                    </di
                                </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <!--FIM Edita usuário-->

                            </tbody><br>
                    </div><br>
                </div>
            </div>
        </section>
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
