<?php
session_start();
include_once("conexao/conexao.php");

$id = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$nivel = mysqli_real_escape_string($conn, $_POST['nivel']);

$result_usuario = "UPDATE dn_usuarios SET nome='$nome', email='$email',senha='$senha',niveis_acesso_id='$nivel' WHERE id_usuario ='$id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	echo '<script class="panel-success">alert("Dados Atualizados!");</script>';
	header("Refresh: 0; usuarios.php");
}else{
	echo '<script>';
	echo 'alert("Dados Não foram atualizados");';
	echo '</script>';
	header("Refresh: 0; usuarios.php");
}


