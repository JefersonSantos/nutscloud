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
    <title>NUTSCLOUD - Atividade Cancelada</title>
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
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#"><i class="fa fa-arrow-down"></i>
                        <span>Baixar Dados</span>
                    </a>
                    <ul class="treeview-menu"><br>
                        <li><a href="planilha_atividades.php" class="fa fa-file-excel-o"> Planilha</a></li><br>
                        <!--<li><a href="atividade_cancelada.php" class="fa fa-file-pdf-o"> PDF</a></li><hr>-->
                    </ul><br>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>

    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper container-fluid">
            <br>
        <section class="content-header">
            <div class="col-md-12">
                <a class="btn btn-default row" href="atividade.php"> Voltar</a><br><br>
            </div>
        </section>
        <div class="col-md-12" align="center">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74">Relatório de Atividades Canceladas</h3>
                </div>
                <div class="panel-body">

                    <div class="col-md-12 table table-responsive">
                        <table class="col-md-12 table table-bordered table-responsive">
                            <thead>
                            <tr class="bg-blue-gradient">
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Hora Inicio</th>
                                <th class="text-center">Hora Fim</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Subcategoria</th>
                                <th class="text-center">Especialidade</th>
                                <th class="text-center">Tipo Atividade</th>
                                <th class="text-center">Teste de Conexão</th>
                                <th class="text-center">N° de Testes</th>
                                <!--<th class="text-center">Opções</th>-->
                            </tr>
                            </thead>

                            <tbody align="center">
						    <?php include_once('conexao/conexao.php');

						    $result = "SELECT * FROM dn_relatorio_cancelamento INNER JOIN dn_categoria ON categoria_id = id_categoria
                            INNER JOIN dn_especialidade ON especialidade_id=id_especialidade INNER JOIN dn_sub_categoria ON subcategoria_id=id_subcategoria";

						    $result = $conn->query($result);
						    if ($result->num_rows > 0) {

							    // coloca dados em cada linha
							    while($row = $result->fetch_assoc()) {
								    echo '<tr>';
								    echo '<td>'. $row['id_cancel'] . '</td>';
								    echo '<td>'. $row['data_ativ'] . '</td>';
								    echo '<td>'. $row['hora_inicio'] . '</td>';
								    echo '<td>'. $row['hora_fim'] . '</td>';
								    echo '<td>'. $row['titulo'] . '</td>';
								    echo '<td>'. $row['nome_cate'] . '</td>';
								    echo '<td>'. $row['nome_subcategoria'] . '</td>';
								    echo '<td>'. $row['nome_espe'] . '</td>';
								    echo '<td>'. $row['tipo_ativ'] . '</td>';
								    echo '<td>'. $row['teste'] . '</td>';
								    echo '<td>'. $row['qtd_testes'] . '</td>';
								    //echo '<td width=125>';
								    echo ' ';

								    //echo '<a class="btn" href="abrir_atividade.php?id_atividade='.$row['id_cancel'].'" title="Ver"><i class="glyphicon glyphicon-folder-open"></i></a>';
								    echo '';
								    //echo '<a class="btn" href="editar_atividade.php?id_atividade='.$row['id_cancel'].'" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>';
								    echo ' ';
								    echo ' ';
								    //echo '</td>';

								    echo '<tr>';
							    }
						    } else {
							    echo "0 results";
						    }

						    echo '</tbody>';


						    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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