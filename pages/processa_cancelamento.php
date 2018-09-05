<?php
include_once('conexao/conexao.php');
$motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);
$data_ativ = filter_input(INPUT_POST, 'data_ativ', FILTER_SANITIZE_STRING);
$hora_inicio = filter_input(INPUT_POST, 'hora_inicio', FILTER_SANITIZE_STRING);
$hora_fim= filter_input(INPUT_POST, 'hora_fim', FILTER_SANITIZE_STRING);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
$subcategoria = filter_input(INPUT_POST, 'subcategoria', FILTER_SANITIZE_NUMBER_INT);
$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_NUMBER_INT);
$tipo_ativ = filter_input(INPUT_POST, 'tipo_ativ', FILTER_SANITIZE_STRING);
$teste = filter_input(INPUT_POST, 'teste', FILTER_SANITIZE_STRING);
$qtd_testes = filter_input(INPUT_POST, 'qtd_testes', FILTER_SANITIZE_NUMBER_INT);

$sql = "INSERT INTO dn_relatorio_cancelamento(
motivo,
data_ativ,
hora_inicio,
hora_fim,
titulo,
categoria_id,
subcategoria_id,
especialidade_id,
tipo_ativ,
teste,
qtd_testes
)
VALUES(
'$motivo',
'$data_ativ',
'$hora_inicio',
'$hora_fim',
'$titulo',
'$categoria',
'$subcategoria',
'$especialidade',
'$tipo_ativ',
'$teste',
'$qtd_testes')";

$resultado_cadastro = mysqli_query($conn,$sql);

if (!$conn){
  die("Falha de conexão: " . mysqli_connect_error());
}

if ($resultado_cadastro){
	echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; atividade_cancelada.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>