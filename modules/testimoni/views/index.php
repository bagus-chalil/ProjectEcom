            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <!-- *************************************************************** -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <!-- multi-column ordering -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">

                      <?= $this->session->flashdata('message'); ?>

                      <h4 class="card-title">Tabel Testimonials</h4>
                      <h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and
                        then a secondary column if the data in the first column is identical), through the
                        <code> columns.orderData</code> option.
                      </h6>
                      <div class="table-responsive">

                        <!-- <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" data-toggle="modal" data-target="#role-modal"> <i class="fa fa-plus"></i> Add New User</a> -->

                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                          <thead class="bg-primary text-white text-center">
                            <tr>
                              <th>No</th>
                              <th>Nama Penyelenggara</th>
                              <th>Deskripsi</th>
                              <th>Gambar</th>

                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <?php $i = 1; ?>
                            <?php foreach ($alltesti as $t) : ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $t['penyelenggara']; ?></td>
                                <td><?= word_limiter($t['desk'], 2);  ?></td>

                                <td>
                                  <img src="<?= base_url('assets/images/testimoni/' . $t['gambar']); ?>" class="img-thumbnail" width="20%">
                                </td>

                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- ============================================================== -->
              <!-- End PAge Content -->
              <!-- ============================================================== -->
            </div>
            <!-- Signup modal content -->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->