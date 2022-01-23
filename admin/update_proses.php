<?php
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$book_id = $_GET['book_id'];
$ruang_id = $_GET['ruang_id'];
$status = $_POST["status"];

if ($status == 0) {
    mysqli_query($koneksi, "UPDATE booking SET status_book='$status' WHERE book_id='$book_id'");
} else if ($status == 1) {
    mysqli_query($koneksi, "UPDATE booking SET status_book='$status' WHERE book_id='$book_id'");
    mysqli_query($koneksi, "UPDATE ruang SET status_ruang='penuh' WHERE ruang_id='$ruang_id'");
} else if ($status == 2) {
    mysqli_query($koneksi, "UPDATE booking SET status_book='$status' WHERE book_id='$book_id'");
}

header("location: dashboard.php");
