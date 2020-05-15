<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css'>
      <link rel="stylesheet" href="<?= base_url('assets/material-icon-picker/css/style.css') ?>">
<?= form_open(admin_url('menu/edit'), 'id="login_validation"') ?>
<div class="md-card">
    <div class="md-card-content">
        <h3 class="heading_a">Edit Menu</h3>

        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Title</label>
                    <input type="text" name="title" class="md-input" value="<?=$get_menu->title;?>">
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Link</label>
                    <input type="text" name="link" class="md-input" value="<?=$get_menu->link;?>">
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Icon</label>
                    <input type="text" name="icon" class="md-input use-material-icon-picker" value="<?=$get_menu->icon;?>">
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="uk-form-row">
                    <label>Parent</label>
                    <!-- <input type="text" name="email" class="md-input" data-parsley-type="email" data-parsley-remote="<?= admin_url('user/form_check') ?>" data-parsley-trigger="focus" data-parsley-remote-options='{ "type": "POST" }' data-parsley-remote-message="Email already exists." value="<?=$get_menu->parent;?>"> -->
                    <input type="text" name="parent" class="md-input" value="<?=$get_menu->parent;?>">
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;" align="right"><button onclick="window.history.back()" class="md-btn md-btn-danger" type="button">Back</button><button  class="md-btn md-btn-primary" type="submit">Save</button></div>

    </div>
</div>
<?php form_close() ?>

<script type="text/javascript">
    $('#login_validation').parsley();
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js'></script>
    <script src="<?= base_url('assets/material-icon-picker/js/index.js') ?>"></script>