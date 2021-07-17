        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(<?=base_url('assets/')?>images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-12 col-md-7 mx-auto bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?=base_url('assets/')?>images/logo1.png" style="max: width 100px;max-height: 100px;" alt="wrapkit">
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <h2 class="mt-3 text-center">Reset Password</h2>
                        <p class="text-center">Reset your old password to Login in Event Tech.</p>
                        <form class="mt-4" method="post" action="<?= base_url('Register/forgotPassword') ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Email</label>
                                        <input class="form-control" id="email" name="email" type="email"
                                            placeholder="enter your username" value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-2">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Reset Password</button>
                                </div>
                                <div class="col-lg-12 text-center mt-2">
                                    Remember now ?<a href="<?= base_url("Login") ?>" class="text-danger">Login </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    