<?php
session_start();
include_once('conexao/conexao.php');

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$img = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_NUMBER_INT);
$criado_por = $_SESSION['usuarioNome'];
$created = date('Y-m-d H:i');
$modified = '';


/**
echo 'Nome arquivo:' .$img.'<br>';
$url ='/bibliotecas/img/';
copy('$url','$img');
echo 'Caminho: '.$caminho_img.'<br>';
echo 'Criado em:' .$created.'<br>';
echo 'Criado por:' .$criado_por.'<br>';
 **/

//$modified = date('Y-m-d H:i');

if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO dn_usuarios (nome, email,caminho_img, senha,niveis_acesso_id, created,modified)
VALUES ('$nome','$email','$caminho_img','$senha','$nivel','$created','$modified')";

if (mysqli_query($conn, $sql)) {

	echo '<script class="panel-success">alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; usuarios.php");
    exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>




