<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i]["kode_barang"]         = $data["kode_barang"];
$index_table["data"][$i]["nama_barang"]         = $data["nama_barang"];
$index_table["data"][$i]["qty"]         = $data["qty"];
$index_table["data"][$i]["satuan"]         = $data["satuan"];
$index_table["data"][$i]["departement"]         = $data["departement"];
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_".$data["status_disetujui"]];

// $features = "save|back|reload|add".check_approval($data,"periode|edit|approve|delete|disappr|close|print");
// $features = "save|back|reload|add".check_approval($data,"edit|approve|delete|disappr");
// if($data["status_aktif"] == 0)
// {
// 	$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
// 	$features = "";
// }
// // $features = "save|back|reload|add|delete|edit|approve";
// // $index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
// $index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);


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


