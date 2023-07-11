<?php
$index_table["data"][$i]["no"] = $no + $index_page["position"] + 1;
$index_table["data"][$i]["tanggal"] = $data["tanggal"];
$index_table["data"][$i]["tanggal_estimasi"] = $data["tanggal_estimasi"];
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["barang"] = $data["barang"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$features = "save|back|reload|add" . check_approval($data, "edit|approve|disappr");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
