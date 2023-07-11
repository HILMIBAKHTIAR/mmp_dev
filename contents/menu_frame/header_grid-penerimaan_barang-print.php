<?php 
	// include "../../config/config.php";
 //    include "../../config/database.php";
 //    include "../../".$config["webspira"]."config/connection.php";
session_start();
 //    $conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
 //    if ($conn->connect_error) { die("Connection failed: " . $conn_header->connect_error); }
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
 ?>

<style type="text/css">
	body {
		/*Ukuran Kertas A4*/
        width: 4in;
        /*width: 4in;*/
    }

	/*html{padding-left:20px !important; padding-right: 30px !important;  padding-top: 50px !important;}*/
	html{padding-left:0px !important; padding-right: 70px !important;  }
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

	@media all {
        .page-break { display: none; }
    }
        
    @media print {
        .page-break { display: block; page-break-before: always; }
    }
</style>



<?php

	// Create connection
	// $conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	// Check connection
	// if ($conn->connect_error) {
	// 	die("Connection failed: " . $conn->connect_error);
	// } 

	include "../../config/config.php";
    include "../../config/database.php";

 //    $key="cvsma_rahmatsudiarto".$no;
	// $encode = base64_encode($key);  
    include "../../".$config["webspira"]."config/connection.php";
	$no = $_GET["no"];
	//cara 1
	// $key="cvsma_rahmatsudiarto".$no;
	// $encode = base64_encode($key);  
    // $decode = base64_decode($encode);  
	// cara 2
	// $Encrypted    =encryptIt($no);
	// 3
	// $ennomor = md5($no); 
 
    // $url = $actual_link."print_inv_so_qr.php?no=".$encode."";

    $conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
    if ($conn->connect_error) { die("Connection failed: " . $conn_header->connect_error); }

	$principal_nama = "";

	$nama_table_header = "thproduksihasil";
	$nama_table_detail = "tdproduksihasil";

	

	// update_status_print($nama_table_header,$no,'','status_print');
	$sql = "
	SELECT
	a.nomormhtransaksi AS nomor, 
	a.transaksi_kode,
	c.barcode,
	a.nomorrhbarcode,
	b.kode,
	b.nama as product,
	b.berat_jenis,
	b.lebar,
	b.panjang 
	FROM rhlaporanstok a
	join thbelinota t on t.nomor = a.nomormhtransaksi 
	join tdbelinota t2 on t2.nomor = a.transaksi_nomor  
	JOIN mhbarang b ON t2.nomormhbarang = b.nomor 
	JOIN rhbarcode c ON a.nomorrhbarcode = c.nomor 
	WHERE a.jenis = 'btb' AND a.transaksi_tabel = 'thbelinota' AND a.nomormhtransaksi = ".$_GET["no"]." ";

	$result = $conn->query($sql);

	// echo $sql;

	// $sqldetail = "
	// SELECT
	// 	a.*,
	// 	a.jumlah AS cek_jumlah,
	// 	CONCAT(IFNULL(b.inisial,''),'/',IFNULL(a.tanggal_produksi,''),'/',IFNULL(a.jam_produksi,''),'/',IFNULL(a.lot_number,'')) AS kode_qr
	// FROM
	// 	mhprintqr a
	// JOIN mhbarang b ON b.nomor = a.nomormhbarang
	// AND a.nomor = ".$_GET["no"]."
	// ";
	// $resultdetail = $conn->query($sqldetail);
	
	// echo $resultdetail;

	// $detail = "
	// SELECT a.*,
	// CONCAT(ba.kode,' - ',ba.nama) AS 'account'
	// FROM tdpenagihanhutang a
	// JOIN thpenagihanhutang b on a.nomorthpenagihanhutang = b.nomor and b.status_aktif > 0
	// LEFT JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	// WHERE a.status_aktif > 0
	// AND a.nomorthpenagihanhutang = ".$_GET["no"];
	// $resultdetail2 = $conn->query($detail);

	//========================================== Break Table ==================================================
	
		$totalrow = $resultdetail->num_rows;
		$rowprint = 0;
		$breakdata = 5;
		$page = ceil($totalrow / $breakdata);

		// if($totalrow > 12){ 
		// 	$breakdata = 40;
		// }

		function breakTDTable($rowprint, $breakdata){
			for($i = 0;$i < ($breakdata - $rowprint); $i++){
				echo "<tr>
						<td style='border-right: 1px solid black; border-left: 1px solid black;'>&nbsp;</td>
						<td style='border-right: 1px solid black; border-left: 1px solid black;'>&nbsp;</td>
						<td style='border-right: 1px solid black; border-left: 1px solid black;'>&nbsp;</td>
						<td style='border-right: 1px solid black; border-left: 1px solid black;'>&nbsp;</td>
						<td style='border-right: 1px solid black; border-left: 1px solid black;'>&nbsp;</td>
						<td style='border-right: 1px solid black; border-left: 1px solid black;'>&nbsp;</td>
					</tr>";
			}
		}

	//=========================================================================================================

	//========================================== FUNCTION TERBILANG ==================================================
		
		function terbilang($x){
			$abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			if ($x < 12)
			return " " . $abil[$x];
			elseif ($x < 20)
			return Terbilang($x - 10) . " Belas";
			elseif ($x < 100)
			return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
			elseif ($x < 200)
			return " Seratus" . Terbilang($x - 100);
			elseif ($x < 1000)
			return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
			elseif ($x < 2000)
			return " Seribu" . Terbilang($x - 1000);
			elseif ($x < 1000000)
			return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
			elseif ($x < 1000000000)
			return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
			elseif ($x < 1000000000000)
			return Terbilang($x / 1000000000) . " Milyar" . Terbilang($x % 1000000000);
		}
	//=========================================================================================================
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) {
?>
<?php 


$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/mmp_dev/";
$url = $actual_link."print_qr_mc.php?no=".$row["nomorrhbarcode"]."";
// $kode_jc = $row["nomor"]; 
$total_mc = $result->num_rows; 

// echo $total_mc;

	$nomorurut = 1;
	$page = 1;
// echo $page;
	//==== nentukan berapa banyak page ====//
	// for($i = 0; $i < $page; $i++){ 
		// $rowprint = 0; // === reset counter
?>
			<table  style="width:100%; margin-right: 50px !important;" >
				
		
							<td align="center" colspan="3">
								<h2>MITRA MULTI PACKAGING</h2>
								<?php echo '<img src="../contents/menu_custom/qrcode_logo.php?id='.$row["nomorrhbarcode"].'&url='.$url.'" width="150px"  />'; ?> 
								
							</td>
						</tr>
						<tr>
							<td align="center" colspan="3">
								<font style="font-size: 14px"><b><?php echo strtoupper($row["barcode"]) ?></b></font>

							</td>
						</tr>
						<!-- table -->
					<table>
					<tr>
						<td width="70%">
							<table>
								<tr>
									<td width="50%">
										<font style="font-size: 12px"><b>Item</b></font>
									</td>
									<td width="1%">
										<font style="font-size: 12px"><b>:
										</b></font>
									</td>
									<td width="70%">
										<font style="font-size: 12px"><b>
										<?php echo strtoupper($row["kode"]) ?>
										</b></font>
									</td>	
								</tr>
							</table>
						</td>

						<!-- <td width="30%">
							<table>
								<tr>
									<td width="29%">
										<font style="font-size: 12px"><b>Weigth</b></font>
									</td>
									<td width="1%">
										<font style="font-size: 12px"><b>:
										</b></font>
									</td>
									<td width="70%">
										<font style="font-size: 12px"><b>
										<?php echo strtoupper($row["berat_jenis"]) ?>
										</b></font>
									</td>	
								</tr>
							</table>
						</td> -->
					</tr>
					<tr>
						<td>
							<table>
							<tr>
							<td width="50%">
								<font style="font-size: 12px"><b>Product</b></font>
							</td>
							<td width="1%">
								<font style="font-size: 12px"><b>:
								</b></font>
							</td>
							<td width="70%">
								<font style="font-size: 12px"><b>
								<?php echo strtoupper($row["product"]) ?>
								</b></font>
							</td>	
						</tr>
							</table>
						</td>

						<!-- <td>
							<table>
								<tr>
									<td width="29%">
										<font style="font-size: 12px"><b>Width</b></font>
									</td>
									<td width="1%">
										<font style="font-size: 12px"><b>:
										</b></font>
									</td>
									<td width="70%">
										<font style="font-size: 12px"><b>
										<?php echo strtoupper($row["lebar"]) ?>
										</b></font>
									</td>	
								</tr>
							</table>
						</td> -->
					</tr>
					</table>
						<!-- tutup table -->
						
								<!-- table -->
					<table>
					<tr>
						<!-- <td width="70%">
							<table>
							<tr>
							<td width="52%">
								<font style="font-size: 12px"><b>Color</b></font>
							</td>
							<td width="1%">
								<font style="font-size: 12px"><b>:&nbsp;
								</b></font>
							</td>
							<td width="70%">
								<font style="font-size: 12px"><b>
								<?php echo strtoupper($row["warna"]) ?>
								</b></font>
							</td>	 -->
						</tr>
							</table>
						</td>

						<!-- <td width="30%">
							<table>
								<tr>
									<td width="29%">
										<font style="font-size: 12px"><b>Length</b></font>
									</td>
									<td width="1%">
										<font style="font-size: 12px"><b>:
										</b></font>
									</td>
									<td width="70%">
										<font style="font-size: 12px"><b>
										<?php echo strtoupper($row["panjang"]) ?>
										</b></font>
									</td>	
								</tr>
							</table>
						</td> -->
					</tr>
					</table>
						<!-- tutup table -->
						<!-- <tr>
							<td align="center" colspan ="3">
								<font style="text-align:center;font-size: 12px"><b><?php echo strtoupper($row["transaksi_kode"]) ?></b></font>

							</td>
						</tr> -->
						

						
					

						

				


			</table>
	
	
<?php
		}} // == END FOR
	else {
		echo "0 results";
	}
$conn->close();


?>