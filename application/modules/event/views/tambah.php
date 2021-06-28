            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <!-- *************************************************************** -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <!-- multi-column ordering -->
              <div class="row">
                <div class="col-md-10">
                  <!-- Form -->
                  <div class="card mb-3">
                    <div class="card-header">
                      <h2><b> Form Tambah Event Online</b></h2>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('Event') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="Nama">Kode Event*</label>
                          <input type="text" class="form-control" name="event_id">
                          <?= form_error('judul'); ?>
                        </div>
                        <div class="form-group">
                          <label for="Nama">Nama Event*</label>
                          <input type="text" class="form-control" name="judul">
                          <?= form_error('judul'); ?>
                        </div>
                        <label for="kategori">Masukkan Kategori Event</label>
                        <select name="category_id" id="category_id" class="form-control chosen" required>
                          <optgroup label="Masukkan Pilihan">
                            <?php foreach ($kategori as $kt) : ?>
                              <option value="<?= $kt->id ?>"><?= $kt->categories ?></option>
                            <?php endforeach ?>
                          </optgroup>
                        </select>
                        <div class="form-group">
                          <label for="Nama">Author*</label>
                          <input type="hidden" readonly class="form-control" name="author" value="<?= $user['id']; ?>">
                          <input type="text" readonly class="form-control" name="sdsds" value="<?= $user['name']; ?>">
                         
                        </div>

                        <div class="form-group">
                          <label for="Deskripsi">Deskripsi Produk</label>
                          <textarea name="deskripsi" style="height: 250px;" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Harga">Harga*</label>
                          <input type="number" step="0.01" name="harga" class="form-control">
                          <?= form_error('harga_produk'); ?>
                        </div>
                        <div class="form-group">
                          <label for="keberangkatan">Masukkan Jumlah Kuota Event</label>
                          <div class="input-group-prepend">
                            <select name="kuota" class="form-control" style="width: 20%;">
                              <?php for ($i = 1; $i <= 100; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?> Orang</option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="Tanggal">Tanggal Pelaksanaan*</label>
                          <input type="datetime-local" class="form-control" name="tgl_event" min="<?= date('Y-m-d\TH:1') ?>" value="<?= date('Y-m-d\TH:i') ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="Gambar">Gambar*</label>
                          <input type="file" name="gambar" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Upload Event</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ============================================================== -->
              <!-- End PAge Content -->
              <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->