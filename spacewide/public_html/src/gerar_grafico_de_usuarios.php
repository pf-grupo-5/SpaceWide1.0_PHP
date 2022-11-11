<?php

require_once(__DIR__ . '/inicializador.php');


$mysqli = conectar_bd();

$sql_grafico_1 = "SELECT COUNT(id) FROM usuario WHERE acesso = 'administrador'  
                    UNION 
                  SELECT COUNT(id) FROM usuario WHERE acesso = 'artista' 
                    UNION 
                  SELECT COUNT(id) FROM usuario WHERE acesso = 'utente' ";

$sql_grafico_2 = "SELECT COUNT(id), acesso, estado FROM (
                    SELECT id, acesso, estado FROM usuario WHERE acesso = 'administrador' 
                    UNION 
                    SELECT id, acesso, estado FROM usuario WHERE acesso = 'artista' 
                    UNION 
                    SELECT id, acesso, estado FROM usuario WHERE acesso = 'utente' ) AS total_de_estados
                    GROUP BY estado ORDER BY estado ASC";

$sql_grafico_3 = "SELECT COUNT(id) FROM usuario WHERE acesso = 'administrador'  
                    UNION 
                  SELECT COUNT(id) FROM usuario WHERE acesso = 'artista' 
                    UNION 
                  SELECT COUNT(id) FROM usuario WHERE acesso = 'utente' ";

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
    var tipos = ["Administrador", "Artista", "Utente"];

    var myChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: tipos,
        datasets: [
        {
            label: "Acesso",
            data: valores,
            backgroundColor: [
            "rgba(29, 28, 229,0.2)",
            "rgba(70, 73, 255,0.7)",
            "rgb(255, 211, 114)",
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
                   
    var tipos_2 = ['ativo', 'inativo', 'suspenso', 'banido'];

    var myChart_2 = new Chart(ctx_2, {
    type: "pie",
    data: {
        labels: tipos_2,
        datasets: [
        {
            label: "Estado",
            data: valores_2,
            backgroundColor: [
            "rgba(29, 28, 229,0.2)",
            "rgba(70, 73, 255,0.7)",
            "rgb(255, 211, 114)", 
            "",
            ]
        }
        ]
    }
    });

</script>