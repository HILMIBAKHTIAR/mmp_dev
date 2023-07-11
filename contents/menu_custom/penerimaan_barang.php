<?php include "../../config/database.php"; ?>

<link href="../../<?php echo $config["webspira"]; ?>assets_dashboard/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
<script type="text/javascript" src="../../assets_custom/js/qrcode/qrcode.js"></script>

<style type="text/css">
	/* html{padding-left:10px !important; padding-right:0px !important; padding-top: 5px !important;width:13.4in; height:5.0in;} */
	/* html{padding:0px !important;width:100%;} */
	@media print {
	     @page {
	            /* margin: 20px 0 0; */
	            /*size: 21.00cm 29.70cm!important;
	             4cm X 2,5 cm ukuran kertas barcode OI
	            margin: 0mm 0mm 0mm 0mm!important;*/
	              size: auto;
	        }
	    }
	html{width:98%;margin:auto !important;}
	.tg  {font-size:12px !important;height:1cm;border-collapse:collapse;border-spacing:0;margin:auto !important;width : 100%;}
	.tg1  {font-size:12px !important;height:0cm;border-collapse:collapse;border-spacing:0;margin:auto !important;width : 100%;}
	.tg12  {font-size:12px;height:0cm;border-collapse:collapse;border-spacing:0;margin:auto !important;width : 100%;}
	.tg13  {font-size:12px;height:1cm;border-collapse:collapse;border-spacing:0;margin:auto !important;width : 100%;}
	.truncate {
							width: 450px;
							white-space: nowrap;
							overflow: hidden;
							text-overflow: ellipsis;
							display: inline-block;
						}
	.tgtop{ margin-top:0;  }
	.detailtable td{
		border-right: 2px solid #000;
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
		font-size:12px!important;
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
	.watermark {
    /* Used to position the watermark */
    position: relative;
	}

	.watermark_wrapper {
    /* Center the content */
    align-items: center;
    display: flex;
    justify-content: center;

    /* Absolute position */
    left: 0px;
    position: absolute;
    top: 0px;

    /* Take full size */
    height: 100%;
    width: 100%;
	}

	.watermark_css {
    /* Text color */
    color: rgba(0, 0, 0, 0.2);

    /* Text styles */
    font-size: 270px;
    font-weight: bold;
    text-transform: uppercase;

    /* Rotate the text */
    transform: rotate(-45deg);

    /* Disable the selection */
    user-select: none;
	}



	td{padding: 0.01in 0.03in!important; vertical-align: top; word-wrap: break-word;font-family: tahoma!important;letter-spacing: 1px;}
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


	img{
		width: 100%;
	}
</style>

<?php
	$no = $_GET["no"];
	// $tipe = $_GET["t"];
	// Create connection
	$conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$principal_nama = "";

	$nama_table_header = "thsuratjalan";
	$nama_table_detail = "tdsuratjalan";


	// update_status_print($nama_table_header,$no,'','status_print');


	$sql = "
	SELECT a.*,
	a.kode AS barcode,
	-- CONCAT(po.no_po_dist,',',' TIBA ', date_format(so.tanggal_permintaan_tiba,'%d-%m-%Y'),', ',a.keterangan,d.keterangan) AS keterangan,
	CONCAT(po.no_po_dist,', ',a.keterangan,d.keterangan) AS keterangan,
	DATE_FORMAT(a.tanggal,'%d %b %Y') AS tanggal_dmy,
	r.nama AS relasi,
	i.supir,
	e.alamat AS alamat,
	UPPER(h.tujuan) AS tujuan,
	i.plat_no_datang AS no_polisi,
	(select SUM(jumlah_unit) FROM tdsuratjalan where a.nomor = nomorthsuratjalan AND status_aktif =1) AS sum_jumlah,
	e.alamat AS alamat_tujuan,
	if(e.namakontak = '' OR e.namakontak is null,'',concat(e.namakontak,' (',e.teleponkontak,')')) AS pic,
	j.nama AS kota,
	f.nama AS expedisi,
	d.kode_ascend,
	g.nama AS mobil,
	adm.nama AS nama_pembuat,
	d.nomormhentity AS entity
	FROM thsuratjalan a
	JOIN mhrelasi r ON a.nomormhrelasi = r.nomor AND r.status_aktif > 0
	JOIN thpickinglist c ON FIND_IN_SET(c.nomor, a.nomorthpickinglist)
	JOIN thdeliveryorder d ON c.nomorthdeliveryorder = d.nomor
	JOIN mdrelasidistributorlokasi e ON d.nomormdrelasidistributorlokasi = e.nomor
	JOIN mhrelasi f ON d.nomormhrelasiekspedisi = f.nomor
	JOIN mhjeniskendaraan g ON d.nomormhjeniskendaraan = g.nomor
	JOIN tdactivitydo h ON d.kode_ascend = h.kode_delivery_order AND h.status_aktif > 0
	JOIN thactivity i ON h.nomorthactivity = i.nomor
	LEFT JOIN thpesananbarang so ON d.nomorthpesananbarang = so.nomor 
	LEFT JOIN thpojual po ON so.nomorthpojual = po.nomor
	LEFT JOIN mhkota j ON r.nomormhkota = j.nomor 
	JOIN mhadmin adm ON a.dibuat_oleh = adm.nomor
	WHERE a.nomor = ".$_GET["no"]."
	GROUP BY a.nomor";
	$result = $conn->query($sql);
	$result2= $conn->query($sql);
	$result3= $conn->query($sql);
	$result4= $conn->query($sql);


	 $r = mysql_fetch_array(mysql_query($sql));

	$sqldetail = "
	SELECT a.*,
	b.kode AS kode_barang,
	b.nama AS barang,
	c.nama AS satuan,
	IF( td.jumlah_bonus > 0, CONCAT( 'bonus ', td.jumlah_bonus, ' ', IFNULL(a.keterangan,'') ), IFNULL(a.keterangan,'') ) AS keterangan
	FROM tdsuratjalan a
	JOIN mhbarang b ON a.nomormhbarang = b.nomor AND b.status_aktif > 0
	JOIN mhsatuan s ON a.nomormhsatuan = s.nomor AND s.status_aktif > 0
	JOIN mhsatuan c ON a.nomormhsatuanunit = c.nomor
	JOIN tdpickinglist pl ON a.nomortdpickinglist = pl.nomor
	JOIN tddeliveryorder td ON pl.nomortddeliveryorder = td.nomor 
	WHERE a.status_aktif > 0 AND a.jumlah > 0
	AND a.nomorthsuratjalan = ".$_GET["no"];
	$resultdetail = $conn->query($sqldetail);

	// echo $sql;
	// echo "<br>";
	// echo $sqldetail;

	//========================================== Break Table ==================================================

		$totalrow = $resultdetail->num_rows;
		$rowprint = 0;
		$breakdata = 50;
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
	// $page = 1;

	//==== nentukan berapa banyak page ====//
	for($i = 0; $i < $page; $i++){
		$rowprint = 0; // === reset counter

			?>
					<div style="height: 0.7cm;">
		</div>
			<div class="watermark">
    <!-- Watermark watermark -->
    		<div class="watermark_wrapper">
        <!-- The watermark -->
        	<div class="watermark_css">
            ASLI
        		</div>
    		</div>

<!-- 
			<table border="0" class="tg1" style="width:100%;">
				<tr style="height:80px" >
					<td colspan="0" style="width: 50%;">PT.INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="2" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>
			</table> -->

				<table border="0" class="tg" style="width:100%;">
				<?php if($row["nomormhentity"] == 1){ ?>
						<tr>
					<td colspan="0" style="width: 50%;">PT. INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<!-- <?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br> -->
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br><br>
						
<!-- 
			            <div id="qrcode_<?php echo $row['nomor']; ?>" class="center" style="width: 1.8cm; height: 1.8cm;border: 0px black solid;"> 
			            </div>
			      -->

			      		<!-- fery -->
			      <div id="qrcode" class = "center" style="width: 2.2cm; height: 2.2cm;"></div>

					</td>

				</tr>
				<?php }else{ ?>
					<tr>
					<td colspan="0" style="width: 50%;">PT. ASIA SAKTI WAHID FOODS MANUFACTURE
						<br>
						<br>
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<!-- <?php echo $row["alamat_tujuan"]; ?></span><br> -->
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>

				<?php } ?>
			</table>

		<table border="0" class="tg" style="width:100%;font-size:12px;">
			<tr>
				<td style="width: 25%;">
					<table class="nopadding">
						<tr>
							<td>Hal. <?=($i + 1)." dari ".$page?></td>
							<td></td>
						</tr>
						<!-- <tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr> -->
					</table>
				</td>
				<br>
				<td style="width:50%;text-align:center;">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
					 <!-- <span style="font-size:12px;">KODE VERIFIKASI : <?php echo $row["kode_verifikasi"]; ?></span> -->
				</td>
				<td>
				</td>
				<!-- <td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>
	<table border="0" style="width:100%;font-size:14px;">
			<tr>
					<td style="text-align:right;">
					SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?></td>
			</tr>
	</table>
	<table border="0" class="tg" style="width:100%">
			<tr>
				<td style="width: 75%;">
					<table class="nopadding" style="font-size:12px;">
						<tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. DO</td>
							<td>: <?php echo $row["kode_ascend"] ?></td>
						</tr>
						<tr>
							<td>Expedisi</td>
							<td>: <?php echo $row["expedisi"] ?></td>
						</tr>
					</table>
				</td>
				<td style="width: 25%;text-align:left;">
					<table class="nopadding" style="font-size:12px;">
						
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>Kendaraan</td>
							<td>: <?php echo $row["mobil"] ?></td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>: <?php echo $row["tujuan"] ?></td>
						</tr>
					</table>
				</td>
				<!-- <td style="width:50%;text-align:center">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
				</td>
				<td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>

				<table cellpadding="2" class="tg detailtable" style="margin-top: 5px;width:100%;">
					<tr class=rowhorizontal>
						<td class=rowvertical style="width:1%;text-align:center;">No.</td>
						<td class=rowvertical style="width:20%;text-align:center;">KODE BARANG</td>
						<td class=rowvertical style="width:46%;text-align:center;">NAMA BARANG</td>
						<td class=rowvertical style="width:13%;text-align:center;">BANYAKNYA</td>
						<td class=rowvertical style="width:20%;text-align:center;">KETERANGAN</td>
					</tr>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<?php
						$ctr = ($i * $breakdata) + 1;
						$jum=0;
						//	tambahanpatrick
						$sqldetail1 = $sqldetail." LIMIT " . ($i * $breakdata) . ", " . $breakdata;
						//	echo $sqldetail1;
						$resultdetail = $conn->query($sqldetail1);


						if ($resultdetail->num_rows > 0) {
							while($rowdetail = $resultdetail->fetch_assoc()) {
								// $diskon_1 = ($rowdetail["harga"] * $rowdetail["jumlah_unit"]) * $rowdetail["diskon_1"] / 100;
								// $jumlah = $rowdetail["harga"] * $rowdetail["jumlah_unit"];
									if($ctr == $result_detail_page->num_rows){ $lastclass = 'rmvlast'; }
								?>
								<tr >
									<td style="width:1%;text-align:right;"><?php echo $ctr."." ?></td>
									<td style="width:20%;"><?php echo $rowdetail["kode_barang"]?></td>
									<td style="width:46%;"><span class="truncate"><?php echo $rowdetail["barang"]?></span></td>
										<td style="width:13%;"><?php
									 echo number_format($rowdetail["jumlah_unit"],0).' '.$rowdetail["satuan"];
									 ?>
									</td>
									<td style="width:20%;"><?php echo $rowdetail["keterangan"]?></td>
								</tr>
					<?php
								$jum+=abs($rowdetail["jumlah_unit"]);
								$ctr++;
								$rowprint += 1; // === counter berapa baris kosong bila tidak ada row lagi
							}
						}
						breakTDTable($rowprint, $breakdata); // === memberikan baris kosong bila tidak ada row lagi dari hasil $rowprint
					?>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<tr class=line><td colspan="9"></td></tr>
				</table>
				<table border="0"  class="tg" style="width: 100%;">
				<?php if($i == $page - 1){ ?>
						<tr>
							<td style="width:85%;font-size:11px;letter-spacing:1px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;letter-spacing:1px;" colspan="2">
								JUMLAH :</td>
							<td style="text-align:right;">
							<?php echo number_format($row["sum_jumlah"],0)?>
							</td>
						</tr>
						<table>
							<tr>
								<td style="width:85%;font-size:11px;letter-spacing:1px; font-weight: bold;" rowspan="2">SJ ASLI ( WAJIB TTD & STEMPEL ) KEMBALI KE SOPIR</td>
							</tr>
						</table>
						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
						</tr> 
					</table>

						<?php }else{ ?>
							<tr>
							<td style="width:85%;font-size:11px;letter-spacing:1px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;" colspan="2">
								</td>
							<td style="text-align:right;">

							</td>
						</tr>
						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php } ?>
				</table>

				<table style="margin-top: 0px;width: 100%;font-size:12px!important;">
					<tr>
						<td style="width: 100%;margin-top: 15px;">
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;">Diterima,</td>
									<!-- <td style="width: 25%;text-align: center;">Diterima,</td> -->
									<td style="width: 25%;text-align: center;">Diketahui,</td>
									<td style="width: 25%;text-align: center;">Dibuat,</td>
								</tr>
									</table>
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;padding-top: 60px!important;">(<?php echo $row["relasi"]; ?>)<td>
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["supir"]; ?>)</td>
									<!-- <td style="width: 25%;text-align: center;padding-top: 60px!important;">(Spv Logistik)</td> -->
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["nama_pembuat"]; ?>)</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

				
			</div>
					<div class="page-break"></div>


<?php
		}	
			} // == END FOR
	} else {
		echo "0 results";
	}	

		if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			// echo"tes";
?>
<?php
	// $page = 1;

	//==== nentukan berapa banyak page ====//
	for($i = 0; $i < $page; $i++){
		$rowprint = 0; // === reset counter

			?>
				<div style="height: 2.3cm;">
		</div>
			<div class="watermark">
    <!-- Watermark watermark -->
    		<div class="watermark_wrapper">
        <!-- The watermark -->
        	<div class="watermark_css">
            COPY1
        </div>
    </div>


			
			<!-- <table border="0" class="tg1" style="width:100%;">
				<tr style="height:80px" >
					<td colspan="0" style="width: 50%;">PT.INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>
			</table> -->

				<table border="0" class="tg" style="width:100%;">
				<?php if($row["nomormhentity"] == 1){ ?>
						<tr>
					<td colspan="0" style="width: 50%;">PT. INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br><br>
						<div id="qrcode2" class = "center" style="width: 2.2cm; height: 2.2cm;"></div>

					</td>
					</td>
				</tr>
				<?php }else{ ?>
					<tr>
					<td colspan="0" style="width: 50%;">PT. ASIA SAKTI WAHID FOODS MANUFACTURE
						<br>
						<br>
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>

				<?php } ?>
			</table>

		<table border="0" class="tg" style="width:100%;font-size:12px;">
			<tr>
				<td style="width: 25%;">
					<table class="nopadding">
						<tr>
							<td>Hal. <?=($i + 1)." dari ".$page?></td>
							<td></td>
						</tr>
						<!-- <tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr> -->
					</table>
				</td>
				<br>
				<td style="width:50%;text-align:center;">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
					 <span style="font-size:12px;">KODE VERIFIKASI : <?php echo $row["kode_verifikasi"]; ?></span>
				</td>
				<td>
				</td>
				<!-- <td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>
	<table border="0" style="width:100%;font-size:14px;">
			<tr>
					<td style="text-align:right;">
					SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?></td>

			</tr>
	</table>

		<table border="0" class="tg" style="width:100%">
			<tr>
				<td style="width: 75%;">
					<table class="nopadding" style="font-size:12px;">
						<tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. DO</td>
							<td>: <?php echo $row["kode_ascend"] ?></td>
						</tr>
						<tr>
							<td>Expedisi</td>
							<td>: <?php echo $row["expedisi"] ?></td>
						</tr>
					</table>
				</td>
				<td style="width: 25%;text-align:left;">
					<table class="nopadding" style="font-size:12px;">
						
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>Kendaraan</td>
							<td>: <?php echo $row["mobil"] ?></td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>: <?php echo $row["tujuan"] ?></td>
						</tr>
					</table>
				</td>
				<!-- <td style="width:50%;text-align:center">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
				</td>
				<td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>

				<table cellpadding="2" class="tg detailtable" style="margin-top: 5px;width:100%;">
					<tr class=rowhorizontal>
						<td class=rowvertical style="width:1%;text-align:center;">No.</td>
						<td class=rowvertical style="width:20%;text-align:center;">KODE BARANG</td>
						<td class=rowvertical style="width:50%;text-align:center;">NAMA BARANG</td>
						<td class=rowvertical style="width:13%;text-align:center;">BANYAKNYA</td>
						<td class=rowvertical style="width:20%;text-align:center;">KETERANGAN</td>
					</tr>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<?php
						$ctr = ($i * $breakdata) + 1;
						$jum=0;
						//	tambahanpatrick
						$sqldetail1 = $sqldetail." LIMIT " . ($i * $breakdata) . ", " . $breakdata;
						//	echo $sqldetail1;
						$resultdetail = $conn->query($sqldetail1);


						if ($resultdetail->num_rows > 0) {
							while($rowdetail = $resultdetail->fetch_assoc()) {
								// $diskon_1 = ($rowdetail["harga"] * $rowdetail["jumlah_unit"]) * $rowdetail["diskon_1"] / 100;
								// $jumlah = $rowdetail["harga"] * $rowdetail["jumlah_unit"];
									if($ctr == $result_detail_page->num_rows){ $lastclass = 'rmvlast'; }
								?>
								<tr >
									<td style="width:1%;text-align:right;"><?php echo $ctr."." ?></td>
									<td style="width:20%;"><?php echo $rowdetail["kode_barang"]?></td>
									<td style="width:46%;"><span class="truncate"><?php echo $rowdetail["barang"]?></span></td>
										<td style="width:14%;"><?php
										 echo number_format($rowdetail["jumlah_unit"],0).' '.$rowdetail["satuan"];
									 ?>
									</td>
									<td style="width:20%;"><?php echo $rowdetail["keterangan"]?></td>
								</tr>
					<?php
								$jum+=abs($rowdetail["jumlah_unit"]);
								$ctr++;
								$rowprint += 1; // === counter berapa baris kosong bila tidak ada row lagi
							}
						}
						breakTDTable($rowprint, $breakdata); // === memberikan baris kosong bila tidak ada row lagi dari hasil $rowprint
					?>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<tr class=line><td colspan="9"></td></tr>
				</table>
				<table border="0"  class="tg" style="width: 100%;">
				<?php if($i == $page - 1){ ?>
						<tr>
							<td style="width:85%;font-size:12px;letter-spacing:2px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;letter-spacing:2px;" colspan="2">
								JUMLAH :</td>
							<td style="text-align:right;">
							<?php echo number_format($row["sum_jumlah"],0)?>
							</td>
						</tr>
						<table>
							<tr>
								<td style="width:85%;font-size:11px;letter-spacing:1px; font-weight: bold;" rowspan="2">SJ COPY 1 ( WAJIB TTD & STEMPEL ) KEMBALI KE SOPIR</td>
							</tr>
						</table>
						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php }else{ ?>
							<tr>
							<td style="width:85%;font-size:12px;letter-spacing:2px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;" colspan="2">
								</td>
							<td style="text-align:right;">

							</td>
						</tr>

						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php } ?>
				</table>

				<table style="margin-top: 0px;width: 100%;">
					<tr>
						<td style="width: 100%;margin-top: 15px;">
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;">Diterima,</td>
									<!-- <td style="width: 25%;text-align: center;">Diterima,</td> -->
									<td style="width: 25%;text-align: center;">Diketahui,</td>
									<td style="width: 25%;text-align: center;">Dibuat,</td>
								</tr>
									</table>
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;padding-top: 60px!important;">(<?php echo $row["relasi"]; ?>)<td>
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["supir"]; ?>)</td>
									<!-- <td style="width: 25%;text-align: center;padding-top: 60px!important;">(Spv Logistik)</td> -->
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["nama_pembuat"]; ?>)</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

			
			</div>
					<div class="page-break"></div>
			
<?php
		}	
			} // == END FOR
	} else {
		echo "0 results";
	}	

		if ($result3->num_rows > 0) {
		while($row = $result3->fetch_assoc()) {
			// echo"tes";
?>
<?php
	// $page = 1;

	//==== nentukan berapa banyak page ====//
	for($i = 0; $i < $page; $i++){
		$rowprint = 0; // === reset counter

			?>
				<div style="height: 2.15cm;">
		</div>
			<div class="watermark">
    <!-- Watermark watermark -->
    		<div class="watermark_wrapper">
        <!-- The watermark -->
        	<div class="watermark_css">
            COPY2
        </div>
    </div>


		<!-- 	<table border="0" class="tg1" style="width:100%;">
				<tr style="height:80px" >
					<td colspan="0" style="width: 50%;">PT.INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>
			</table> -->

				<table border="0" class="tg" style="width:100%;">
				<?php if($row["nomormhentity"] == 1){ ?>
						<tr>
					<td colspan="0" style="width: 50%;">PT. INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br><br>
						<div id="qrcode3" class = "center" style="width: 2.2cm; height: 2.2cm;"></div>

					</td>
					</td>
				</tr>
				<?php }else{ ?>
					<tr>
					<td colspan="0" style="width: 50%;">PT. ASIA SAKTI WAHID FOODS MANUFACTURE
						<br>
						<br>
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>

				<?php } ?>
			</table>

	<table border="0" class="tg" style="width:100%;font-size:12px;">
			<tr>
				<td style="width: 25%;">
					<table class="nopadding">
						<tr>
							<td>Hal. <?=($i + 1)." dari ".$page?></td>
							<td></td>
						</tr>
						<!-- <tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr> -->
					</table>
				</td>
				<br>
				<td style="width:50%;text-align:center;">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
					<span style="font-size:12px;">KODE VERIFIKASI : <?php echo $row["kode_verifikasi"]; ?></span>
				</td>
				<td>
				</td>
				<!-- <td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>
	<table border="0" style="width:100%;font-size:14px;">
			<tr>
					<td style="text-align:right;">
					SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?></td>
			</tr>
	</table>


		<table border="0" class="tg" style="width:100%">
			<tr>
				<td style="width: 75%;">
					<table class="nopadding" style="font-size:12px;">
						<tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. DO</td>
							<td>: <?php echo $row["kode_ascend"] ?></td>
						</tr>
						<tr>
							<td>Expedisi</td>
							<td>: <?php echo $row["expedisi"] ?></td>
						</tr>
					</table>
				</td>
				<td style="width: 25%;text-align:left;">
					<table class="nopadding" style="font-size:12px;">
						
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>Kendaraan</td>
							<td>: <?php echo $row["mobil"] ?></td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>: <?php echo $row["tujuan"] ?></td>
						</tr>
					</table>
				</td>
				<!-- <td style="width:50%;text-align:center">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
				</td>
				<td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>
<!-- 	<table border="0" class="tg" style="width:100%;">
			<tr>
				<td style="width: 75%;">
					<table class="nopadding">
						<tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>Expedisi</td>
							<td>: <?php echo $row["expedisi"] ?></td>
						</tr>
					</table>
				</td>
				<td style="width: 25%;text-align:left;">
					<table class="nopadding">
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>: <?php echo $row["tujuan"] ?></td>
						</tr>
					</table>
				</td> -->
				<!-- <td style="width:50%;text-align:center">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
				</td>
				<td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
<!-- 			<tr>
	</table> -->

				<table cellpadding="2" class="tg detailtable" style="margin-top: 5px;width:100%;">
					<tr class=rowhorizontal>
						<td class=rowvertical style="width:1%;text-align:center;">No.</td>
						<td class=rowvertical style="width:20%;text-align:center;">KODE BARANG</td>
						<td class=rowvertical style="width:46%;text-align:center;">NAMA BARANG</td>
						<td class=rowvertical style="width:13%;text-align:center;">BANYAKNYA</td>
						<td class=rowvertical style="width:20%;text-align:center;">KETERANGAN</td>
					</tr>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<?php
						$ctr = ($i * $breakdata) + 1;
						$jum=0;
						//	tambahanpatrick
						$sqldetail1 = $sqldetail." LIMIT " . ($i * $breakdata) . ", " . $breakdata;
						//	echo $sqldetail1;
						$resultdetail = $conn->query($sqldetail1);


						if ($resultdetail->num_rows > 0) {
							while($rowdetail = $resultdetail->fetch_assoc()) {
								// $diskon_1 = ($rowdetail["harga"] * $rowdetail["jumlah_unit"]) * $rowdetail["diskon_1"] / 100;
								// $jumlah = $rowdetail["harga"] * $rowdetail["jumlah_unit"];
									if($ctr == $result_detail_page->num_rows){ $lastclass = 'rmvlast'; }
								?>
								<tr >
									<td style="width:1%;text-align:right;"><?php echo $ctr."." ?></td>
									<td style="width:20%;"><?php echo $rowdetail["kode_barang"]?></td>
									<td style="width:46%;"><span class="truncate"><?php echo $rowdetail["barang"]?></span></td>
										<td style="width:14%;"><?php
									 echo number_format($rowdetail["jumlah_unit"],0).' '.$rowdetail["satuan"];
									 ?>
									</td>
									<td style="width:20%;"><?php echo $rowdetail["keterangan"]?></td>
								</tr>
					<?php
								$jum+=abs($rowdetail["jumlah_unit"]);
								$ctr++;
								$rowprint += 1; // === counter berapa baris kosong bila tidak ada row lagi
							}
						}
						breakTDTable($rowprint, $breakdata); // === memberikan baris kosong bila tidak ada row lagi dari hasil $rowprint
					?>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<tr class=line><td colspan="9"></td></tr>
				</table>
				<table border="0"  class="tg" style="width: 100%;">
				<?php if($i == $page - 1){ ?>
						<tr>
							<td style="width:85%;font-size:12px;letter-spacing:2px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;letter-spacing:2px;" colspan="2">
								JUMLAH :</td>
							<td style="text-align:right;">
							<?php echo number_format($row["sum_jumlah"],0)?>
							</td>
						</tr>
						<table>
							<tr>
								<td style="width:85%;font-size:11px;letter-spacing:1px; font-weight: bold;" rowspan="2">SJ COPY 2 ( DI AMBIL DISTRIBUTOR )</td>
							</tr>
						</table>
						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php }else{ ?>
							<tr>
							<td style="width:85%;font-size:12px;letter-spacing:2px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;" colspan="2">
								</td>
							<td style="text-align:right;">

							</td>
						</tr>

						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php } ?>
				</table>

				<table style="margin-top: 0px;width: 100%;">
					<tr>
						<td style="width: 100%;margin-top: 15px;">
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;">Diterima,</td>
									<!-- <td style="width: 25%;text-align: center;">Diterima,</td> -->
									<td style="width: 25%;text-align: center;">Diketahui,</td>
									<td style="width: 25%;text-align: center;">Dibuat,</td>
								</tr>
									</table>
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;padding-top: 60px!important;">(<?php echo $row["relasi"]; ?>)<td>
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["supir"]; ?>)</td>
									<!-- <td style="width: 25%;text-align: center;padding-top: 60px!important;">(Spv Logistik)</td> -->
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["nama_pembuat"]; ?>)</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

			
			</div>
					<div class="page-break"></div>
			
<?php
		}	
			} // == END FOR
	} else {
		echo "0 results";
	}	

		if ($result4->num_rows > 0) {
		while($row = $result4->fetch_assoc()) {
			// echo"tes";
?>
<?php
	// $page = 1;

	//==== nentukan berapa banyak page ====//
	for($i = 0; $i < $page; $i++){
		$rowprint = 0; // === reset counter

			?>
				<div style="height: 2.05cm;">
		</div>
			<div class="watermark">
    <!-- Watermark watermark -->
    		<div class="watermark_wrapper">
        <!-- The watermark -->
        	<div class="watermark_css">
            COPY3
        </div>
    </div>


			
		<!-- 	<table border="0" class="tg1" style="width:100%;">
				<tr style="height:80px" >
					<td colspan="0" style="width: 50%;">PT.INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>
			</table> -->

				<table border="0" class="tg" style="width:100%;">
				<?php if($row["nomormhentity"] == 1){ ?>
						<tr>
					<td colspan="0" style="width: 50%;">PT. INTIM HARMONIS FOODS INDUSTRI
						<br>JL RAYA JOMBOR BAWAH KM.53 LEMAHBANG
						<br>SUKOREJO PASURUAN
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br><br>
						<div id="qrcode4" class = "center" style="width: 2.2cm; height: 2.2cm;"></div>

					</td>
					</td>
				</tr>
				<?php }else{ ?>
					<tr>
					<td colspan="0" style="width: 50%;">PT. ASIA SAKTI WAHID FOODS MANUFACTURE
						<br>
						<br>
					</td>
					<td rowspan="1" style="width: 45%;">
						Kepada YTH :<br>
						<span style="text-transform: uppercase"><?php echo $row["relasi"]; ?><br>
						<?php echo $row["alamat_tujuan"]; ?>, <?php echo $row["pic"]; ?></span><br>
					</td>
					<td colspan="0" style="width: 5%;">FML/MKT/SP
						<br>
					</td>
				</tr>

				<?php } ?>
			</table>
<table border="0" class="tg" style="width:100%;font-size:12px;">
			<tr>
				<td style="width: 25%;">
					<table class="nopadding">
						<tr>
							<td>Hal. <?=($i + 1)." dari ".$page?></td>
							<td></td>
						</tr>
						<!-- <tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr> -->
					</table>
				</td>
				<br>
				<td style="width:50%;text-align:center;">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
					<span style="font-size:12px;">KODE VERIFIKASI : <?php echo $row["kode_verifikasi"]; ?></span>
				</td>
				<td>
				</td>
				<!-- <td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>
	<table border="0" style="width:100%;font-size:14px;">
			<tr>
					<td style="text-align:right;">
					SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?></td>
			</tr>
	</table>

	<!-- <table border="0" class="tg" style="width:100%;">
			<tr>
				<td style="width: 75%;">
					<table class="nopadding">
						<tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>Expedisi</td>
							<td>: <?php echo $row["expedisi"] ?></td>
						</tr>
					</table>
				</td>
				<td style="width: 25%;text-align:left;">
					<table class="nopadding">
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>: <?php echo $row["tujuan"] ?></td>
						</tr>
					</table>
				</td> -->
				<!-- <td style="width:50%;text-align:center">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
				</td>
				<td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
	<!-- 		<tr>
	</table> -->
	<table border="0" class="tg" style="width:100%">
			<tr>
				<td style="width: 75%;">
					<table class="nopadding" style="font-size:12px;">
						<tr>
							<td>Nomor</td>
							<td>: <?php echo $row["no_pajak"] ?></td>
						</tr>
						<tr>
							<td>No. DO</td>
							<td>: <?php echo $row["kode_ascend"] ?></td>
						</tr>
						<tr>
							<td>Expedisi</td>
							<td>: <?php echo $row["expedisi"] ?></td>
						</tr>
					</table>
				</td>
				<td style="width: 25%;text-align:left;">
					<table class="nopadding" style="font-size:12px;">
						
						<tr>
							<td>No. Polisi</td>
							<td>: <?php echo $row["no_polisi"] ?></td>
						</tr>
						<tr>
							<td>Kendaraan</td>
							<td>: <?php echo $row["mobil"] ?></td>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>: <?php echo $row["tujuan"] ?></td>
						</tr>
					</table>
				</td>
				<!-- <td style="width:50%;text-align:center">
					<span style="font-size:20px;">SURAT PENGANTAR BARANG</span>
				</td>
				<td style="width: 25%;vertical-align : middle;text-align:center;">
				SUKOREJO PASURUAN, <?php echo $row["tanggal_dmy"]; ?>
				</td> -->
			<tr>
	</table>


				<table cellpadding="2" class="tg detailtable" style="margin-top: 5px;width:100%;">
					<tr class=rowhorizontal>
						<td class=rowvertical style="width:1%;text-align:center;">No.</td>
						<td class=rowvertical style="width:20%;text-align:center;">KODE BARANG</td>
						<td class=rowvertical style="width:46%;text-align:center;">NAMA BARANG</td>
						<td class=rowvertical style="width:13%;text-align:center;">BANYAKNYA</td>
						<td class=rowvertical style="width:20%;text-align:center;">KETERANGAN</td>
					</tr>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<?php
						$ctr = ($i * $breakdata) + 1;
						$jum=0;
						//	tambahanpatrick
						$sqldetail1 = $sqldetail." LIMIT " . ($i * $breakdata) . ", " . $breakdata;
						//	echo $sqldetail1;
						$resultdetail = $conn->query($sqldetail1);


						if ($resultdetail->num_rows > 0) {
							while($rowdetail = $resultdetail->fetch_assoc()) {
								// $diskon_1 = ($rowdetail["harga"] * $rowdetail["jumlah_unit"]) * $rowdetail["diskon_1"] / 100;
								// $jumlah = $rowdetail["harga"] * $rowdetail["jumlah_unit"];
									if($ctr == $result_detail_page->num_rows){ $lastclass = 'rmvlast'; }
								?>
								<tr >
									<td style="width:1%;text-align:right;"><?php echo $ctr."." ?></td>
									<td style="width:20%;"><?php echo $rowdetail["kode_barang"]?></td>
									<td style="width:46%;"><span class="truncate"><?php echo $rowdetail["barang"]?></span></td>
										<td style="width:14%;"><?php
									 echo number_format($rowdetail["jumlah_unit"],0).' '.$rowdetail["satuan"];
									 ?>
									</td>
									<td style="width:20%;"><?php echo $rowdetail["keterangan"]?></td>
								</tr>
					<?php
								$jum+=abs($rowdetail["jumlah_unit"]);
								$ctr++;
								$rowprint += 1; // === counter berapa baris kosong bila tidak ada row lagi
							}
						}
						breakTDTable($rowprint, $breakdata); // === memberikan baris kosong bila tidak ada row lagi dari hasil $rowprint
					?>
					<!-- ini nanti gantien buat isi data sesuai record yang diperlukan -->
					<tr class=line><td colspan="9"></td></tr>
				</table>
				<table border="0"  class="tg" style="width: 100%;">
				<?php if($i == $page - 1){ ?>
						<tr>
							<td style="width:85%;font-size:12px;letter-spacing:2px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;letter-spacing:2px;" colspan="2">
								JUMLAH :</td>
							<td style="text-align:right;">
							<?php echo number_format($row["sum_jumlah"],0)?>
							</td>
						</tr>

						<table>
							<tr>
								<td style="width:85%;font-size:11px;letter-spacing:1px; font-weight: bold;" rowspan="2">SJ COPY 3 ( TERTINGGAL DI PABRIK )</td>
							</tr>
						</table>

						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php }else{ ?>
							<tr>
							<td style="width:85%;font-size:12px;letter-spacing:2px;" rowspan="2">KETERANGAN :<?php echo $row["keterangan"]; ?></td>
							<td style="text-align:right;" colspan="2">
								</td>
							<td style="text-align:right;">

							</td>
						</tr>

						<table style="width: 100%;">
						 <tr>
							<td style="text-align:right;width:100%;font-size:11px;letter-spacing:1px;"><i><b>*Jumlah karton dan item barang pada surat jalan sesuai dengan yang termuat</td>
		
						</tr> 
					</table>

						<?php } ?>
				</table>

				<table style="margin-top: 0px;width: 100%;">
					<tr>
						<td style="width: 100%;margin-top: 15px;">
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;">Diterima,</td>
									<!-- <td style="width: 25%;text-align: center;">Diterima,</td> -->
									<td style="width: 25%;text-align: center;">Diketahui,</td>
									<td style="width: 25%;text-align: center;">Dibuat,</td>
								</tr>
									</table>
							<table style="width: 100%;font-size:12px;">
								<tr>
									<td style="width: 50%;text-align: center;padding-top: 60px!important;">(<?php echo $row["relasi"]; ?>)<td>
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["supir"]; ?>)</td>
									<!-- <td style="width: 25%;text-align: center;padding-top: 60px!important;">(Spv Logistik)</td> -->
									<td style="width: 25%;text-align: center;padding-top: 60px!important;">(<?php echo $row["nama_pembuat"]; ?>)</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>

			
			</div>
					<div class="page-break"></div>
<!-- 
	<script type="text/javascript">
            var qrcode_<?php echo $row['id']; ?> = new QRCode(document.getElementById("qrcode_<?php echo $row['nomor']; ?>"), {
                text: "<?php echo $row['barcode']; ?>",
                width: 1000,
                height: 1000,
                correctLevel : QRCode.CorrectLevel.H
            });
        </script> -->


		<!-- fery -->
					<script type="text/javascript">
// INT UNTUK GENERATE BARCODE
var qrcode = new QRCode(document.getElementById("qrcode"), {
	text: "<?php echo $row['barcode']; ?>",
	width: 1000,
    height: 1000,
	correctLevel : QRCode.CorrectLevel.H
});

var qrcode2 = new QRCode(document.getElementById("qrcode2"), {
	text: "<?php echo $row['barcode']; ?>",
	width: 1000,
    height: 1000,
	correctLevel : QRCode.CorrectLevel.H
});

var qrcode3 = new QRCode(document.getElementById("qrcode3"), {
	text: "<?php echo $row['barcode']; ?>",
	width: 1000,
    height: 1000,
	correctLevel : QRCode.CorrectLevel.H
});


var qrcode4 = new QRCode(document.getElementById("qrcode4"), {
	text: "<?php echo $row['barcode']; ?>",
	width: 1000,
    height: 1000,
	correctLevel : QRCode.CorrectLevel.H
});


console.log(qrcode);
</script>


			
<?php

			}
		} // == END FOR
	} else {
		echo "0 results";
	}
$conn->close();
?>