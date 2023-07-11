<?php
// $index_table["data"][$i]["no"] = $no+1;
$index_table["data"][$i]["no"] = $i+$index_page["position"]+1;
$index_table["data"][$i]["kode"] = $data["kode"];
$index_table["data"][$i]["nama"] = $data["nama"];
$index_table["data"][$i]["cabang"] = $data["cabang"];
$index_table["data"][$i]["kategori_aset"] = $data["kategori_aset"];
$index_table["data"][$i]["perolehan"] = number_formatting($data["perolehan"],"money");
$index_table["data"][$i]["penyusutan_lama"] = number_formatting($data["penyusutan_lama"],"integer");
$index_table["data"][$i]["penyusutan_total"] = number_formatting($data["penyusutan_total"],"integer");
$index_table["data"][$i]["satuan"] = $data["satuan"];
$index_table["data"][$i]["custom_tanggal"] = $data["custom_tanggal"];
// $index_table["data"][$i]["status_aktif"] = $_SESSION["setting"]["status_aktif_".$data["status_aktif"]];
$features = "edit";
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);



// $index_table["data"][$i]["status_disetujui"] = $_SESSION["setting"]["status_disetujui_".$data["status_disetujui"]];
// $features = "save|back|reload".check_approval($data,"view|edit");
// $index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);


// $index_table["data"][$i]["status_disetujui"] = $_SESSION["setting"]["status_disetujui_".$data["status_disetujui"]];
// $features = "save|back|reload|view|edit");
// $index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"],$features,"index",$data["nomor"]);
?>