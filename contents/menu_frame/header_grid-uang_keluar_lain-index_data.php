<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["nomor"]         = $data["nomor"];
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i]["metode"]         = $data["metode"];
$index_table["data"][$i]["account"]         = $data["account"];
$index_table["data"][$i]["valuta"]         = $data["valuta"];
$index_table["data"][$i]["total"] = number_formatting($data["total"],"money");
$index_table["data"][$i]["keterangan_td"]         = $data["keterangan_td"];
$index_table["data"][$i]["pembuat"]         = $data["pembuat"];
$features = "save|back|reload|add|delete|edit";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];


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


