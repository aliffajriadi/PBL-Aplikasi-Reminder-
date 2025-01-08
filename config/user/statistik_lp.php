<?php
include 'config/koneksi.php';

// mengambil data jumlah yang merupakan guru dari semua pengguna
$query = mysqli_query($conn, "SELECT is_guru, COUNT(*) as total FROM users GROUP BY is_guru");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);

// membuat variable yang mengisi jumlah murid dan jumlah data guru
$guru = isset($data[1]) ? $data[1]['total'] : 0;
$murid = isset($data[0]) ? $data[0]['total'] : 0; 


?>
<div class="container vh-100 mt-4 d-flex flex-column justify-content-center align-items-center " id="statistik-kami">
  <h1 class="mb-4 text-primary text-center">Statistik Pengguna Aplikasi Lifetivity</h1>
  <canvas id="donutChart" width="300" height="300"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // menyiakan data statistik
  const data = {
    labels: ['Murid = <?= $murid?>', 'Guru = <?= $guru?>'],
    datasets: [
      {
        label: 'Jumlah Pengguna',
        data: [<?= $murid?>, <?= $guru?>],
        backgroundColor: ['#4caf50', '#2196f3'],
        hoverBackgroundColor: ['#66bb6a', '#42a5f5'],
      },
    ],
  };

  // menyiapkan chart untuk statistik 
  const config = {
    type: 'doughnut',
    data: data,
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top', 
        },
        tooltip: {
          callbacks: {
            label: function (tooltipItem) {
              const dataset = tooltipItem.dataset;
              const currentValue =
                dataset.data[tooltipItem.dataIndex];
              return `${tooltipItem.label}: ${currentValue} pengguna`;
            },
          },
        },
      },
    },
  };

  // Render chart
  const ctx = document.getElementById('donutChart').getContext('2d');
  new Chart(ctx, config);
</script>
