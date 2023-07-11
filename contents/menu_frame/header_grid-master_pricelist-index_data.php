<?php
$index_table["data"][$i]["no"] = $no + $index_page["position"] + 1;
$index_table["data"][$i]["supplier"] = $data["supplier"];
$index_table["data"][$i]["harga"] = number_formatting($data["harga"], 'money');
$index_table["data"][$i]["minimum_price"] = number_formatting($data["minimum_price"], 'money');
$index_table["data"][$i]["maximum_price"] = number_formatting($data["maximum_price"], 'money');
$index_table["data"][$i]["tanggal_expired"] = $data["tanggal_expired"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$features = "edit|delete";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
