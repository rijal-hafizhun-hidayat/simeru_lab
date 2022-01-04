<?php

include_once("../function/koneksi.php");
include_once("../function/helper.php");

$user_username = $_POST['user_username'];
$user_password = md5($_POST['user_password']);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_username='$user_username' AND user_password='$user_password' AND user_status='on'");

if (mysqli_num_rows($query) == 0) {
	header("location: ../index.php?notif=salah");
} else {
	$row = mysqli_fetch_assoc($query);
	session_start();
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['user_nama'] = $row['user_nama'];
	$_SESSION['user_level'] = $row['user_level'];

	if ($row['user_level'] == "admin") {
		header("location: ../admin/dashboard.php");
	} elseif ($row['user_level'] == "customer") {
		header("location: ../mahasiswa/dashboard.php");
	}
}
