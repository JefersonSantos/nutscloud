<?php include_once("conexao/conexao.php");

$id_categoria = $_REQUEST['id_categoria'];

$result_sub_cat = "SELECT *FROM dn_sub_categoria WHERE categoria_id=$id_categoria ORDER BY nome_subcategoria";
$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);

	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ){
			$sub_categorias_post[] = array(
				'id_subcategoria'	=> $row_sub_cat['id_subcategoria'],
				'nome_subcategoria' =>($row_sub_cat['nome_subcategoria']),
			);
	}
	echo(json_encode($sub_categorias_post));
?>