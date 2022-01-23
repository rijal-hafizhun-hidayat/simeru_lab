<?php

session_start();
include_once("../function/koneksi.php");

$waktu_mulai = $_POST["waktu_mulai"];
$waktu_selesai = $_POST["waktu_selesai"];
$tanggal_book = $_POST["tanggal_book"];
$ruang_id = $_POST["ruang_id"];
$keperluan = $_POST["keperluan"];
$id_user = $_SESSION['user_id'];

$query = mysqli_query($koneksi, "INSERT INTO booking (book_id, book_waktuMulai, book_waktuSelesai, book_tanggal, user_id, ruang_id, keperluan)
											VALUES (NULL, '$waktu_mulai', '$waktu_selesai', '$tanggal_book', '$id_user', '$ruang_id', '$keperluan')");

if ($query) {
    header("location:dashboard.php");
} else {
    echo "gagal";
}
