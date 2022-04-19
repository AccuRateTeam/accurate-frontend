<div class="container">
    <main class="d-flex flex-column h-100 bg-white">
        <form id="createEventForm" class="h-100">
            <div class="my-3 text-center bg-theme rounded overflow-hidden">
                <div class="py-5 bg-overlay">
                    <h1 class="m-0 text-white">Spieler Übersicht</h1>
                    <h2 class="m-0 text-white">Diagramm der einzelnen Treffer</h2>
                </div>
                <div style="width:500px; height: 500px">
                    <canvas id="myChart" width="100" height="100"></canvas>
                </div>
            </div>

        </form>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

window.onload = function () {
    
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Treffer',
                data: [12, 19, 3, 5, 2, 3],
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
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
</script>


