<?php
  	$this->load->view('themes/_parts/master_header_view');
  	$this->load->view('themes/_parts/master_sidebar_view');
?>
<section>
  <?php echo $the_view_content;?>
</section>
<?php
	$this->load->view('themes/_parts/master_footer_view');
?>