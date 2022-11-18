
var ctx = document.getElementById('chartHours').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: _ydata,
        datasets: [{
            label: 'Total Ticket Sales',
            data: _xdata,
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

var ctx = document.getElementById("chartgender").getContext('2d'); 
var myChart = new Chart(ctx, {
    
  type: 'pie',
  data: {
    labels: ["male", "female"],
    datasets: [{
      backgroundColor: [
        "#add8e6",
        "#ffb6c1",
      ],
      data: genders
    }]
  }
});

