    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- uikit functions -->
    <script src="<?= base_url('assets/js/uikit_custom.min.js') ?>"></script>
    

</body>

    <!-- page specific plugins -->
    <!-- kendo UI -->
    <script src="<?= base_url('assets/js/kendoui_custom.min.js') ?>"></script>
    <!--  kendoui functions -->
    <script src="<?= base_url('assets/js/pages/kendoui.min.js') ?>"></script>
    <!-- parsley (validation) -->
    <!--  forms validation functions -->
    <!-- <script src="<?= base_url('assets/js/pages/forms_validation.js') ?>"></script> -->

    <!-- jquery ui -->
    <script src="<?= base_url('bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
    <!-- ionrangeslider -->
    <script src="<?= base_url('bower_components/ion.rangeslider/js/ion.rangeSlider.min.js') ?>"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="<?= base_url('assets/js/uikit_htmleditor_custom.min.js') ?>"></script>
    <!-- inputmask -->
    <script src="<?= base_url('bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js') ?>"></script>
    <!-- select2 -->
    <script src="<?= base_url('bower_components/select2/dist/js/select2.min.js') ?>"></script>

    <!--  forms advanced functions -->
    <script src="<?= base_url('assets/js/pages/forms_advanced.min.js') ?>"></script>

</html>