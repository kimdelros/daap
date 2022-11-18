// chart js
const ctx = document.getElementById('myChart').getContext('2d');
var date = new Date();

var year = date.getFullYear();
var year1 = date.getFullYear()-2;
var year2 = date.getFullYear()-1;
var year3 = date.getFullYear()+1;

if(date.getMonth()>6){
    var label1 = "2nd Sem AY "+year1+"-"+year2;
    var label2 = "1st Sem AY "+year2+"-"+year;
    var label3 = "2nd Sem AY "+year2+"-"+year;
    var label4 = "1st Sem AY "+year+"-"+year3;
}else{
    var label1 = "1st Sem AY "+year1+"-"+year2;
    var label2 = "2nd Sem AY "+year1+"-"+year2;
    var label3 = "1st Sem AY "+year2+"-"+year;
    var label4 = "2nd Sem AY "+year2+"-"+year;
}

const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [label1, label2, label3, label4],
        datasets: [{
            label: 'Number of Applications per Semester',
            data: [50, 64, 34, 98],
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
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});