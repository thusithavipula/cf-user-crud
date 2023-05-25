<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-user'></i>User Data
    </h1>
</div>
<div class="row">

    <div class="col-lg-12">
        <div class="panel" data-panel-lock="false" data-panel-close="false" data-panel-fullscreen="false" data-panel-collapsed="false" data-panel-color="false" data-panel-locked="false" data-panel-refresh="false" data-panel-reset="false">
            <div class="panel-container show">
                <div class="panel-content border-faded border-left-0 border-right-0 border-top-0">
                    <table class="table table-hover" id="user-table">
                        <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Username</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        $('#user-table').DataTable({
            ajax: {
                url: "<?= route_to('user.get_all'); ?>",
                dataSrc: '',
                type: "post",
            },
            processing: true,
            columns: [{
                    data: 'user_id'
                },
                {
                    data: 'first_name'
                },
                {
                    data: 'last_name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'mobile'
                },
                {
                    data: 'user_name'
                },
            ],
            order: [
                [1, 'asc']
            ]

        });
    });
</script>
<?= $this->endSection() ?>