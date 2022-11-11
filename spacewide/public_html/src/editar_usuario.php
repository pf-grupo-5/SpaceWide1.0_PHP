<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/src/gerar_relatorio.php');

//(!tipo_de_usuario_logado('administrador')) ? (header('Location: /index.php')) : (null);

if (isset($_POST['all-checkboxes'])): 

    $lista_de_ids = $_POST['all-checkboxes'];
    $id_extraido = implode(",", $lista_de_ids);
    $mysqli = conectar_bd();

endif;

if (isset($_POST['create-btn'])):
    
    exit(header('Location: /administracao/cadastro-de-usuario.php'));

elseif (isset($_POST['update-btn']) && !empty($lista_de_ids)):

    $_SESSION['id_acesso_extraido'] = $lista_de_id_acesso_extraida;
    exit(header('Location: /administracao/editar-usuarios.php'));

elseif (isset($_POST['data-update-btn'])):

    $dados['nome'] = $_POST['nome'];
    $dados['estado'] = $_POST['estado'];
    $dados['acesso'] = $_POST['acesso'];
    $dados['indices'] = $id_extraido;

    editar_multiplos_usuarios_do_bd($mysql, $dados);

    unset($_SESSION['id_acesso_extraido']);
    header('Location: /administracao/usuarios.php');

elseif (isset($_POST['delete-btn']) && !empty($lista_de_id_acesso)):
    $_SESSION['id_acesso_extraido'] = $lista_de_id_acesso_extraida;
    header('Location: /administracao/editar-usuarios.php');
    
elseif (isset($_POST['delete-btn'])):
    $dados['indices'] = $id_extraido;
    deletar_multiplos_usuarios_do_bd($mysqli, $dados['indices']);
    
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
    header("Location: {$_SERVER["HTTP_REFERER"]}");

endif;

?>
