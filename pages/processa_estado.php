<?php
session_start();
include_once('conexao/conexao.php');

$estado = filter_input(INPUT_POST, 'nome_estado', FILTER_SANITIZE_STRING);
$pais_id = filter_input(INPUT_POST, 'pais_id', FILTER_SANITIZE_NUMBER_INT);


if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO dn_estados(nome_estado,pais_id)VALUES ('$estado','$pais_id')";

if (mysqli_query($conn, $sql)) {
	echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; cadastrar_atividade.php");

  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>