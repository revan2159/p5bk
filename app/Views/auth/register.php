<?= $this->extend('auth/templates/index') ?>

<?= $this->section('content') ?>
<section class="container h-100">
    <div class="row justify-content-sm-center h-100 align-items-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-8">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <img src="https://smkkes-rahanihusada-klt.sch.id/wp-content/themes/rahani/assets/images/logo-warna-rahani-husada-klaten.png" alt="logo" class="img-fluid mx-auto d-block mb-4">
                    <h1 class="fs-4 text-center fw-bold mb-2">SYSTEM PENILAIAN P5BK</h1>
                    <h1 class="fs-4 text-center fw-bold mb-4"><?=lang('Auth.register')?></h1>
                    <!--<h1 class="fs-6 mb-3">Register to get more benefits!!</h1>-->
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form method="POST" aria-label="kesrada" data-id="kesrada" class="needs-validation" novalidate="" autocomplete="off" action="<?= url_to('register') ?>">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="email"><?=lang('Auth.username')?></label>
                            <div class="input-group input-group-join mb-3">
                                <input type="text" placeholder="<?=lang('Auth.username')?>" class="form-control<?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" value="<?= old('username') ?>" required autofocus>
                                <span class="input-group-text rounded-end">&nbsp<i class="fa fa-user"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    Name is required
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2 text-muted" for="email"><?=lang('Auth.email')?></label>
                            <div class="input-group input-group-join mb-3">
                                <input id="email" type="email" placeholder="<?=lang('Auth.email')?>" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" value="<?= old('email') ?>" required autofocus>
                                <span class="input-group-text rounded-end">&nbsp<i class="fa fa-envelope"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>
                            <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                        </div>

                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="password"><?=lang('Auth.password')?></label>
                            </div>
                            <div class="input-group input-group-join mb-3">
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" required>
                                <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="mb-2 w-100">
                                <label class="text-muted" for="password">Confirm Password</label>
                            </div>
                            <div class="input-group input-group-join mb-3">
                                <input type="password" name="pass_confirm" class="form-control" placeholder="Confirm Your Password" required>
                                <span class="input-group-text rounded-end password cursor-pointer">&nbsp<i class="fa fa-eye"></i>&nbsp</span>
                                <div class="invalid-feedback">
                                    Confirm Password is required
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">I agree to <a href="#">terms</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary ms-auto">
                                Register
                            </button>
                        </div>
                    </form>
                    <!--<div class="text-center mb-2 mt-3">&mdash; OR &mdash;</div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary icon-left" type="button"><i class="fab fa-facebook"></i>
                            Sign up using Facebook</button>
                        <button class="btn btn-danger icon-left" type="button"><i class="fab fa-google"></i>
                            Sign up using Google</button>
                    </div>
                    </div>
                <div class="card-footer py-3 border-0">
                    <div class="text-center">
                        Already have an account? <a href="auth-login.html" class="text-dark">Login instead</a>
                    </div>-->
                </div>
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