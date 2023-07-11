<?php

    include('../../assets_custom/php/phpqrcode/qrlib.php');
        
    $param = $_GET['id']; // remember to sanitize that - it is user input!
    $param_url = $_GET['url']; // remember to sanitize that - it is user input!
    
    // we need to be sure ours script does not output anything!!!
    // otherwise it will break up PNG binary!
    
    ob_start("callback");

   
 //    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/inspira/git/cvsma_sia/";
	// $url = $actual_link."dashboard.php?m=beli_order_kom_utama&f=header_grid&&sm=edit&no=".$param."&a=view";
    // here DB request or some processing
    // $url = $param_url."&f=header_grid&&sm=edit&no=".$param."&a=view";
    // $url = $param_url."&f=header_grid&&sm=edit&no=".$param."&a=view";
    $codeText = $param_url;
    
    // end of processing here
    $debugLog = ob_get_contents();
    ob_end_clean();
    
    // outputs image directly into browser, as PNG stream
    QRcode::png($codeText);