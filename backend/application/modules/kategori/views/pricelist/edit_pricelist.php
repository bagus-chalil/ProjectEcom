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
                      <h2><b> Form Edit Price List</b></h2>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('kategori/pricelist/edit_pricelist') ?>" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                          <label for="kategori">Name Plan</label>
                          <input type="hidden" name="id" value="<?= $price_id->id ?>">
                          <select name="nameplan" id="tag_id" class="form-control chosen" required>
                            <optgroup label="Masukkan Pilihan">
                              <option value="">Pilih</option>
                              <?php foreach ($plan as $pl) : ?>
                                <?php if ($pl == $price_id->nameplan) : ?>
                                  <option value="<?= $pl; ?>" selected><?= $pl; ?></option>
                                <?php else : ?>
                                  <option value="<?= $pl; ?>"><?= $pl; ?></option>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </optgroup>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="Nama">Color</label>
                          <input type="color" class="form-control" name="colorplan" value="<?= $price_id->colorplan ?>">
                        </div>
                        <div class="form-group">
                          <label for="Nama">Harga</label>
                          <input type="number" class="form-control" name="harga" value="<?= $price_id->harga ?>">

                        </div>
                        <div class="form-group">
                          <label for="Deskripsi">Offer</label>
                          <textarea name="offer" id="deskripsi" style="height: 250px;" class="form-control"><?= $price_id->offer ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Deskripsi">Not Offer</label>
                          <textarea name="notoffer" id="deskripsi2" style="height: 250px;" class="form-control"><?= $price_id->not_offer ?></textarea>
                        </div>


                        <div class="row mb-3">
                          <div class="col-sm-3">
                            <img src="<?= base_url('assets/images/pricelist/') . $price_id->gambar;  ?>" class="img-thumbnail" alt="">
                          </div>
                          <div class="col-sm-9 mt-5">
                            <div class="custom-file">
                              <input type="file" name="gambar" class="custom-file-input" id="gambar">
                              <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Price List</button>
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