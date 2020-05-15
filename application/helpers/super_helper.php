<?php

function log_r($string = null, $var_dump = false)
{
    if ($var_dump) {
        var_dump($string);
    } else {
        echo "<pre>";
        print_r($string);
    }
    exit;
}

function flash_message($var, $true, $false)
{
	$CI = &get_instance();
    if($var)
	{
		$CI->session->set_flashdata('success', $CI->lang->line('success'));
		redirect(admin_url($CI->router->class.'/'.$true));
	}
	else
	{
		$CI->session->set_flashdata('failed', $CI->lang->line('failed'));
		redirect(admin_url($CI->router->class.'/'.$false));
	}
}

function admin_url($dir)
{
return base_url(ADMIN_DIR).'/'.$dir;
}


?>