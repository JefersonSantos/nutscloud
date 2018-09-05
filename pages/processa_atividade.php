<?php
include_once('conexao/conexao.php');
$data_ativ = filter_input(INPUT_POST, 'data_ativ', FILTER_SANITIZE_STRING);
$hora_inicio = filter_input(INPUT_POST, 'hora_inicio', FILTER_SANITIZE_STRING);
$hora_fim= filter_input(INPUT_POST, 'hora_fim', FILTER_SANITIZE_STRING);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
$subcategoria = filter_input(INPUT_POST, 'subcategoria', FILTER_SANITIZE_NUMBER_INT);
$especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_NUMBER_INT);
$pais1 = filter_input(INPUT_POST, 'pais1', FILTER_SANITIZE_STRING);
$estado1 = filter_input(INPUT_POST, 'estado1', FILTER_SANITIZE_NUMBER_INT);
$cidade1 = filter_input(INPUT_POST, 'cidade1', FILTER_SANITIZE_NUMBER_INT);
$pais2 = filter_input(INPUT_POST, 'pais2', FILTER_SANITIZE_NUMBER_INT);
$estado2 = filter_input(INPUT_POST, 'estado2', FILTER_SANITIZE_NUMBER_INT);
$cidade2 = filter_input(INPUT_POST, 'cidade2', FILTER_SANITIZE_NUMBER_INT);
$area_con = filter_input(INPUT_POST, 'area_con', FILTER_SANITIZE_STRING);
$cobertura_ativ = filter_input(INPUT_POST, 'cobertura_ativ', FILTER_SANITIZE_STRING);
$localizacao_ativ = filter_input(INPUT_POST, 'localizacao_ativ', FILTER_SANITIZE_STRING);
$tipo_ativ = filter_input(INPUT_POST, 'tipo_ativ', FILTER_SANITIZE_STRING);
$origem_cirurgia = filter_input(INPUT_POST, 'origem_cirurgia', FILTER_SANITIZE_STRING);
$destino_cirurgia = filter_input(INPUT_POST, 'destino_cirurgia', FILTER_SANITIZE_STRING);
$teste = filter_input(INPUT_POST, 'teste', FILTER_SANITIZE_STRING);
$qtd_testes = filter_input(INPUT_POST, 'qtd_testes', FILTER_SANITIZE_NUMBER_INT);
$tipo_conexao = filter_input(INPUT_POST, 'tipo_con', FILTER_SANITIZE_STRING);
$recurso = filter_input(INPUT_POST, 'recurso', FILTER_SANITIZE_STRING);
$modalidade = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_STRING);
$mcu = filter_input(INPUT_POST, 'mcu', FILTER_SANITIZE_STRING);
$quali_audio = filter_input(INPUT_POST, 'quali_audio', FILTER_SANITIZE_STRING);
$quali_imagem = filter_input(INPUT_POST, 'quali_imagem', FILTER_SANITIZE_STRING);
$velocidade = filter_input(INPUT_POST, 'velocidade', FILTER_SANITIZE_STRING);
$n_pontosvc = filter_input(INPUT_POST, 'n_pontosvc', FILTER_SANITIZE_NUMBER_INT);
$n_pontosweb = filter_input(INPUT_POST, 'n_pontosweb', FILTER_SANITIZE_NUMBER_INT);
$tot_part = filter_input(INPUT_POST, 'tot_part', FILTER_SANITIZE_NUMBER_INT);//Dados Participantes
$tot_sexm = filter_input(INPUT_POST, 'tot_sexm', FILTER_SANITIZE_NUMBER_INT);
$tot_sexf = filter_input(INPUT_POST, 'tot_sexf', FILTER_SANITIZE_NUMBER_INT);
$tot_0_20 = filter_input(INPUT_POST, 'tot_0_20', FILTER_SANITIZE_NUMBER_INT);
$tot_21_30 = filter_input(INPUT_POST, 'tot_21_30', FILTER_SANITIZE_NUMBER_INT);
$tot_31_40 = filter_input(INPUT_POST, 'tot_31_40', FILTER_SANITIZE_NUMBER_INT);
$tot_acima40 = filter_input(INPUT_POST, 'tot_acima40', FILTER_SANITIZE_NUMBER_INT);
$tot_docentes = filter_input(INPUT_POST, 'tot_docentes', FILTER_SANITIZE_NUMBER_INT);
$tot_precept = filter_input(INPUT_POST, 'tot_precept', FILTER_SANITIZE_NUMBER_INT);
$tot_estudantes = filter_input(INPUT_POST, 'tot_estudantes', FILTER_SANITIZE_NUMBER_INT);
$tot_residmed = filter_input(INPUT_POST, 'tot_residmed', FILTER_SANITIZE_NUMBER_INT);
$tot_residmult = filter_input(INPUT_POST, 'tot_residmult', FILTER_SANITIZE_NUMBER_INT);
$tot_med = filter_input(INPUT_POST, 'tot_med', FILTER_SANITIZE_NUMBER_INT);
$tot_enf = filter_input(INPUT_POST, 'tot_enf', FILTER_SANITIZE_NUMBER_INT);
$tot_outros = filter_input(INPUT_POST, 'tot_outros', FILTER_SANITIZE_NUMBER_INT);
$sql = "INSERT INTO dn_relatorio_atividade(
data_ativ,
hora_inicio,
hora_fim,
titulo,
categoria_id,
subcategoria_id,
especialidade_id,
pais1_id,
estado1_id,
cidade1_id,
pais2_id,
estado2_id,
cidade2_id,
area_con,
cobertura_ativ,
localizacao_ativ,
tipo_ativ,
origem_cirurgia,
destino_cirurgia,
teste,
qtd_testes,
tipo_conexao,
recurso,
modalidade,
mcu,
quali_audio,
quali_imagem,
velocidade,
n_pontosvc,
n_pontosweb,
tot_part,
tot_sexm,
tot_sexf,
tot_0_20,
tot_21_30,
tot_31_40,
tot_acima40,
tot_docentes,
tot_precept,
tot_estudantes,
tot_residmed,
tot_residmult,
tot_med,
tot_enf,
tot_outros
)
VALUES(
'$data_ativ',
'$hora_inicio',
'$hora_fim',
'$titulo',
'$categoria',
'$subcategoria',
'$especialidade',
'$pais1',
'$estado1',
'$cidade1',
'$pais2',
'$estado2',
'$cidade2',
'$area_con',
'$cobertura_ativ', 
'$localizacao_ativ', 
'$tipo_ativ',
'$origem_cirurgia',
'$destino_cirurgia',
'$teste',
'$qtd_testes',
'$tipo_conexao', 
'$recurso',
'$modalidade', 
'$mcu',
'$quali_audio',
'$quali_imagem', 
'$velocidade',  
'$n_pontosvc', 
'$n_pontosweb',
'$tot_part',
'$tot_sexm', 
'$tot_sexf',
'$tot_0_20', 
'$tot_21_30', 
'$tot_31_40',	 
'$tot_acima40', 
'$tot_docentes', 
'$tot_precept',
'$tot_estudantes', 
'$tot_residmed', 
'$tot_residmult',
'$tot_med', 
'$tot_enf', 
'$tot_outros')";

$resultado_cadastro = mysqli_query($conn,$sql);

if (!$conn){
  die("Falha de conexão: " . mysqli_connect_error());
}

if ($resultado_cadastro){
	echo '<script>alert("Dados Cadastrados!");</script>';
	header("Refresh: 0; atividade.php");
  exit;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>