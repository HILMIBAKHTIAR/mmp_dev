<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
// $index_table["data"][$i]["directory"] = "<a href='#' data-toggle='modal' data-target='.preview' data-id='" . $data["directory"] . "'><div style=' width: 80px;height: 80px;position: relative;overflow: hidden;'><img src='uploads/Photo/ITEM"."/" . $data["directory"] . "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'></div></a>";
$index_table["data"][$i]["kode_custom"]         = $data["kode_custom"];
// $index_table["data"][$i]["test"]         = $data["test"];
$index_table["data"][$i]["customer"]         = $data["customer"];
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];




$index_table["data"][$i]["status_disetujui"] = "status_disetujui";

$check_approval_fields["status_disetujui"] = "status_disetujui";
$features = "save|back|reload|approve|edit";
if ($data["status_aktif"] == 0) {
	$index_table["data"][$i]["status_disetujui"] = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
	$features = "";
}
if ($data["status_disetujui"] == 0) {
	$features = "save|back|reload|edit|approve";
}
if ($data["status_disetujui"] == 1) {
	$features = "save|back|reload|disappr";
}
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
