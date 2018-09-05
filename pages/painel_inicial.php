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
  <title>NUTSCLOUD - Painel Inicial</title>
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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
  <script type="text/javascript" src="../bibliotecas/js/javascriptpersonalizado.js"></script>

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
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
	            <?php
	            require_once  "conexao/conexao.php";
	            $num = "SELECT COUNT(dn_usuarios.id_usuario) FROM dn_usuarios";
	            $resposta = mysqli_query($conn, $num);
	            $dados = mysqli_fetch_array($resposta);
	            ?>
              <span class="label label-success"><?php echo $dados[0];?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Status de Mensagens</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Título
                      </h4>
                      <!-- The message -->
                      <p>Conteúdo</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">Expandir</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-info"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->

      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['usuarioImg'];?>" class="img-circle" alt="User Image"><br>
        </div><br>
        <div class="pull-left info">
          <p><?php echo $_SESSION['usuarioNome'];?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-tasks"></i> <span>Lista de Tarefas</span></a></li>
        <li><a href="agenda.php"><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-users"></i> <span>Administração</span></a>
          <ul class="treeview-menu"><br>
            <li><a href="#" class="fa fa-file-text-o"> Documentos</a></li><br>
            <li><a href="graficos.php" class="fa fa-bar-chart"> Gráficos</a></li><br>
          </ul>
        </li>
        <li><a href="sair.php"><i class="fa fa-sign-out"></i> <span> Logout</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper panel-default container-fluid"><br>
    <!-- Content Header (Page header) -->
    <section class="panel-heading">
      <h1 class="text-primary" align="center">
        Painel de Controle
      </h1>
    </section>

    <!-- Main content -->
    <section class="panel content container-fluid">
      <div class="panel-body">
        <div class="container-fluid"><br>
          <div class="col-xs-2">
            <div class="thumbnail" style="border-radius: 20px" >
              <a href="atividade.php">
                <img src="../bibliotecas/img/dados.ico">
              </a>
              <h5 align="center" style="color: #0000cc">Atividades</h4>
            </div>
          </div>

          <div class="col-xs-2">
            <div class="thumbnail" style="border-radius: 20px">
              <a href="usuarios.php" class="btn-default bg-success">
                <img src="../bibliotecas/img/user.png">
              </a>
              <h5 align="center" style="color: #0000cc">Usuarios</h5>
            </div>
          </div>

          <div class="col-xs-2">
            <div class="thumbnail" style="border-radius: 20px">
              <a href="#">
                <img src="../bibliotecas/img/sig3.png">
              </a>
              <h5 align="center" style="color: #0000cc">Projetos</h4>
            </div>
          </div>

          <div class="col-xs-2">
            <div class="thumbnail" style="border-radius: 20px">
              <a href="#" type="button" data-toggle="modal"
                 data-target="#contato">
                <img src="../bibliotecas/img/contatos.png">
              </a>
              <h5 align="center" style="color: #0000cc">Contatos HUPES</h4>
            </div>


            <div class="modal fade" id="contato" tabindex="-1" role="table">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="table">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title">Lista de Contatos</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">

                      <div class="col-md-12 table-responsive">
                          <form action="#" method="POST" class="form-pesquisa">
                              <div class="input-group">
                                  <input type="text" name="pesquisa" id="pesquisa" class="form-control" placeholder="buscar contato...">
                                  <span class="input-group-btn">
                                  <button type="submit" name="search" id="search-btn" class="btn btn-flat active"><i class="fa fa-search"></i></button></span>
                              </div>
                          </form><br><br>
                          <table class="table table-responsive">
                              <thead class="table table-responsive">
                              <tr class="table table-responsive">
                                  <th class="text-center">Nome</th>
                                  <th class="text-center">Coordenação</th>
                                  <th class="text-center">Ramal</th>
                                  <th class="text-center">E-mail</th>
                                  <th class="text-center">Opções</th>
                              </tr>
                              </thead>
                              <tbody class="resultado">
                              </tbody>

                          </table>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-2">
            <div class="thumbnail" style="border-radius: 20px">
              <a href="#">
                <img src="../bibliotecas/img/config%20icone.png">
              </a>
              <h5 align="center" style="color: #0000cc">Ferramentas</h4>
            </div>
          </div>

          <div class="col-xs-2">
                <div class="thumbnail" style="border-radius: 20px">
                    <a href="ajuda.php">
                        <img src="../bibliotecas/img/help.png" height="128" width="128">
                    </a>
                    <h5 align="center" style="color: #0000cc">Ajuda</h4>
                </div>
            </div>
        </div><hr>

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">JEFNET| Informática em Saúde</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Log de Eventos</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <div class="menu-info">
	              <?php include_once( 'conexao/conexao.php' );
	              $sql ="SELECT * FROM dn_log_atividades ORDER BY ultima_edicao ASC";
	              $result = $conn->query($sql);
	              if ($result->num_rows > 0) {
		              while($row = $result->fetch_assoc()) {
			              echo '<label>Evento: </label> '.$row['id_log'].'<br>';
			              echo '<label>Usuario:</label> '.$row['log_usuario_id'].'<br>';
			              echo '<label>Data Criação:</label> '.$row['criacao'].'<br>';
			              echo '<label>Data Mod.:</label> '.$row['ultima_edicao'].'<hr>';
			              echo ' ';
		              }
	              } else {
		              echo "0 results";
	              }
	              $conn->close();
	              ?>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">

            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Opções</h3>
          <div class="form-group">

              <ul class="sidebar-menu" data-widget="tree">
                  <li class="treeview">
                      <a href="#"><i class="fa fa-plus-square-o"></i>
                          <span>Backup</span>
                      </a>
                      <ul class="treeview-menu"><hr>
                          <li><a href="cadastrar_atividade.php" class="fa fa-check"> Restaurar Atividade</a></li><hr>
                      </ul>
                  </li>
              </ul>

          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../componentes/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../componentes/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bibliotecas/js/adminlte.min.js"></script>
</body>
</html>