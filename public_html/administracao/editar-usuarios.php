<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/acesso/acesso_admin.libs.php');

visualizar('menu');
visualizar('dashboard_sidebar');


$mysqli = conectar_bd();

$sql = "";
foreach ($_SESSION['id_acesso_extraido'] as $chave => $dado) {
    
    $sql .= sprintf("SELECT id, nome, estado, '%s' AS acesso FROM %s WHERE id = %d;", $dado[1], $dado[1], $dado[0]);
    
}
//var_export($sql);
?>

<div class='edit-publication-form'>
    <form class='form' action='/src/editar_usuarios.php' method='post'>
        <div class='input-group-container'>
        
        <?php

        $mysqli->multi_query($sql);
        do {
            if ($result = $mysqli->store_result()) {
                while ($row = $result->fetch_row()) {
        
        ?>

        <div class='input-group'>
            <div class='input-field'>
                <i class='fas fa-user'></i>
                <input type='text' name='nome[]' value='<?= $row[1] ?>' placeholder='nome'>
            </div>

            <div class='input-field'>
                <i class='fas fa-user'></i>
                <select name='estado[]'>
                    <option value="<?= $row[2] ?>" selected hidden><?= $row[2] ?></option>
                    <option value='1'>ativo</option>
                    <option value="2">inativo</option>
                    <option value="3">suspenso</option>
                    <option value="4">banido</option>
                </select>
            </div> 



            <div class='input-field'>
                <input type="hidden" name="acesso[]" value="<?= $row[3] ?>">
                <input type="hidden" name="id[]"" value="<?= $row[0] ?>">
            </div>
        </div>

        <?php

                }
            }
        } while ($mysqli->next_result());

        ?>

        </div>

        <button type='submit' class='submit-btn' name='data-update-btn'>Atualizar</button>

    </form>
</div>

<?php visualizar('rodape') ?>