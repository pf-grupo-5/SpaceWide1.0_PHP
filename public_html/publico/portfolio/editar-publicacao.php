<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');
require($_SERVER['DOCUMENT_ROOT'] . '/src/libs/acesso/acesso_usuario.libs.php');

visualizar('menu');
visualizar('dashboard_sidebar');


$mysqli = conectar_bd();

$sql = sprintf('SELECT id, titulo, subtitulo, estado
                FROM obra_artistica
                WHERE id IN (%s)', $_SESSION['id_extraido']);

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();

?>

<div class='edit-publication-form'>
    <form class='form' action='/src/editar_publicacao.php' method='post'>
        <div class='input-group-container'>
        
        <?php

        if ($resultado->num_rows > 0):
            while ($row = $resultado->fetch_assoc()):

        ?>

        <div class='input-group'>
            <div class='input-field'>
                <i class='fas fa-user'></i>
                <input type='text' name='titulo[]' value='<?= $row["titulo"] ?>' placeholder='titulo'>
            </div>

            <div class='input-field'>
                <i class='fas fa-user'></i>
                <input type='text' name='subtitulo[]' value='<?php echo($row["subtitulo"]) ?>' placeholder='subtitulo'>
            </div>

            <div class='input-field'>
                <i class='fas fa-user'></i>
                <select name='estado[]'>
                    <option value='1'>publicada</option>
                    <option value="2">indisponivel</option>
                    <option value="3">pendente</option>
                </select>
            </div>

            <div class='input-field'>
                <input type='hidden' name='id[]' value='<?= $row["id"] ?>'>
            </div>
        </div>

        <?php

            endwhile;
        endif;

        ?>

        </div>

        <button type='submit' class='submit-btn' name='data-update-btn'>Atualizar</button>

    </form>
</div>