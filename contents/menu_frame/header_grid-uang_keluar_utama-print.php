<?php include "../config/database.php"; ?>

<style type="text/css">
	html{padding:0px 0px!important;/*width:14.0in;*/ height:5.0in;}
	.tg  {font-size:12px;height:1cm;border-collapse:collapse;border-spacing:0; width : 100%}
	.tgtop{ margin-top:0.2in;  }
	.detailtable td{
		border-right: 2px solid #000;
	}
	body{
		padding: 0px 0px;
	}
	.detailtable td:first-child{
		border-left: 2px solid #000;
	}
	.tg2{
		font-size: 12px;
	    height: auto;
	    border-collapse: collapse;
	    border-spacing: 0;
	    width: 100%;
	}
	table.nopadding tr td{
		padding: 0px!important;
	}
	.tg2 td{
		border: 2px solid #000;
		border-top: 0px;
		border-bottom: 0px;
		}
	.tg2 tr:last-child td{
		border-bottom: 2px solid #000;
	}
	td{padding: 0.01in 0.03in!important; vertical-align: top; word-wrap: break-word;font-family: tahoma!important;letter-spacing: 5px;}
	.rowbordertitle{height:1px;font-size:22px ;border:3px solid black;}
	.rowborder{border:2px solid black;}
	.rowtop{height:1px; border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;}
	.rowtoponly{height:1px; border-top:2px solid black;}
	.rowhorizontal{height:1px; border-top:2px solid black;border-bottom:2px solid black;}
	.rowvertical{height:1px; border-left:2px solid black;border-right:2px solid black;}
	.rowlefttop{height:1px; border-left:1px solid black;border-top:1px solid black;}
	.rowleft{height:1px; border-left:1px solid black;}
	.rowrighttop{height:1px; border-right:1px solid black;border-top:1px solid black;}
	.rowright{height:1px; border-right:2px solid black;}
	.rowbottom{height:1px; border-bottom:2px solid black;}
	.rowleftbottom{height:1px; border-bottom:1px solid black;border-left:1px solid black;}
	.rowrightbottom{height:1px; border-bottom:1px solid black;border-right:1px solid black;}
	.rowclose{height:1px; border-bottom:2px solid black;border-left:2px solid black;border-right:2px solid black;}
	.line{border-bottom:2px solid black}
	.line td{padding: 0px!important;}
	.noborder { border: transparent;  }
	.linespan{
		display: block;
	    height: 0px;
	    /* background: black; */
	    width: 98%;
	    margin-left: 2%;
	    border-bottom: 1px solid black;
	}
	.kwitansi tr td{
		padding-top: 15px!important;
		position: relative;
	}
	.nominal{
		position: absolute;
	    background: white;
	    left: 10px;
	    padding: 1px 10px 0px 10px;
	}
	.border-dashed{
	    border-bottom: 1px dashed black;
	    display: block;
	    float: left;
	    padding-top: 10px;
	}

	/*<?php
		if(isset($_GET["tipe_printer"]) && $_GET["tipe_printer"] == "laser"){
			echo "html{ width:8.5in; }";
			echo ".tg { font-size:12px!important; }";
			echo ".tgtop { margin-top:0in; }";
		}
	?>*/
	
	@page {
	    margin: 0;
	}
</style>

<?php
	$no = $_GET["no"];

	// Create connection
	$conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$principal_nama = "";

	$nama_table_header = "thuangkeluar";
	$nama_table_detail = "tduangkeluar";

	/*$sql = "SELECT a.*, 
				DATE_FORMAT(a.tanggal,'%d %b %Y') AS currentdate_dmy, 
				b.nama AS principal_nama, 
				c.nama AS account_nama 
			FROM $nama_table_header a 
			LEFT JOIN mhprincipal b ON a.nomormhprincipal = b.nomor 
			JOIN mhaccount c ON a.nomormhaccount = c.nomor 
			WHERE a.nomor = $no";
	$result = $conn->query($sql);*/


	/*$results = $conn->query($sql);
	if ($results->num_rows > 0) {
		while($rows = $results->fetch_assoc()) {
			$principal_nama = $rows["principal_nama"];
		}
	}*/

	// update_status_print($nama_table_header,$no,'','status_print');

	$sql = "
	SELECT a.*,
	CONCAT(ba.kode,' - ',ba.nama,'|',ba.nomor) AS 'browse|nomormhaccount',
	CONCAT(bat.kode,' - ',bat.nama,'|',bat.nomor) AS 'browse|nomormhaccounttujuan'
	FROM thuangkeluar a
	JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	JOIN mhaccount bat ON a.nomormhaccounttujuan = bat.nomor AND bat.status_aktif > 0
	WHERE a.nomor = ".$_GET["no"];
	$result = $conn->query($sql);

	// echo $sql;

	$sqldetail = "
	SELECT a.*
	FROM tduangkeluar a
	WHERE a.status_aktif > 0
	AND a.nomorthuangkeluar = ".$_GET["no"];
	$resultdetail = $conn->query($sqldetail);
	
	// echo $resultdetail;

	//========================================== Break Table ==================================================
	
		$totalrow = $resultdetail->num_rows;
		$rowprint = 0;
		$breakdata = 8;
		$page = ceil($totalrow / $breakdata);

		// if($totalrow > 12){ 
		// 	$breakdata = 40;
		// }

		function breakTDTable($rowprint, $breakdata){
			for($i = 0;$i < ($breakdata - $rowprint); $i++){
				echo "<tr>
						<td class='cleantable'>&nbsp;</td>
						<td class='cleantable'>&nbsp;</td>
						<td class='cleantable'>&nbsp;</td>
						<td class='cleantable'>&nbsp;</td>
						<td class='cleantable'>&nbsp;</td>
						<td class='cleantable'>&nbsp;</td>
					</tr>";
			}
		}

	//=========================================================================================================

	//========================================== FUNCTION TERBILANG ==================================================
		
		function terbilang($x){
			$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
			if ($x < 12)
			return " " . $abil[$x];
			elseif ($x < 20)
			return Terbilang($x - 10) . " belas";
			elseif ($x < 100)
			return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
			elseif ($x < 200)
			return " seratus" . Terbilang($x - 100);
			elseif ($x < 1000)
			return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
			elseif ($x < 2000)
			return " seribu" . Terbilang($x - 1000);
			elseif ($x < 1000000)
			return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
			elseif ($x < 1000000000)
			return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
		}

	//=========================================================================================================
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
?>
<?php 
	
	$page = 1;
// echo $page;
	//==== nentukan berapa banyak page ====//
	for($i = 0; $i < $page; $i++){ 
		$rowprint = 0; // === reset counter
			?>
				<table style="width: 100%;">
					<tr>
						<td style="font-size: 16px;vertical-align: middle;">KWITANSI UANG KELUAR</td>
						<td style="text-align: right;"><img src="../contents/image/logokw.jpeg"  width="250"> </td>
					</tr>
				</table>
				<table style="margin-top: 10px;width: 100%;" class="kwitansi">
					<tr>
						<td style="width: 20%;">Terima dari</td>
						<td>:<span style="padding-left: 10px;text-transform: uppercase;"><?php echo $row["relasinama"]; ?></span><span class="linespan"></span></td>
					</tr>
					<tr>
						<td style="width: 20%;">Alamat</td>
						<td>:<span style="padding-left: 10px;text-transform: uppercase;"><?php echo $row[""].' '.$row[""]; ?></span><span class="linespan"></span></td>
					</tr>
					<tr>
						<td style="width: 20%;">Banyaknya uang</td>
						<td>: <span class="nominal">Rp.</span><span style="padding-left: 45px;"><?php echo number_formatting($row["total"],"money"); ?></span><span class="linespan"></span></td>
					</tr>
					<tr>
						<td style="width: 20%;">Untuk Pembayaran</td>
						<td>:<span style="padding-left: 10px;"><?php echo $kategory; ?></span>
							<span class="linespan"></span>
						</td>
					</tr>
					<tr>
						<td style="width: 20%;">&nbsp;</td>
						<td>&nbsp;<span class="linespan"></span></td>
					</tr>
					<tr>
						<td style="width: 20%;">Nomor Referensi</td>
						<td>:<span style="padding-left: 10px;"><?php echo $row["kode"]; ?></span><span class="linespan"></span></td>
					</tr>
					<tr>
						<td style="width: 20%;">Terbilang</td>
						<td>:<span style="padding-left: 10px;text-transform: uppercase;"><?php echo terbilang($row["total"]).' RUPIAH'; ?></span><span class="linespan"></span></td>
					</tr>
				</table>
				<table style="width: 100%;margin-top:30px;">
					<tr>
						<td style="width: 70%;"></td>
						<td style="width: 35%;text-align: center;">
							<?php echo $row[""]; ?>, <?php echo date("d M Y")?>
						</td>
						<td style="width: 5%;">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td style="text-align: center;padding: 30px 0px!important;">Materai + stempel</td>
						<td></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<span style="display:block;float: left;width: 15%;text-align: right;">(</span>
							<span class="border-dashed" style="width: 70%;"></span>
							<span style="display:block;float: left;width: 15%;text-align: left;"> )</span>
						</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				<?php if($i == $page - 1){ ?>
				
					<table cellpadding="2" border="0" class=tg style="margin-top: 30px;">
						<tr>
							<td style="width:80%;text-align:left;">
								Cetakan : <?=$row["status_print"]?>
								&nbsp;&nbsp;|&nbsp;&nbsp;
								Tgl. Cetak : <?=date("d M Y H:i:s")?></td>
							<td style="width:20%;text-align:right;">
								Hal. <?=($i + 1)." dari ".$page?>
							</td>
						</tr>
					</table>
				<!--end tambahanpatrick-->
				<?php }else{ ?>
				<!--begin tambahanpatrick-->
					<table cellpadding="2" border="0" class=tg>
						<tr>
							<td style="width:80%;text-align:left;">
								Cetakan : <?=$row["status_print"]?>
								&nbsp;&nbsp;|&nbsp;&nbsp;
								Tgl. Cetak : <?=date("d M Y H:i:s")?></td>
							<td style="width:20%;text-align:right;">
								Hal. <?=($i + 1)." dari ".$page?>
							</td>
						</tr>
					</table>
		
					<div class="page-break"></div>
				<?php } ?>
			<?php } ?>
<?php
		} // == END FOR
	} else {
		echo "0 results";
	}
$conn->close();
?>