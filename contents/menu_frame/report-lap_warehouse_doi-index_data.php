<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kodespk"]         = $data["kodespk"];
$index_table["data"][$i]["barang"]         = $data["barang"];
$index_table["data"][$i]["bahan"]         = $data["bahan"];


$index_table["data"][$i]["departemen"]         = $data["departemen"];
$index_table["data"][$i]["pembuat"]         = $data["pembuat"];
$index_table["data"][$i]["approve"]         = $data["approve"];
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_".$data["status_disetujui"]];

// $features = "save|back|reload|add".check_approval($data,"periode|edit|approve|delete|disappr|close|print");
$features = "save|back|reload|add".check_approval($data,"edit|approve|delete|disappr|print");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);


