<div align="center" style="margin-bottom: 10px">
    <a href="<?= base_url(); ?>">
        <img class="logo_regular" src="<?= base_url('assets/logo/ninos2019.png') ?>" width="200" height="170" alt="" />
    </a>
</div>

<div class="login_page_wrapper">
    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">
            <div class="login_heading">
                <div class="user_avatar"></div>
            </div>
            <?= isset($this->session->auth_message) ? '<div class="uk-alert uk-alert-danger">'.$this->session->auth_message.'</div>' : FALSE; ?>
            <?= form_open(base_url('auth/login'), 'id="login_validation"') ?>
                <div class="uk-form-row">
                    <label for="login_username">Username</label>
                    <input class="md-input" type="text" id="username" name="username" required />
                </div>
                <div class="uk-form-row">
                    <label for="login_password">Password</label>
                    <input class="md-input" type="password" id="password" name="password" required />
                </div>
                <div class="uk-margin-medium-top">
                    <button class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                </div>
                <!-- <div class="uk-grid uk-grid-width-1-3 uk-grid-small uk-margin-top">
                    <div><a href="#" class="md-btn md-btn-block md-btn-facebook" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Facebook"><i class="uk-icon-facebook uk-margin-remove"></i></a></div>
                    <div><a href="#" class="md-btn md-btn-block md-btn-twitter" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Twitter"><i class="uk-icon-twitter uk-margin-remove"></i></a></div>
                    <div><a href="#" class="md-btn md-btn-block md-btn-gplus" data-uk-tooltip="{pos:'bottom'}" title="Sign in with Google+"><i class="uk-icon-google-plus uk-margin-remove"></i></a></div>
                </div> -->
                <div class="uk-margin-top">
                    <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                    <span class="icheck-inline">
                        <input type="checkbox" name="remember" id="remember" data-md-icheck />
                        <label for="remember" class="inline-label">Stay signed in</label>
                    </span>
                </div>
            <?= form_close() ?>
        </div>
        <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_b uk-text-success">Can't log in?</h2>
            <p>Here’s the info to get you back in to your account as quickly as possible.</p>
            <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
            <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
        </div>
        <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
            <form>
                <div class="uk-form-row">
                    <label for="login_email_reset">Your email address</label>
                    <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                </div>
                <div class="uk-margin-medium-top">
                    <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                </div>
            </form>
        </div>
        <div class="md-card-content large-padding" id="register_form" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
            <form>
                <div class="uk-form-row">
                    <label for="register_username">Username</label>
                    <input class="md-input" type="text" id="register_username" name="register_username" />
                </div>
                <div class="uk-form-row">
                    <label for="register_password">Password</label>
                    <input class="md-input" type="password" id="register_password" name="register_password" />
                </div>
                <div class="uk-form-row">
                    <label for="register_password_repeat">Repeat Password</label>
                    <input class="md-input" type="password" id="register_password_repeat" name="register_password_repeat" />
                </div>
                <div class="uk-form-row">
                    <label for="register_email">E-mail</label>
                    <input class="md-input" type="text" id="register_email" name="register_email" />
                </div>
                <div class="uk-margin-medium-top">
                    <a href="index.html" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign Up</a>
                </div>
            <?php form_close() ?>
        </div>
    </div>
    <!-- <div class="uk-margin-top uk-text-center">
        <a href="#" id="signup_form_show">Create an account</a>
    </div> -->
</div>

<!-- altair login page functions -->
<script src="<?= base_url('assets/js/pages/login.min.js') ?>"></script>

<script>
    // check for theme
    if (typeof(Storage) !== "undefined") {
        var root = document.getElementsByTagName( 'html' )[0],
            theme = localStorage.getItem("altair_theme");
        if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
            root.className += ' app_theme_dark';
        }
    }

    $('#login_validation').parsley();
</script>