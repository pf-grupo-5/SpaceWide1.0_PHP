<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/src/inicializador.php');


(!tipo_de_usuario_logado('administrador')) ? (header('Location: /index.php')) : (true);

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

    $sql_total = "SELECT COUNT(id) FROM usuario ";
    
    $sql = "SELECT id, nome, nome_artistico, email, senha, acesso, estado, data_de_criacao, data_da_ultima_modificacao
            FROM usuario 
            ORDER BY nome DESC 
            LIMIT {$pagina_inicial}, {$limite}";

}

if (isset($_GET['sort-btn'])){
    $opcao_do_filtro = filter_input(INPUT_GET, 'sort');

    if ($opcao_do_filtro == "1" || "0") {
        $filtro = "ORDER BY nome ASC";
    } elseif($opcao_do_filtro == "2") {
        $filtro = "ORDER BY nome DESC";
    } elseif($opcao_do_filtro == "3") {
        $filtro = "ORDER BY data_de_criacao DESC";
    } elseif($opcao_do_filtro == "4") {
         $filtro = "ORDER BY data_de_criacao ASC";
    }
    $sql_total = "SELECT COUNT(id) FROM usuario 
                  {$filtro}";
    
    $sql = sprintf("SELECT id, nome, nome_artistico, email, acesso, estado, data_de_criacao, data_da_ultima_modificacao
                    FROM usuario 
                    {$filtro} 
                    LIMIT {$pagina_inicial}, {$limite}");
    
} else {
    $item_de_pesquisa = filter_input(INPUT_GET, 'search-bar');
    
    $sql_total = "SELECT COUNT(id) FROM usuario 
            WHERE LOWER(CONCAT(nome, email, acesso, estado)) 
            LIKE LOWER('%".$item_de_pesquisa."%')";
    
    $sql = "SELECT id, nome, nome_artistico, email, acesso, estado, data_de_criacao, data_da_ultima_modificacao FROM usuario 
            WHERE LOWER(CONCAT(nome, email, acesso, estado)) 
            LIKE LOWER('%".$item_de_pesquisa."%') 
            ORDER BY id DESC 
            LIMIT ". $pagina_inicial.", ".$limite;
            
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
  <link rel="stylesheet" type="text/css" href="/src/inc/css/table.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/src/assets/logo/logo.png">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Usuários</title>
</head>
<body>
    <header>        
        <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/src/inc/menu.php"); ?>

    </header>
    
    <title>Usuários</title>
</head>
<body>
    <div class="container-lg-6">
        <div class="table">
            <form action="" method="GET">
                <div class="sort_box">
                    <select name="sort" class="sort-control">
                        <option name="sort-option" value="0">selecione alguma opção</option>
                        <option name="sort-option" value="1" <?php if (isset($_GET['sort']) && $_GET['sort'] == 1) { echo 'selecionado';} ?> >ordem alfabética</option>
                        <option name="sort-option" value="2" <?php if (isset($_GET['sort']) && $_GET['sort'] == 2) { echo 'selecionado';} ?> >ordem alfabética reversa</option>
                        <option name="sort-option" value="3" <?php if (isset($_GET['sort']) && $_GET['sort'] == 3) { echo 'selecionado';} ?> >mais recente</option>
                        <option name="sort-option" value="4" <?php if (isset($_GET['sort']) && $_GET['sort'] == 4) { echo 'selecionado';} ?> >mais antiga</option>
                    </select>
                    <button type="sort-submit" name="sort-btn" class="btn-sm btn-primary">Filtrar</button>
                </div>
                
                <div class="search-box">
                    <input type="search" name="search-bar" class="input-control" value="<?php if(isset($_GET['search-bar'])) {echo $_GET['search-bar']; } ?>" >
                    <button type="search-submit" name="search-btn" class="btn-sm btn-primary">Buscar</button>
                </div>
            </form>
            
            <form action="/administracao/editar_usuario.php" class="form" method="POST">
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
                            <th>
                                <button type='submit' name='pdf-download-btn' class='btn'><i class="fa-solid fa-arrow-down"></i> Gerar PDF do relatorio</button>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>nome</th>
                            <th>nome artistico</th>
                            <th>e-mail</th>
                            <th>acesso</th>
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
                            <td> <?= $row['nome']; ?> </td>
                            <td> <?= $row['nome_artistico']; ?> </td>
                            <td> <?= $row['email']; ?> </td>
                            <td> <?= $row['acesso']; ?> </td>
                            <td> <?= $row['estado']; ?> </td>
                            <td> <?= $row['data_de_criacao']; ?> </td>
                            <td> <?= $row['data_da_ultima_modificacao']; ?> </td>
                        </tr>
                        
                        <?php
                            
                        }} else {
                            echo '<tr><td colspan="6">Nenhum usuario encontrado :(</td></tr>';
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
        
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/src/gerar_grafico_de_usuarios.php'); ?>
        
    </div>
</body>