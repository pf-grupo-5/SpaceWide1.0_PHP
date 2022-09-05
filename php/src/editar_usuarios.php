<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/acesso/acesso_admin.libs.php');


if (isset($_POST['all-checkboxes'])) {
    $lista_de_id_acesso = $_POST['all-checkboxes'];

    foreach($lista_de_id_acesso as $chave => $dados) {
        $lista_de_id_acesso_extraida[$chave] = explode('-', $dados);
    }
    
    $mysqli = conectar_bd();
}


if (isset($_POST['create-btn'])) {
    redirecionar_para('/administracao/cadastro-de-administrador.php');

} elseif (isset($_POST['update-btn']) && !empty($lista_de_id_acesso)) {
    $_SESSION['id_acesso_extraido'] = $lista_de_id_acesso_extraida;
    redirecionar_para('/administracao/editar-usuarios.php');

} elseif (isset($_POST['data-update-btn'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $estado = $_POST['estado'];
    $acesso = $_POST['acesso'];
    $total_de_usuarios = count($id);
    var_export($total_de_usuarios);

    for ($index=0; $index<$total_de_usuarios; $index++) {
        $sql = sprintf("UPDATE %s SET nome = '%s', estado = '%s' WHERE `id` = %d;",
            $acesso[$index], $nome[$index], $estado[$index], $id[$index]);
        var_export($sql);
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        var_export($stmt->affected_rows);
    }
    if ($stmt->affected_rows >= 0) {
        unset($_SESSION['id_acesso_extraido']);
        redirecionar_para('/administracao/usuarios.php');
    }

} elseif (isset($_POST['delete-btn']) && !empty($lista_de_id_acesso)) {
    
    $lista_de_id_acesso_extraida;
    $total_de_usuarios = count($lista_de_id_acesso_extraida);

    for ($index=0; $index<$total_de_usuarios; $index++) {
        var_export(deletar_usuarios_do_bd($mysqli, $lista_de_id_acesso_extraida[$index][1], $lista_de_id_acesso_extraida[$index][0]));
    }
    
    redirecionar_para('/administracao/usuarios.php');

} else {
    header("Location: {$_SERVER["HTTP_REFERER"]}");;
}

?>
