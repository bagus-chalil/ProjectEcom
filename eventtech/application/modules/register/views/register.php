 <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(<?=base_url('assets/')?>images/big/auth-bg.jpg) no-repeat center center;">
                <div class="col-lg-5 col-md-7  mx-auto bg-white">
                    <div class="p-3">
                    <div class="text-center">
                    <img src="<?=base_url('assets/')?>images/logo1.png" style="max: width 100px;max-height: 100px;" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign Up for Free</h2>
                        <form class="mt-4" method="post" action="<?= base_url('Register'); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Full name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-2">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" type="email" placeholder="Email address" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-2">','</small>'); ?>    
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="password" name="password" type="password" placeholder="Password" value="<?= set_value('password'); ?>">
                                        <?= form_error('password', '<small class="text-danger pl-2">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="password2" name="password2" type="password" placeholder="re-password" value="<?= set_value('password2'); ?>">
                                        <?= form_error('password2', '<small class="text-danger pl-2">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign Up</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Already have an account? <a href="<?= base_url("Login"); ?>" class="text-danger">Sign In</a>
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