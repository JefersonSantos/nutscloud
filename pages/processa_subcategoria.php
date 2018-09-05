<?php
session_start();
include_once('conexao/conexao.php');

$nome_subcategoria = filter_input(INPUT_POST, 'nome_subcategoria', FILTER_SANITIZE_STRING);
$categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);

if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}

$sql = "INSERT INTO dn_sub_categoria(nome_subcategoria, categoria_id)VALUES('$nome_subcategoria','$categoria_id')";

if(mysqli_query($conn, $sql)){
	//echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; cadastrar_atividade.php");
  exit;
} else{
  echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>