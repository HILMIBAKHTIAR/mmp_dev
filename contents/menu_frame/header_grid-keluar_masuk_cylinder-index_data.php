<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kodespk"]         = $data["kodespk"];
$index_table["data"][$i]["barang"]         = $data["barang"];
$index_table["data"][$i]["kode_cylinder"]         = $data["kode_cylinder"];
$index_table["data"][$i]["peruntukan"]         = $data["peruntukan"];
$features = "save|back|reload|add|edit|delete";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
