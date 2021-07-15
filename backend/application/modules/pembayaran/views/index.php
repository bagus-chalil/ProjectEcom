            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- multi-column ordering -->
                <div class="row">
                <div class="card mb-3">
                <?= $this->session->flashdata('message'); ?>
					<div class="card-header">
					</div>
					<div class="card-body">
                    <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmlbayar as $jb) {
                                                    echo $jb['jml'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Total Transaksi</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-warning text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmlpending as $jp) {
                                                    echo $jp['statusp'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Belum terverifikasi</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmlsuccess as $js) {
                                                    echo $js['statuss'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Transaksi Success</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmlfailed as $jf) {
                                                    echo $jf['statusf'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Transaksi Gagal</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>
					<!-- [ stiped-table ] start -->
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                            <h2>Tabel Event</h2>
                                <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span>
                            </div>
                            <div class="card-body table-border-style">
                                <div class="table-responsive">
                                <table id="default_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Order ID</th>
                                        <th class="text-center">Event ID</th>
                                        <th class="text-center">Judul</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Payment Type</th>
                                        <th class="text-center">Waktu transaksi</th>
                                        <th class="text-center">Bank</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($pembayaran as $p){ ?>
                                    <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $p['order_id']; ?></td>
                                        <td class="text-center"><?= $p['event']; ?></td>
                                        <td ><?= $p['judul']; ?></td>
                                        <td class="text-center"><?= $p['nama']; ?></td>
                                        <td class="text-center"><?= $p['gross_amount']; ?></td>
                                        <td class="text-center"><?= $p['payment_type']; ?></td>
                                        <td class="text-center"><?= $p['transaction_time']; ?></td>
                                        <td class="text-center"><?= $p['bank']; ?></td>
                                        <td class="text-center">
                                        <?php if ($p['transaction_status'] == 'pending') { ?>
                                            <span class="badge rounded-pill bg-warning text-white">Pending</span>
                                        <?php } else if ($p['transaction_status'] == 'failure' or $p['transaction_status'] == 'expire'){ ?>
                                            <span class="badge rounded-pill bg-danger text-dark">Failed</span>
                                        <?php } else if ($p['transaction_status'] == 'settlement' or $p['transaction_status'] == 'success' ){ ?>
                                            <span class="badge rounded-pill bg-success text-dark">Success</span>
                                        <?php }else { ?>
                                        <?= $p['transaction_status']; ?>
                                            <span class="badge rounded-pill bg-success text-dark">Success</span>
                                        <?php } ?>
                                        </td>
                                        <td class="text-center">
                                        <?php if ($p['transaction_status'] == 'pending') { ?>
                                            <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('transaction/verifikasi/' .$p['id']) ?>"> <i class="fa fa-pencil-alt"></i> Verifikasi</a>
                                        <?php } else if ($p['transaction_status'] == 'failure' or $p['transaction_status'] == 'expire'){ ?>
                                            
                                        <?php } else if ($p['transaction_status'] == 'settlement' or $p['transaction_status'] == 'success' ){ ?>
                                            
                                        <?php }else { ?>
                                        <?= $p['transaction_status']; ?>
                                            
                                        <?php } ?>
                                        <a href="<?= base_url('Pembayaran/hapus/pembayaran/' .$p['id']) ?>" class="btn btn-small btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- [ stiped-table ] end -->
			</div>
        </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->