<?= $this->extend('auth/layouts/index'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">Enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>
                                <form action="<?= route_to('forgot') ?>" method="post">
                                    <?= csrf_field() ?>

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." autocomplete="off">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Reset Password') ?></button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= route_to('login') ?>"> <?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<?= $this->endSection(); ?>