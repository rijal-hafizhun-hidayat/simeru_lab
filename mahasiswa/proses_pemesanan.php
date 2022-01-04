<?php

include_once("../function/koneksi.php");

$waktu_mulai = $_POST["waktu_mulai"];
$waktu_selesai = $_POST["waktu_selesai"];
$tanggal_book = $_POST["tanggal_book"];
$ruang_id = $_POST["ruang_id"];
$keperluan = $_POST["keperluan"];

$query = mysqli_query($koneksi, "INSERT INTO booking (book_id, book_waktuMulai, book_waktuSelesai, book_tanggal, id_user, ruang_id, keperluan)
											VALUES (NULL, '$waktu_mulai', '$waktu_selesai', '$tanggal_book', '$id_user', '$ruang_id', '$keperluan')");

if ($query) {
    mysqli_query($koneksi, "UPDATE ruang SET status='off' WHERE ruang_id='$ruang_id'");
    header("location: mahasiswa/dashbord.php");
} else {
    echo "gagal";
}
