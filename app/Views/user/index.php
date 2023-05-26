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
                <div class="panel-content border-faded border-left-0 border-right-0 border-top-0" id="user_table_panal">
                    <?= $this->include('components/alert') ?>
                    <table class="table table-hover" id="user_table">
                        <thead>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Username</th>
                            <th>Edit/Delete</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Large -->
<div class="modal fade" id="user_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('user/update'); ?>" method="POST" id="user_edit_form">
                    <input type="hidden" name="user_id" />
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="user_name" class="form-label">Username</label>
                        <input type="text" name="user_name" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirm" class="form-label">Re-type Password</label>
                        <input type="password" name="password_confirm" class="form-control">
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="edit_user_submit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {

        //Generate the Datatable using the AJAX request
        let user_table = $('#user_table').DataTable({
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
                [0, 'asc']
            ],
            columnDefs: [{
                targets: 6,
                render: function(data, type, row, meta) {
                    return '<a data-user-id="' + row.user_id + '" class="btn btn-info btn-sm btn-icon edit-user">' +
                        '<i class="fal fa-edit"></i>' +
                        '</a>     ' +
                        '<a data-user-id="' + row.user_id + '" class="btn btn-danger btn-sm btn-icon delete-user">' +
                        '<i class="fal fa-trash"></i>' +
                        '</a>';
                }
            }]
        });

        // Delete User With an AJAX request
        $('#user_table tbody').on('click', '.delete-user', function() {
            const user_id = $(this).data('userId'); // Get the respective user_id from the 'data' attribute
            $.ajax({
                url: "<?= base_url('user/delete/'); ?>" + user_id,
                type: 'DELETE',
                success: function(data) {
                    showAlert('alert-success', "Successfully deleted user")
                    user_table.ajax.reload(); // Reload the data table to reflect the DB changes
                },
                error: function(data) {
                    showAlert('alert-danger', "Failed deleting user")
                }
            });
        });

        // Show the User View/Edit Model 
        $('#user_table tbody').on('click', '.edit-user', function() {
            const user_id = $(this).data('userId');
            $.ajax({
                url: "<?= base_url('user/get/'); ?>" + user_id,
                type: 'GET',
                success: function(data) {
                    setEditUserForm(data.data);
                    $('#user_edit_modal').modal('show');
                },
                error: function(data) {
                    showAlert('alert-danger', "Failed getting user data")
                }
            });
        });

        // Send ajax request to submit the updated user data
        $('#edit_user_submit').on("click", function() {
            const user_id = $('#user_edit_form input[name="user_id"]').val();
            let user_data = {
                first_name: $('#user_edit_form input[name="first_name"]').val(),
                last_name: $('#user_edit_form input[name="last_name"]').val(),
                email: $('#user_edit_form input[name="email"]').val(),
                mobile: $('#user_edit_form input[name="mobile"]').val(),
                user_name: $('#user_edit_form input[name="user_name"]').val(),
                password: $('#user_edit_form input[name="password"]').val(),
                password_confirm: $('#user_edit_form input[name="password_confirm"]').val(),
            }

            $.ajax({
                url: "<?= base_url('user/update/'); ?>" + user_id,
                type: 'POST',
                data: user_data,
                success: function(data) {
                    if (!data['success']) {
                        showEditUserValidation(data['validation']); // Show Validation messages
                    } else {
                        $('#user_edit_modal').modal('hide');
                        user_table.ajax.reload(); // Reload the table to update the changes
                    }
                },
                error: function(data) {
                    showAlert('alert-danger', "Failed updating user")
                }
            });
        });

    });

    /**
     * All the suported field names from the User Edit Form
     */
    const edit_user_fields = ['user_id', 'first_name', 'last_name', 'email', 'mobile', 'user_name', 'password', 'password_confirm'];

    /**
     *  Reset the User Edit Form
     */
    function resetEditUserForm() {
        edit_user_fields.forEach(field => {
            let input_element = $('#user_edit_form input[name="' + field + '"]'); // Find the input element
            input_element.val(''); // Reset the value
            input_element.removeClass('is-invalid'); // Remove 'is-invalid' class if it exsists
        });
    }

    /**
     *  Populate the User Edit form with values
     */
    function setEditUserForm(user_data) {
        resetEditUserForm();
        for (let index = 0; index < edit_user_fields.length; index++) {
            const field = edit_user_fields[index];
            if (field == 'password' || field == 'password_confirm') { // We Dont send the password from the DB back to the UI
                continue;
            }
            $('#user_edit_form input[name="' + field + '"]').val(user_data[field]);
        }
    }

    /**
     *  Show validation messages for the User Edit form 
     */
    function showEditUserValidation(validations) {
        console.log("validations", validations);
        edit_user_fields.forEach(field => {
            if ((field in validations)) {

                let input_element = $('#user_edit_form input[name="' + field + '"]'); // Find the input element
                input_element.addClass('is-invalid'); //Append the 'is-invalid' class

                let invalid_feeback_element = $(input_element).siblings('.invalid-feedback'); // Find the sibling 'invalid-feedback'' Element
                invalid_feeback_element.html(validations[field]); // Set the error message
            }
        });
    }

    /**
     * Show custom alert messages
     */
    function showAlert(type, message) {
        let alert_message = $('<div class="alert ' + type + ' alert-dismissible fade show" role="alert">' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
            '<span aria-hidden="true"><i class="fal fa-times"></i></span>' +
            '</button>' +
            message +
            '</div>');
        $('#user_table_panal').prepend(alert_message);

        setTimeout(() => {
            alert_message.remove();// Remove the Element after 2 secounds 
        }, 2000);
    }

    // Auto remove the alert message created by 'CI' sessions
    <?php if (session()->get('alert_message')) : ?>
        setTimeout(() => {
            $('#session_alert').remove();
        }, 2000);
    <?php endif; ?>
</script>
<?= $this->endSection() ?>