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
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($kategori as $kt) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $kt->categories ?></td>
                                                    <td>
                                                        <a class="btn waves-effect waves-light btn-success text-white" data-toggle="modal" data-target="#edit-modal<?php echo $kt->id; ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                                        <a href="<?= base_url('Kategori/hapus_kategori/' . $kt->id) ?>" class="btn btn-small btn-danger">Hapus</a>
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
                            <div class="card-header">Form Tambah Kategori</div>
                            <div class="card-body">
                                <form action="<?= base_url('Kategori/tambah_kategori') ?>" method="post">
                                    <div class="form-group">
                                        <label for="">Nama Kategori</label>
                                        <input type="text" class="form-control" name="categories" placeholder="Nama Kategori">
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
                foreach ($kategori as $kt) : $i++; ?>
                    <div id="edit-modal<?php echo $kt->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="text-center mt-2 mb-4">
                                        <a href="index.html" class="text-success">
                                            <span><img class="mr-2" src="<?= base_url(); ?>assets/images/logo1.png" alt="" height="50"></span>
                                        </a>
                                        <h5 class="mt-3">Edit Data Kategori</h5>
                                    </div>

                                    <form class="pl-3 pr-3" action="<?= base_url('Kategori/edit_kategori'); ?>" method="post">

                                        <div class="form-group">
                                            <label for="menuname">Menu Name</label>
                                            <input class="form-control" type="hidden" id="id" value="<?= $kt->id; ?>" name="id">
                                            <input class="form-control" type="text" id="categories" value="<?= $kt->categories; ?>" name="categories" required>
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