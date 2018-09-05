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
    <title>NUTSCLOUD - Editar Atividade</title>
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
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74"><i class="fa fa-edit"></i> EDITAR ATIVIDADE</h3>
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
                                       WHERE id_atividade = '$id'";

	                    $resposta = mysqli_query($conn, $result);
	                    $row = mysqli_fetch_assoc($resposta);
	                    ?>

                        <div class="form-row">
                            <!--INICIO INDENTIFICAÇÃO ATIVIDADE-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-education"></i> IDENTIFICAÇÃO DA ATIVIDADE</h4><hr>
                                <div class="col-md-2 row">
                                    <label>Código: </label><input type="text" name="id_atividade" placeholder="Código" class="form-control" value="<?php echo $row['id_atividade'] ?>"><br>
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <label>Data:</label><input type="date" data-format="dd/mm/yyyy" value="<?php echo $row['data_ativ'];?>" name="data_ativ" placeholder="ddmmaaa" class="form-control" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Hora Inicio:</label><input type="time" data-format="hh:mm"  value="<?php echo $row['hora_inicio'];?>"  name="hora_inicio" class="form-control" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Hora Fim:</label><input type="time" data-format="hh:mm" value="<?php echo $row['hora_fim'];?>" name="hora_fim" class="form-control" required><br>
                            </div>

                            <div class="col-xs-5">
                                <label>Título da Atividade:</label><input type="text" size="90" value="<?php echo $row['titulo'];?>" name="titulo" class="form-control" required><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Categoria da Atividade: </label> <?php echo $row['nome_categoria'];?>
                                <select id="categoria_cb" name="categoria" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_categoria ORDER BY nome_cate";
			                        $resultado = mysqli_query($conn,$result);
			                        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_categoria['id_categoria']; ?>"><?php echo $row_categoria['nome_cate'];?></option><?php
			                        }
			                        ?>
                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Subcategoria:</label> <?php echo $row['nome_subcate'];?>
                                <select id="subcategoria_cb" name="subcategoria" class="form-control">

                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Especialidade:</label> <?php echo $row['nome_especialidade'];?>
                                <select id="especialidade_cb" name="especialidade" class="form-control">
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_especialidade ORDER BY nome_espe";
			                        $resultado = mysqli_query($conn,$result);
			                        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_categoria['id_especialidade']; ?>"><?php echo $row_categoria['nome_espe'];?></option><?php
			                        }
			                        ?>
                                </select><br>
                            </div>

                            <div class="col-xs-2">
                                <label>País 01:</label> <?php echo $row['pais1'];?>
                                <select id="pais_cb" name="pais1" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_paises ORDER BY nome_pais";
			                        $resultado = mysqli_query($conn,$result);

			                        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_categoria['id_pais']; ?>"><?php echo $row_categoria['nome_pais'];?></option><?php
			                        }
			                        ?>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estado 01:</label> <?php echo $row['estado1'];?>
                                <select id="estado_cb" name="estado1" class="form-control" required>

                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Cidade 01:</label> <?php echo $row['cidade1'];?>
                                <select id="cidade_cb" name="cidade1" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT * FROM dn_cidades";
			                        $resultado = mysqli_query($conn,$result);
			                        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_categoria['id_cidade']; ?>"><?php echo $row_categoria['nome_cidade'];?>
                                        </option> <?php
			                        }
			                        ?>
                                </select><br><br>
                            </div>
                            <div class="col-xs-2">
                                <label>Pais 02:</label> <?php echo $row['pais2'];?>
                                <select id="pais_cb2" name="pais2" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_paises ORDER BY nome_pais";
			                        $resultado = mysqli_query($conn,$result);

			                        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_categoria['id_pais']; ?>"><?php echo $row_categoria['nome_pais'];?></option><?php
			                        }
			                        ?>
                                </select><br><br>
                            </div>
                            <div class="col-xs-2">
                                <label>Estado 02:</label> <?php echo $row['estado2'];?>
                                <select id="estado_cb2" name="estado2" class="form-control" required>
                                    <option value=" ">Selecione</option>

                                </select><br><br>
                            </div>
                            <div class="col-xs-2">
                                <label>Cidade 02:</label> <?php echo $row['cidade2'];?>
                                <select id="cidade_cb2" name="cidade2" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT * FROM dn_cidades";
			                        $resultado = mysqli_query($conn,$result);
			                        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_categoria['id_cidade']; ?>"><?php echo $row_categoria['nome_cidade'];?>
                                        </option> <?php
			                        }
			                        ?>
                                </select><br><br>
                            </div><hr>

                            <div class="col-xs-3">
                                <label>Área do Conhecimento: </label> </label> <?php echo $row['area_con'];?>
                                <select id="area_con" name="area_con" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Educação em Saúde">Educação em Saúde</option>
                                    <option value="Gestão">Gestão</option>
                                    <option value="Outra">Outra</option>
                                </select>
                            </div>

                            <div class="col-xs-3">
                                <label>Cobertura: </label> </label> <?php echo $row['cobertura_ativ'];?>
                                <select id="cobertura_ativ" name="cobertura_ativ" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="Internacional">Internacional</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Localização: </label> </label> <?php echo $row['localizacao_ativ'];?>
                                <select id="localizacao_ativ" name="localizacao_ativ" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Interna NUTS">Interna NUTS</option>
                                    <option value="Interna HUPES">Interna HUPES</option>
                                    <option value="Externa Unidade UFBA">Externa Unidade UFBA</option>
                                </select>
                            </div>

                            <div class="col-xs-3">
                                <label>Tipo de Atividade: </label> </label> <?php echo $row['tipo_ativ'];?>
                                <select id="tipo_ativ" name="tipo_ativ" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Com Participante Remoto">Com Participante Remoto</option>
                                    <option value="Sem Participante Remoto">Sem Participante Remoto</option>
                                </select><br><br>
                            </div><hr>
                            <!--FIM INDENTIFICAÇÃO ATIVIDADE-->

                            <!--INICIO SE CIRURGIA-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="fa fa-heartbeat"></i> MODIFICAR SE FOR CIRURGIA</h4><hr>
                            </div>
                            <div class="col-xs-4">
                                <label>Local Origem Transmissão:</label> <?php echo $row['origem_cirurgia'];?>
                                <select id="especialidade_cb" name="origem_cirurgia" class="form-control">
                                    <option value="não procede ">Não procede</option>
                                    <option value="C-HUPES">C-HUPES</option>
                                    <option value="Outra Instituição">Outra Instituição</option>
                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Local Origem Transmissão:</label> <?php echo $row['destino_cirurgia'];?>
                                <select id="especialidade_cb" name="destino_cirurgia" class="form-control">
                                    <option value="não procede ">Não procede</option>
                                    <option value="NUTS ou Salas do C-HUPES">NUTS ou Salas do C-HUPES</option>
                                    <option value="Outra Instituição">Outra Instituição</option>
                                </select><br>
                            </div>
                            <!--FIM SE CIRURGIA-->

                            <!--INICIO DADOS DE CONEXÃO-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-signal"></i> DADOS CONEXÃO</h4><hr>
                            </div>
                            <div class="col-xs-2">
                                <label>Teste de Conexão: </label> <?php echo $row['teste'];?>
                                <select id="teste_conexao" name="teste" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <label>Quantidade testes: </label>
                                <input type="number" min="0"  class="form-control" value="<?php echo $row['qtd_testes'];?>" name="qtd_testes" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Tipo de Con. : </label> <?php echo $row['tipo_conexao'];?>
                                <select id="tipo_con" name="tipo_con" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Videoconferência">Videoconferência(VC)</option>
                                    <option value="VC + WEB">VC + WEB</option>
                                    <option value="VC + Streaming">VC + Streaming</option>
                                    <option value="Webconferência">Webconferência(WEB)</option>
                                    <option value="Transmissão Streaming">Transmissão Streaming</option>
                                    <option value="Multipresença">Multipresença</option>
                                </select>
                            </div>

                            <div class="col-xs-4">
                                <label>Recurso Utilizado:</label> <?php echo $row['recurso'];?>
                                <select id="rec_util" name="recurso" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Equipamento dedicado(Codec)">Equipamento dedicado(Codec)</option>
                                    <option value="Software">Software</option>
                                    <option value="Plataforma Webconferencia">Plataforma Webconferencia</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Modalidade:</label> <?php echo $row['modalidade'];?>
                                <select id="modalidade" name="modalidade" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Multiponto">Multiponto</option>
                                    <option value="Ponto a Ponto">Ponto a Ponto</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>MCU:</label> <?php echo $row['mcu'];?>
                                <select id="mcu" name="mcu" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="RNP">RNP</option>
                                    <option value="EBSERH">EBSERH</option>
                                    <option value="NUTS">NUTS</option>
                                    <option value="HSL">HSL</option>
                                    <option value="MS">MS</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Qualidade Audio:</label> <?php echo $row['quali_audio'];?>
                                <select id="quali_audio" name="quali_audio" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Intermediária">Intermediária</option>
                                    <option value="Baixa">Baixa</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Qualidade Imagem:</label> <?php echo $row['quali_imagem'];?>
                                <select id="quali_imagem" name="quali_imagem" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Intermediária">Intermediária</option>
                                    <option value="Baixa">Baixa</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Velocidade de Conexão:</label> <?php echo $row['velocidade'];?>
                                <select id="velocidade" name="velocidade" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="512">512</option>
                                    <option value="768">768</option>
                                    <option value="1024">1024</option>
                                    <option value="1152">1152</option>
                                    <option value="2048">2048</option>
                                    <option value="4096">4096</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Pontos VC: </label>
                                <input type="number" name="n_pontosvc" class="form-control" min="0" max="100" value="<?php echo $row['n_pontosvc'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Pontos WEB: </label>
                                <input type="number" name="n_pontosweb" min="0" max="100" class="form-control" value="<?php echo $row['n_pontosweb'];?>" required><br>
                            </div><br>
                            <!--FIM DADOS DE CONEXÃO-->

                            <!--DADOS PARTICIPANTES-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-user"></i> DADOS PARTICIPANTES</h4><hr>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Participantes:</label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_part" value="<?php echo $row['tot_part'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Masculino: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_sexm" value="<?php echo $row['tot_sexm'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Feminino: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_sexf" value="<?php echo $row['tot_sexf'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Idade 0 - 20: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_0_20" value="<?php echo $row['tot_0_20'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Idade 21 - 30: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_21_30" value="<?php echo $row['tot_21_30'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Idade 31 - 40: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_31_40" value="<?php echo $row['tot_31_40'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Total Acima de 40: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_acima40" value="<?php echo $row['tot_acima40'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Docentes Área/Saúde:</label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_docentes" value="<?php echo $row['tot_docentes'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Preceptores Área/Saúde</label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_precept" value="<?php echo $row['tot_precept'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estudantes Area/Saúde: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_estudantes" value="<?php echo $row['tot_estudantes'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Residentes Medicina: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_residmult" value="<?php echo $row['tot_residmult'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Residentes Multi: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_residmed" value="<?php echo $row['tot_residmed'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Médicos: </label> <?php echo $row['tot_med'];?>
                                <input type="number" class="form-control" min="0" max="100" name="tot_med" value="<?php echo $row['tot_med'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Enfermeiros: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_enf" value="<?php echo $row['tot_enf'];?>" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Outros Profiss: </label>
                                <input type="number" class="form-control" min="0" max="100" name="tot_outros" value="<?php echo $row['tot_outros'];?>" required><br>
                            </div><hr>

                            <div class="col-md-12" align="center">
                                <input type="submit" value="Salvar" class="btn btn-success">
                                <a href="controle_frequencia.php" type="button" class="btn btn-danger">Fechar</a>
                            </div>
                        </div>
                </div>
                </form>

                            <script type="text/javascript" src="https://www.google.com/jsapi"></script>

                            <script type="text/javascript">
                                google.load("jquery", "1.4.2");
                            </script>

                            <script type="text/javascript">
                                $(function(){

                                    $('#categoria_cb').change(function(){
                                        if( $(this).val()== 1 || $(this).val()== 2 || $(this).val()== 4 || $(this).val()== 5 || $(this).val()== 6){
                                            $('#subcategoria_cb').hide();
                                            $('.carregando').show();
                                            $.getJSON('subcategorias.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
                                                var options = '<option value=""><p class="text-danger" ">Escolha Subcategoria<p></option>';
                                                for (var i = 0; i < j.length; i++) {
                                                    options += '<option value=" '+j[i].id_subcategoria +'">' + j[i].nome_subcategoria + '</option>';
                                                }
                                                $('#subcategoria_cb').html(options).show();
                                                $('.carregando').hide();
                                            });
                                        } else{
                                            $('#subcategoria_cb').html('<option value="0">Sem subcategoria</option>');
                                        }
                                    });
                                });
                            </script>

                            <script type="text/javascript">
                                $(function(){
                                    $('#pais_cb').change(function(){
                                        if( $(this).val()){
                                            $('#estados_cb').hide();
                                            $('.carregando').show();
                                            $.getJSON('estados.php?search=',{id_pais: $(this).val(), ajax: 'true'}, function(j){
                                                var options = '<option value=""><p class="text-danger" ">Escolha Estado<p></option>';
                                                for (var i = 0; i < j.length; i++) {
                                                    options += '<option value=" '+j[i].id_estado +'">' + j[i].nome_estado + '</option>';
                                                }
                                                $('#estado_cb').html(options).show();
                                                $('.carregando').hide();
                                            });
                                        } else{
                                            $('#estado_cb').html('<option value="0">Sem estados</option>');
                                        }
                                    });
                                });

                                $(function(){
                                    $('#estado_cb').change(function(){
                                        if( $(this).val()){
                                            $('#cidades_cb').hide();
                                            $('.carregando').show();
                                            $.getJSON('cidades.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
                                                var options = '<option value=""><p class="text-danger" ">Escolha Cidade<p></option>';
                                                for (var i = 0; i < j.length; i++) {
                                                    options += '<option value=" '+j[i].id_cidade +'">' + j[i].nome_cidade + '</option>';
                                                }
                                                $('#cidade_cb').html(options).show();
                                                $('.carregando').hide();
                                            });
                                        } else{
                                            $('#estado_cb').html('<option value="0">Sem cidades</option>');
                                        }
                                    });
                                });


                                $(function(){
                                    $('#pais_cb2').change(function(){
                                        if( $(this).val()){
                                            $('#estados_cb2').hide();
                                            $('.carregando').show();
                                            $.getJSON('estados.php?search=',{id_pais: $(this).val(), ajax: 'true'}, function(j){
                                                var options = '<option value=""><p class="text-danger" ">Escolha Estado<p></option>';
                                                for (var i = 0; i < j.length; i++) {
                                                    options += '<option value=" '+j[i].id_estado +'">' + j[i].nome_estado + '</option>';
                                                }
                                                $('#estado_cb2').html(options).show();
                                                $('.carregando').hide();
                                            });
                                        } else{
                                            $('#estado_cb').html('<option value="0">Sem estados</option>');
                                        }
                                    });
                                });

                                $(function(){
                                    $('#estado_cb2').change(function(){
                                        if( $(this).val()){
                                            $('#cidades_cb2').hide();
                                            $('.carregando').show();
                                            $.getJSON('cidades.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
                                                var options = '<option value=""><p class="text-danger" ">Escolha Cidade<p></option>';
                                                for (var i = 0; i < j.length; i++) {
                                                    options += '<option value=" '+j[i].id_cidade +'">' + j[i].nome_cidade + '</option>';
                                                }
                                                $('#cidade_cb2').html(options).show();
                                                $('.carregando').hide();
                                            });
                                        } else{
                                            $('#estado_cb2').html('<option value="0">Sem cidades</option>');
                                        }
                                    });
                                });

                            </script>

                    </div>

                <div class="modal fade" id="modal_esp" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                <h3 align="center">Adicionar Especialidade</h3>
                                <p style="color: black" align="center">Obs: primeira letra sempre maiúscula Ex:<b style="color: red">U</b>rologia <b style="color: red">A</b>dulto</p>

                            </div>
                            <div class="modal-body">
                                <form method="POST" action="process_esp.php">
                                    <div class="form-signin" align="center">
                                        <input type="text" name="especialidade" placeholder="Insira nome da especialidade" class="form-control"><br>
                                        <input type="submit" value="Salvar" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal_descr" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                <h3 align="center">Adicionar Descricão de Atividade</h3>
                                <p style="color: black" align="center">Obs: primeira letra sempre maiúscula Ex:<b style="color: red">S</b>ig <b style="color: red">C</b>ardiologia</p>

                            </div>
                            <div class="modal-body">
                                <form method="POST" action="process_desc_ativ.php">
                                    <div class="form-signin" align="center">
                                        <input type="text" name="nome_espe" placeholder="Insira nova descrição" class="form-control"><br>
                                        <input type="submit" value="Salvar" class="btn btn-success">
                                    </div>
                                </form>
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