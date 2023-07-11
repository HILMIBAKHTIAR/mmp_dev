<?php
$index_table["data"][$i]["no"] = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["nama"] = $data["nama"];
$index_table["data"][$i]["produk"] = $data["produk"];
$index_table["data"][$i]["jenis_packaging"] = $data["jenis_packaging"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$features = "edit|info|delete";
$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_" . $data["status_disetujui"]];

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
