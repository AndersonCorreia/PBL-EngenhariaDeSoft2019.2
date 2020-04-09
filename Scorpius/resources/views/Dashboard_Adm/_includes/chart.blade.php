


<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
<!-- <a data-valores="{{json_encode($visitantes)}}"  id="utilizar"> </a> -->
<script type="text/javascript">
// $.ajax({
//   url: $('#'),
//   async: true,
//   dataType: 'json',
//   type: "get",
// }).done(function (data) {

    
     //var label = ['Municipal','Publica','Estadual'];
   //  var datas = [0,1,2];
   var obj = Object.entries(<?php echo json_encode($visitantes) ?>);
   var variavel = Object.entries(obj);
  //  var variavel = Object.keys(obj).map(function (key) { 
          
  //         // Using Number() to convert key to number type 
  //         // Using obj[key] to retrieve key value 
  //         return [Number(key), obj[key]]; 
  //     }); ;  
    //console.log(`${JSON.parse(php echo json_encode($visitantes); ?>)}`);
  //  variavel = JSON.parse(php echo json_encode($visitantes); ?>);
    
    var label = [];
    var datas = [];

     for (var i = 0; i<3; i++){
      label[i] = variavel[i][0];
      datas[i] = parseInt(variavel[i][1]);
     }
    console.log(`${label}`);
    console.log(`${variavel}`);
    var ctx = document.getElementById('exibedados');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Números de Visitas por Escolas',
                data: datas,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
// });

</script>