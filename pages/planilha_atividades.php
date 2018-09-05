<?php
session_start();
include_once("conexao/conexao.php");
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Planilha de Atividades</title>
</head>
    <body>
        <?php
        //nome do arquivo a ser exportado
        $arquivo ='planilha_atividades.xls';

        //criação da tabela html com o formato da planilha
        $html = '';
        $html .= '<table border="1">';
        $html .= '<tr>';
        $html .= '<td><b>Codigo</b></td>';
        $html .= '<td><b>Data</b></td>';
        $html .= '<td><b>Hora Inicio</b></td>';
        $html .= '<td><b>Hora Fim</b></td>';
        $html .= '<td><b>Titulo</b></td>';
        $html .= '<td><b>Categoria</b></td>';
        $html .= '<td><b>Subcategoria</b></td>';
        $html .= '<td><b>Especialidade</b></td>';
        $html .= '<td><b>Pais 1</b></td>';
        $html .= '<td><b>Estado 1</b></td>';
        $html .= '<td><b>Cidade 1</b></td>';
        $html .= '<td><b>Pais 2</b></td>';
        $html .= '<td><b>Estado 2</b></td>';
        $html .= '<td><b>Cidade 2</b></td>';
        $html .= '<td><b>Area Conhecimento</b></td>';
        $html .= '<td><b>Cobertura Atividade</b></td>';
        $html .= '<td><b>Localização</b></td>';
        $html .= '<td><b>Tipo de Atividade</b></td>';
        $html .= '<td><b>Origem Cirurgia</b></td>';
        $html .= '<td><b>Destino Cirurgia</b></td>';
        $html .= '<td><b>Teste</b></td>';
        $html .= '<td><b>Quant. Testes</b></td>';
        $html .= '<td><b>Tipo Conexão</b></td>';
        $html .= '<td><b>Recurso </b></td>';
        $html .= '<td><b>Modalidade</b></td>';
        $html .= '<td><b>MCU Utilizada</b></td>';
        $html .= '<td><b>Qualidade Audio</b></td>';
        $html .= '<td><b>Qualidade Imagem</b></td>';
        $html .= '<td><b>Velocidade</b></td>';
        $html .= '<td><b>Pontos VC</b></td>';
        $html .= '<td><b>Pontos WEB</b></td>';
        $html .= '<td><b>Total Participantes</b></td>';
        $html .= '<td><b>Total Masculino</b></td>';
        $html .= '<td><b>Total Feminino</b></td>';
        $html .= '<td><b>Total 0-20 anos</b></td>';
        $html .= '<td><b>Total 21-30 anos</b></td>';
        $html .= '<td><b>Total 31-40 anos</b></td>';
        $html .= '<td><b>Total Mais de 40 anos</b></td>';
        $html .= '<td><b>Total Docentes</b></td>';
        $html .= '<td><b>Total Preceptores</b></td>';
        $html .= '<td><b>Total Estudantes</b></td>';
        $html .= '<td><b>Total Residente Med</b></td>';
        $html .= '<td><b>Total Residente Mult</b></td>';
        $html .= '<td><b>Total Medicos</b></td>';
        $html .= '<td><b>Total Enfermagem</b></td>';
        $html .= '<td><b>Total Outros Prof.</b></td>';

        //Selecionar todos os itens da tabela
        $result = "SELECT ra.*,                                                        
											  ca.nome_cate nome_categoria,
                                              su.nome_subcategoria nome_subcate,
                                              es.nome_espe nome_especialidade,
                                              p1.nome_pais pais1,
                                              e1.nome_estado estado1,                                               
                                              c1.nome_cidade cidade1,                        
                                              p2.nome_pais pais2,
                                              e2.nome_estado estado2,                                               
                                              c2.nome_cidade cidade2  
                                                                                           
                                       FROM dn_relatorio_atividade ra
                                                                              
                                       INNER JOIN dn_categoria ca     ON ra.categoria_id     = ca.id_categoria 
                                       INNER JOIN dn_sub_categoria su ON ra.subcategoria_id  = su.id_subcategoria 
                                       INNER JOIN dn_especialidade es ON ra.especialidade_id = es.id_especialidade 
                                       INNER JOIN dn_paises p1        ON ra.pais1_id = p1.id_pais 
                                       INNER JOIN dn_estados e1       ON ra.estado1_id = e1.id_estado
                                       INNER JOIN dn_cidades c1       ON ra.cidade1_id = c1.id_cidade
                                       INNER JOIN dn_paises p2        ON ra.pais2_id = p2.id_pais                                         
                                       INNER JOIN dn_estados e2       ON ra.estado2_id = e2.id_estado                                        
                                       INNER JOIN dn_cidades c2       ON ra.cidade2_id = c2.id_cidade";
        $resultado = mysqli_query($conn , $result);

        while($row_usuario = mysqli_fetch_assoc($resultado)){
            $html .= '<tr>';
            $html .= '<td>'.$row_usuario["id_atividade"].'</td>';
            $html .= '<td>'.$row_usuario["data_ativ"].'</td>';
            $html .= '<td>'.$row_usuario["hora_inicio"].'</td>';
            $html .= '<td>'.$row_usuario["hora_fim"].'</td>';
            $html .= '<td>'.$row_usuario["titulo"].'</td>';
            $html .= '<td>'.$row_usuario["nome_categoria"].'</td>';
            $html .= '<td>'.$row_usuario["nome_subcate"].'</td>';
            $html .= '<td>'.$row_usuario["nome_especialidade"].'</td>';
            $html .= '<td>'.$row_usuario["pais1"].'</td>';
            $html .= '<td>'.$row_usuario["cidade1"].'</td>';
            $html .= '<td>'.$row_usuario["estado1"].'</td>';
	        $html .= '<td>'.$row_usuario["pais2"].'</td>';
	        $html .= '<td>'.$row_usuario["cidade2"].'</td>';
	        $html .= '<td>'.$row_usuario["estado2"].'</td>';
            $html .= '<td>'.$row_usuario["area_con"].'</td>';
            $html .= '<td>'.$row_usuario["cobertura_ativ"].'</td>';
            $html .= '<td>'.$row_usuario["localizacao_ativ"].'</td>';
            $html .= '<td>'.$row_usuario["tipo_ativ"].'</td>';
            $html .= '<td>'.$row_usuario["origem_cirurgia"].'</td>';
            $html .= '<td>'.$row_usuario["destino_cirurgia"].'</td>';
            $html .= '<td>'.$row_usuario["teste"].'</td>';
            $html .= '<td>'.$row_usuario["qtd_testes"].'</td>';
            $html .= '<td>'.$row_usuario["tipo_conexao"].'</td>';
            $html .= '<td>'.$row_usuario["recurso"].'</td>';
            $html .= '<td>'.$row_usuario["modalidade"].'</td>';
            $html .= '<td>'.$row_usuario["mcu"].'</td>';
            $html .= '<td>'.$row_usuario["quali_audio"].'</td>';
            $html .= '<td>'.$row_usuario["quali_imagem"].'</td>';
            $html .= '<td>'.$row_usuario["velocidade"].'</td>';
            $html .= '<td>'.$row_usuario["n_pontosvc"].'</td>';
            $html .= '<td>'.$row_usuario["n_pontosweb"].'</td>';
            $html .= '<td>'.$row_usuario["tot_part"].'</td>';
            $html .= '<td>'.$row_usuario["tot_sexm"].'</td>';
            $html .= '<td>'.$row_usuario["tot_sexf"].'</td>';
            $html .= '<td>'.$row_usuario["tot_0_20"].'</td>';
            $html .= '<td>'.$row_usuario["tot_21_30"].'</td>';
            $html .= '<td>'.$row_usuario["tot_31_40"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_acima40"].'</td>';
            $html .= '<td>'.$row_usuario["tot_docentes"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_precept"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_estudantes"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_residmed"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_residmult"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_med"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_enf"].'</td>';
	        $html .= '<td>'.$row_usuario["tot_outros"].'</td>';
            $html .= '</tr>';
            ;
        }

        // Configurações header para forçar o download
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
        header ("Content-Description: PHP Generated Data" );
        // Envia o conteúdo do arquivo
        echo $html;
        exit; ?>
        ?>
    </body>
</html>
