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
                      <h2><b> Form Tambah Testimoni</b></h2>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('testimoni/tambah') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="Nama">Nama Penyelengara</label>
                          <input type="text" class="form-control" name="penyelenggara">
                          <?= form_error('penyelenggara'); ?>
                        </div>


                        <div class="form-group">
                          <label for="Deskripsi">Deskripsi </label>
                          <small class="text-danger">Max 200 Huruf</small>
                          <textarea name="desk" style="height: 250px;" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                          <label for="Gambar">Gambar*</label>
                          <input type="file" name="gambar" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Upload Testimoni</button>
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