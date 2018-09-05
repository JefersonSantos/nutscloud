<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cadastre-se</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../componentes/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../componentes/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../componentes/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../bibliotecas/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="text-center">
<div class="register-box">
  <div class="register-box-body">
    <h2 class="text-bold"><i class="fa fa-user-circle"></i> Cadastre-se</h2><hr>
    <form action="processa_visitante.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nome_usuario" class="form-control" placeholder="Nome Completo">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="number" class="form-control" nome="cpf" placeholder="CPF">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="E-mail">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" id="senhaname" name="senha" class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" id="repitasenha" class="form-control" placeholder="Confirme a senha">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="termos"> Eu concordo com os <a href="#" type="btn" data-toggle="modal" data-target="#modal_termos">termos</a>
            </label>
          </div>
        </div>
          <!--INICIO Janela Modal Esqueci a Senha-->
          <div class="modal fade" id="modal_termos">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                          <h3 align="center"><i class="glyphicon glyphicon-list-alt"></i> Termos de Uso</h3>
                      </div>
                      <div class="modal-body">
                          <form class="form-horizontal" action="recupera_senha.php" method="POST">
                              <p>
                                  1. Aceite dos termos

                                  Ao criar sua conta de usuário para acesso ao NUTSCLOUD, você concorda com este acordo, o que significa que passará
                                  aceitar os nossos termos vigentes e as demais atualizações de políticas de nosso sistema.
                                  Caso não concorde com Todos os termos, não use o serviço.
                                  Por favor, revise todos os Termos com cuidado antes de utilizar nossos serviços.
                                  Ao utilizar nossos serviços, você concorda em seguir todos os termos e afirma que tem mais de 16 anos.

                                  2. A Modificação dos termos

                                  Os proprietários e/ou mantenedores do serviço reservam o direito de modificar este termo de uso e qualquer política que
                                  afete ou pertença ao NUTSCLOUD a qualquer tempo e independentemente de prévio aviso aos usuários.
                                  O uso continuado do serviço após a mudança no Termo de uso será considerado como uma aceitação do contrato.
                                  Se você não concordar ou não estiver satisfeito com as mudanças no Termo de uso, você deverá cancelar sua conta.
                                  Dessa forma, o usuário concorda que periodicamente deve checar as eventuais modificações do Termo de Uso,
                                  disponibilizado na página web, e, ler as eventuais mensagens que o NUTSCLOUD lhe mandar em relação ao Termo de Uso.

                                  3. A política de uso
                                  Não utilize indevidamente os nossos serviços, de modo que é apenas permitido ao usuário do serviço valer-se do que lhe é
                                  disponibilizado e dentro das condutas que não são vedadas pela Lei brasileira. Haverá a possibilidade de suspensão ou cancelamento
                                  da prestação do serviço ao usuário que descumprir nossos termos ou políticas ou se estivermos investigando casos de suspeita de má
                                  conduta. Nesses casos, todas as condições adicionais do serviço, tal como a entrega dos prêmios oferecidos ficará prejudicada.
                                  A comercialização do serviço caberá apenas ao seu desenvolvedor ou distribuidor autorizado. Ao concordar com o presente Termo de
                                  Uso, o usuário receberá uma licença do proprietário para uso não comercial do serviço, o que em nenhuma hipótese o tornará proprietário
                                  do mesmo. Não há limitação de acesso. Nossos serviços exibem alguns conteúdos que não são do Leitura de Bolso. Esses conteúdos são de
                                  exclusiva responsabilidade da entidade que os disponibiliza. Podemos revisar qualquer conteúdo para determinar se é ilegal ou se infringe
                                  nossas políticas, e podemos remover ou nos recusar a exibir conteúdos que razoavelmente acreditamos violar nossas políticas ou a Lei. Mas
                                  isso não significa, necessariamente, que revisaremos conteúdos de terceiros. A concordância às condições deste termo de uso autoriza o Leitura
                                  de Bolso a proceder com o envio de mensagens publicitárias ou administrativas aos usuários, cabendo-lhes desativar o envio dessas notificações,
                                  quando de seu interesse.Você é responsável por qualquer atividade que ocorra em sua conta e você concorda que você não vai alienar, transferir,
                                  licenciar ou ceder a sua conta, nome e dados de usuário, ou quaisquer direitos a outrem, com a exceção de pessoas ou empresas que estão expressamente
                                  autorizadas a criar contas em nome de seus empregadores ou clientes. Você também declara que todas as informações que fornecer ao Leitura de Bolso serão
                                  verdadeiras, exatas, atuais e completas, sendo obrigação do usuário as atualizar para manter a veracidade e exatidão das informações.

                              </p>
                              <div class="form actions">
                                  <a type="btn" class="btn btn-success" href="cadastre-se.php">Aceitar</a>
                                  <a type="btn" class="btn btn-danger" href="../index.php">Rejeitar</a>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!--FIM Janela Modal para Esqueci a Senha-->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <hr>
    <div class="social-auth-links text-center">
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Cadastrar com
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Cadastrar com
        Google+</a>
    </div>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../componentes/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../componentes/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
