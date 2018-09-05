<?php
session_start();
include_once('conexao/conexao.php');

$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);


if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO dn_especialidade(nome_espe)VALUES ('$especialidade')";

if (mysqli_query($conn, $sql)) {
	echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; cadastrar_atividade.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>