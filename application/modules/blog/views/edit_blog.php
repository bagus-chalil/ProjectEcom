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
                      <h2><b> Form Edit Blog</b></h2>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('blog/edit_blog') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="Nama">Judul</label>
                          <input type="hidden" class="form-control" name="id" value="<?= $edit_id->id ?>">
                          <input type="text" class="form-control" name="judul" value="<?= $edit_id->judul ?>">
                          <?= form_error('judul'); ?>
                        </div>
                        <label for="kategori">Pilih Tags</label>
                        <select name="tag_id" id="tag_id" class="form-control chosen" required>
                          <optgroup label="Terpilih">
                            <option value="<?= $edit_id->tag_id ?>"><?= $edit_id->tags_name ?></option>
                          </optgroup>
                          <optgroup label="Masukkan Pilihan">
                            <?php foreach ($tag as $t) : ?>
                              <option value="<?= $t->id ?>"><?= $t->tags_name ?></option>
                            <?php endforeach ?>
                          </optgroup>
                        </select>
                        <div class="form-group">
                          <label for="Nama">Author*</label>
                          <input type="text" readonly class="form-control" name="author" value="<?= $edit_id->author; ?>">
                        </div>

                        <div class="form-group">
                          <label for="Deskripsi">Deskripsi Blog</label>
                          <textarea name="deskripsi" style="height: 250px;" class="form-control"><?= $edit_id->deskripsi ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="Tanggal">Tanggal Pelaksanaan*</label>
                          <?php $date = date_create($edit_id->tgl_blog); ?>
                          <input type="datetime-local" class="form-control" name="tgl_blog" min="<?= date_format($date, 'Y-m-d\TH:i') ?>" value="<?= date_format($date, 'Y-m-d\TH:i') ?>" required>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-2 mb-3">Gambar*</div>
                          <div class="col-sm-12">
                            <div class="row">
                              <div class="col-sm-3">
                                <img src="<?= base_url('assets/images/blog/') . $edit_id->gambar;  ?>" class="img-thumbnail" alt="">
                              </div>
                              <div class="col-sm-9 mt-5">
                                <div class="custom-file">
                                  <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                  <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Update Blog</button>
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