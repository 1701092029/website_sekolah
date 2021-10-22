<body class="hold-transition login-page">
    <div class="login-box">
        <div>
            <p><?php echo $this->session->flashdata('msg'); ?></p>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">
                <a href="#"><img src="<?php echo base_url() . 'template/images/LOGO_PNG1.png' ?>" alt="" /></a>

            </p>

            <hr />

            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>