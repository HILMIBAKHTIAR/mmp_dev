<?php
$index_table["data"][$i]["no"] = $no + $index_page["position"] + 1;
$index_table["data"][$i]["nama"] = $data["nama"];
$index_table["data"][$i]["provinsi"] = $data["provinsi"];
$index_table["data"][$i]["kabupaten"] = $data["kabupaten"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$features = "edit|delete";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
