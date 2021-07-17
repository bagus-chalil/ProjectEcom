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
                                                <?php foreach ($get_jmlevent as $ev) {
                                                    echo $ev['jml'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Total Event</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmleventbln as $jb) {
                                                    echo $jb['jmlb'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Responded</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmltersedia as $jt) {
                                                    echo $jt['statuss'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Event Tersedia</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white">
                                                <?php foreach ($get_jmltutup as $jp) {
                                                    echo $jp['statusf'];
                                                }?>
                                                </h1>
                                                <h6 class="text-white">Event Tutup</h6>
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
                                        <th class="text-center">Event ID </th>
                                        <th class="text-center">Nama </th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Author</th>
                                        <th class="text-center">Date Created</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Kuota</th>
                                        <th class="text-center">Tanggal Event</th>
                                        <th class="text-center">Status</th>
                                        <th width="20%" class="text-center">Gambar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($list_event as $li){ ?>
                                    <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $li['event_id']; ?></td>
                                        <td ><?= $li['judul']; ?></td>
                                        <td class="text-center"><?= $li['category_id']; ?></td>
                                        <td class="text-center"><?= $li['deskripsi']; ?></td>
                                        <td class="text-center"><?= $li['author']; ?></td>
                                        <td class="text-center"><?= date('d-m-Y',$li['date_created']); ?></td>
                                        <td class="text-center"><?= $li['harga']; ?></td>
                                        <td class="text-center"><?= $li['kuota']; ?></td>
                                        <td class="text-center"><?= $li['tgl_event']; ?></td>
                                        <td class="text-center"><?= $li['status']; ?></td>
                                        <td >
                                            <img src="<?= base_url('assets/images/event/'. $li['gambar']); ?>" class="img-thumbnail" alt="">
                                            </a> 
                                        </td>
                                        <td class="text-center">
                                        <a class="btn waves-effect waves-light btn-success text-white" href="<?= base_url('Event/edit_event/' .$li['id']) ?>"> <i class="fa fa-pencil-alt"></i> Edit</a>
                                        <a href="<?= base_url('Event/hapus_event/' .$li['event_id']) ?>" class="btn btn-small btn-danger">Hapus</a>
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