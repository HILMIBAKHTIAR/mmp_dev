<?php
$index_table["data"][$i]["no"] 				= $no+$index_page["position"]+1;
$index_table["data"][$i]["kode"] 			= $data["kode"];
$index_table["data"][$i]["nama"] 			= $data["nama"];
// $index_table["data"][$i]["usaha"]		= $data["usaha"];
$index_table["data"][$i]["menu"] 			= "<a href='?m=".$_SESSION["g.menu"]."&f=header_grid&sm=custom&c=aksesmenu&no=".$data["nomor"]."' target='_blank'>Atur hak akses menu</a>";
$index_table["data"][$i]["tingkatan"] 		= $data["tingkatan"];
$index_table["data"][$i]["status_aktif"] 	= $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "edit";
$index_table["data"][$i]["action"] 			= generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
?>