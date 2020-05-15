<?= form_open(admin_url('user/edit/'.$get_user->id), 'id="login_validation"') ?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Edit User</h3>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>First Name</label>
                    <input type="text" name="first_name" value="<?= $get_user->first_name ?>" class="md-input" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Last Name</label>
                    <input type="text" name="last_name" value="<?= $get_user->last_name ?>" class="md-input" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Username</label>
                    <input type="text" name="username" value="<?= $get_user->username ?>" class="md-input" data-parsley-remote="<?= admin_url('user/form_check') ?>" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Email</label>
                    <input type="text" name="email" value="<?= $get_user->email ?>" class="md-input" data-parsley-type="email" required>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Password</label>
                    <input type="password" name="password" class="md-input" id="password" data-parsley-minlength="8">
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="md-input" data-parsley-equalto="#password">
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