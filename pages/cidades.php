<?php include_once("conexao/conexao.php");

$id_estado = $_REQUEST['id_estado'];

$result_cidade = "SELECT *FROM dn_cidades WHERE estado_id=$id_estado ORDER BY nome_cidade";
$resultado_cidade = mysqli_query($conn, $result_cidade);

	while ($row_cidade = mysqli_fetch_assoc($resultado_cidade) ){
			$cidade_post[] = array(
				'id_cidade'	=> $row_cidade['id_cidade'],
				'nome_cidade' =>($row_cidade['nome_cidade']),
			);
	}
	echo(json_encode($cidade_post));
?>