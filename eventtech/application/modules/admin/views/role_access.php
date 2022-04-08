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

                            
                            <h2 class="card-title">Menu & Access</h2>
                            <h4 class="card-title mt-2 mb-2">Role : <?= $role['role'] ?></h4>
                                <h6 class="card-subtitle">On a per-column basis (i.e. order by a specific column and
                                    then a secondary column if the data in the first column is identical), through the
                                    <code> columns.orderData</code> option.</h6>
                                <!-- Table with outer spacing -->
                                <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>
                                                    <th>Menu</th>
                                                    <th>Access</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $i =1;?>
                                                <?php foreach ($menu as $m) :?>
                                                    <tr>
                                                        <td><?= $i++; ?></td>
                                                        <td><?= $m['menu']; ?></td>
                                                        <td class="text-center">
                                                            <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" 
                                                                    <?= check_access($role['id'], $m['id']); ?>
                                                                    data-role="<?= $role['id'];?>" data-menu="<?= $m['id']; ?>">
                                                                </div>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->