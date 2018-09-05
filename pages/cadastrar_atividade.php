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
    <title>NUTSCLOUD - Cadastrar Atividade</title>
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
            <h4 class="container-fluid" style="color: ghostwhite">Dicas de Digitação</h4><br>
            <ul class="container-fluid" style="color: ghostwhite">
                <li class="container-fluid" style="color: ghostwhite"></li>
            </ul><br>

        </section>
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

        <div class="col-md-10">
            <div class="panel panel-success" align="center">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74"><i class="fa fa-edit"></i> Cadastrar Atividade</h3>
                </div>
                <div class="panel-body">
                    <form class="panel-body" method="POST" action="processa_atividade.php">

                        <div class="form-row">
                            <!--INICIO INDENTIFICAÇÃO ATIVIDADE-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-education"></i> IDENTIFICAÇÃO DA ATIVIDADE</h4><hr>
                            </div>

                            <div class="col-xs-3">
                                <label>Data:</label><input type="date" data-format="dd/mm/yyyy" name="data_ativ" placeholder="ddmmaaa" class="form-control" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Hora Inicio:</label><input type="time" data-format="hh:mm"  name="hora_inicio" class="form-control" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Hora Fim:</label><input type="time" data-format="hh:mm" name="hora_fim" class="form-control" required><br>
                            </div>

                            <div class="col-xs-5">
                                <label>Título da Atividade:</label><input type="text" size="90" name="titulo" class="form-control" required><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Categoria da Atividade:</label> <a href="#" type="btn" data-toggle="modal"  title="Incluir Categoria" data-target="#modal_cate"><i class="fa fa-plus-square-o"></i></a>
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
                                <label>Subcategoria:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir Subcategoria" data-target="#modal_subcate"><i class="fa fa-plus-square-o"></i></a>
                                <select id="subcategoria_cb" name="subcategoria" class="form-control">
                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Especialidade:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir Especialidade" data-target="#modal_espe"><i class="fa fa-plus-square-o"></i></a>
                                <select id="especialidade_cb" name="especialidade" class="form-control">
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_especialidade ORDER BY nome_espe";
			                        $resultado = mysqli_query($conn,$result);
			                        while ($row_especialidade = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_especialidade['id_especialidade']; ?>"><?php echo $row_especialidade['nome_espe'];?></option><?php
			                        }
			                        ?>
                                </select><br>
                            </div>

                            <div class="col-xs-2">
                                <label>País 01:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir País" data-target="#modal_pais"><i class="fa fa-plus-square-o"></i></a>
                                <select id="pais_cb" name="pais1" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_paises ORDER BY nome_pais";
			                        $resultado = mysqli_query($conn,$result);

			                        while ($row_pais = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_pais['id_pais']; ?>"><?php echo $row_pais['nome_pais'];?></option><?php
			                        }
			                        ?>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estado 01:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir Estado" data-target="#modal_estado"><i class="fa fa-plus-square-o"></i></a>
                                <select id="estado_cb" name="estado1" class="form-control" required>

                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Cidade 01:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir Cidade" data-target="#modal_cidade"><i class="fa fa-plus-square-o"></i></a>
                                <select id="cidade_cb" name="cidade1" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                </select><br><br>
                            </div>
                            <div class="col-xs-2">
                                <label>Pais 02:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir País" data-target="#modal_pais"><i class="fa fa-plus-square-o"></i></a>
                                <select id="pais_cb2" name="pais2" class="form-control" required>
                                    <option value=" ">Selecione</option>
			                        <?php
			                        $result ="SELECT *FROM dn_paises ORDER BY nome_pais";
			                        $resultado = mysqli_query($conn,$result);

			                        while ($row_pais2 = mysqli_fetch_assoc($resultado)){?>
                                        <option value="<?php echo $row_pais2['id_pais']; ?>"><?php echo $row_pais2['nome_pais'];?></option><?php
			                        }
			                        ?>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Estado 02:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir Estado" data-target="#modal_estado"><i class="fa fa-plus-square-o"></i></a>
                                <select id="estado_cb2" name="estado2" class="form-control" required>
                                    <option value=" ">Selecione</option>

                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Cidade 02:</label> <a href="#" type="btn" data-toggle="modal" title="Incluir Cidade" data-target="#modal_cidade"><i class="fa fa-plus-square-o"></i></a>
                                <select id="cidade_cb2" name="cidade2" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                </select><br><br>
                            </div><hr>

                            <div class="col-xs-3">
                                <label>Área do Conhecimento: </label>
                                <select id="area_con" name="area_con" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Educação em Saúde">Educação em Saúde</option>
                                    <option value="Gestão">Gestão</option>
                                    <option value="Outra">Outra</option>
                                </select>
                            </div>

                            <div class="col-xs-3">
                                <label>Cobertura: </label>
                                <select id="cobertura_ativ" name="cobertura_ativ" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Nacional">Nacional</option>
                                    <option value="Internacional">Internacional</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Localização: </label>
                                <select id="localizacao_ativ" name="localizacao_ativ" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Interna NUTS">Interna NUTS</option>
                                    <option value="Interna HUPES">Interna HUPES</option>
                                    <option value="Externa Unidade UFBA">Externa Unidade UFBA</option>
                                </select>
                            </div>

                            <div class="col-xs-3">
                                <label>Tipo de Atividade: </label>
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
                                <label>Local Origem Transmissão:</label>
                                <select id="especialidade_cb" name="origem_cirurgia" class="form-control">
                                    <option value="não procede ">Não procede</option>
                                    <option value="C-HUPES">C-HUPES</option>
                                    <option value="Outra Instituição">Outra Instituição</option>
                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Local Origem Transmissão:</label>
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
                                <label>Teste de Conexão: </label>
                                <select id="teste_conexao" name="teste" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <label>Quantidade testes: </label>
                                <input type="number" min="0" max="10" class="form-control" name="qtd_testes" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Tipo de Conexão: </label>
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
                                <label>Recurso Utilizado:</label>
                                <select id="rec_util" name="recurso" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Equipamento dedicado(Codec)">Equipamento dedicado(Codec)</option>
                                    <option value="Software">Software</option>
                                    <option value="Plataforma Webconferencia">Plataforma Webconferencia</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Modalidade:</label>
                                <select id="modalidade" name="modalidade" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Multiponto">Multiponto</option>
                                    <option value="Ponto a Ponto">Ponto a Ponto</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>MCU:</label>
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
                                <label>Qualidade Audio:</label>
                                <select id="quali_audio" name="quali_audio" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Intermediária">Intermediária</option>
                                    <option value="Baixa">Baixa</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Qualidade Imagem:</label>
                                <select id="quali_imagem" name="quali_imagem" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Intermediária">Intermediária</option>
                                    <option value="Baixa">Baixa</option>
                                </select><br><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Velocidade de Conexão:</label>
                                <select id="velocidade" name="velocidade" value="0" class="form-control" required>
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
                                <input type="number" name="n_pontosvc" value="0" class="form-control" min="0" max="100" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Pontos WEB: </label>
                                <input type="number" name="n_pontosweb" min="0" max="100" value="0" class="form-control" required><br>
                            </div><br>
                            <!--FIM DADOS DE CONEXÃO-->

                            <!--DADOS PARTICIPANTES-->
                            <div class="col-md-12">
                                <h4 class="text-primary"><i class="glyphicon glyphicon-user"></i> DADOS PARTICIPANTES</h4><hr>
                            </div>
                            <div class="col-xs-3">
                                <label>Total Participantes:</label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_part" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Total Masculino: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_sexm" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Total Feminino: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_sexf" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Total Idade 0 - 20: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_0_20" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Total Idade 21 - 30: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_21_30" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Total Idade 31 - 40: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_31_40" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Total Acima de 40: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_acima40" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Docentes Área/Saúde:</label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_docentes" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Preceptores Área/Saúde</label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_precept" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Estudantes Area/Saúde: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_estudantes" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Residentes Medicina: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_residmult" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Residentes Multi: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_residmed" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Médicos: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_med" required><br>
                            </div>

                            <div class="col-xs-3">
                                <label>Enfermeiros: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_enf" required><br>
                            </div>

                            <div class="col-xs-2">
                                <label>Outros Profiss: </label>
                                <input type="number" class="form-control" min="0" max="100" value="0" name="tot_outros" required><br>
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

                        <!--script select automático de subcategoria com base na categoria-->
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

                        <!--script select automático de estados com base no país-->
                        <script type="text/javascript">
                            $(function(){
                                $('#pais_cb').change(function(){
                                    if( $(this).val()){
                                        $('#estados_cb').hide();
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
                        </script>

                        <!--script select automático de cidades com base no estados-->
                        <script type="text/javascript">
                            $(function(){
                                $('#estado_cb').change(function(){
                                    if( $(this).val()){
                                        $('#cidade_cb').hide();
                                        $.getJSON('cidades.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
                                            var options = '<option value=""><p class="text-danger" ">Escolha Cidade<p></option>';
                                            for (var i = 0; i < j.length; i++) {
                                                options += '<option value=" '+j[i].id_cidade +' ">' + j[i].nome_cidade + '</option>';
                                            }
                                            $('#cidade_cb').html(options).show();
                                            $('.carregando').hide();
                                        });
                                    } else{
                                        $('#estado_cb').html('<option value="0">Sem cidades</option>');
                                    }
                                });
                            });
                        </script>

                        <!--script select automático de estados com base no país-->
                        <script type="text/javascript">
                            $(function(){
                                $('#pais_cb2').change(function(){
                                    if( $(this).val()){
                                        $('#estado_cb2').hide();
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
                                        $('#estado_cb2').html('<option value="0">Sem estados</option>');
                                    }
                                });
                            });
                        </script>

                        <!--script select automático de cidades com base no estados-->
                        <script type="text/javascript">
                            $(function(){
                                $('#estado_cb2').change(function(){
                                    if( $(this).val()){
                                        $('#cidade_cb2').hide();
                                        $.getJSON('cidades.php?search=',{id_estado: $(this).val(), ajax: 'true'}, function(j){
                                            var options = '<option value=""><p class="text-danger" ">Escolha Cidade<p></option>';
                                            for (var i = 0; i < j.length; i++) {
                                                options += '<option value=" '+j[i].id_cidade +' ">' + j[i].nome_cidade + '</option>';
                                            }
                                            $('#cidade_cb2').html(options).show();
                                            $('.carregando').hide();
                                        });
                                    } else{
                                        $('#estado_cb').html('<option value="0">Sem cidades</option>');
                                    }
                                });
                            });
                        </script>

                    </div>

                <!--INICIO MODAL ADICIONAR ESPECIALIDADE -->
                <div class="modal fade" id="modal_espe" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                <h3 align="center">Adicionar Especialidade</h3>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="processa_especialidade.php">
                                    <div class="form-signin" align="center">
                                        <input type="text" name="add_especialidade" placeholder="Insira nome da especialidade" class="form-control"><br>
                                        <input type="submit" value="Salvar" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--FIM MODAL ADICIONAR ESPECIALIDADE -->

                <!--INICIO MODAL ADICIONAR SUBCATEGORIA -->
                <div class="modal fade" id="modal_subcate" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                <h3 align="center">Adicionar Subcategoria</h3>
                            </div>

                            <div class="modal-body container-fluid">
                                <form method="POST" action="processa_subcategoria.php">
                                    <div class="panel-body">
                                        <label>Nome da subcategoria:</label>
                                        <div class="form-signin" align="center">
                                            <input type="text" name="nome_subcategoria" placeholder="inserir..." class="form-control"><br>
                                        </div>

                                        <div class="col-xs-6 row">
                                            <label>Categoria da Atividade:</label><br>
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
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" value="Salvar" class="btn btn-success">
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!--FIM MODAL ADICIONAR SUBCATEGORIA -->

                <!--INICIO MODAL ADICIONAR CATEGORIA -->
                <div class="modal fade" id="modal_cate" >
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                <h3 align="center">Adicionar Categoria</h3>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="processa_categoria.php">
                                    <div class="form-signin" align="center">
                                        <input type="text" name="add_categoria" placeholder="Insira nome da categoria" class="form-control"><br>
                                        <input type="submit" value="Salvar" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--FIM MODAL ADICIONAR CATEGORIA -->

            <!--INICIO MODAL ADICIONAR PAÍS -->
            <div class="modal fade" id="modal_pais" >
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <h3 align="center">Adicionar País</h3>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="processa_pais.php">
                                <div class="form-signin" align="center">
                                    <input type="text" name="nome_pais" placeholder="Insira nome o pais" class="form-control"><br>
                                    <input type="submit" value="Salvar" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--FIM MODAL ADICIONAR PAÍS -->

            <!--INICIO MODAL ADICIONAR ESTADO -->
            <div class="modal fade" id="modal_estado" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <h3 align="center">Adicionar Estado</h3>
                        </div>

                        <div class="modal-body container-fluid">
                            <form id="modal_estado" action=""method="POST" >
                                <div class="panel-body">
                                    <label>Nome Estado:</label>
                                    <div class="form-signin" align="center">
                                        <input type="text" name="nome_estado" placeholder="inserir..." class="form-control"><br>
                                    </div>

                                    <div class="col-xs-6 row">
                                        <label>Nome País:</label><br>
                                        <select id="categoria_cb" name="pais_id" class="form-control" required>
                                            <option value=" ">Selecione</option>
									        <?php
									        $result ="SELECT *FROM dn_paises ORDER BY nome_pais";
									        $resultado = mysqli_query($conn,$result);
									        while ($row_categoria = mysqli_fetch_assoc($resultado)){?>
                                                <option value="<?php echo $row_categoria['id_pais']; ?>"><?php echo $row_categoria['nome_pais'];?></option><?php
									        }
									        ?>
                                        </select><br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Salvar" class="btn btn-success">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--FIM MODAL ADICIONAR ESTADO -->

            <!--INICIO MODAL ADICIONAR CIDADE -->
            <div class="modal fade" id="modal_cidade" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                            <h3 align="center">Adicionar Cidade</h3>
                        </div>

                        <div class="modal-body container-fluid">
                            <form method="POST" action="processa_cidade.php">
                                <div class="panel-body">
                                    <label>Nome Cidade:</label>
                                    <div class="form-signin" align="center">
                                        <input type="text" name="nome_cidade" placeholder="inserir..." class="form-control"><br>
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <label>Nome Estado:</label><br>
                                    <select  name="estado_id" id="estado_id" class="form-control" required>
                                        <option value=" ">Selecione</option>
	                                    <?php
	                                    $result ="SELECT *FROM dn_estados ORDER BY nome_estado";
	                                    $resultado = mysqli_query($conn,$result);
	                                    while ($row_estado = mysqli_fetch_assoc($resultado)){?>
                                            <option value="<?php echo $row_estado['id_estado']; ?>"><?php echo $row_estado['nome_estado'];?></option><?php
	                                    }
	                                    ?>
                                    </select><br>
                                </div>

                                <div class="col-md-12">
                                    <input type="submit" value="Salvar" class="btn btn-success">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--FIM MODAL ADICIONAR CIDADE-->
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