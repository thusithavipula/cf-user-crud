<?php if (session()->get('alert_message')) : ?>
    <div id="session_alert" class="alert <?= session()->get('alert_status') ? 'alert-success' : 'alert-danger'; ?> alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="fal fa-times"></i></span>
        </button>
        <?= session()->get('alert_message'); ?>
    </div>
<?php endif; ?>