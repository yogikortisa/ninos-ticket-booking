</div>
    </div>
    
<!-- google web fonts -->
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
    
    <!-- altair common functions/helpers -->
    <script src="<?= base_url('assets/js/altair_admin_common.min.js') ?>"></script>
    
    <script src="<?= base_url('bower_components/parsleyjs/dist/parsley.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/altair_admin_common.min.js') ?>"></script>
</body>

    <!-- page specific plugins -->
    <!--  forms validation functions -->
    <!-- <script src="<?= base_url('assets/js/pages/forms_validation.js') ?>"></script> -->

    <!-- datatables -->
    <script src="<?= base_url('bower_components/datatables/media/js/jquery.dataTables.min.js') ?>"></script>
    <!-- datatables buttons-->
    <script src="<?= base_url('bower_components/datatables-buttons/js/dataTables.buttons.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom/datatables/buttons.uikit.js') ?>"></script>
    <script src="<?= base_url('bower_components/jszip/dist/jszip.min.js') ?>"></script>
    <script src="<?= base_url('bower_components/pdfmake/build/pdfmake.min.js') ?>"></script>
    <script src="<?= base_url('bower_components/pdfmake/build/vfs_fonts.js') ?>"></script>
    <script src="<?= base_url('bower_components/datatables-buttons/js/buttons.colVis.js') ?>"></script>
    <script src="<?= base_url('bower_components/datatables-buttons/js/buttons.html5.js') ?>"></script>
    <script src="<?= base_url('bower_components/datatables-buttons/js/buttons.print.js') ?>"></script>

    <!-- datatables custom integration -->
    <script src="<?= base_url('assets/js/custom/datatables/datatables.uikit.min.js') ?>"></script>
    <!--  datatables functions -->
    <script src="<?= base_url('assets/js/pages/plugins_datatables.min.js') ?>"></script>

    <!-- ionrangeslider -->
    <script src="<?= base_url('bower_components/ion.rangeslider/js/ion.rangeSlider.min.js') ?>"></script>
    <!-- select2 -->
    <script src="<?= base_url('bower_components/select2/dist/js/select2.min.js') ?>"></script>

    <!-- inputmask -->
    <script src="<?= base_url('bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.js') ?>"></script>

    <!--  forms advanced functions -->
    <script src="<?= base_url('assets/js/pages/forms_advanced.js') ?>"></script>



</html>