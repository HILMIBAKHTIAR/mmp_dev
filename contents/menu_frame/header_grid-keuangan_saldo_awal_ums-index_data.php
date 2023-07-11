<?php
// SETTING DATA FOR INDEX
$index_table["data"][$i]["no"]           = $no+$index_page["position"]+1;
$index_table["data"][$i]["kode"]         = $data["kode"];
$index_table["data"][$i]["tanggal"]         = $data["tanggal"];
$index_table["data"][$i][ "supplier"]         = $data["supplier"];
$index_table["data"][$i]["total"]         = number_formatting($data["total"], 'money');
$index_table["data"][$i]["keterangan"]         = $data["keterangan"];

$check_approval_fields["status_disetujui"] = "status_disetujui";
$features = "save|back|reload".check_approval($data,"edit|approve|disappr|delete",$check_approval_fields);
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);

// END SETTING DATA FOR INDEX
