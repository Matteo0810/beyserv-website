const ctx = document.getElementById('chart').getContext('2d');
const number = $('#charts').val();
const numbers = number.split(',');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Joueurs',
            data: numbers
        }],
        labels: ['0H', '1H', '2H', '3H', '4H','5H','6H','7H','8H','9H','10H','11H','12H','13H','14H','15H','16H','17H','18H','19H','20H','21H','22H','23H']
    },
    options: {
        legend: {
            display: false,
        },
        tooltips: {
            callbacks: {
                labelColor: (tooltipItem, chart) => {
                    return {
                        borderColor: '#f0ce0f',
                        backgroundColor: '#f0ce0f'
                    };
                },
                labelTextColor: (tooltipItem, chart) => {
                    return '#ffff';
                }
            }
        },
        elements: {
            point: {
                backgroundColor: '#f0ce0f',
            },
            line: {
                backgroundColor: '#f9de46',
                borderColor: '#eccf29',
            },
        }
    }
});