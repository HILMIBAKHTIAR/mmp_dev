<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["tanggal"]          = $data["tanggal"];
$index_table["data"][$i]["kode_order"]          = $data["kode_order"];
$index_table["data"][$i]["nama_barang"]          = $data["nama_barang"];
$index_table["data"][$i]["supplier"]          = $data["supplier"];
$index_table["data"][$i]["pembuat"]          = $data["pembuat"];
$index_table["data"][$i]["approve"]          = $data["approve"];
$features = "save|back|reload|add|edit|delete";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
