<?php
	//Incluir a conexão com banco de dados
	include_once('conexao/conexao.php');
	header('Content-Type: text/html; charset=UTF-8');
	
	//Recuperar o valor da palavra
	$contato = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$cursos = "SELECT *FROM dn_contato WHERE nome OR coordenacao LIKE '%$contato%' ";
	$resultado_cursos = mysqli_query($conn, $cursos);
	
	if(mysqli_num_rows($resultado_cursos) <= 0){
		echo "Nenhum contato ...";
	}else{
		while($row = mysqli_fetch_assoc($resultado_cursos)){
			echo '<tr>';
				//echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['nome'].'</td>';
				//echo '<td>'.$row['vinculo'].'</td>';
				//echo '<td>'.$row['localizacao'].'</td>';
				echo '<td>'.$row['coordenacao'].'</td>';
				echo '<td>'.$row['ramal'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				echo '<td><a class="btn btn-default" title="Visualizar" href="#?id='.$row['id'].'"><i class="glyphicon glyphicon-eye-open"></i></a></td>';
			echo '<tr>';
			echo ' ';
		}
	}
?>