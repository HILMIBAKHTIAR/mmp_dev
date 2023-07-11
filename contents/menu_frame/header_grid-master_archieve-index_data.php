<?php
$index_table["data"][$i]["no"] = $i+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["nama"] = $data["nama"];
$index_table["data"][$i]["kodefile"] = $data["kodefile"];
$index_table["data"][$i]["preview"] = "<div style='padding:5px 0px;'><a href='".$_SESSION["setting"]["dir_upload"]."/".$data["directory"]."' target='_blank'>Open Link Preview</a></div>";
$index_table["data"][$i]["kategori"] = $data["kategori"];
$index_table["data"][$i]["keterangan"] = $data["keterangan"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
// $index_table["data"][$i]["action"] = generate_action($data["nomor"],"","view|delete");
?>