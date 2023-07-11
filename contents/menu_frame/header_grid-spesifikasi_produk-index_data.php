<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
// $index_table["data"][$i]["directory"] = "<a href='#' data-toggle='modal' data-target='.preview' data-id='" . $data["directory"] . "'><div style=' width: 80px;height: 80px;position: relative;overflow: hidden;'><img src='uploads/Photo/ITEM"."/" . $data["directory"] . "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'></div></a>";
$index_table["data"][$i]["kode_custom"]         = $data["kode_custom"];
$index_table["data"][$i]["kodepas"]         = $data["kodepas"];
$index_table["data"][$i]["test"]         = $data["test"];
$index_table["data"][$i]["nama"]         = $data["nama"];
$index_table["data"][$i]["customer"]         = $data["customer"];
$index_table["data"][$i]["kota"]         = $data["kota"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];

$features = "save|back|reload|add" . check_approval($data, "edit|approve|delete|disappr");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
