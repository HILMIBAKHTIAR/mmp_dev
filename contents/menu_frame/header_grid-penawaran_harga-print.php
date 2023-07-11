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
	DATE_FORMAT(a.dibuat_pada,'" . $_SESSION["setting"]["date_sql"] . "') as dibuat_pada,
	DATE_FORMAT(a.tanggal_jatuh_tempo,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_jatuh_tempo,
	a.customer as customer
	FROM thpenawaranharga a
	WHERE a.nomor = ".$_GET["no"];

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT 
			a.*
			FROM tdpenawaranharga a
			where a.status_aktif > 0
			AND a.nomorthpenawaranharga = " . $row['nomor'];

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
						PENAWARAN HARGA
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
						Tanggal Terbit &nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["dibuat_pada"] ?>		
					</tr>

			

				</table>
				
			</td>
		</tr>
	</table>

	<br><br>

	<table width="100%">
		<tr>
			<td width="100%"> &nbsp;NO &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["kode"] ?></td>
		</tr>

		<tr>
			<td width="100%">

				<table width="100%">
					<tr>
						<td width="30%">
						TGL BERLAKU : <?= $row["tanggal_jatuh_tempo"] ?>
						</td>
					</tr>

				</table>
				
			</td>
		</tr>

		<tr>
			<td width="100%"> CUSTOMER &nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["customer"] ?></td>
		</tr>

		<tr>
			<td width="100%"> DITUJUKAN &nbsp;&nbsp;&nbsp;&nbsp; : <?= $row["peruntukan"] ?></td>
		</tr>


	</table>


	<table class="tg">
		<tr>
			<td style="text-align: center;">No</td>
			<td style="text-align: center;">Nama Barang</td>
			<td style="text-align: center;">Warna</td>
			<td style="text-align: center;">Komposisi</td>
			<td style="text-align: center;">Size</td>
			<td style="text-align: center;">Moq</td>
			<td style="text-align: center;">Harga</td>
		</tr>
		<?php
		$counter = 1;
		if ($result2->num_rows > 0) {
			while ($row2 = $result2->fetch_assoc()) : ?>


				<tr style="border-right: 1pt solid black;border-left: 1pt solid black;border-bottom: 1pt solid black;">
					<td style="border-bottom: none; border-top: none;"><?= $counter ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["nama"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["warna"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["komposisi"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["size"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["moq"] ?></td>
					<td style="border-bottom: none; border-top: none;">Rp. <?= number_formatting($row2["harga"], 'number2') ?></td>
				</tr>

		<?php $counter += 1;
			endwhile;
		} else {
			echo "0 results";
		}
		?>
		

	</table>
	
	<br><br><br><br>
	<div class="divFooter">

		<table class="tg">
			<tr>
		
				<table>
					<tr>
						<td width="230" style="text-align: center;">Dibuat Oleh,</td>
						<td width="230" style="text-align: center;">Diperiksa Oleh,</td>
						<td width="230" style="text-align: center;">Disetujui Oleh,</td>
						<td width="230" style="text-align: center;">DIterima Oleh,</td>
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