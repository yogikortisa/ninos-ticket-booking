<!-- main sidebar -->
    <aside id="sidebar_main">
        
        <div class="sidebar_main_header" style="height: 110px;background-image: unset;padding-top: 10px">
            <div class="sidebar_logo" style="height: unset" align="center">
                <a href="<?= base_url('admin') ?>" class="sSidebar_hide sidebar_logo_large">
                    <img class="logo_regular" src="<?= base_url('assets/logo/ninos2019.png') ?>" alt=""/>
                    <!-- <img class="logo_light" src="assets/img/logo_main_white.png" alt="" height="15" width="71"/> -->
                </a>
                <!-- <a href="index.html" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
                </a> -->
            </div>
        </div>
        
        <div class="menu_section">
            <ul>
                <?php 
                foreach ($get_master_menu as $key => $val) { 
                    if($val->link == '#')
                    {

                ?>
                    <li>
                        <a href="<?= admin_url($val->link) ?>">
                            <span class="menu_icon"><i class="material-icons"><?= $val->icon ?></i></span>
                            <span class="menu_title"><?= $val->title ?></span>
                        </a>
                        <ul>
                            <?php 
                            foreach ($get_sub_menu as $key => $sub) { 
                                if($sub->parent == $val->id) {
                                    if($this->uri->segment(2)==$sub->link)
                                    {
                                        echo '<li class="act_item">';
                                    }
                                    else
                                    {
                                        echo '<li>';
                                    }
                            ?>
                                <a href="<?= admin_url($sub->link) ?>"><?= $sub->title ?></a></li>
                            <?php } } ?>
                        </ul>
                    </li>

                <?php 
                    } else {
                    // log_r($this->uri->segment(2).' '.$val->link);
                        if($this->uri->segment(2)==$val->link)
                        {
                            echo '<li class="current_section">';
                        }
                        else
                        {
                            echo '<li>';
                        }
                ?>

                    <!-- <li> -->
                        <a href="<?= admin_url($val->link) ?>">
                            <span class="menu_icon"><i class="material-icons"><?= $val->icon ?></i></span>
                            <span class="menu_title"><?= $val->title ?></span>
                        </a>
                    </li>

                <?php } } ?>



                <!-- <li class="current_section" title="Dashboard">
                    <a href="<?= admin_url('dashboard') ?>">
                        <span class="menu_icon"><i class="material-icons" style="color: #FF4600">dashboard</i></span>
                        <span class="menu_title" style="color: #FF4600">Dashboard<?= $testadmin ?></span>
                    </a>
                </li>
                <li title="Session Lists">
                    <a href="<?= admin_url('ticket_order') ?>">
                        <span class="menu_icon"><i class="material-icons">shopping_cart</i></span>
                        <span class="menu_title">Ticket Order</span>
                    </a>
                </li>
                <li title="Session Lists">
                    <a href="<?= admin_url('ticket_order/school_group') ?>">
                        <span class="menu_icon"><i class="material-icons">school</i></span>
                        <span class="menu_title">School Member</span>
                    </a>
                </li>
                <li title="Chats">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">settings</i></span>
                        <span class="menu_title">Setup</span>
                    </a>
                    <ul>
                        <li><a href="<?= admin_url('ticket_type') ?>">Ticket Type</a></li>
                        <li><a href="<?= admin_url('ticket_category') ?>">Ticket Category</a></li>
                        <li><a href="<?= admin_url('session') ?>">Session</a></li>
                        <li><a href="<?= admin_url('user') ?>">User</a></li>
                        <li><a href="<?= admin_url('menu') ?>">Menu</a></li>
                    </ul>
                </li>
                <li title="User Lists">
                    <a href="<?= admin_url('ticket') ?>">
                        <span class="menu_icon"><i class="material-icons">card_membership</i></span>
                        <span class="menu_title">Tickets</span>
                    </a>
                </li> -->
                
            </ul>
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

