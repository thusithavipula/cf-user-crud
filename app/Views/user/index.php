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
                    <?= $this->include('components/alert') ?>
                    <table class="table table-hover" id="user-table">
                        <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Username</th>
                            <th>Delete</th>
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

        // Generate the Datatable using the AJAX request
        let user_table = $('#user-table').DataTable({
            ajax: {
                url: "<?= base_url('user/getAll'); ?>",
                dataSrc: 'data',
                type: "POST",
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
            ],
            columnDefs: [{
                targets: 6,
                render: function(data, type, row, meta) {
                    return '<a data-user-id="' + row.user_id + '" class="btn btn-danger btn-sm btn-icon delete-user">' +
                        '<i class="fal fa-trash"></i>' +
                        '</a>';
                }
            }]

        });

        // Delete User With an AJAX request
        $('#user-table tbody').on('click', '.delete-user', function() {
            // Get the respective user_id from the 'data' attribute
            const user_id = $(this).data('userId');
            $.ajax({
                url: "<?= base_url('user/delete/'); ?>" + user_id,
                type: 'DELETE',
                complete: function(data) {
                    // Reload the data table to reflect the DB changes
                    user_table.ajax.reload();
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>