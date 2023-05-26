<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-user'></i> Add User
    </h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel" data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
            <div class="panel-container show">
                <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                    <form action="<?= base_url('user/add'); ?>" method="POST">

                        <div class="form-group">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control <?= isset($validation) && $validation->hasError('first_name') ? 'is-invalid' : ''; ?>" value="<?= set_value('first_name'); ?>">
                            <?php if (isset($validation) && $validation->hasError('first_name')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('first_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control <?= isset($validation) && $validation->hasError('last_name') ? 'is-invalid' : ''; ?>" value="<?= set_value('last_name'); ?>">
                            <?php if (isset($validation) && $validation->hasError('last_name')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('last_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : ''; ?>" value="<?= set_value('email'); ?>">
                            <?php if (isset($validation) && $validation->hasError('email')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="mobile">Mobile</label>
                            <input type="text" name="mobile" class="form-control <?= isset($validation) && $validation->hasError('mobile') ? 'is-invalid' : ''; ?>" value="<?= set_value('mobile'); ?>">
                            <?php if (isset($validation) && $validation->hasError('mobile')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('mobile') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="user_name">Username</label>
                            <input type="text" name="user_name" class="form-control <?= isset($validation) && $validation->hasError('user_name') ? 'is-invalid' : ''; ?>" value="<?= set_value('user_name'); ?>">
                            <?php if (isset($validation) && $validation->hasError('user_name')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('user_name') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : ''; ?>">
                            <?php if (isset($validation) && $validation->hasError('password')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password_confirm">Re-Type Password</label>
                            <input type="password" name="password_confirm" class="form-control <?= isset($validation) && $validation->hasError('password_confirm') ? 'is-invalid' : ''; ?>">
                            <?php if (isset($validation) && $validation->hasError('password_confirm')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password_confirm') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>