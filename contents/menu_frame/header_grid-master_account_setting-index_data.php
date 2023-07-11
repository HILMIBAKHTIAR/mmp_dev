<?php
$index_table["data"][$i]["no"] = $i+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["account_awal_kode"] = $data["account_awal_kode"];
$index_table["data"][$i]["account_awal_nama"] = $data["account_awal_nama"];
$index_table["data"][$i]["account_akhir_kode"] = $data["account_akhir_kode"];
$index_table["data"][$i]["account_akhir_nama"] = $data["account_akhir_nama"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "edit|delete";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
