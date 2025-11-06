document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('riskChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Normal', 'Prediabetes', 'Diabetes'],
                datasets: [{
                    data: [120, 4, 5],
                    backgroundColor: ['#2ECC71', '#F1C40F', '#E74C3C']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            font: { size: 14 },
                            color: '#333'
                        }
                    }
                }
            }
        });
    }
});
