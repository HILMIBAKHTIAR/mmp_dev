<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["customer"]         = $data["customer"];
$index_table["data"][$i]["material"]         = $data["material"];

$index_table["data"][$i]["lot_number"]         = $data["lot_number"];
$index_table["data"][$i]["qty"]         = $data["qty"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];

$features = "save|back|reload|add|edit|delete";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);