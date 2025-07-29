<?php
include 'koneksi.php';

if (isset($_POST['daftar'])) {
    $nama      = $_POST['nama'];
    $email     = $_POST['email'];
    $hp        = $_POST['hp'];
    $semester  = $_POST['semester'];
    $ipk       = $_POST['ipk'];
    $beasiswa  = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : '';
    $status    = "Menunggu Verifikasi";

    // Validasi IPK minimum
    if ($ipk < 3) {
        echo "<script>alert('Maaf, IPK Anda belum memenuhi syarat untuk mendaftar beasiswa.'); window.location='index.php';</script>";
        exit;
    }

    // Upload file
    $berkas = $_FILES['berkas']['name'];
    $tmp    = $_FILES['berkas']['tmp_name'];

    $upload_dir = "uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $nama_file_baru = uniqid() . "_" . basename($berkas);
    $path = $upload_dir . $nama_file_baru;

    if (move_uploaded_file($tmp, $path)) {
        // Simpan ke database
        $stmt = $koneksi->prepare("INSERT INTO pendaftaran (nama, email, hp, semester, ipk, beasiswa, berkas, status_ajuan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdsss", $nama, $email, $hp, $semester, $ipk, $beasiswa, $nama_file_baru, $status);
        $stmt->execute();

        echo "<script>alert('Pendaftaran berhasil!'); window.location='hasil.php';</script>";
    } else {
        echo "<script>alert('Upload berkas gagal.'); window.location='index.php';</script>";
    }
} else {
    echo "<script>window.location='index.php';</script>";
}
?>
