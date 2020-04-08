<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>

<script>
$(document).ready(function(){
  $.ajax({
    url: "http://localhost/chartjs/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var player = [];
      var number = [];

      for(var i in data) {
        player.push("Player " + data[i].playerid);
        score.push(data[i].score);
      }

      var chartdata = {
        labels: player,
        datasets : [
          {
            label: 'Alunos por Instituição',

            
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            
            
            data: number
          }
        ]
      };

      var ctx = $("#exibedados");

      var barGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});

</script>