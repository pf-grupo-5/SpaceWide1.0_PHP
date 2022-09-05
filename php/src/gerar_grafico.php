<?php
require_once(__DIR__ . '/inicializador.php');
require(__DIR__ . '/libs/acesso/acesso_usuario.libs.php');

$mysqli = conectar_bd();

$sql_grafico_1 = "SELECT COUNT(id) FROM administrador 
                UNION 
                SELECT COUNT(id) FROM artista  
                UNION 
                SELECT COUNT(id) FROM cliente";

$sql_grafico_2 = "SELECT COUNT(id), acesso, estado FROM (
                    SELECT id, 'admin' AS acesso, estado FROM administrador
                    UNION
                    SELECT id, 'artista' AS acesso, estado FROM artista
                    UNION
                    SELECT id, 'cliente' AS acesso, estado FROM cliente) AS total_de_estados 
                    GROUP BY estado ORDER BY estado ASC";

$sql_grafico_3 = "SELECT COUNT(id) FROM administrador 
                UNION 
                SELECT COUNT(id) FROM artista  
                UNION 
                SELECT COUNT(id) FROM cliente";

$stmt_grafico_1 = $mysqli->prepare($sql_grafico_1);
$stmt_grafico_1->execute();
$resultado_grafico_1 = $stmt_grafico_1->get_result()->fetch_all(MYSQLI_ASSOC);


$stmt_grafico_2 = $mysqli->prepare($sql_grafico_2);
$stmt_grafico_2->execute();
$resultado_grafico_2 = $stmt_grafico_2->get_result()->fetch_all(MYSQLI_ASSOC);

$stmt_grafico_3 = $mysqli->prepare($sql_grafico_3);
$stmt_grafico_3->execute();
$resultado_grafico_3 = $stmt_grafico_3->get_result()->fetch_all(MYSQLI_ASSOC);



?>
<div id="chart-container">
    <canvas id="grafico_de_acessos"></canvas>
</div>
<div id="chart-container">
    <canvas id="grafico_de_estados"></canvas>
</div>
<div id="chart-container">
    <canvas id="grafico_de_datas_de_criacao"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
    var ctx = document.getElementById("grafico_de_acessos");
    var valores = [<?= $resultado_grafico_1[0]['COUNT(id)']; ?>,
                   <?= $resultado_grafico_1[1]['COUNT(id)']; ?>,
                   <?= $resultado_grafico_1[2]['COUNT(id)']; ?>];
    var tipos = ["Administrador", "Artista", "Cliente"];

    var myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: tipos,
        datasets: [
        {
            label: "Acesso",
            data: valores,
            backgroundColor: [
            "",
            "",
            "",
            ]
        }
        ]
    }
    });
    
    var ctx_2 = document.getElementById("grafico_de_estados");
    var valores_2 = [<?= $resultado_grafico_2[0]['COUNT(id)']; ?>,
                     <?= $resultado_grafico_2[1]['COUNT(id)']; ?>,
                     <?= $resultado_grafico_2[2]['COUNT(id)']; ?>,
                     <?= $resultado_grafico_2[3]['COUNT(id)']; ?>];
                   
    var tipos_2 = ['ativo', 'banido', 'inativo', 'suspenso'];

    var myChart_2 = new Chart(ctx_2, {
    type: "doughnut",
    data: {
        labels: tipos_2,
        datasets: [
        {
            label: "Estado",
            data: valores_2,
            backgroundColor: [
            "",
            "",
            "", 
            "",
            ]
        }
        ]
    }
    });

</script>