<?php
session_start();
include_once("../function/koneksi.php");
include_once("../function/helper.php");

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$user_nama = isset($_SESSION['user_nama']) ? $_SESSION['user_nama'] : false;
$user_level = isset($_SESSION['user_level']) ? $_SESSION['user_level'] : false;

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>simeru | mahasiswa</title>
</head>

<body class="bg-img">
    <div class="container">
        <div class="img text-center">
            <img src="gambar/Logo-UAD.png" alt="">
        </div>
        <div class="row justify-content-center shadow-lg">
            <div class="col-sm-9">
                <?php
                echo "Halo, $user_nama"
                ?>
                <a href="logout.php">Logout</a><br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Ruangan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <?php
                    $list_ruang = mysqli_query($koneksi, "SELECT * FROM ruang WHERE status='on'");
                    if (mysqli_num_rows($list_ruang)) {
                        while ($row = mysqli_fetch_array($list_ruang)) {
                            //untuk menampilkan list data
                    ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['ruang_nama'] ?></td>
                                    <td><?php echo $row['ruang_kapasitas'] ?></td>
                                    <td><?php echo $row['ruang_deskripsi'] ?></td>
                                    <td><?php echo $row['ruang_foto'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                </tr>
                            </tbody>
                    <?php }
                    }
                    ?>
                </table>
                <hr class="line-horizontal">
                <form method="POST" action="proses_pemesanan.php">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Pilih ruangan</label>
                        <select class="form-select" aria-label="Default select example" name="ruang_id">
                            <?php
                            $query = mysqli_query($koneksi, "SELECT ruang_id, ruang_nama FROM ruang WHERE status='on'");
                            while ($row = mysqli_fetch_assoc($query)) {
                                if ($ruang_id == $row['ruang_id']) {
                                    echo "<option value='$row[ruang_id]' selected='true'>$row[ruang_nama]</option>";
                                } else {
                                    echo "<option value='$row[ruang_id]'>$row[ruang_nama]</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tanggal Booking</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal_book">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Waktu Mulai</label>
                        <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="namaHelp" name="waktu_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Waktu Selesai</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" name="waktu_selesai">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">keperluan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keperluan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>