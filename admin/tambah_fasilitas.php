      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!-- /.row -->
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="card-title">Tambah Fasilitas Lab</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form id="quickForm" name="kirim" method="POST" action=''>
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="exampleSelectBorderWidth2">Pilih Ruangan</label>
                                      <select name="ruang" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                          <?php
                                            $kode_sql = "SELECT * FROM ruang";
                                            $sambung = mysqli_query($koneksi, $kode_sql);
                                            if (mysqli_num_rows($sambung)) {
                                                while ($row = mysqli_fetch_array($sambung)) { ?>
                                                  <option value="<?php echo $row['ruang_id']; ?>"><?php echo $row['ruang_nama']; ?></option>
                                          <?php }
                                            }
                                            ?>

                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Nama Barang</label>
                                      <input type="text" name="nama_barang" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Deskripsi">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Jumlah</label>
                                      <input type="number" name="jumlah" class="form-control" id="exampleInputPassword1" placeholder="Kapasitas Ruang">
                                  </div>
                                  <div class="form-group">
                                      <label>Keterangan</label>
                                      <textarea class="form-control" name="keterangan" rows="3" placeholder="Enter ..."></textarea>
                                  </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                                  <button type="submit" name="kirim" class="btn btn-primary toastsDefaultDanger toastsDefaultSuccess">Kirim</button>
                              </div>
                          </form>
                          <!-- /.card-body -->
                          <?php

                            if (isset($_POST['kirim'])) {
                                $ruang = $_POST['ruang'];
                                $nama_barang = $_POST['nama_barang'];
                                $jumlah = $_POST['jumlah'];
                                $keterangan = $_POST['keterangan'];
                                $sql = "INSERT INTO asset VALUES(NULL, '$ruang', '$nama_barang', '$jumlah', '$keterangan')";

                                $masuk = mysqli_query($koneksi, $sql);

                                if ($masuk === true) { ?>
                                  <script>
                                      alert("berhasil input data");
                                  </script>
                              <?php } else { ?>
                                  <script>
                                      alert("gagal input data");
                                  </script>
                          <?php }
                            }

                            ?>
                      </div>
                      <!-- /.card -->
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->