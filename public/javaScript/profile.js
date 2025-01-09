// 1. Correct variable declarations and data processing
const ctx = document.getElementById('progressChart').getContext('2d');

// Properly declare weightData as let since we're reassigning it
let weightData = [];

// Process the PHP-provided data
if (typeof full_weights !== 'undefined' && full_weights) {
    // Take last 5 entries or all if less than 5
    processedWeights = Array.isArray(full_weights) ? 
        (full_weights.length >= 5 ? full_weights.slice(-5) : full_weights) : 
        [];
}

// Safely extract weights and dates, handling potential missing or malformed data
const weights = processedWeights.map(entry => 
    typeof entry === 'object' && entry.weight_val ? 
    parseFloat(entry.weight_val) : 0
);

const dates = processedWeights.map(entry =>
    typeof entry === 'object' && entry.taking_date ? 
    entry.taking_date : ''
);

// 2. Chart configuration
const data = {
    labels: dates,
    datasets: [{
        label: 'Your Progress',
        data: weights,
        backgroundColor: '#3C3C3C',
        borderColor: '#1677FF',
        borderWidth: 1,
        fill: true,
        tension: 0.3
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false,
                min: Math.min(...weights) - 5,
                max: Math.max(...weights) + 5
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
};

// 3. Create the chart
const progressLineChart = new Chart(ctx, config);
