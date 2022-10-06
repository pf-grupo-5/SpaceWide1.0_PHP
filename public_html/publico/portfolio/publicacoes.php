<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');




if (isset($_GET['pagina']) && $_GET['pagina'] != "") {
	$pagina = $_GET['pagina'];
} else {
	$pagina = 1;
}
$limite = 20;
$pagina_inicial = ($pagina -1) * $limite;
$pagina_anterior = $pagina - 1;
$pagina_sucessora = $pagina + 1;

$mysqli = conectar_bd();

if (!isset($_GET['sort']) && !isset($_GET['search-bar'])) {

    $sql_total = "SELECT COUNT(id) 
                  FROM obra_artistica
                  WHERE id_usuario = {$_SESSION['id']}";
    
    $sql = "SELECT id, titulo, subtitulo, estado, data_de_criacao, data_da_ultima_modificacao
            FROM obra_artistica 
            WHERE id_usuario = {$_SESSION['id']} 
            LIMIT {$pagina_inicial}, {$limite}";

} elseif (isset($_GET['sort-btn'])){
    $opcao_do_filtro = filter_input(INPUT_GET, 'sort');

    if ($opcao_do_filtro == "1" || "0") {
        $filtro = "ORDER BY titulo ASC";
    } elseif($opcao_do_filtro == "2") {
        $filtro = "ORDER BY titulo DESC";
    } elseif($opcao_do_filtro == "3") {
        $filtro = "ORDER BY data_de_criacao DESC";
    } elseif($opcao_do_filtro == "4") {
         $filtro = "ORDER BY data_de_criacao ASC";
    } elseif($opcao_do_filtro == "5") {
        exit('ainda nao existe my son');
    } 
    $sql_total = "SELECT COUNT(id) FROM obra_artistica
                  WHERE id_usuario = {$_SESSION['id']} {$filtro}";
    
    $sql = sprintf("SELECT id, titulo, subtitulo, estado, data_de_criacao, data_da_ultima_modificacao
                    FROM obra_artistica
                    WHERE id_usuario = {$_SESSION['id']} {$filtro} 
                    LIMIT {$pagina_inicial}, {$limite}");
    
} else {
    $item_de_pesquisa = filter_input(INPUT_GET, 'search-bar');
    $sql_total = "SELECT COUNT(id) FROM obra_artistica 
                  WHERE id_usuario = {$_SESSION['id']} AND LOWER(CONCAT(titulo,subtitulo,estado)) 
                  LIKE LOWER('%{$item_de_pesquisa}%')";
    
    $sql = "SELECT id, titulo, subtitulo, estado, data_de_criacao, data_da_ultima_modificacao 
            FROM obra_artistica 
            WHERE id_usuario = {$_SESSION['id']} AND LOWER(CONCAT(titulo, subtitulo, estado)) 
            LIKE LOWER('%".$item_de_pesquisa."%') 
            LIMIT {$pagina_inicial}, {$limite}";
            echo $sql;
}

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$resultado = $stmt->get_result();

$stmt_total = $mysqli->prepare($sql_total);
$stmt_total->execute();
$resultado_total = $stmt_total->get_result();
$numero_de_resultados = $resultado_total->fetch_assoc();

$numero_de_paginas = ceil((int)$numero_de_resultados['COUNT(id)'] / $limite);    
$penultima_pagina = $numero_de_paginas - 1;

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet"> 
    <link rel="shortcut icon" href="/src/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <form action="" method="GET">
                <div class="sort_box">
                    <select name="sort" class="sort-control">
                        <option name="sort-option" value="0">selecione alguma opção</option>
                        <option name="sort-option" value="1" <?php if (isset($_GET['sort']) && $_GET['sort'] == 1) { echo 'selecionado';} ?> >ordem alfabética</option>
                        <option name="sort-option" value="2" <?php if (isset($_GET['sort']) && $_GET['sort'] == 2) { echo 'selecionado';} ?> >ordem alfabética reversa</option>
                        <option name="sort-option" value="3" <?php if (isset($_GET['sort']) && $_GET['sort'] == 3) { echo 'selecionado';} ?> >mais recente</option>
                        <option name="sort-option" value="4" <?php if (isset($_GET['sort']) && $_GET['sort'] == 4) { echo 'selecionado';} ?> >mais antiga</option>
                        <option name="sort-option" value="5" <?php if (isset($_GET['sort']) && $_GET['sort'] == 5) { echo 'selecionado';} ?> >avaliacao</option>
                    </select>
                    <button type="sort-submit" name="sort-btn" class="btn">Filtrar</button>
                </div>
                
                <div class="search-box">
                    <input type="search" name="search-bar" class="btn" value="<?php if(isset($_GET['search-bar'])) {echo $_GET['search-bar']; } ?>" >
                    <button type="search-submit" name="search-btn" class="btn">Buscar</button>
                </div>
            </form>
            
            <form action="/src/editar_publicacao.php" class="form" method="POST">
                <table class='table'>
                    <tbody>
                        <tr>
                            <th>
                                <button type='submit' name='create-btn' class='btn'>Criar</button>
                            </th>
                            <th>
                                <button type='submit' name='update-btn' class='btn'>Atualizar</button>
                            </th>
                            <th>
                                <button type='submit' name='delete-btn' class='btn'>Deletar</button>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>titulo</th>
                            <th>subtitulo</th>
                            <th>estado</th>
                            <th>data de criacao</th>
                            <th>data da ultima modificacao</th>                     
                        </tr>
                    </tbody>

                    <tbody>
                        <?php
                        
                        if ($resultado->num_rows > 0) {
                            while ($row = $resultado->fetch_assoc()) {

                        ?>

                        <tr>
                            <td><input type='checkbox' name='all-checkboxes[]' value='<?= $row['id']; ?>'></td>
                            <td> <?= $row['titulo']; ?> </td>
                            <td> <?= $row['subtitulo']; ?> </td>
                            <td> <?= $row['estado']; ?> </td>
                            <td> <?= $row['data_de_criacao']; ?> </td>
                            <td> <?= $row['data_da_ultima_modificacao']; ?> </td>
                        </tr>
                        
                        <?php
                            
                        }} else {
                            echo '<tr><td colspan="6">Nenhuma obra encontrada</td></tr>';
                            $stmt->close();
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
            </form>
        </div>

        <ul class="paginacao">
            <?php

            $url = parse_url($_SERVER['REQUEST_URI']);
            $url_params = substr($url['query'], 0, strpos($url['query'], '&pagina='));

            ?>
            <?php if ($pagina > 1): ?>
            <li><a href='<?php echo sprintf('?%s&pagina=1', $url_params); ?>'>primeira</a></li>
            <?php endif ?>
        
            <?php if ($pagina > 2): ?>
            <li><a href='<?php echo sprintf('?%s&pagina=%d', $url_params, $pagina_anterior); ?>'>anterior</a></li>
            <?php endif ?>

            <?php ?>
            <?php if ($pagina < $numero_de_paginas): ?>
            <li><a href='<?php echo sprintf('?%s&pagina=%d', $url_params, $pagina_sucessora); ?>'>proxima</a></li>
            <?php endif ?>
            
            <?php if($pagina < $numero_de_paginas): ?>
            <li><a href='<?php echo sprintf('?%s&pagina=%d', $url_params, $numero_de_paginas); ?>'>ultima</a></li>
            <?php endif ?>
        
        </ul>

    </div>
</body>