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
    <title>Cadastrar Cancelamento</title>
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
                    <a class="btn btn-default row" href="atividade.php"> Voltar</a><br><br>
                </div>
            </section>

        <div class="col-md-10" align="left">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 align="center" style="color: #204d74"><i class="glyphicon glyphicon-remove"></i> CANCELAMENTO DE ATIVIDADE</h3>
                </div>
                <div class="panel-body">

                    <form class="panel-body" method="POST" action="processa_cancelamento.php">

                        <div class="form-row">
                            <!--INICIO INDENTIFICAÇÃO ATIVIDADE-->

                            <div class="col-xs-12">
                                <label>Motivo:</label>
                                <select id="motivo" name="motivo" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Ausência do Solicitante e Equipe">Ausência do Solicitante e Equipe</option>
                                    <option value="Palestrante Não Compareceu">Palestrante Não Compareceu</option>
                                    <option value="Problema de Rede Local NUTS/HUPES/UFBA">Problema de Rede Local NUTS/HUPES/UFBA</option>
                                    <option value="Problema de Rede Geral Bahia/RNP/Brasil">Problema de Rede Geral Bahia/RNP/Brasil</option>
                                    <option value="Mal Funcionamento de Equipamento Local">Mal Funcionamento de Equipamento Local</option>
                                    <option value="Mal Funcionamento de Equipamento Externo">Mal Funcionamento de Equipamento Externo</option>
                                    <option value="Problema Com Pessoal da Área Técnica Local">Problema Com Pessoal da Área Técnica Local</option>
                                    <option value="Problema Com Pessoal da Área Técnica Externo">Problema Com Pessoal da Área Técnica Externo</option>
                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Data:</label><input type="date" data-format="dd/mm/yyyy" name="data_ativ" placeholder="ddmmaaa" class="form-control" required><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Hora Inicio:</label><input type="time" data-format="hh:mm"  name="hora_inicio" class="form-control" required><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Hora Fim:</label><input type="time" data-format="hh:mm" name="hora_fim" class="form-control" required><br>
                            </div>

                            <div class="col-xs-12">
                                <label>Título da Atividade:</label><input type="text" size="90" name="titulo" class="form-control" required><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Categoria da Atividade:</label>
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
                                <label>Subcategoria:</label>
                                <select id="subcategoria_cb" name="subcategoria" class="form-control">

                                </select><br>
                            </div>

                            <div class="col-xs-4">
                                <label>Especialidade:</label>
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

                            <div class="col-xs-4">
                                <label>Tipo de Atividade: </label>
                                <select id="tipo_ativ" name="tipo_ativ" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Com Participante Remoto">Com Participante Remoto</option>
                                    <option value="Sem Participante Remoto">Sem Participante Remoto</option>
                                </select><br><br>
                            </div><hr>
                            <!--FIM INDENTIFICAÇÃO ATIVIDADE-->

                            <div class="col-xs-4">
                                <label>Teste de Conexão: </label>
                                <select id="teste_conexao" name="teste" class="form-control" required>
                                    <option value=" ">Selecione</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Não">Não</option>
                                </select>
                            </div>

                            <div class="col-xs-4">
                                <label>Quantidade testes: </label>
                                <input type="number" min="0" max="10" class="form-control" name="qtd_testes" required><br>
                            </div>

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