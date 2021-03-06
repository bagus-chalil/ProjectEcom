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
                        <h2><b> Form Edit Event Online</b></h2>
                      </div>
                      <div class="card-body">
                      <form action="<?= base_url('Event/edit_event2/'.$data_edit->id) ?>" method="POST" enctype="multipart/form-data"> 
                          <div class="form-group">
                            <label for="Nama">Kode Event*</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $data_edit->id ?>">
                            <input type="text" readonly class="form-control" name="event_id" value="<?= $data_edit->event_id ?>">
                            <?= form_error('judul');?>
                          </div>
                          <div class="form-group">
                            <label for="Nama">Nama Event*</label>
                            <input type="text" class="form-control" name="judul" value="<?= $data_edit->judul ?>">
                            <?= form_error('judul');?>
                          </div>
                          <label for="kategori">Masukkan Kategori Event</label>
                          <select name="category_id" id="category_id" class="form-control" required>
                            <optgroup label="Terpilih">
                                    <option value="<?= $data_edit->category_id ?>"><?= $data_edit->categories ?></option>
                              </optgroup>
                              <optgroup label="Masukkan Pilihan">
                                    <?php foreach ($kategori as $kt): ?>
                                        <option value="<?= $kt->id ?>"><?= $kt->categories ?></option>
                                    <?php endforeach ?>
                              </optgroup>
                          </select> 
                          <div class="form-group">
                            <label for="Nama">Author*</label>
                            <input type="text" readonly class="form-control" value="<?=$data_edit->author; ?>">
                            <input type="hidden" readonly class="form-control" name="author" value="<?=$data_edit->author; ?>">
                          </div> 
                          
                          <div class="form-group">
                            <label for="Deskripsi">Deskripsi Produk</label>
                            <textarea name="deskripsi" style="height: 250px;" class="form-control"><?= $data_edit->deskripsi ?></textarea>
                          </div>   
                          <div class="form-group">
                            <label for="Harga">Harga*</label>
                            <input type="number" step="0.01" name="harga" value="<?= $data_edit->harga ?>" class="form-control">
                            <?= form_error('harga_produk');?>
                          </div>       
                          <div class="form-group">
                          <label for="keberangkatan">Masukkan Jumlah Kuota Event</label>
                          <div class="input-group-prepend" >
                                <select name="kuota" class="form-control" style="width: 20%;">
                                <optgroup label="Terpilih">
                                        <option value="<?= $data_edit->kuota ?>"><?= $data_edit->kuota ?></option>
                              </optgroup>
                              <optgroup>
                                <?php for ($i=1; $i<= 100 ;$i++){ ?>
                                  <option value="<?= $i ?>"><?= $i ?> Orang</option>
                                  <?php } ?>
                              </optgroup>
                                </select>
                          </div>
                          </div>
                          <div class="form-group">
                            <label for="Tanggal">Tanggal Pelaksanaan*</label>
                            <?php $date = date_create($data_edit->tgl_event); ?>
                            <input type="datetime-local" class="form-control" name="tgl_event" min="<?= date_format($date,'Y-m-d\TH:i') ?>" value="<?= date_format($date,'Y-m-d\TH:i') ?>" required>
                          </div> 
                          <div class="form-group row">
                            <div class="col-sm-2 mb-3">Thumbnail*</div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/event/thumbs/') .$data_edit->thumbs;  ?>" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" name="thumbs" class="custom-file-input" name="thumbs" id="thumbs" required>
                                            <label for="image" class="custom-file-label">Pilih Thumbnail</label>
                                          </div>
                                          <input type="hidden" value="<?= $data_edit->thumbs; ?>" name="thumbs1" id="thumbs1">
                                    </div>
                                </div>
                            </div>
                        </div> 
                          <div class="form-group row">
                            <div class="col-sm-2 mb-3">Gambar*</div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/event/') .$data_edit->gambar;  ?>" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" name="gambar" class="custom-file-input" name="gambar" id="gambar" required>
                                            <label for="image" class="custom-file-label">Pilih Gambar</label>
                                          </div>
                                          <input type="hidden" value="<?= $data_edit->gambar; ?>" name="gambar1" id="gambar1">
                                    </div>
                                </div>
                            </div>
                        </div> 
                          <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Upload Event</button>
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

