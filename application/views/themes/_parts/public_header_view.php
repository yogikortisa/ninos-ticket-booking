<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no"/>

	<link rel="icon" type="image/png" href="<?= base_url('assets/logo/fav.png') ?>" sizes="16x16">
	<link rel="icon" type="image/png" href="<?= base_url('assets/logo/fav.png') ?>" sizes="32x32">

	<title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>

	<!-- additional styles for plugins -->
	    <!-- weather icons -->
	    <link rel="stylesheet" href="<?= base_url('bower_components/weather-icons/css/weather-icons.min.css') ?>" media="all">
	    <!-- metrics graphics (charts) -->
	    <link rel="stylesheet" href="<?= base_url('bower_components/metrics-graphics/dist/metricsgraphics.css') ?>">
	    <!-- chartist -->
	    <link rel="stylesheet" href="<?= base_url('bower_components/chartist/dist/chartist.min.css') ?>">

	<!-- uikit -->
	<link rel="stylesheet" href="<?= base_url('bower_components/uikit/css/uikit.almost-flat.min.css') ?>" media="all">

	<!-- flag icons -->
	<link rel="stylesheet" href="<?= base_url('assets/icons/flags/flags.min.css') ?>" media="all">

	<!-- style switcher -->
	<link rel="stylesheet" href="<?= base_url('assets/css/style_switcher.min.css') ?>" media="all">

	<!-- altair admin -->
	<link rel="stylesheet" href="<?= base_url('assets/css/main.min.css') ?>" media="all">

	<!-- themes -->
	<link rel="stylesheet" href="<?= base_url('assets/css/themes/themes_combined.min.css') ?>" media="all">

	<link rel="stylesheet" href="<?= base_url('bower_components/kendo-ui/styles/kendo.common-material.min.css') ?>"/>
    <link rel="stylesheet" href="<?= base_url('bower_components/kendo-ui/styles/kendo.material.min.css') ?>" id="kendoCSS"/>

    <!-- common functions -->
    <script src="<?= base_url('assets/js/common.min.js') ?>"></script>
    
    <!-- altair common functions/helpers -->
    <script src="<?= base_url('assets/js/altair_admin_common.min.js') ?>"></script>
    <!-- page specific plugins -->
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?= base_url('bower_components/parsleyjs/dist/parsley.min.js') ?>"></script>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="<?= base_url('assets/css/login_page.min.css') ?>" />

    <?php //echo $script_captcha; // javascript recaptcha ?>
</head>

<body class="disable_transitions sidebar_main_open sidebar_main_swipe login_page">