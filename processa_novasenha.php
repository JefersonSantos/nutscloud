<?php
include_once( 'pages/conexao/conexao.php' );

$recupera_email = filter_input(INPUT_POST, 'email_recuperacao', FILTER_SANITIZE_STRING);

echo $recupera_email;

$result = "SELECT *FROM dn_usuarios WHERE email = $recupera_email";
$resultado = mysqli_query($conn, $result);

$row = mysqli_fetch_row($resultado);

echo $row[2].'<h5>Teste</h5>';
/**
 *

while($row = mysqli_fetch_assoc($resultado)){
if ($row['email'] == $recupera_email){
echo '<script>alert("Instruções de Recuperação enviadas para o email informado.")</script>;';
header( "Refresh: 0; ../index.php" );
}else{
echo '<script>alert("E-mail não encontrado, tente novamente!")</script>;';
header( "Refresh: 0; ../index.php" );


$mail = new PHPMailer(); // instancia a classe PHPMailer

$mail->IsSMTP();

//configuração do gmail
$mail->Port = '465'; //porta usada pelo gmail.
$mail->Host = 'smtp.gmail.com';
$mail->IsHTML(true);
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'ssl';

//configuração do usuário do gmail
$mail->SMTPAuth = true;
$mail->Username = 'jefnetba@gmail.com'; // usuario gmail.
$mail->Password = '304786je'; // senha do email.

$mail->SingleTo = true;

// configuração do email a ver enviado.
$mail->From = "Mensagem de email, pode vim por uma variavel.";
$mail->FromName = "Nome do remetente.";

$mail->addAddress("$recupera_email"); // email do destinatario.

$mail->Subject = "Recuperação de senha da conta ".$recupera_email;
$mail->Body = "Solicitação de Recuperação de Senha do usuário";

if(!$mail->Send())
	echo "Erro ao enviar Email:" . $mail->ErrorInfo;

 **/
?>





