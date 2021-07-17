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
                      <h2><b> Form Tambah Price List</b></h2>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('kategori/pricelist/tambah_pricelist') ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="kategori">Name Plan</label>
                          <select name="nameplan" id="tag_id" class="form-control chosen" required>
                            <optgroup label="Masukkan Pilihan">
                              <option value="">Pilih</option>
                              <option value="Free Plan">Free Plan</option>
                              <option value="Starter Plan">Starter Plan</option>
                              <option value="Business Plan">Business Plan</option>
                              <option value="Ultimate Plan">Ultimate Plan</option>

                            </optgroup>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="Nama">Color</label>
                          <input type="color" class="form-control" name="colorplan">
                        </div>
                        <div class="form-group">
                          <label for="Nama">Harga</label>
                          <input type="number" class="form-control" name="harga">
                          <?= form_error('harga'); ?>
                        </div>
                        <div class="form-group">
                          <label for="Deskripsi">Offer</label>
                          <textarea name="offer" id="deskripsi" style="height: 250px;" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Deskripsi">Not Offer</label>
                          <textarea name="notoffer" id="deskripsi2" style="height: 250px;" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                          <label for="Gambar">Gambar*</label>
                          <input type="file" name="gambar" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Upload Price List</button>
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