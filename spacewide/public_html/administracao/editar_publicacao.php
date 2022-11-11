<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/inicializador.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/gerar_relatorio.php');


$mysqli = conectar_bd();

(!usuario_logado()) ? (header('Location: /index.php')) : (null);

if (isset($_POST['all-checkboxes'])): 

    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);

endif;

if (isset($_POST['data-update-btn'])):

    $dados['titulo'] = $_POST['titulo'];
    $dados['subtitulo'] = $_POST['subtitulo'];
    $dados['estado'] = $_POST['estado'];
    $dados['id'] = $_POST['id'];
    
    editar_multiplas_obras_artisticas_do_bd($mysqli, $dados);
    header("Location: /administracao/publicacoes.php");

elseif (isset($_POST['update-btn']) && !empty($lista_de_ids)):

    $_SESSION['id_extraido'] = $id_extraido;
    header('Location: /administracao/editar-publicacao.php');

elseif (isset($_POST['delete-btn'])):
    
    deletar_multiplas_obras_artisticas_do_bd($mysqli, $id_extraido);
    header('Location: /administracao/publicacoes.php');

elseif (isset($_POST['pdf-download-btn'])):

    $pdf = new relatorioPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'A3', 0);
    $pdf->gerar_cabecalho("Relatorio do Space Wide", "Dados sobre todas as obras artisticas");
    $pdf->gerar_cabecalho_da_tabela_de_obras_artisticas();
    $pdf->gerar_tabela_de_obras_artisticas($mysqli, 'SELECT * FROM obra_artistica ORDER BY id ASC');
    $pdf->gerar_rodape();
    $pdf->Output();
    
else:
    
    unset($_SESSION['id_extraido']);
    header('Location: /administracao/publicacoes.php');
    
endif;
    
?>