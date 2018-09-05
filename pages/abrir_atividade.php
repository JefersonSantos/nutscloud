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
    <title>NUTSCLOUD - Abrir Atividade</title>
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

        <!-- /.sidebar -->
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper container-fluid">
            <br>
            <section class="content-header">
                <div class="col-md-12">
                    <a class="btn btn-default row" href="atividade.php"> Voltar</a><br><br>
                </div>
            </section>

        <div class="col-md-10" align="left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74"><i class="glyphicon glyphicon-eye-open"> </i> ABRIR ATIVIDADE</h3>
                </div>
                <div class="panel-body">
                    <form class="panel-body" method="POST" action="atualiza_atividade.php">
	                    <?php
	                    include_once('conexao/conexao.php');
	                    $id = filter_input(INPUT_GET, 'id_atividade', FILTER_SANITIZE_NUMBER_INT);

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
                                       WHERE id_atividade='$id'";


	                    $resposta = mysqli_query($conn, $result);
	                    $row = mysqli_fetch_assoc($resposta);
	                    ?>

                        <div class="form-row">
                            <!--INICIO INDENTIFICAÇÃO ATIVIDADE-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-education"></i> IDENTIFICAÇÃO DA ATIVIDADE</h4><hr>
                            </div>

                            <div class="col-xs-3">
                                <label>Data:</label><input type="date" data-format="dd/mm/yyyy" value="<?php echo $row['data_ativ'];?>" name="data_ativ" placeholder="ddmmaaa" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Hora Inicio:</label><input type="time" data-format="hh:mm"  value="<?php echo $row['hora_inicio'];?>"  name="hora_inicio" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Hora Fim:</label><input type="time" data-format="hh:mm" value="<?php echo $row['hora_fim'];?>" name="hora_fim" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-5">
                                <label>Título da Atividade:</label><input type="text" size="90" value="<?php echo $row['titulo'];?>" name="titulo" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Categoria da Atividade: </label><input type="text" value="<?php echo $row['nome_categoria'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Subcategoria:</label> <input type="text" value="<?php echo $row['nome_subcate'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Especialidade:</label> <input type="text" value="<?php echo $row['nome_especialidade'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>País 01:</label><input type="text" value="<?php echo $row['pais1'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estado 01:</label> <input type="text" value="<?php echo $row['estado1'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Cidade 01:</label> <input type="text" value="<?php echo $row['cidade1'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Pais 02:</label> <input type="text" value="<?php echo $row['pais2'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estado 02:</label> <input type="text" value="<?php echo $row['estado2'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Cidade 02:</label> <input type="text" value="<?php echo $row['cidade2'];?>" class="form-control" disabled><br>
                            </div><hr>

                            <div class="col-xs-3">
                                <label>Área do Conhecimento: </label><input type="text" value="<?php echo $row['area_con'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Cobertura: </label> </label> <input type="text" value="<?php echo $row['cobertura_ativ'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Localização: </label> </label> <input type="text" value="<?php echo $row['localizacao_ativ'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Tipo de Atividade: </label> <input type="text" value="<?php echo $row['tipo_ativ'];?>" class="form-control" disabled><br>
                            </div><hr>
                            <!--FIM INDENTIFICAÇÃO ATIVIDADE-->

                            <!--INICIO SE CIRURGIA-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="fa fa-heartbeat"></i> MODIFICAR SE FOR CIRURGIA</h4><hr>
                            </div>
                            <div class="col-xs-4">
                                <label>Local Origem Transmissão:</label> <input type="text" value="<?php echo $row['origem_cirurgia'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Local Origem Transmissão:</label> <input type="text" value="<?php echo $row['destino_cirurgia'];?>" class="form-control" disabled><br>
                            </div>
                            <!--FIM SE CIRURGIA-->

                            <!--INICIO DADOS DE CONEXÃO-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-signal"></i> DADOS CONEXÃO</h4><hr>
                            </div>

                            <div class="col-xs-2">
                                <label>Teste de Conexão: </label><input type="text" value="<?php echo $row['teste'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Quantidade testes: </label><input type="text" value="<?php echo $row['qtd_testes'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Tipo de Conexão: </label> <input type="text" value="<?php echo $row['tipo_conexao'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Recurso Utilizado:</label> <input type="text" value="<?php echo $row['recurso'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Modalidade:</label> <input type="text" value="<?php echo $row['modalidade'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>MCU:</label> <input type="text" value="<?php echo $row['mcu'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Qualidade Audio:</label> <input type="text" value="<?php echo $row['quali_audio'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Qualidade Imagem:</label> <input type="text" value="<?php echo $row['quali_imagem'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Velocidade de Conexão:</label> <input type="text" value="<?php echo $row['velocidade'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Pontos VC: </label>
                                <input type="text" value="<?php echo $row['n_pontosvc'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Pontos WEB: </label>
                                <input type="text" value="<?php echo $row['n_pontosweb'];?>" class="form-control" disabled><br>
                            </div><br>
                            <!--FIM DADOS DE CONEXÃO-->

                            <!--DADOS PARTICIPANTES-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-user"></i> DADOS PARTICIPANTES</h4><hr>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Participantes:</label>
                                <input type="text" value="<?php echo $row['tot_part'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Masculino: </label>
                                <input type="text" value="<?php echo $row['tot_sexm'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Feminino: </label>
                                <input type="text" value="<?php echo $row['tot_sexf'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Idade 0 - 20: </label>
                                <input type="text" value="<?php echo $row['tot_0_20'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Idade 21 - 30: </label>
                                <input type="text" value="<?php echo $row['tot_21_30'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Idade 31 - 40: </label>
                                <input type="text" value="<?php echo $row['tot_31_40'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Acima de 40: </label>
                                <input type="text" value="<?php echo $row['tot_acima40'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Docentes Área/Saúde:</label>
                                <input type="text" value="<?php echo $row['tot_docentes'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Preceptores Área/Saúde</label>
                                <input type="text" value="<?php echo $row['tot_precept'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estudantes Area/Saúde: </label>
                                <input type="text" value="<?php echo $row['tot_estudantes'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Residentes Medicina: </label>
                                <input type="text" value="<?php echo $row['tot_residmed'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Residentes Multi: </label>
                                <input type="text" value="<?php echo $row['tot_residmult'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Médicos: </label>
                                <input type="text" value="<?php echo $row['tot_med'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Enfermeiros: </label>
                                <input type="text" value="<?php echo $row['tot_enf'];?>" class="form-control" disabled><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Outros Profiss: </label>
                                <input type="text" value="<?php echo $row['tot_outros'];?>" class="form-control" disabled><br>
                            </div><hr>

                            <div class="col-md-12" align="center">
                                <a href="#" type="btn" class="btn btn-sm-block btn-default"><i class="glyphicon glyphicon-print"> Imprimir</i></a>
                            </div>
                        </div>
                </div>
                </form>
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