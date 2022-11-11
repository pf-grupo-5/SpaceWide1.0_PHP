<?php

require_once(__DIR__ . '/inicializador.php');


$mysqli = conectar_bd();

$sql_grafico_1 = "SELECT COUNT(id), estado
                  FROM obra_artistica
                  GROUP BY estado ORDER BY estado DESC";

$sql_grafico_2 = "SELECT 
                    date_format(obra.data_de_criacao,'%m') as Mes, 
                    count(ID) as Quantidade_de_obras, 
                    date_format(obra.data_de_criacao,'%Y') as Ano
                 FROM obra_artistica obra
                 GROUP BY Ano,Mes
                 ORDER BY Ano,Mes";


$stmt_grafico_1 = $mysqli->prepare($sql_grafico_1);
$stmt_grafico_1->execute();
$resultado_grafico_1 = $stmt_grafico_1->get_result()->fetch_all(MYSQLI_ASSOC);

$stmt_grafico_2 = $mysqli->prepare($sql_grafico_2);
$stmt_grafico_2->execute();
$resultado_grafico_2 = $stmt_grafico_2->get_result()->fetch_all(MYSQLI_ASSOC);


?>

<div id="chart-container">
    <canvas id="grafico_de_estados"></canvas>
</div>
<div id="chart-container">
    <canvas id="grafico_de_datas_de_criacao"></canvas>
</div>
<div id="chart-container">
    <canvas id="grafico_de_datas_de_ultimas_modificacoes"></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">

    var ctx = document.getElementById("grafico_de_estados");
    var valores = [<?= $resultado_grafico_1[1]['COUNT(id)']; ?>,
                   <?= $resultado_grafico_1[0]['COUNT(id)']; ?>,
                   <?= $resultado_grafico_1[2]['COUNT(id)']; ?>];
                   
    var tipos = ["indisponivel", "pendente", "publicado"];

    var myChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: tipos,
        datasets: [
        {
            label: "Estado",
            data: valores,
            backgroundColor: [
            "rgba(29, 28, 229,0.2)",
            "rgba(70, 73, 255,0.7)",
            "rgb(255, 211, 114)", 
            ],
        }
        
        ]
    }
    });

</script>