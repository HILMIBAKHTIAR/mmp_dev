<?php function generate_status_option($mode=""){$option=array("1|".$_SESSION["setting"]["status_aktif_1"],"2|".$_SESSION["setting"]["status_aktif_2"]);if($_SESSION["setting"]["deleted_operator"]==">="&&$mode=="view")array_push($option,"0|".$_SESSION["setting"]["status_aktif_0"]);return $option;} ?>
<?php /*created_by:glennferio@inspiraworld.com;release_date:2020-05-09;*/ ?>