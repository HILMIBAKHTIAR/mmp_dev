<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["tanggal"] = $data["tanggal"];
$index_table["data"][$i]["relasi"] = $data["relasi"];
$index_table["data"][$i]["kode_btb"] = $data["kode_btb"];
$index_table["data"][$i]["uang_keluar"] = $data["uang_keluar"];
$index_table["data"][$i]["keterangan_nota"] = $data["keterangan_nota"];
$index_table["data"][$i]["total"] = $data["valuta"]." ".number_formatting($data["total_idr"],"money");
$index_table["data"][$i]["status"]          = $data["status"];
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
// $index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_".$data["status_disetujui"]];

// $features = "save|back|reload|add|edit";
// // $features = "save|back|reload|add".check_approval($data,"periode|edit|approve|delete|disappr|close|print");
// // $features = "save|back|reload|add".check_approval($data,"edit|approve|delete|disappr");
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
	$features = "save|back|reload|edit|approve";
}
if($data["status_disetujui"] == 1){
	$features = "save|back|reload|disappr|print";
}
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);



