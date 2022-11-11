const criar_grafico_de_acesso_u = async () => {

  const dados = await fetch("/src/gerar_grafico_de_usuario.php");
  const resposta = await dados.json();

        var ctx = document.getElementById("acesso-pie");
        var valores = resposta['dados'];
        var tipos = ["administrador", "artista", "utente"];

        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: tipos,
            datasets: [
              {
                label: "Usuarios - Acesso",
                data: valores,
                backgroundColor: [
                  "rgba(29, 28, 229, 0.2)",
                  "rgba(70, 73, 255, 0.2)",
                  "rgba(121, 120, 255, 0.2)",
                ]
              }
            ]
          }
        }); 

};

const criar_grafico_de_estado_u = async () => {

  const dados = await fetch("/src/gerar_grafico_de_usuario.php");
  const resposta = await dados.json();

        var ctx = document.getElementById("estado-pie");
        var valores = resposta['dados'];
        var tipos = ["ativo", "inativo", "suspenso", "banido"];

        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: tipos,
            datasets: [
              {
                label: "Usuarios - Estado",
                data: valores,
                backgroundColor: [
                  "rgba(29, 28, 229, 0.2)",
                  "rgba(70, 73, 255, 0.2)",
                  "rgba(121, 120, 255, 0.2)",
                  "rgba(196, 122, 255, 0.2)",
                ]
              }
            ]
          }
        }); 

};

criar_grafico_de_acesso_u();
criar_grafico_de_estado_u();