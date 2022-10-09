<?= $this->extend('auth/templates/index') ?>

<?= $this->section('content') ?>
<section class="container h-100">
    <div class="row justify-content-sm-center h-100 align-items-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <img src="https://smkkes-rahanihusada-klt.sch.id/wp-content/themes/rahani/assets/images/logo-warna-rahani-husada-klaten.png" alt="logo" class="img-fluid mx-auto d-block mb-4">
                    <h1 class="fs-4 text-center fw-bold mb-2"> PENILAIAN P5BK</h1>
                    <h1 class="fs-4 text-center fw-bold mb-4"><?= lang('Auth.loginTitle') ?></h1>
                    <!--<h1 class="fs-6 mb-3">Silahkan gunakan e-mail dan password untuk login kedalam system.</h1>-->
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form method="POST" aria-label="rahani" data-id="rahani" class="needs-validation" novalidate="" autocomplete="off" action="<?= url_to('login') ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">


                            <?php $config = config('Auth');
                            if ($config->validFields === ['email']) : ?>
                                <label class="mb-2 text-muted" for="email"><?= lang('Auth.email') ?></label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="email" type="email" placeholder="<?= lang('Auth.email') ?>" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" value="" required autofocus>
                                    <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <label class="mb-2 text-muted" for="email"><?= lang('Auth.emailOrUsername') ?></label>
                                <div class="input-group input-group-join mb-3">
                                    <input id="text" type="text" placeholder="<?= lang('Auth.emailOrUsername') ?>" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" value="" required autofocus>
                                    <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="password"><?= lang('Auth.password') ?></label>
                                <?php if ($config->activeResetter) : ?>
                                    <a href="<?= url_to('forgot') ?>" class="float-end">
                                        <?= lang('Auth.forgotYourPassword') ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="input-group input-group-join mb-3">
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" required>
                                <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                    <label for="remember" class="form-check-label"><?= lang('Auth.rememberMe') ?></label>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary ms-auto">
                                <?= lang('Auth.loginAction') ?> <i class="fa fa-sign-in-alt ms-1"></i>
                            </button>
                        </div>
                    </form>
                    <!--  <div class="text-center mb-2 mt-3">&mdash; OR &mdash;</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary icon-left" type="button"><i class="fab fa-facebook"></i>
                            Login with Facebook</button>
                        <button class="btn btn-danger icon-left" type="button"><i class="fab fa-google"></i> Login
                            with Google</button>
                    </div>-->
                </div>
                <?php if ($config->allowRegistration) : ?>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            <a href="<?= url_to('register') ?>" class="text-dark"><?= lang('Auth.needAnAccount') ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="text-center mt-5 text-muted">
                Copyright &copy; KESRADA &mdash; <?= date('Y') ?>
                <br>
                all rights reserved
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>