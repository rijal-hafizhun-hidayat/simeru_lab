      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>

                  <p>Total Ruangan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-bookmark"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Ruangan Terpakai</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Booking</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">ID Ruang</th>
                        <th scope="col">Waktu Mulai</th>
                        <th scope="col">Waktu Selesai</th>
                        <th scope="col">Tanggal Booking</th>
                        <th class='kiri'>Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <?php
                    $no = 1;
                    $list_ruang = mysqli_query($koneksi, "SELECT * FROM booking");
                    if (mysqli_num_rows($list_ruang)) {
                      while ($row = mysqli_fetch_array($list_ruang)) {
                        $status = $row['status'];
                        //untuk menampilkan list data
                    ?>
                        <tbody>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row['book_id'] ?></td>
                            <td><?php echo $row['ruang_id'] ?></td>
                            <td><?php echo $row['book_waktuMulai'] ?></td>
                            <td><?php echo $row['book_waktuSelesai'] ?></td>
                            <td><?php echo $row['book_tanggal'] ?></td>
                            <td><?php echo $arrayStatusPesanan[$status] ?></td>
                            <td>
                              <a href="index.php?page=detail_pesanan&id=<?php echo $row['book_id']; ?>"><button type="button" class="btn btn-info">Detail Pesanan</button></a>
                              <a href="dashboard.php?page=update_status&book_id=<?php echo $row['book_id']; ?>"><button type="button" class="btn btn-info">Update Pesanan</button></a>
                            </td>
                          </tr>
                        </tbody>
                    <?php $no++;
                      }
                    } elseif (mysqli_num_rows($list_ruang) <= 0) {
                      echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                      echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                      echo "<p><center>Data Masih Kosong</center></p>";
                      echo "</div>";
                      echo "</div>";
                    }
                    ?>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->