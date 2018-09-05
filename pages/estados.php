<?php include_once("conexao/conexao.php");

$id_pais = $_REQUEST['id_pais'];

$result_estado = "SELECT *FROM dn_estados WHERE pais_id=$id_pais ORDER BY nome_estado";
$resultado_estado = mysqli_query($conn, $result_estado);

	while ($row_estado = mysqli_fetch_assoc($resultado_estado) ){
			$estado_post[] = array(
				'id_estado'	=> $row_estado['id_estado'],
				'nome_estado' =>($row_estado['nome_estado']),
			);
	}
	echo(json_encode($estado_post));
?>