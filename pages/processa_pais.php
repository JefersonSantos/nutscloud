<?php
session_start();
include_once('conexao/conexao.php');

$pais = filter_input(INPUT_POST, 'nome_pais', FILTER_SANITIZE_STRING);


if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO dn_paises(nome_pais)VALUES ('$pais')";

if (mysqli_query($conn, $sql)) {
	echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; cadastrar_atividade.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>