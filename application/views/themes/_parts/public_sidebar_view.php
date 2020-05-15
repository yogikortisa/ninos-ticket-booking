<!-- main sidebar -->
    <aside id="sidebar_main" style="background-color: transparent;">
        
        <div>
            <!-- <div class="sidebar_logo"> -->
                <a href="<?= base_url(); ?>">
                    <img class="logo_regular" src="<?= base_url('assets/logo/ninos.png') ?>" alt="" />
                    <!-- <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/> -->
                </a>
               <!--  <a href="index.html" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
                </a>
            </div> -->
        </div>
        
    </aside><!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">

    <div>
      <?php
      if ($success = $this->session->flashdata('success')) {
        echo "<div class=\"uk-alert uk-alert-success\">" . $success . "<a href=\"\" class=\"uk-alert-close uk-close\"></a></div>";
      } elseif ($failed = $this->session->flashdata('failed')) {
        echo "<div class=\"uk-alert uk-alert-danger\">" . $failed . "<a href=\"\" class=\"uk-alert-close uk-close\"></a></div>";
      }
      ?>
    </div>