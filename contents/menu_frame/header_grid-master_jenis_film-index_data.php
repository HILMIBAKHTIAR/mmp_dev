<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["jenis"]         = $data["jenis"];
$index_table["data"][$i]["status"]          = $data["status"];
$features = "save|back|reload|add|edit|delete";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
