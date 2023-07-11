<style type="text/css">
	@media screen {
		div.divFooter {
			position: fixed;
			width: 11.69in;
			bottom: 0.2in;
		}
	}

	@media all {
		@page {
			width: 21.50cm;
			height: 13.50;
		}

		body,
		html {
			margin-top: 5px;
			height: 13.50;
			width: 21.50cm;
		}
	}

	@media print {
		div.divFooter {
			position: fixed;
			width: 11.69in;
			bottom: 0.2in;
		}
	}
</style>
<?php

$no    = $_GET["no"];
$usefooter = true;

// Create connection
$conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "
SELECT 
a.*,
m.nama as supplier,
m.alamat,
m3.nama category,
m4.nama attn,
DATE_FORMAT(a.dibuat_pada,'" . $_SESSION["setting"]["date_sql"] . "') as dibuat_pada,
DATE_FORMAT(a.disetujui_pada,'" . $_SESSION["setting"]["date_sql"] . "') as disetujui_pada,
m5.top 
from thbeliorder a
join mhrelasi m on m.nomor = a.nomormhrelasi 
left join thbelipraorder t on t.nomor = a.nomorthbelipraorder 
left join tdbelipraorder t2 on t2.nomorthbelipraorder = t.nomor 
left join mhbarang m2 on m2.nomor = t2.nomormhbarang 
left join mhbarangkelompok m3 on m3.nomor = m2.nomormhbarangkelompok 
left join mhadmin m4 on m4.nomor = a.disetujui_oleh 
left join mhrelasi m5 on m5.nomor = a.nomormhrelasi
WHERE a.nomor = ".$_GET["no"];

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT 
				a.*,
				a.kode_permintaan,
				t2.keterangan,
				DATE_FORMAT(t.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
				a.jumlah_unit,
				a.harga_satuan ,
				a.subtotal,
				m.nama satuan,
				m2.nama nama_barang,
				m2.kode kode_barang
				from tdbeliorder a
				join thbeliorder t on t.nomor = a.nomorthbeliorder
				join tdbelipermintaan t2 on t2.nomor = a.nomortdbelipermintaan 
				join mhsatuan m on m.nomor = a.nomormhsatuanqty 
				join mhbarang m2 on m2.nomor = a.nomormhbarang 
				WHERE a.status_aktif > 0 AND a.nomorthbeliorder = " . $row['nomor'];

$result2 = $conn->query($sql2);


$conn->close();

function terbilang($x)
{
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


?>
<style type="text/css">
	body {
		width: 8.27in;
		margin: 0px !important;
	}

	html,
	body {
		padding: 0px 0px !important;
	}

	.tg {
		border-collapse: collapse;
		border-spacing: 0;
		line-height: normal;
		width: 100%;
	}

	.tg td {
		font-family: Arial;
		border-style: solid;
		border-width: 1px;
		font-size: 9pt;
		border-color: black;
		padding: 5px
	}

	.tg2 td {
		font-family: Arial;
		border-style: solid;
		border-width: 1px;
		font-size: 9pt;
		border-color: black;
		padding: 4px
	}

	.tg .tg-0lax {
		text-align: center;
		vertical-align: top;
		font-weight: bold;
	}

	@media print {
		@page {
			width: 8.27in;
		}

		body,
		html {
			width: 8.27in;
		}
	}

</style>

<body>


<table class="table" width="100%" style="height:70px;margin-top: 5px;">
				<tr>
					<td width="50%" style="vertical-align: top; padding: 0;">
						<table style="border:none;">
							<tr>
								<td width="30%" class="myheader text-medium">
								<img style="width: 25rem;margin-left:-20px" src="https://dev72.inspiraworld.com/mmp_dev/uploads/logo.jpg" class="card-img-top" alt="...">
								
								<br><br><br><br>
									
									<font size="4"><strong>Spesifikasi Cylinder</strong> </font><br>
								</td>
							</tr>
						</table>
					</td>


			

					
					<td width="20%" class="myheader" style="vertical-align: top; padding-top: 0;text-align: right;">
					<br><br>
						
						<table class="text-medium" style="text-align: right;">

						</table>

						<table class="myheader text-medium" width="100%" style="text-align: right;">

							<tr>
								<td>
								<br>
								<strong>F-CYL-003</strong>
								</td>
							</tr>

							<tr>
								<td>Rev. 00</td>
							</tr>

							<tr>
								<td>20 Nov 2020 <br><br><br></td>
							</tr>

							<tr>
								<td>Jakarta, 18/02/2022 <br><br></td>
							</tr>


							<tr>
								<td>No. HC0099/MMP/02/2022</td>
							</tr>
				
						</table>
					</td>
				</tr>
			</table>

	
		<table class="tg">
		<tr>
		<td width="50%" style="vertical-align: top; padding: 0;">
			<td width="20%" style="text-align: center;">Kode Barang</td>
			<td width="40%" style="text-align: center;">Item Code</td>
			</td>
		</tr>

		</table>


	<br><br><br><br>
	<div class="divFooter">

		<table class="tg">
			<tr>
				<!-- <td style="border-style: none;text-align: left;font-size: 10pt"></td> -->
				<!-- <td style="border-style: none;text-align: right;font-size: 10pt">Page 1 of 1</td> -->
				<table>
					<tr>
						<td width="230" style="text-align: center;">Prepared By,</td>
						<td width="230" style="text-align: center;">Approved By,</td>
						<td width="230" style="text-align: center;">Supplier,</td>
					</tr>
				</table>
				<table>
					<tr>
						<td width="230" style="text-align: center;"></td>
						<td width="230" style="text-align: center;">
							<?= ($row['status_disetujui'] == 0 ? '<br><br><br><br><br><br>' : '<img width="100" src="../contents/image/ttd/LENA.jpg" alt="" srcset="">')?>
						</td>
						<td width="230" style="text-align: center;">
							<?= ($row['status_disetujui'] == 0 ? '<br><br><br><br><br><br>': '<img width="100" src="../contents/image/ttd/CORRY.jpg" alt="" srcset="">') ?>
						</td>
					</tr>
				</table>
				<table>
					<tr>
						<td width="230" style="text-align: center;"><img style="width: 5rem;" src="https://dev72.inspiraworld.com/mmp_dev/uploads/approve.png" class="card-img-top" alt="..."></td>
						<td width="230" style="text-align: center;"><img style="width: 5rem;" src="https://dev72.inspiraworld.com/mmp_dev/uploads/approve.png" class="card-img-top" alt="..."></td>
						<td width="230" style="text-align: center;">&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp</td>
						
					</tr>
					<tr>
						<td width="230" style="text-align: center;"> <?= $row["dibuat_pada"] ?> </td>
						<td width="230" style="text-align: center;"> <?= $row["disetujui_pada"] ?> </td>
						<td width="230" style="text-align: center;"></td>
					</tr>
				</table>
				<td width="20%" style="border-style: none;text-align: left;font-size: 10pt;">Printed : <?= date('d M Y \, H:i') ?></td>
			</tr>
		</table>
	</div>

</body>