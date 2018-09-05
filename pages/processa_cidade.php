<?php
session_start();
include_once('conexao/conexao.php');

$nome_cidade = filter_input(INPUT_POST, 'nome_cidade', FILTER_SANITIZE_STRING);
$estado_id = filter_input(INPUT_POST, 'estado_id', FILTER_SANITIZE_NUMBER_INT);


if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO dn_cidades(nome_cidade,estado_id)VALUES ('$nome_cidade','$estado_id')";

if (mysqli_query($conn, $sql)) {
	echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; cadastrar_atividade.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>