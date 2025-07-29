<?php
include 'koneksi.php';
$data = $koneksi->query("SELECT * FROM pendaftaran ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #eaeaea;
            display: flex;
            justify-content: center;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .navbar a {
            margin: 0 20px;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .navbar a.active {
            background-color: #a4c7f5;
        }
        .table-container {
            background-color: white;
            box-shadow: 0 0 10px #ddd;
            border-radius: 8px;
            padding: 24px;
        }
        img.preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="navbar">
        <a href="pilihan.php">Pilihan Beasiswa</a>
        <a href="index.php">Daftar</a>
        <a href="hasil.php" class="active">Hasil</a>
    </div>

    <div class="container mb-4">
      <h2 class="text-center mb-4">Data Pendaftaran Beasiswa</h2>

      <?php
      // Query jumlah pendaftar per jenis beasiswa
      $q_akademik = $koneksi->query("SELECT COUNT(*) as total FROM pendaftaran WHERE beasiswa='Akademik'")->fetch_assoc();
      $q_nonakademik = $koneksi->query("SELECT COUNT(*) as total FROM pendaftaran WHERE beasiswa='Non-Akademik'")->fetch_assoc();
      $total_akademik = (int)$q_akademik['total'];
      $total_nonakademik = (int)$q_nonakademik['total'];
      ?>

      <!-- Grafik Bar Chart -->
      <div class="mx-auto mb-5" style="max-width: 600px;">
        <canvas id="beasiswaChart"></canvas>
      </div>
      <script>
        const ctx = document.getElementById('beasiswaChart').getContext('2d');
        const beasiswaChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Akademik', 'Non-Akademik'],
            datasets: [{
              label: 'Jumlah Pendaftar',
              data: [<?= $total_akademik ?>, <?= $total_nonakademik ?>],
              backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)'
              ],
              borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                display: false
              },
              title: {
                display: true,
                text: 'Grafik Jumlah Pendaftar per Jenis Beasiswa'
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                precision: 0
              }
            }
          }
        });
      </script>

      <div class="table-responsive table-container mt-4">
        <table class="table table-bordered align-middle text-center">
          <thead class="table-light">
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>No HP</th>
              <th>Semester</th>
              <th>IPK</th>
              <th>Beasiswa</th>
              <th>Berkas</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($d = $data->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($d['nama']) ?></td>
                <td><?= htmlspecialchars($d['email']) ?></td>
                <td><?= htmlspecialchars($d['hp']) ?></td>
                <td><?= $d['semester'] ?></td>
                <td><?= $d['ipk'] ?></td>
                <td><?= htmlspecialchars($d['beasiswa']) ?></td>
                <td>
                  <?php 
                    $file = 'uploads/' . $d['berkas'];
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    if (!empty($d['berkas']) && in_array($ext, $image_extensions)):
                  ?>
                    <img src="<?= $file ?>" class="preview" alt="Gambar Berkas">
                  <?php elseif (!empty($d['berkas'])): ?>
                    <a href="<?= $file ?>" target="_blank" class="btn btn-sm btn-primary">Download</a>
                  <?php else: ?>
                    <span class="text-muted">Tidak ada</span>
                  <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($d['status_ajuan']) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
