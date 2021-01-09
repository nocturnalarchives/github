<?php

// get current url
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$current_url = (substr($current_url, -1)== "/") ? substr($current_url, 0, -1) : $current_url;

if(get_site_url() ==  $current_url){
    // force to load front-page.php if get_option( 'page_on_front' ) not select
    if(get_option("show_on_front") == "page" && get_option("page_on_front") == "0"){
        get_template_part("front-page");
        die();
    }    
 }

 genesis();
