<?php
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$book_id = $_GET['book_id'];
$status = $_POST["status"];

mysqli_query($koneksi, "UPDATE booking SET status='$status' WHERE book_id='$book_id'");
header("location: dashboard.php");
