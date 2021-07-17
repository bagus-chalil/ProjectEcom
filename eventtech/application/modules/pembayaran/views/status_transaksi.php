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
					<!-- [ stiped-table ] start -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <h1>Transaction action</h1>
                                <span class="d-block">use class <code>table-striped</code> inside table element</span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                    <form action="<?php echo site_url()?>/transaction/process" method="POST">
                            <p>
                                <label>Order id</label>
                                <input type="text" name="order_id" value="<?= $detail['order_id']; ?>" />
                            </p>
                            <p>
                                <label>Action</label><br/>
                                <input type="radio" name="action" value="status">Verifikasi<br>
                            </p>
                            <button class="btn btn-primary submit-button" type="submit">Submit Payment</button>
                    </form>
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

