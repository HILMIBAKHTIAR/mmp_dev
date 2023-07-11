<?php
$index_table["data"][$i]["no"] = $no+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["nama"] = $data["nama"];
$index_table["data"][$i]["cabang"] = $data["cabang"];
$index_table["data"][$i]["detail"] = $data["headerdetail"];
$index_table["data"][$i]["kasbank"] = $data["kasbank"];
$index_table["data"][$i]["account_type"] = $data["account_type"];
$index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "edit|delete";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
