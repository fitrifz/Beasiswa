<?php

$koneksi = new mysqli("localhost", "root", "", "db_beasiswa");



if ($koneksi->connect_error) {

    die("Koneksi gagal: " . $koneksi->connect_error);

}

?>