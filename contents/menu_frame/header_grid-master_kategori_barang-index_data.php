<?php
// SETTING DATA FOR INDEX
$index_table["data"][$i]["no"]           = $no+$index_page["position"]+1;
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["nama"]      = $data["nama"];
$index_table["data"][$i]["tanggal"]      = $data["tanggal"];
$index_table["data"][$i]["total_debet"]  = number_formatting($data["total_debet"],"money");
$index_table["data"][$i]["total_kredit"] = number_formatting($data["total_kredit"],"money");
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "edit|delete";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
// END SETTING DATA FOR INDEX
