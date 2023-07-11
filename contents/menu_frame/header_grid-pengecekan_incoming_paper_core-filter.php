<?php


if($_POST["data_status"]==1)
	$filtering["query"] .= " AND a.status_aktif = 0";
else if($_POST["data_status"]==2)
	$filtering["query"] .= " AND a.status_aktif = 1";
else 
	$filtering["query"] .= " ";


if(!empty($_POST["item_code"])){
    $arraySearch = explode(" ",$_POST["item_code"]);
    for ($as=0; $as < count($arraySearch); $as++) {
        $filtering["query"] .= " AND a.kode LIKE '%".$arraySearch[$as]."%'";
    }
}
if(!empty($_POST["item_name"])){
    $arraySearch = explode(" ",$_POST["item_name"]);
    for ($as=0; $as < count($arraySearch); $as++) {
        $filtering["query"] .= " AND b.nama LIKE '%".$arraySearch[$as]."%'";
    }
}
    
$_SESSION["menu_".$filtering["session_name"]]["filter_item_code"] = $_POST["item_code"];
$_SESSION["menu_".$filtering["session_name"]]["filter_item_name"] = $_POST["item_name"];
$_SESSION["menu_".$filtering["session_name"]]["filter_data_status"] = $_POST["data_status"];
?>