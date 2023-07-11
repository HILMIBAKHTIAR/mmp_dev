<?php
$index_table["data"][$i]["no"] = $i+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["nilai"] = $data["nilai"];
$features = "edit";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
?>