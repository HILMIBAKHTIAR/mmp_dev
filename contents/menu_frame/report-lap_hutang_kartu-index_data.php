<?php
$filter["g.menu"] 		= "menu_".$_SESSION["g.menu"];
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

if(!isset($grup))
{
	$grup = "";
	$nomor= 1;
}
if($grup != $data["grup"])
{
	$break = "";					
	$nomor = 1;

	$break .= "	<tr class=\"white\">
					<td colspan = '9'> &nbsp;</td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
				</tr>";

	// JIKA GROUPING PERCABANG, PERRELASI
	if($_SESSION[$filter["g.menu"]]["filter_view"] == 'CABANG') 		
		$break .=	"<tr class=\"white\">
						<td style='text-align:right !important;'><b>CABANG : </b></td>
						<td colspan = '8' style='text-align:left !important;'>".$data["cabang"]."</td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
					</tr>";

	$break	.=	"<tr class=\"line\">
					<td style='text-align:right !important;'><b>RELASI : </b></td>
					<td colspan = '8' style='text-align:left !important;'>".$data["relasi"]."</td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
					<td class = 'hiding'></td>
				</tr>";
	$index_table["data"][$i]["break"] = $break;
}
$grup = $data["grup"];

$index_table["data"][$i]["nomor"] 				= $nomor;
$index_table["data"][$i]["transaksi_tanggal"] 	= $data["transaksi_tanggal"];
$index_table["data"][$i]["cabang"] 				= $data["cabang"];
$index_table["data"][$i]["transaksi_kode"] 		= $data["transaksi_kode"];
$index_table["data"][$i]["pelunasan_kode"] 		= $data["pelunasan_kode"];
$index_table["data"][$i]["keterangan"] 			= $data["keterangan"];
$index_table["data"][$i]["debit"] 				= number_formatting($data["debit"],"money");
$index_table["data"][$i]["kredit"] 				= number_formatting($data["kredit"],"money");
$index_table["data"][$i]["saldo"] 				= number_formatting($data["saldo"],"money");

if ($data["kredit"] < 0) 
	$index_table["data"][$i]["kredit"]		= "(". number_formatting(abs($data["kredit"]),"money"). ")";
if ($data["saldo"] < 0) 
	$index_table["data"][$i]["saldo"]		= "(". number_formatting(abs($data["saldo"]),"money"). ")";

$nomor++;
$grand_debit 			+= $data["debit"];
$grand_kredit 			+= $data["kredit"];

$grand_kredit_abs = $grand_kredit;
if ($grand_kredit_abs < 0) 
	$grand_kredit_abs 	= "(". number_formatting(abs($grand_kredit),"money"). ")";
else
	$grand_kredit_abs 	= number_formatting($grand_kredit,"money");

$footer = "	<tr class=\"info\">
				<td align=\"right\" colspan = 6><b>GRAND TOTAL</b></td>
				<td align=\"right\"><b>".number_formatting($grand_debit,"money")."</b></td>
				<td align=\"right\"><b>".$grand_kredit_abs."</b></td>
				<td align=\"right\"></td>
			</tr>";
?>