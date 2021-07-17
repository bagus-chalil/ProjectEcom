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

                      <h4 class="card-title">Tabel Role Users</h4>
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
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Foto</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody class="text-center">
                            <?php $i = 1; ?>
                            <?php foreach ($getuser as $u) : ?>
                              <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $u['name']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td>
                                  <?php if ($u['role_id'] == 1) { ?>
                                    <span class="badge bg-secondary text-white">Admin</span>

                                  <?php } else { ?>

                                    <span class="badge bg-primary text-white">Member</span>

                                  <?php } ?>
                                </td>
                                <td> <?php if ($u['is_active'] == 1) { ?>
                                    <span class="badge rounded-pill bg-success text-white">Active</span>

                                  <?php } else { ?>

                                    <span class="badge rounded-pill bg-warning text-dark">Not Active</span>

                                  <?php } ?>
                                </td>
                                <td>
                                  <img src="<?= base_url('assets/images/users/' . $u['image']); ?>" class="img-thumbnail" width="30%">
                                </td>
                                <td class=" text-center">
                                  <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('admin/datapengguna/edit_pengguna/' . $u['id']) ?>"> <i class="fa fa-edit"></i> Edit</a>
                                  <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('admin/datapengguna/hapus_pengguna/' . $u['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
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