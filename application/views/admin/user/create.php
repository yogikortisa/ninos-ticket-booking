<?= form_open(admin_url('user/create'), 'id="login_validation"') ?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Create User</h3>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="md-input" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="md-input" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Username</label>
                    <input type="text" name="username" class="md-input" data-parsley-remote="<?= admin_url('user/form_check') ?>" data-parsley-trigger="focus" data-parsley-remote-options='{ "type": "POST" }' data-parsley-remote-message="Name already exists." required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Email</label>
                    <input type="text" name="email" class="md-input" data-parsley-type="email" data-parsley-remote="<?= admin_url('user/form_check') ?>" data-parsley-trigger="focus" data-parsley-remote-options='{ "type": "POST" }' data-parsley-remote-message="Email already exists." required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Password</label>
                    <input type="password" name="password" class="md-input" id="password" data-parsley-minlength="8" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="md-input" data-parsley-equalto="#password" required>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Create</button></div>

    </div>
</div>
<?php form_close() ?>

<script type="text/javascript">
    $('#login_validation').parsley();
</script>