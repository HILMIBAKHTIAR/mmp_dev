<?php
$index_table["data"][$i]["no"] = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["nama"] = $data["nama"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$features = "edit|info|delete";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
