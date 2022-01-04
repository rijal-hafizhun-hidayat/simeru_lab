<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "simeru_lab";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal");
