<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i]["kode_order"]         = $data["kode_order"];
$index_table["data"][$i]["nama_barang"]         = $data["nama_barang"];
$index_table["data"][$i]["supplier"]         = $data["supplier"];
$index_table["data"][$i]["pembuat"]         = $data["pembuat"];
$index_table["data"][$i]["approve"]         = $data["approve"];
$index_table["data"][$i]["status"]          = $data["status"];
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];


$index_table["data"][$i]["status_disetujui"] = "status_disetujui_dokumen";

$check_approval_fields["status_disetujui"] = "status_disetujui_dokumen";
$features = "save|back|reload|approve|edit";
if($data["status_aktif"] == 0)
{
	$index_table["data"][$i]["status_disetujui"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
	$features = "";
}
if($data["status_disetujui_dokumen"] == 0){
	$features = "save|back|reload|edit|approve";
}
if($data["status_disetujui_dokumen"] == 1){
	$features = "save|back|reload|disappr";
}
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);


// if($data["status_dokumen_lengkap"] == 0){
// $index_table["data"][$i]["action"] .= '<a class="ask btn btn-success btn-app-sm" href="?m=kelengkapan_dokumen&amp;f=header_grid&amp;&amp;sm=approve&amp;no='.$data["nomor"].'&amp;mode=2"><i class="fa fa-flag-o" title="Complete"></i></a>';
// }else{
// $index_table["data"][$i]["action"] .= '<a class="ask btn btn-danger btn-app-sm" href="?m=kelengkapan_dokumen&amp;f=header_grid&amp;&amp;sm=disapprove&amp;no='.$data["nomor"].'&amp;mode=2"><i class="fa fa-reply" title="Cancel"></i></a>';
// }
