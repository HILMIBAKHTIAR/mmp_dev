<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["directory"] = "<a href='#' data-toggle='modal' data-target='.preview' data-id='" . $data["directory"] . "'><div style=' width: 80px;height: 80px;position: relative;overflow: hidden;'><img src='uploads/Photo/ITEM" . "/" . $data["directory"] . "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'></div></a>";
$index_table["data"][$i]["test"]         = $data["test"];
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["kode_permintaan"]         = $data["kode_permintaan"];
$index_table["data"][$i]["produk"]         = $data["produk"];
$index_table["data"][$i]["customer"]         = $data["customer"];
$index_table["data"][$i]["jenispackaging"]         = $data["jenispackaging"];
$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_" . $data["status_disetujui"]];
$features = "save|back|reload|add" . check_approval($data, "edit|approve|disappr");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
