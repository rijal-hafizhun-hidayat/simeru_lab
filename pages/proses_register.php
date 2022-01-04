<?php

include_once("../function/koneksi.php");
include_once("../function/helper.php");

$user_level = "customer";
$status = "on";
$user_email = $_POST['user_email'];
$user_nama = $_POST['user_nama'];
$user_username = $_POST['user_username'];
$user_password = $_POST['user_password'];
$re_password = $_POST['re_password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE user_email='$user_email'");

if (empty($user_nama) || empty($user_email) || empty($user_password)) {
	header("location: register.php?notif=kosong");
} elseif ($user_password != $re_password) {
	header("location: register.php?notif=tidak_sama");
} elseif (mysqli_num_rows($query) == 1) {
	header("location: register.php?notif=sudah_terdaftar");
} else {
	$user_password = md5($user_password);
	mysqli_query($koneksi, "INSERT INTO user (user_level, user_email, user_nama, user_username, user_password, user_status)
										VALUES ('$user_level', '$user_email', '$user_nama', '$user_username', '$user_password', '$status')");

	header("location: ../index.php");
}
