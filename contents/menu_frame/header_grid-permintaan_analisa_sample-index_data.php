<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["directory"] = "<a href='#' data-toggle='modal' data-target='.preview' data-id='" . $data["directory"] . "'><div style=' width: 80px;height: 80px;position: relative;overflow: hidden;'><img src='uploads/Photo/ITEM" . "/" . $data["directory"] . "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'></div></a>";
$index_table["data"][$i]["test"]         = $data["test"];
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["produk"]         = $data["produk"];
$index_table["data"][$i]["sales"]         = $data["sales"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i]["customer_analisa"]         = $data["customer_analisa"];
$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_" . $data["status_disetujui"]];
$index_table["data"][$i]["status_disetujui"] = "status_disetujui";
$features = "save|back|reload|add" . check_approval($data, "edit|approve|delete|disappr");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
