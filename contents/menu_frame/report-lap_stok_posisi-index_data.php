<?php
$index_table["data"][$i]["gudang"] = $data["gudang"];
$index_table["data"][$i]["barang_kode"] = $data["barang_kode"];
$index_table["data"][$i]["barang_nama"] = $data["barang_nama"];
$index_table["data"][$i]["batch_number"] = $data["batch_number"];
$index_table["data"][$i]["expired_date"] = $data["expired_date"];
$index_table["data"][$i]["jumlah"] = number_formatting($data["jumlah"],"money");
$index_table["data"][$i]["satuan_nama"] = $data["satuan_nama"];
$total_jumlah += $data["jumlah"];
$footer = "	<tr class=\"primary\">
				<td></td>
				<td></td>
				<td><b>TOTAL</b></td>
				<td align=\"right\"><b>".number_formatting($total_jumlah,"money")."</b></td>
				<td></td>
			</tr>";
?>