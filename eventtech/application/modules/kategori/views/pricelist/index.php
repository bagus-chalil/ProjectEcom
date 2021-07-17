            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">
              <!-- *************************************************************** -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <!-- multi-column ordering -->
              <div class="row">
                <div class="col-md">
                  <div class="card">
                    <div class="card-body">

                      <?= $this->session->flashdata('message'); ?>

                      <h4 class="card-title">Tabel Price List</h4>
                      <h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and
                        then a secondary column if the data in the first column is identical), through the
                        <code> columns.orderData</code> option.
                      </h6>
                      <div class="table-responsive">

                        <a class="btn waves-effect waves-light btn-primary mb-3 mt-2 text-white" href="<?= base_url('kategori/pricelist/tambah_pricelist') ?>">
                          <i class="fa fa-plus mr-2"></i>Add New Price List</a>
                        <table id="multi_col_order" class="text-center table table-striped table-bordered display no-wrap" style="width:100%">
                          <thead class="text-center">
                            <tr>
                              <th>No</th>
                              <th>Nama Plan</th>
                              <th>Harga</th>
                              <th>Color</th>
                              <th>Offer</th>
                              <th>Not Offer</th>
                              <th>Gambar</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($getprice as $p) { ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td style="color: <?= $p['colorplan']; ?>">
                                  <b> <?php echo $p['nameplan'] ?></b>
                                </td>
                                <td>Rp. <?php echo $p['harga'] ?>K</td>
                                <td>

                                  <div style="height: 40px; width:40px; background : <?= $p['colorplan']; ?>">
                                  </div>


                                </td>
                                <td><?php echo word_limiter($p['offer'], 4); ?></td>
                                <td><?php
                                    if ($p['not_offer'] == null) {
                                      echo "<i>Tidak diisi</i>";
                                    } else {
                                      echo word_limiter($p['not_offer'], 4);
                                    } ?>
                                </td>
                                <td>
                                  <img src=" <?= base_url('assets/images/pricelist/' . $p['gambar']); ?>" class="img-thumbnail" alt="" width="80%">

                                </td>
                                <td>
                                  <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('kategori/pricelist/edit_id/' . $p['id']); ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                  <a href="<?= base_url('kategori/pricelist/hapus_pricelist/' . $p['id']); ?>" class="btn btn-small btn-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
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