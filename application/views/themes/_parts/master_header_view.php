<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no"/>

	<link rel="icon" type="image/png" href="<?= base_url('assets/logo/fav.png') ?>" sizes="16x16">
	<link rel="icon" type="image/png" href="<?= base_url('assets/logo/fav.png') ?>" sizes="32x32">

	<title><?php echo $pagetitle; ?></title>

    <!-- kendo UI -->
    <link rel="stylesheet" href="<?= base_url('bower_components/kendo-ui/styles/kendo.common-material.min.css') ?>"/>
    <link rel="stylesheet" href="<?= base_url('bower_components/kendo-ui/styles/kendo.material.min.css" id="kendoCSS') ?>"/>

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

    <!-- common functions -->
    <script src="<?= base_url('assets/js/common.min.js') ?>"></script>

    <!-- uikit functions -->
    <script src="<?= base_url('assets/js/uikit_custom.min.js') ?>"></script>

    <!-- altair common functions/helpers -->
    <script src="<?= base_url('assets/js/altair_admin_common.min.js') ?>"></script>
    
    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    </script>
    <script src="<?= base_url('bower_components/parsleyjs/dist/parsley.min.js') ?>"></script>
    
    <!-- kendo UI -->
    <script src="<?= base_url('assets/js/kendoui_custom.min.js') ?>"></script>
    <!--  kendoui functions -->
    <script src="<?= base_url('assets/js/pages/kendoui.min.js') ?>"></script>
</head>

<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main" style="background-color: #FF8D3E">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <!-- <a href="#" class="user_action_image"><img class="md-user-image" src="<?= base_url('assets/img/avatars/avatar_11_tn.png') ?>" alt=""/></a> -->
                            <a href="#" class="user_action_image"><img class="md-user-image" src="//www.gravatar.com/avatar/<?= $this->session->userdata('gravatar') ?>?s=200" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="<?= admin_url('user/edit/'.$this->session->userdata('user_id')) ?>">My profile</a></li>
                                    <!-- <li><a href="page_settings.html">Settings</a></li> -->
                                    <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        {{~items}}
                        <li data-value="{{ $item.value }}">
                            <a href="{{ $item.url }}" class="needsclick">
                                {{ $item.value }}<br>
                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>
                            </a>
                        </li>
                        {{/items}}
                        <li data-value="autocomplete-value">
                            <a class="needsclick">
                                Autocomplete Text<br>
                                <span class="uk-text-muted uk-text-small">Helper text</span>
                            </a>
                        </li>
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->