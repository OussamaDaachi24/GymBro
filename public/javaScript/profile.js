//1- making the line chart using chart.js library

ctx=document.getElementById('progressChart').getContext('2d');
//array to store the weights (last 6)
let weights=[40,50,20,55,100,65];
//2-costume data for the chart
const data={
    labels:['week1','week2','week3','week4','week5'], // x axis
    datasets:[{
        label:'Your Progress',
        data:weights,
        borderColor:'white',
        backgroundColor:'#3C3C3C',
        borderColor: '#1677FF',
        borderWidth: 1, // Line thickness
        fill: true, // Fills the area under the line
        tension: 0.3 // Curve smoothness (0 for straight, 1 for maximum curve)
    }]
};

//3- chart configuration
const config = {
    type: 'line', // Chart type
    data: data, // Data for the chart
    options: {
        scales: {
            y: {
                beginAtZero: false, // Start the Y-axis from 0
                min: 20,
                max: 100 // Set maximum value for the Y-axis
            }
        },
        plugins: {
            legend: {
                display: false, // Show legend for the dataset
            }
        }
    }
};

//4- create the chart : 
const progressLineChart = new Chart(ctx, config);
