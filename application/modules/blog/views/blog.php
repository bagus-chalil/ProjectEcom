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

                        <h4 class="card-title">Tabel Blog</h4>
                        <h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and
                          then a secondary column if the data in the first column is identical), through the
                          <code> columns.orderData</code> option.
                        </h6>
                        <div class="table-responsive">

                          <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white">
                            <i class="fa fa-plus"></i> Add New Blog</a>

                          <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead class="bg-dark text-white text-center">
                              <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Tanggal</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody class="text-center">
                              <?php $i = 1; ?>
                              <?php foreach ($list_blog as $li) : ?>
                                <tr>
                                  <td><?= $i++; ?></td>
                                  <td><?= $li['judul']; ?></td>
                                  <td><?= $li['tags_name']; ?></td>
                                  <td><?= $li['author']; ?></td>
                                  <td><?php
                                      $time = $li['tgl_blog'];
                                      echo format_indo($time);
                                      ?>
                                  </td>
                                  <td><?= word_limiter($li['deskripsi'], 4); ?></td>
                                  <td>
                                    <img src="<?= base_url('assets/images/blog/' . $li['gambar']); ?>" class="img-thumbnail" alt="">
                                    </a>
                                  </td>
                                  <td class="text-center">
                                    <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('Blog/blogid/' . $li['id']) ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                    <a class="btn waves-effect waves-light btn-danger text-white" href="<?= base_url('Blog/hapus_blog/' . $li['id']) ?>"> <i class="fa fa-trash"></i> Delete</a>
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