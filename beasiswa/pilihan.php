<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pilihan Beasiswa</title>
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
      margin-bottom: 30px;
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
  </style>
</head>
<body>

  <!-- Navbar tetap -->
  <div class="navbar">
    <a href="pilihan.php" class="active">Pilihan Beasiswa</a>
    <a href="index.php">Daftar</a>
    <a href="hasil.php">Hasil</a>
  </div>

  <!-- Konten Bootstrap -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <h4 class="text-center mb-4">Pilihan Beasiswa</h4>
            <ul class="list-unstyled">
              <li class="mb-3">
                <strong>Beasiswa Akademik:</strong> Untuk mahasiswa dengan IPK = 3,4 atau IPK 2,9 dan prestasi akademik tinggi.
              </li>
              <li>
                <strong>Beasiswa Non-Akademik:</strong> Untuk mahasiswa dengan prestasi di bidang non-akademik seperti olahraga, seni, dsb.
              </li>
            </ul>
            <div class="text-center mt-4">
              <a href="index.php" class="text-decoration-none text-primary">← Kembali ke Form</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
