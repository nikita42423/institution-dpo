/* globals Chart:false, feather:false */

$(document).ready(function(){
  
    feather.replace({ 'aria-hidden': 'true' })
    var lbl = '';
    var val = '';
    // Graphs
    var ctx = document.getElementById('myChart')
    var myChart = new Chart(ctx, {
        
    type: 'bar',
    data: {
        labels: lbl,
        datasets: [{
            data: val,
            lineTension: 0,
            backgroundColor: '#007bff',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
        }]
    },
    options: {
        scales: {
        yAxes: [{
            ticks: {
            beginAtZero: false
            }
        }]
        },
        legend: {
        display: false
        }
    }
    })

    $('#diagram_count_stud').ready(function(){
    
        var label = $('#name_ep').val();
        var value = $('#count_stud').val();

        let lbl = label.split(',');
        let val = value.split(',');

        myChart.data.labels = lbl;
        myChart.data.datasets[0].data = val;

        myChart.update();
    })

})