<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/gerar_relatorio.php');

$mysqli = conectar_bd();

if (isset($_POST['all-checkboxes'])): 
    
    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);

endif;

if (isset($_POST['create-btn'])):
    
    exit(header('Location: /administracao/cadastro-de-usuario.php'));

elseif (isset($_POST['data-update-btn'])):

    $dados['nome'] = $_POST['nome'];
    $dados['nome'] = $_POST['nome_artistico'];
    $dados['estado'] = $_POST['estado'];
    $dados['acesso'] = $_POST['acesso'];
    $dados['id'] = $_POST['id'];

    editar_multiplos_usuarios_do_bd($mysqli, $dados);
    header('Location: /administracao/usuarios.php');
    
elseif (isset($_POST['update-btn']) && !empty($lista_de_ids)):

    $_SESSION['id_extraido'] = $id_extraido;
    exit(header('Location: /administracao/editar-usuarios.php'));

elseif (isset($_POST['delete-btn'])):
    
    deletar_multiplos_usuarios_do_bd($mysqli, $id_extraido);
    header('Location: /administracao/usuarios.php');
    
elseif (isset($_POST['pdf-download-btn'])):
    
    $pdf = new relatorioPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'A3', 0);
    $pdf->gerar_cabecalho("Relatorio do Space Wide", "Dados sobre todas os usuarios previamente cadastrados");
    $pdf->gerar_cabecalho_da_tabela_de_usuarios();
    $pdf->gerar_tabela_de_usuarios($mysqli, 'SELECT * FROM usuario ORDER BY id ASC');
    $pdf->gerar_rodape();
    $pdf->Output();

else:
    
    unset($_SESSION['id_extraido']);
    header('Location: /administracao/usuarios.php');
    
endif;
    

?>
