<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content">
    <div class="container mt-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>🎬 Movie Earnings Report (BDT)</h3>
        <div class="btn-group">
          <button class="btn btn-outline-primary" onclick="loadEarnings('today')">Today</button>
          <button class="btn btn-outline-success" onclick="loadEarnings('weekly')">Weekly</button>
          <button class="btn btn-outline-info" onclick="loadEarnings('monthly')">Monthly</button>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">🎥 Earnings by Movie (Pie)</div>
            <div class="card-body chart-container">
              <canvas id="pieChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">📆 Daily Earnings Trend</div>
            <div class="card-body chart-container">
              <canvas id="barChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">📋 Movie-wise Earning Details</div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0" id="earningsTable">
              <thead class="table-light">
                <tr>
                  <th>Movie</th>
                  <th>Total Earning (BDT)</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  let pieChart, barChart;

  async function loadEarnings(type) {
    const response = await fetch(`earnings_${type}.php`);
    const data = await response.json();

    const tableBody = document.querySelector('#earningsTable tbody');
    tableBody.innerHTML = '';

    let labels = [], values = [];

    data.forEach(row => {
      labels.push(row.movie);
      values.push(parseInt(row.earning));

      tableBody.innerHTML += `
        <tr>
          <td class="movie-cell">
            <img src="../../${row.image}" alt="${row.movie}" class="movie-poster">
            ${row.movie}
          </td>
          <td>${row.earning}</td>
        </tr>
      `;
    });

    if (pieChart) pieChart.destroy();
    if (barChart) barChart.destroy();

    pieChart = new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      data: {
        labels,
        datasets: [{
          data: values,
          backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545', '#17a2b8', '#6f42c1']
        }]
      },
      options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
    });

    barChart = new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels,
        datasets: [{
          label: 'Earnings (BDT)',
          data: values,
          backgroundColor: '#0d6efd'
        }]
      },
      options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
  }

  loadEarnings('today');
</script>

<style>
  body {
    background-color: #f4f6f8;
    font-family: 'Segoe UI', sans-serif;
  }
  .card {
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    border: none;
    border-radius: 12px;
  }
  .card-header {
    font-weight: 600;
    background: transparent;
  }
  .chart-container {
    position: relative;
    height: 320px;
  }
  h3 {
    font-weight: 700;
  }
  .movie-poster {
    width: 40px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 10px;
  }
  .movie-cell {
    display: flex;
    align-items: center;
  }
</style>
