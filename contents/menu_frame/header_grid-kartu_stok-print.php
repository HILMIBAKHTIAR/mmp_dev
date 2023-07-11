<?php include "../config/database.php"; ?>

<style type="text/css">
	body {
		/*Ukuran Kertas A4*/
        height: 8.27in;
        width: 11.69in;
		/*margin:.2in .2in .2in .2in;*/
        margin-left: 0.2in;
        margin-right: 0;
        margin-top: 0.2in;
        margin-bottom: 0.2in; 
    }

	html{padding:0px 0px!important;}
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
	td{padding: 0.01in 0.03in!important; vertical-align: top; word-wrap: break-word;font-family: tahoma!important;letter-spacing: 2px;}
	.rowbordertitle{height:1px;font-size:22px ;border:3px solid black;}
	.rowborder{border:2px solid black;}
	.rowtop{height:1px; border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;}
	.rowtoponly{height:1px; border-top:2px solid black;}
	.rowhorizontal{height:1px; border-top:1px solid black;border-bottom:1px solid black;}
	.rowvertical{height:1px; border-left:1px solid black;border-right:1px solid black;}
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

	

	// update_status_print($nama_table_header,$no,'','status_print');

	$sql = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'%d %b %Y') AS tanggal,
	bs.nama AS supplier
	FROM thpenagihanhutang a
	JOIN mhrelasi bs ON a.relasinomor = bs.nomor AND bs.status_aktif > 0
	WHERE a.nomor = ".$_GET["no"];
	$result = $conn->query($sql);

	// echo $sql;

	$sqldetail = "
	SELECT a.*,
	REPLACE(GROUP_CONCAT(CONCAT(a.transaksikode,'<br>')),',','') AS kode,
	REPLACE(GROUP_CONCAT(CONCAT(ba.kode,' - ',ba.nama,'<br>')),',','') AS 'account',
	REPLACE(GROUP_CONCAT(CONCAT(FORMAT(a.subtotal,0),'<br>')),',','') AS 'total_idr'
	FROM tdpenagihanhutang a
	JOIN thpenagihanhutang b on a.nomorthpenagihanhutang = b.nomor and b.status_aktif > 0
	LEFT JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	WHERE a.status_aktif > 0
	AND a.nomorthpenagihanhutang = ".$_GET["no"];
	$resultdetail = $conn->query($sqldetail);
	
	// echo $resultdetail;

	$detail = "
	SELECT a.*,
	CONCAT(ba.kode,' - ',ba.nama) AS 'account'
	FROM tdpenagihanhutang a
	JOIN thpenagihanhutang b on a.nomorthpenagihanhutang = b.nomor and b.status_aktif > 0
	LEFT JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	WHERE a.status_aktif > 0
	AND a.nomorthpenagihanhutang = ".$_GET["no"];
	$resultdetail2 = $conn->query($detail);

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
			<table class="tg">
			  	<tr class="rowhorizontal">
				    <th class="rowvertical" height="30px" colspan="4" rowspan="2" style="font-size: 16pt"><b>Daftar Pembayaran Hutang</b></th>
			  	</tr>
<!-- 			  	<tr class="rowhorizontal">
				    <td class="rowvertical" style="border: 0px"></td>
				    <td class="rowvertical" style="border: 0px"></td>
			  	</tr> -->
			  	<tr></tr>
			</table>
			<table class="tg">
			  	<tr class="rowhorizontal">
				    <td class="rowvertical" colspan="3" style="height: 30px;">Tanggal : <?php echo date(" d F Y "); ?></td>
				    <td class="rowvertical" colspan="3" style="height: 30px;">No: <?php echo $row["kode"]; ?></td>
				    <td class="rowvertical"  colspan="3" style="height: 30px;">Supplier: <?php echo $row["supplier"]; ?></td>
			  	</tr>				
				<tr class="rowhorizontal">
					<td width="5%" class="rowvertical" rowspan="2" style="text-align: center; background-color: #C0C0C0"><b>NO</b></td>	
					<td width="30%" class="rowvertical" colspan="4" style="text-align: center; background-color: #C0C0C0"><b>Nota</b></td>	
					<td width="10%" class="rowvertical" rowspan="2" style="text-align: center; background-color: #C0C0C0"><b>Total<br>Transaksi</b></td>
					<td width="10%" class="rowvertical" rowspan="2" style="text-align: center; background-color: #C0C0C0"><b>Bayar<br>Transaksi</b></td>
					<td width="10%" class="rowvertical" rowspan="2" style="text-align: center; background-color: #C0C0C0"><b>Potongan<br>PPh23</b></td>	
					<td width="10%" class="rowvertical" rowspan="2" style="text-align: center; background-color: #C0C0C0"><b>Bayar</b></td>				
				</tr>

				<tr class="rowhorizontal">
					<td width="10%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>No.</b></td>	
					<td width="10%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>Tgl</b></td>
					<td width="15%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>No Inv Supplier</b></td>
					<td width="10%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>No Faktur Pajak</b></td>			
				</tr>
				<?php
					
					$ctr = 1;
					$i = 0;
					$arr = array();
					$temp = '';
					if ($resultdetail2->num_rows > 0) {
						while($rowdetail = $resultdetail2->fetch_assoc()) {
							if($ctr==1){
								$temp = $rowdetail["transaksikode"];
							}
							if($rowdetail["transaksikode"]==$temp){
								$arr["transaksikode"][$i] = $rowdetail["transaksikode"];
								$arr["supplier_invoice_nomor"][$i] = $rowdetail["supplier_invoice_nomor"];
								$arr["faktur_pajak_nomor"][$i] = $rowdetail["faktur_pajak_nomor"];
								$arr["sisa"][$i] = $rowdetail["sisa"];
								$arr["bayar"][$i] = $rowdetail["bayar"];
								$arr["pph23"][$i] = $rowdetail["pph23"];
								$arr["subtotal"][$i] = $rowdetail["subtotal"];
								$arr["subtotal_plus"][$i] = $rowdetail["subtotal"]*-1;
							}else{
								$i+=1;
								 $arr["transaksikode"][$i] = $rowdetail["transaksikode"];
								 $arr["supplier_invoice_nomor"][$i] = $rowdetail["supplier_invoice_nomor"];
								 $arr["faktur_pajak_nomor"][$i] = $rowdetail["faktur_pajak_nomor"];
								 $arr["sisa"][$i] = $rowdetail["sisa"];
								 $arr["bayar"][$i] = $rowdetail["bayar"];
								 $arr["pph23"][$i] = $rowdetail["pph23"];
								 $arr["subtotal"][$i] = $rowdetail["subtotal"];
								 $arr["subtotal_plus"][$i] = $rowdetail["subtotal"]*-1;
							}
							$ctr+=1;
						}
					}
					for ($j=0; $j <= $i; $j++) {
						$t = $j+1; 
					?>
					<tr class="rowhorizontal">
						<td class="rowvertical" style="text-align: right; height: 10mm"><?php echo $t.'.'; ?>							
						</td>
						<td class="rowvertical" style="text-align: left;"><?php echo $arr["transaksikode"][$j]; ?>							
						</td>
						<td class="rowvertical" style="text-align: left;"><?php echo $row["tanggal"]; ?></td>
						<td class="rowvertical" style="text-align: center;"><?php echo $arr["supplier_invoice_nomor"][$j]; ?></td>
						<td class="rowvertical" style="text-align: center;"><?php echo $arr["faktur_pajak_nomor"][$j]; ?></td>
						<td class="rowvertical" style="text-align: right;"><?php echo number_formatting($arr["sisa"][$j],"money"); ?></td>					
						<td class="rowvertical" style="text-align: right;"><?php echo number_formatting($arr["bayar"][$j],"money"); ?></td>
						<td class="rowvertical" style="text-align: right;"><?php echo number_formatting($arr["pph23"][$j],"money"); ?></td>
						<td class="rowvertical"style="text-align: right;">
						<?php 
										 if ($arr["subtotal"][$j] < 0){ 
											echo "(". (number_formatting($arr["subtotal_plus"][$j],"money")).")";
										}else{
											echo number_formatting($arr["subtotal"][$j],"money");
										}
									?>
						</td>
					</tr>
				<?php  
					}
				?>
<!-- 				<?php 
					if ($resultselisih->num_rows > 0) {
						while($rowdetail = $resultselisih->fetch_assoc()) {
				?>				
				<tr class="rowhorizontal">
					<td class="rowvertical" style="text-align: left; height: 100mm"></td>
					<td class="rowvertical" style="text-align: left;"><?php echo $rowdetail["account"]; ?></td>
					<td class="rowvertical" style="text-align: right;"><?php echo $rowdetail["total_idr"]; ?></td>
				</tr>
				<?php  
						}
					}
				?> -->
<!-- 				<tr class="rowhorizontal">
					<td class="rowvertical" colspan="3" style="text-align: right;"><b><i>Jumlah</i></b></td>
					<td class="rowvertical" style="text-align: right;"><?php echo number_formatting($row["total"],"money"); ?></td>
					<td class="rowvertical"></td>
				</tr> -->
			</table>
			<br>
			<table class="tg">
				<tr>
					<td width="10%">Terbilang :</td>
					<td width="90%" class="rowvertical" style="border-top: 1px solid black; border-bottom: 1px solid black; text-transform: uppercase;"><?php echo terbilang($row["total"]).' RUPIAH'; ?></td>
				</tr>
			</table>
			<br>
			<table class="tg">
				<tr class="rowhorizontal">
					<td width="20%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>Admin Hutang</b></td>
					<td width="20%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>Disetujui Oleh</b></td>
					<td width="20%" class="rowvertical" style="text-align: center; background-color: #C0C0C0"><b>Diterima Oleh</b></td>
				</tr>
				<tr class="rowhorizontal">
					<td class="rowvertical" style="height: 20mm"></td>
					<td class="rowvertical" style="height: 20mm"></td>
					<td class="rowvertical" style="height: 20mm"></td>
				</tr>
			</table>
			<!--	 <table style="width: 100%;">
					<tr>
						<td style="font-size: 16px;vertical-align: middle;">BUKTI UANG MASUK</td>
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
				<?php }else{ ?>
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
		
					<div class="page-break"></div> -->
				<?php } ?>
			<?php } ?>
<?php
		} // == END FOR
	} else {
		echo "0 results";
	}
$conn->close();
?>