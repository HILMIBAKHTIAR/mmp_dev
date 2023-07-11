<?php
$filter["g.menu"] 		= "menu_".$_SESSION["g.menu"];
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

if(!isset($grup))
{
	$grup = "";
	$nomor= 1;
}
if($_SESSION[$filter["g.menu"]]["filter_view"] == 'CABANG') 
{
	if($grup != $data["cabang"])
	{
		$break = "";					
		$nomor = 1;

		$break .= "	<tr class=\"white\">
						<td colspan = '6'> &nbsp;</td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
					</tr>
					<tr class=\"line\">
						<td colspan = '6' style='text-align:left !important;'><b>CABANG : </b>".$data["cabang"]."</td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
						<td class = 'hiding'></td>
					</tr>";
		$index_table["data"][$i]["break"] = $break;
	}
	$grup = $data["cabang"];
}

$index_table["data"][$i]["relasi"] 			= $data["relasi"];
$index_table["data"][$i]["saldo_awal"] 		= number_formatting($data["saldo_awal"],"money");
$index_table["data"][$i]["debit"] 			= number_formatting($data["debit"],"money");
$index_table["data"][$i]["kredit"] 			= number_formatting($data["kredit"],"money");
$index_table["data"][$i]["saldo_akhir"] 	= number_formatting($data["saldo_akhir"],"money");

// JIKA GROUPING PERCABANG, PERRELASI
if($_SESSION[$filter["g.menu"]]["filter_view"] == 'CABANG')
{
	// LINK POSISI HUTANG
	$tgl_awal = date_format(date_create("2000-01-01"), $_SESSION["setting"]["date"]);
	$index_table["data"][$i]["link"] 			= "
	<a target='_blank' class='btn btn-primary btn-app-sm' href='dashboard.php?m=lap_hutang_posisi&f=report&link=1&view=".$_SESSION[$filter["g.menu"]]["filter_view"]."&relasi=".$data["relasi"]."&cabang_no=".$data["cabang_nomor"]."&relasi_no=".$data["relasi_nomor"]."&tgl_awal=".$tgl_awal."&tgl_akhir=".$_SESSION[$filter["g.menu"]]["filter_".$filter["end_date"]]."&jenis=".$_SESSION[$filter["g.menu"]]["filter_jenis"]."'><i class='fa fa-link' title='Posisi'></i></a>";
	// LINK KARTU HUTANG
	$index_table["data"][$i]["link"] 			.= "
	<a target='_blank' class='btn btn-warning btn-app-sm' href='dashboard.php?m=lap_hutang_kartu&f=report&link=1&view=".$_SESSION[$filter["g.menu"]]["filter_view"]."&relasi=".$data["relasi"]."&cabang_no=".$data["cabang_nomor"]."&relasi_no=".$data["relasi_nomor"]."&tgl_awal=".$_SESSION[$filter["g.menu"]]["filter_".$filter["start_date"]]."&tgl_akhir=".$_SESSION[$filter["g.menu"]]["filter_".$filter["end_date"]]."&jenis=".$_SESSION[$filter["g.menu"]]["filter_jenis"]."'><i class='fa fa-link' title='Kartu'></i></a>";
}
else
{
	$cabang_no  = $_SESSION[$filter["g.menu"]]["filter_nomormhcabang"];
	
	// LINK POSISI HUTANG
	$tgl_awal = date_format(date_create("2000-01-01"), $_SESSION["setting"]["date"]);
	$index_table["data"][$i]["link"] 			= "
	<a target='_blank' class='btn btn-primary btn-app-sm' href='dashboard.php?m=lap_hutang_posisi&f=report&link=1&view=".$_SESSION[$filter["g.menu"]]["filter_view"]."&relasi=".$data["relasi"]."&cabang_no=".$cabang_no."&relasi_no=".$data["relasi_nomor"]."&tgl_awal=".$tgl_awal."&tgl_akhir=".$_SESSION[$filter["g.menu"]]["filter_".$filter["end_date"]]."&jenis=".$_SESSION[$filter["g.menu"]]["filter_jenis"]."'><i class='fa fa-link' title='Posisi'></i></a>";
	// LINK KARTU HUTANG
	$index_table["data"][$i]["link"] 			.= "
	<a target='_blank' class='btn btn-warning btn-app-sm' href='dashboard.php?m=lap_hutang_kartu&f=report&link=1&view=".$_SESSION[$filter["g.menu"]]["filter_view"]."&relasi=".$data["relasi"]."&cabang_no=".$cabang_no."&relasi_no=".$data["relasi_nomor"]."&tgl_awal=".$_SESSION[$filter["g.menu"]]["filter_".$filter["start_date"]]."&tgl_akhir=".$_SESSION[$filter["g.menu"]]["filter_".$filter["end_date"]]."&jenis=".$_SESSION[$filter["g.menu"]]["filter_jenis"]."'><i class='fa fa-link' title='Kartu'></i></a>";
}

if ($data["kredit"] < 0) 
	$index_table["data"][$i]["kredit"]	= "(". number_formatting(abs($data["kredit"]),"money"). ")";
if ($data["saldo_akhir"] < 0) 
	$index_table["data"][$i]["saldo_akhir"]	= "(". number_formatting(abs($data["saldo_akhir"]),"money"). ")";

$grand_saldo_awal 		+= $data["saldo_awal"];
$grand_debit 			+= $data["debit"];
$grand_kredit 			+= $data["kredit"];
$grand_saldo_akhir 		+= $data["saldo_akhir"];

$grand_kredit_abs = $grand_kredit;
if ($grand_kredit_abs < 0) 
	$grand_kredit_abs 	= "(". number_formatting(abs($grand_kredit),"money"). ")";
else
	$grand_kredit_abs 	= number_formatting($grand_kredit,"money");

$grand_saldo_awal_abs = $grand_saldo_awal;
if ($grand_saldo_awal_abs < 0) 
	$grand_saldo_awal_abs 	= "(". number_formatting(abs($grand_saldo_awal),"money"). ")";
else
	$grand_saldo_awal_abs 	= number_formatting($grand_saldo_awal,"money");

$grand_saldo_akhir_abs 	= $grand_saldo_akhir;
if ($grand_saldo_akhir_abs < 0) 
	$grand_saldo_akhir_abs = "(". number_formatting(abs($grand_saldo_akhir),"money"). ")";
else
	$grand_saldo_akhir_abs = number_formatting($grand_saldo_akhir,"money");

$footer = "	<tr class=\"info\">
				<td align=\"right\"><b>GRAND TOTAL</b></td>
				<td align=\"right\"><b>".$grand_saldo_awal_abs."</b></td>
				<td align=\"right\"><b>".number_formatting($grand_debit,"money")."</b></td>
				<td align=\"right\"><b>".$grand_kredit_abs."</b></td>
				<td align=\"right\"><b>".$grand_saldo_akhir_abs."</b></td>
				<td align=\"right\"></td>
			</tr>";
?>