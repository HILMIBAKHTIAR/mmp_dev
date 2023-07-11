<?php
$index_table["data"][$i]["no"] = $no+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["inisial"] = $data["inisial"];
$index_table["data"][$i]["date_format"] = $data["date_format"];
$index_table["data"][$i]["max_digit"] = $data["max_digit"];
$index_table["data"][$i]["keterangan"] = $data["keterangan"];
// $index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "edit";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
?>