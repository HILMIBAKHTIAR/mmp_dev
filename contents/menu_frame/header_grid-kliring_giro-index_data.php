<?php
// SETTING DATA FOR INDEX
$index_table["data"][$i]["no"]           = $no+$index_page["position"]+1;
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["jenis_uang"]         = ucwords(str_replace('_', ' ', $data["jenis_uang"]));
$index_table["data"][$i]["dibuat_pada"]         = $data["dibuat_pada"];
$index_table["data"][$i]["status_kliring"]         = $data["status_kliring"];
$index_table["data"][$i]["keterangan"]         = $data["keterangan"];
$index_table["data"][$i]["aktif"]         = $data["aktif"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "save|back|reload|add|edit|delete";


$index_table["data"][$i]["status_disetujui"] = "status_disetujui";

$check_approval_fields["status_disetujui"] = "status_disetujui";
$features = "save|back|reload|approve|edit";
if($data["status_aktif"] == 0)
{
	$index_table["data"][$i]["status_disetujui"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
	$features = "";
}
if($data["status_disetujui"] == 0){
	$features = "save|back|reload|edit|approve|delete";
}
if($data["status_disetujui"] == 1){
	$features = "save|back|reload|disappr";
}
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);




// END SETTING DATA FOR INDEX
