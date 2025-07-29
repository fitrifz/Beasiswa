<?php define("IPK", 3.4); // Ganti ke 2.9 untuk testing ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Pendaftaran Beasiswa</title>
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
  </style>
</head>
<body>

  <!-- Navbar manual tetap -->
  <div class="navbar">
    <a href="pilihan.php">Pilihan Beasiswa</a>
    <a href="index.php" class="active">Daftar</a>
    <a href="hasil.php">Hasil</a>
  </div>

  <!-- Form Bootstrap -->
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow mb-5">
          <div class="card-header text-center bg-primary text-white">
            <h4 class="mb-0">DAFTAR BEASISWA</h4>
          </div>
          <div class="card-body">
            <form action="simpan.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama" class="form-label">Masukkan Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label">Masukkan Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="hp" class="form-label">Nomor HP</label>
                <input type="number" name="hp" id="hp" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="semester" class="form-label">Semester saat ini</label>
                <select name="semester" id="semester" class="form-select" required>
                  <option value="" disabled selected>Pilih</option>
                  <?php for ($i = 1; $i <= 8; $i++) echo "<option value='$i'>$i</option>"; ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="ipk" class="form-label">IPK terakhir</label>
                <input type="text" name="ipk" id="ipk" class="form-control bg-secondary-subtle" value="<?= IPK ?>" readonly>
              </div>

              <div class="mb-3">
                <label for="beasiswa" class="form-label">Pilihan Beasiswa</label>
                <select name="beasiswa" id="beasiswa" class="form-select" <?= IPK < 3 ? 'disabled' : '' ?> required>
                  <option value="" disabled selected>Pilihan Beasiswa</option>
                  <option value="Akademik">Akademik</option>
                  <option value="Non-Akademik">Non-Akademik</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="berkas" class="form-label">Upload Berkas Syarat</label>
                <input type="file" name="berkas" id="berkas" class="form-control" accept=".pdf,.jpg,.zip" <?= IPK < 3 ? 'disabled' : '' ?> required>
              </div>

              <div class="d-flex justify-content-between">
                <input type="submit" name="daftar" value="Daftar" class="btn btn-success" <?= IPK < 3 ? 'disabled' : '' ?>>
                <input type="reset" value="Batal" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
