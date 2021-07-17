            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <!-- *************************************************************** -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <!-- multi-column ordering -->
              <div class="row">
                <div class="col-md-7">
                  <div class="card">
                    <div class="card-body">

                      <?= $this->session->flashdata('message'); ?>

                      <h4 class="card-title">Tabel Daftar Menu</h4>
                      <h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and
                        then a secondary column if the data in the first column is identical), through the
                        <code> columns.orderData</code> option.
                      </h6>
                      <div class="table-responsive">

                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                          <thead class="text-center">
                            <tr>
                              <th>No</th>
                              <th>Nama Tag</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($tag as $t) { ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $t->tags_name ?></td>
                                <td>
                                  <a class="btn waves-effect waves-light btn-success text-white" data-toggle="modal" data-target="#edit-modal<?php echo $t->id; ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                  <a href="<?= base_url('kategori/hapus_tag/' . $t->id) ?>" class="btn btn-small btn-danger">Hapus</a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="card">
                    <div class="card-header">Form Tambah Tag</div>
                    <div class="card-body">
                      <form action="<?= base_url('kategori/tambah_tag') ?>" method="post">
                        <div class="form-group">
                          <label for="">Nama Tag</label>
                          <input type="text" class="form-control" name="tags_name" placeholder="Nama Tag">
                          <br>
                          <button type="submit" class="btn btn-block btn-primary">Selesai</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Signup modal content -->
              <!-- Edit modal content -->
              <?php
              $i = 0;
              foreach ($tag as $t) : $i++; ?>
                <div id="edit-modal<?php echo $t->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-body">
                        <div class="text-center mt-2 mb-4">
                          <a href="index.html" class="text-success">
                            <span><img class="mr-2" src="<?= base_url(); ?>assets/images/logo1.png" alt="" height="50"></span>
                          </a>
                          <h5 class="mt-3">Edit Data Tag</h5>
                        </div>

                        <form class="pl-3 pr-3" action="<?= base_url('kategori/edit_tag'); ?>" method="post">

                          <div class="form-group">
                            <label for="menuname">Tag Name</label>
                            <input class="form-control" type="hidden" id="id" value="<?= $t->id; ?>" name="id">
                            <input class="form-control" type="text" id="categories" value="<?= $t->tags_name; ?>" name="tags_name" required>
                          </div>
                      </div>
                      <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <?php endforeach; ?>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->