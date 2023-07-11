<style type="text/css">
	@media screen {
		div.divFooter {
			position: fixed;
			width: 11.69in;
			bottom: 0.2in;
		}

		.table-divider,
		.table-divider2 {
			display: block;
			border: none;
			border-top: 1px solid black;
			width: 100%;
			margin: 3px 0;
		}

		.classp {
    		margin-left: 280px;
		}


	}

	/* @media all {
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
	} */

	@media print {
		div.divFooter {
			position: fixed;
			width: 11.69in;
			bottom: 0.2in;
		}

		.table-divider,
		.table-divider2 {
			display: block;
			border: none;
			border-top: 1px solid black;
			width: 100%;
			margin: 3px 0;
		}

		.classp {
    		margin-left: 150px;
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
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
	CONCAT(sales.nama, '|', sales.nomor) AS 'browse|nomormhpegawai_sales'
	FROM thpermintaananalisasample a
	JOIN mhpegawai sales ON sales.nomor = a.nomormhpegawai_sales 
	WHERE a.nomor = ".$_GET["no"];

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT
			a.*
			FROM tdpermintaananalisasample a
			where a.status_aktif > 0
			AND a.nomorthpermintaananalisasample = " . $row['nomor'];

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

	.tg .tg-0lax {
		text-align: center;
		vertical-align: top;
		font-weight: bold;
	}


	.tg2 {
		border-collapse: collapse;
		border-spacing: 0;
		line-height: normal;
		width: 50%;
		margin: 0 auto; 
   		text-align: center; 
}


	.tg2 td {
		font-family: Arial;
		border-style: solid;
		border-width: 1px;
		font-size: 9pt;
		border-color: black;
		padding: 5px
	}

	.tg2 .tg2-0lax {
		text-align: center;
		vertical-align: top;
		font-weight: bold;
	}

	.table-divider {
		border: none;
		height: 1px;
		background-color: black;
		width: calc(100% + 11px);
		margin: 0;
		margin-left: -6px;
  }

  .table-divider2 {
		border: none;
		height: 1px;
		background-color: black;
		width: calc(100% + 11px);
		margin: 0;
		margin-left: -6px;
  }

  .spacing {
  margin-bottom: 10px;
}



</style>

<body>

	<table class="tg" width="100%">
		<tr>
			<td width="20%" style="text-align: center">
	
				<img style="width: 130px;" src="https://dev72.inspiraworld.com/mmp_dev/uploads/logo_mmp_logo.png" class="card-img-top" alt="...">

			</td>

			<td width="60%" style="text-align: center">

				<img style="width: 15rem;" src="https://dev72.inspiraworld.com/mmp_dev/uploads/logo_mmp_text.png" class="card-img-top" alt="...">
				
				<table>
					<br><br>

					<tr>
						<hr class="table-divider" style="margin-top: 16px;">
						FORM
					</tr>
					<br><br>

					<tr>
						<hr class="table-divider" >
						PERMINTAAN ANALISA SAMPLE
					</tr>

				</table>

			</td>

			<td width="20%">

				<table>
					<tr>						
						Nomor Dokumen
						<hr class="table-divider2 spacing" style="margin-top:9px;">	
										
					</tr>

					<tr>						
						<?= $row["kode"] ?>
						<hr class="table-divider2 spacing" style="margin-top:3px;">					
					</tr>

					<tr>						
						Revisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 02
						<hr class="table-divider2 spacing" style="margin-top:3px;">					
					</tr>

					<tr>						
						Halaman &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 1/1
						<hr class="table-divider2 spacing" style="margin-top: 3px;">					
					</tr>

					<tr>						
						Tanggal Terbit &nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["tanggal"] ?>		
					</tr>

			

				</table>
				
			</td>
		</tr>
	</table>

	<br><br>

	<table width="100%">
		<tr>
			<td width="100%"> &nbsp;NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			: <?= $row["kode"] ?></td>
		</tr>

		<tr>
			<td width="100%"> &nbsp;TANGGAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["tanggal"] ?></td>
		</tr>

		<tr>
			<td width="100%"> &nbsp;DEPARTEMENT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 : <?= $row["department"] ?></td>
		</tr>

		<tr>
			<td width="100%"> &nbsp;SAMPLE CUSTOMER &nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["customer_analisa"] ?></td>
		</tr>
	</table>
	<br>


	<table class="tg2">
		<tr>
			<td style="text-align: center;">No</td>
			<td style="text-align: center;">Nama Produk</td>
		</tr>

		<?php
		$counter = 1;
		$subtotal_sebelum_didiskon = 0;
		$sum_jumlah_bayar = 0;
		$sum_diskon_detail = 0;
		if ($result2->num_rows > 0) {
			while ($row2 = $result2->fetch_assoc()) : ?>

				<?php $subtotal_sebelum_didiskon += $row2["jumlah_bayar"] * $row2["harga_satuan"] ?>
				<?php $sum_jumlah_bayar += $row2["jumlah_bayar"] ?>
				<?php $sum_diskon_detail += $row2["subtotal_diskon"] ?>

				<tr style="border-right: 1pt solid black;border-left: 1pt solid black;border-bottom: 1pt solid black;">
					<td style="border-bottom: none; border-top: none;"><?= $counter ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["produk"] ?></td>
				</tr>

		<?php $counter += 1;
			endwhile;
		} else {
			echo "0 results";
		}
		?>

	</table>
	
	<p class="classp"><strong> Note: Mohon dicek bahan dan ukuran yang digunakan</strong></p>
	<br><br><br>
	<hr style="border-top: 1px solid black;">	
	
	<br><br><br><br>
	<div class="divFooter">

		<table class="tg">
			<tr>
		
				<table>
					<tr>
						<td width="230" style="text-align: center;">Diminta Oleh,</td>
						<td width="230" style="text-align: center;">Diketahui Oleh,</td>
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
				<br><br>
				<td width="20%" style="border-style: none;text-align: left;font-size: 10pt;">Printed : <?= date('d M Y \, H:i') ?></td>
			</tr>
		</table>
	</div>

</body>