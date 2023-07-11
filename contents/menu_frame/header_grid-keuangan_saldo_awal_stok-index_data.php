<?php
$index_table["data"][$i]["no"] = $i+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["tanggal"] = $data["tanggal"];
$index_table["data"][$i]["kode_barang"] = $data["kode_barang"];
$index_table["data"][$i]["nama_barang"] = $data["nama_barang"];
$index_table["data"][$i]["jumlah"] = $data["jumlah"];
$index_table["data"][$i]["satuan"] = $data["satuan"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];

$features = "save|back|reload".check_approval($data,"edit|approve|disappr|delete");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
?>