<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["departmeen"]         = $data["departmeen"];
$index_table["data"][$i]["status_disetujui"] 	= $_SESSION["setting"]["status_disetujui_".$data["status_disetujui"]];



$features = "save|back|reload|add" . check_approval($data, "edit|approve|disappr|delete");
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);




