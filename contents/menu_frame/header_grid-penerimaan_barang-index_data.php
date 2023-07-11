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
$features = "save|back|reload|add|edit";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];




$index_table["data"][$i]["status_disetujui"] = "sp_disetujui_penerimaan";

$check_approval_fields["status_disetujui"] = "sp_disetujui_penerimaan";
$features = "save|back|reload|approve|edit";
if($data["status_aktif"] == 0)
{
	$index_table["data"][$i]["status_disetujui"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
	$features = "";
}
if($data["status_disetujui"] == 1){
	$features = "save|back|reload|disappr|print";
}
if($data["status_dokumen_lengkap"] == 1){
	$features = "save|back|reload";
}
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);

// if($data["status_dokumen_lengkap"] == 0){
// $index_table["data"][$i]["action"] .= '<a class="ask btn btn-success btn-app-sm" href="?m=kelengkapan_dokumen&amp;f=header_grid&amp;&amp;sm=approve&amp;no='.$data["nomor"].'&amp;mode=2"><i class="fa fa-flag-o" title="Complete"></i></a>';
// }else{
// $index_table["data"][$i]["action"] .= '<a class="ask btn btn-danger btn-app-sm" href="?m=kelengkapan_dokumen&amp;f=header_grid&amp;&amp;sm=disapprove&amp;no='.$data["nomor"].'&amp;mode=2"><i class="fa fa-reply" title="Cancel"></i></a>';
// }



// if($data["status_disetujui"] == 1){
// // $index_table["data"][$i]["action"] .= "<a class='btn btn-primary btn-app-sm' target='_blank' href='contents/menu_custom/surat_jalan_new.php?no=".$data["nomor"]."'><i class='fa-info-circle' title='Print Laporan'></i></a>";
// 	// if($_SESSION["login"]["nomor"] == 1 || $_SESSION["login"]["nomor"] == 315){
// 	// 	$index_table["data"][$i]["action"] .= "<a class='btn btn-warning btn-app-sm' target='_blank' href='contents/menu_frame/header_grid-penerimaan_barang_2-print.php?no=".$data["nomor"]."'><i class='fa fa-print' title='Print Laporan'></i></a>";
// 	// }
	
// 	if($_SESSION["login"]["nomor"] == 1 || $_SESSION["login"]["nomor"] == 315){
// 	$index_table["data"][$i]["action"] .= "<a class='btn btn-primary btn-app-sm' targset='_blank' href='pages/print_invoice.php?m=penerimaan_barang_2&f=header_grid&&sm=edit&a=view&no=".$data["nomor"]."'><i class='fa fa-print'></i></a>";
// 	}
// }




if($data["status_disetujui"] == 1){
	$index_table["data"][$i]["action"] .= "<a class='btn btn-primary btn-app-sm' target='_blank' href='contents/menu_custom/penerimaan_barang.php?no=".$data["nomor"]."'><i class='fa-info-circle' title='Print SJ COPY 4'></i></a>";
		if($_SESSION["login"]["nomor"] == 1 || $_SESSION["login"]["nomor"] == 315){
			$index_table["data"][$i]["action"] .= "<a class='btn btn-warning btn-app-sm' target='_blank' href='contents/menu_custom/penerimaan_barang.php?no=".$data["nomor"]."'><i class='fa fa-print' title='Print SJ Unique Code'></i></a>";
		}

	}