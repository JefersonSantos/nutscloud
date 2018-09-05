<?php
session_start();
include_once("conexao/conexao.php");
//Verifica se os campos possuem dados
if((isset($_POST['txt_usuario'])) && (isset($_POST['txt_senha']))){
	//Escapar de caracteres especiais, como aspas, prevenindo SQL injection
	$usuario = mysqli_real_escape_string($conn, $_POST['txt_usuario']);
	$senha = mysqli_real_escape_string($conn, $_POST['txt_senha']);

	$result_usuario = "SELECT *FROM dn_usuarios WHERE email = '$usuario' && senha = '$senha'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);

	//Encontrando um usuário na tabela usuario com os mesmos dados digitado pelo usuario
	if(isset($resultado)){

		//Variáveis globais de sessão
		$_SESSION['usuarioId'] = $resultado['id_usuario'];
		$_SESSION['usuarioNome'] = $resultado['nome'];
		$_SESSION['usuarioEmail'] = $resultado['email'];
		$_SESSION['usuarioImg'] = $resultado['caminho_img'];
		$_SESSION['usuarioNiveisAcessoId'] = $resultado['niveis_acesso_id'];


		//Definição de níveis de acesso e navegação
		if($_SESSION['usuarioNiveisAcessoId'] == "1"){
			header("Location: painel_inicial.php");
		}elseif($_SESSION['usuarioNiveisAcessoId'] == "2"){
			header("Location: colaborador.php");
		}elseif($_SESSION['usuarioNiveisAcessoId'] == "3"){
			header("Location: visitante.php");
		}else{
			echo '<div class="alert alert-danger" role="alert">Você não possui acesso 1</div>';
		}
	}else{
		echo '<script>alert("Usuário ou Senha Inválidos");</script>';
		header("Refresh: 0; ../index.php");
		exit;
	}
}else{
	echo '<div class="alert alert-danger" role="alert">Você não possui acesso 3</div>';
}
?>

