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
    <title>NUTSCLOUD - Relatorio de Atividade</title>
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

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview">
                    <a href="#"><i class="fa fa-plus-square-o"></i>
                        <span>Cadastro</span>
                    </a>
                    <ul class="treeview-menu"><br>
                        <li><a href="cadastrar_atividade.php" class="fa fa-check"> Nova Atividade</a></li><br>
                        <li><a href="cadastrar_cancelamento.php" class="fa fa-remove"> Cancelamento</a></li><br>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-arrow-down"></i>
                        <span>Baixar Dados</span>
                    </a>
                    <ul class="treeview-menu"><br>
                        <li><a href="planilha_atividades.php" class="fa fa-file-excel-o" > Planilha</a></li><br>
                        <!--<li><a href="atividade_cancelada.php" class="fa fa-file-pdf-o"> PDF</a></li><hr>-->
                    </ul>
                </li>
                <li class="treeview">

                    <a href="#"><i class="fa fa-pie-chart"></i>
                        <span>Relatórios</span>
                    </a>
                    <ul class="treeview-menu"><br>
                        <li><a href="atividade_cancelada.php" class="fa fa-file-excel-o"> Atividades Canceladas</a></li><br>
                    </ul>
                </li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="col-md-12">
                <div class="col-md-6 row">
                    <a class="btn btn-default" href="painel_inicial.php"> Voltar</a>
                </div><br><br><br><br>

                <!--INICIO Filtro Dados-->
                <div class="col-md-12 row">
                    <form class="form-group-sm" method="post" action="atividade.php">
                        <div class="col-md-2 row">
                            <input type="date"  name="data_inicio" class="form-control">
                        </div>

                        <div class="col-md-2">
                            <input type="date"  name="data_fim" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="submit" value="Filtrar Período" class="btn btn-sm btn-primary">
                        </div>

                    </form><br><br>
                </div>
                <!--FIM Filtro Dados-->
            </div><br><br>

            <div class="col-md-12" align="center">
               <div class="panel panel-success">
                    <div class="panel-heading">
                         <h3 align="center" style="color: #204d74">Registro de Atividades</h3>
                    </div>
            <div class="panel-body">

                <div class="col-md-12 table table-responsive">
                     <table class="col-md-12 table table-bordered">
                        <thead>
                            <tr class="bg-blue-gradient">
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Hora Inicio</th>
                                <th class="text-center">Hora Fim</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Subcategoria</th>
                                <th class="text-center">Tipo Conexão</th>
                                <th class="text-center">Modalidade</th>
                                <th class="text-center">Pais</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Cidade</th>
                                <th class="text-center">Pais2</th>
                                <th class="text-center">Estado2</th>
                                <th class="text-center">Cidade2</th>
                                <th class="text-center">Total Participantes</th>
                                <th class="text-center">Opções</th>
                            </tr>
                        </thead>

                        <tbody align="center">
                        <?php include_once('conexao/conexao.php');

                        $data_inicio = filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_STRING);
                        $data_fim = filter_input(INPUT_POST, 'data_fim', FILTER_SANITIZE_STRING);
                        $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
                        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                        //Setar a quantidade de itens por pagina
                        $qnt_result_pg = 5;

                        //calcular o inicio visualização
                        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                        if($data_inicio == '' and $data_fim == '') {

	                        $result = "SELECT ra.*,                                                        
											  ca.nome_cate nome_categoria,
                                              su.nome_subcategoria nome_subcate,
                                              es.nome_espe nome_especialidade,
                                              p1.nome_pais pais1,
                                              e1.nome_estado estado1,                                               
                                              c1.nome_cidade cidade1,                        
                                              p2.nome_pais pais2,
                                              e2.nome_estado estado2,                                               
                                              c2.nome_cidade cidade2  
                                                                                           
                                       FROM dn_relatorio_atividade ra
                                                                              
                                       INNER JOIN dn_categoria ca     ON ra.categoria_id     = ca.id_categoria 
                                       INNER JOIN dn_sub_categoria su ON ra.subcategoria_id  = su.id_subcategoria 
                                       INNER JOIN dn_especialidade es ON ra.especialidade_id = es.id_especialidade 
                                       INNER JOIN dn_paises p1        ON ra.pais1_id = p1.id_pais 
                                       INNER JOIN dn_estados e1       ON ra.estado1_id = e1.id_estado
                                       INNER JOIN dn_cidades c1       ON ra.cidade1_id = c1.id_cidade
                                       INNER JOIN dn_paises p2        ON ra.pais2_id = p2.id_pais                                         
                                       INNER JOIN dn_estados e2       ON ra.estado2_id = e2.id_estado                                        
                                       INNER JOIN dn_cidades c2       ON ra.cidade2_id = c2.id_cidade                                  
                                LIMIT $inicio,$qnt_result_pg";
                        }
                        else{
                                $result = "SELECT ra.*,                                                        
											  ca.nome_cate nome_categoria,
                                              su.nome_subcategoria nome_subcate,
                                              es.nome_espe nome_especialidade,
                                              p1.nome_pais pais1,
                                              e1.nome_estado estado1,                                               
                                              c1.nome_cidade cidade1,                        
                                              p2.nome_pais pais2,
                                              e2.nome_estado estado2,                                               
                                              c2.nome_cidade cidade2  
                                                                                           
                                       FROM dn_relatorio_atividade ra
                                                                              
                                       INNER JOIN dn_categoria ca     ON ra.categoria_id     = ca.id_categoria 
                                       INNER JOIN dn_sub_categoria su ON ra.subcategoria_id  = su.id_subcategoria 
                                       INNER JOIN dn_especialidade es ON ra.especialidade_id = es.id_especialidade 
                                       INNER JOIN dn_paises p1        ON ra.pais1_id = p1.id_pais 
                                       INNER JOIN dn_estados e1       ON ra.estado1_id = e1.id_estado
                                       INNER JOIN dn_cidades c1       ON ra.cidade1_id = c1.id_cidade
                                       INNER JOIN dn_paises p2        ON ra.pais2_id = p2.id_pais                                         
                                       INNER JOIN dn_estados e2       ON ra.estado2_id = e2.id_estado                                        
                                       INNER JOIN dn_cidades c2       ON ra.cidade2_id = c2.id_cidade                                 
                                WHERE data_ativ BETWEEN '$data_inicio' AND '$data_fim' LIMIT $inicio, $qnt_result_pg";
                        }

                            $result = $conn->query($result);
                            if ($result->num_rows > 0) {

                                // coloca dados em cada linha
                                while($row = $result->fetch_array()){
                                    echo '<tr>';
                                    echo '<td>'. $row['id_atividade'] . '</td>';
                                    echo '<td>'. $row['data_ativ'] . '</td>';
                                    echo '<td>'. $row['hora_inicio'] . '</td>';
                                    echo '<td>'. $row['hora_fim'] . '</td>';
                                    echo '<td>'. $row['titulo'] . '</td>';
                                    echo '<td>'. $row['nome_categoria'] . '</td>';
                                    echo '<td>'. $row['nome_subcate'] . '</td>';
                                    echo '<td>'. $row['tipo_conexao'] . '</td>';
                                    echo '<td>'. $row['modalidade'] . '</td>';
	                                echo '<td>'. $row['pais1'] . '</td>';
	                                echo '<td>'. $row['estado1'] . '</td>';
	                                echo '<td>'. $row['cidade1'] . '</td>';
	                                echo '<td>'. $row['pais2'] . '</td>';
	                                echo '<td>'. $row['estado2'] . '</td>';
	                                echo '<td>'. $row['cidade2'] . '</td>';
	                                echo '<td>'. $row['tot_part'] . '</td>';
                                    echo '<td width=125>';
                                    echo ' ';
                                    echo '<a class="btn" href="abrir_atividade.php?id_atividade='.$row['id_atividade'].'" title="Ver"><i class="glyphicon glyphicon-folder-open"></i></a>';
                                    echo '';
                                    echo '<a class="btn" href="editar_atividade.php?id_atividade='.$row['id_atividade'].'" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>';
                                    echo ' ';
                                    echo ' ';
                                    echo '</td>';

                                    echo '<tr>';
                                }
                            } else {
                                echo "0 results";
                            }

                                    echo '</tbody>';

                                    //Paginção - Somar a quantidade de usuários
                                    $result_pg = "SELECT COUNT(id_atividade) AS num_result FROM dn_relatorio_atividade";
                                    $resultado_pg = mysqli_query($conn, $result_pg);
                                    $row_pg = mysqli_fetch_assoc($resultado_pg);
                                    //echo $row_pg['num_result'];
                                    //Quantidade de pagina
                                    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                                    //Limitar os link antes depois
                                    $max_links = 5;

                                    echo"<a type='btn' class='btn btn-default' title='primeira' href='atividade.php?pagina=1'> Anterior</a>";

                                    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
	                                    if($pag_ant >= 1){
		                                    echo "<a href='atividade.php?pagina=$pag_ant'> $pag_ant</a> ";
	                                    }
                                    }

                                    echo $pagina;

                                    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
	                                    if($pag_dep <= $quantidade_pg){
		                                    echo "<a href='atividade.php?pagina=$pag_dep '> $pag_dep</a>";
	                                    }
                                    }

                                    echo"<a type='btn' class='btn btn-default text-center' href='atividade.php?pagina=$quantidade_pg'>Próxima</i></a><br><br>";

                        ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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