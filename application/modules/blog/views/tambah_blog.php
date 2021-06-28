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
                      <h2><b> Form Tambah Blog</b></h2>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('blog/tambah_blog') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="Nama">Judul</label>
                          <input type="text" class="form-control" name="judul">
                          <?= form_error('judul'); ?>
                        </div>

                        <div class="form-group">
                          <label for="kategori">Pilih Tags</label>
                          <select name="tag_id" id="tag_id" class="form-control chosen" required>
                            <optgroup label="Masukkan Pilihan">
                              <option value="">Pilih</option>
                              <?php foreach ($tag as $t) : ?>
                                <option value="<?= $t['id']; ?>"><?= $t['tags_name']; ?></option>
                              <?php endforeach ?>
                            </optgroup>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="Nama">Author*</label>
                          <input type="text" readonly class="form-control" name="author" value="<?= $user['name']; ?>">
                        </div>
                        <div class="form-group">
                          <label for="Tanggal">Tanggal Pelaksanaan*</label>
                          <input type="datetime-local" class="form-control" name="tgl_blog" min="<?= date('Y-m-d\TH:1') ?>" value="<?= date('Y-m-d\TH:i') ?>" required>
                        </div>
                        <div class="form-group">
                          <label for="Deskripsi">Deskripsi Blog</label>
                          <textarea name="deskripsi" style="height: 250px;" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                          <label for="Gambar">Gambar*</label>
                          <input type="file" name="gambar" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Upload Blog</button>
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