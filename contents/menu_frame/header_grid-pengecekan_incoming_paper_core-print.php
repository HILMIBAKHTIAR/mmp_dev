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
	a.*
	, DATE_FORMAT(a.dibuat_pada,'" . $_SESSION["setting"]["date_sql"] . "') as dibuat_pada
	, DATE_FORMAT(a.tanggal_pengecekan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_pengecekan
	, DATE_FORMAT(a.tanggal_kedatangan,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kedatangan
	, b.nama supplier
	, d.nama material
	FROM thqappapercore a
	left join mhrelasi b on b.nomor = a.nomormhrelasi
	left join thbelinota c on a.nomorthbelinota = c.nomor
	left join mhbarang d on a.nomormhbarang = d.nomor
	WHERE a.nomor = ".$_GET["no"];

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT 
			a.*
			FROM tdqappapercore_specification a
			where a.status_aktif > 0
			AND a.nomorthqappapercore = " . $row['nomor'];

$result2 = $conn->query($sql2);

$sql3 = "SELECT 
			a.*
			, b.defects
			FROM tdqappapercore_visual a
			join headergrid b on b.nomor = a.nomorheadergrid 
			where a.status_aktif > 0
			AND a.nomorthqappapercore = " . $row['nomor'];

$result3 = $conn->query($sql3);


$sql4 = "SELECT 
			a.*
			FROM tdqappapercore_other a
			where a.status_aktif > 0
			AND a.nomorthqappapercore = " . $row['nomor'];

$result4 = $conn->query($sql4);



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

.td_custom {
	border-bottom: 1pt solid black;
        border-left-width: 0;
        border-right-width: 0;
        border-bottom-width: 0;
        position: relative;
}

.td_custom::after {
        content: '';
        position: absolute;
        left: 162px;
        bottom: 0;
        width: 77%;
        border-bottom: 1pt solid black;
    }

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
						PENGECEKAN INCOMING PAPER CORE
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
			<td class="td_custom" width="100%" > 
				<span style="border-bottom: none;"> NAMA SUPLLIER</span>
				<span style="margin-left: 55px;"> : <?= $row["supplier"] ?></span>
			</td>
		</tr>

		<tr>
			<td class="td_custom" width="100%" > 
				<span style="border-bottom: none;"> TANGGAL KEDATANGAN</span>
				<span style="margin-left: 10px;"> : <?= $row["tanggal_kedatangan"] ?></span>

				<span style="margin-left: 150px;"> TANGGAL PENGECEKAN</span>
				<span style="margin-left: 10px;"> : <?= $row["tanggal_pengecekan"] ?></span>

			</td>
		</tr>


		<tr>
			<td class="td_custom" width="100%" > 
				<span style="border-bottom: none;"> NAMA MATERIAL</span>
				<span style="margin-left: 54px;"> : <?= $row["material"] ?></span>
			</td>
		</tr>

		<tr>
			<td class="td_custom" width="100%" > 
				<span style="border-bottom: none;"> LOT NUMBER</span>
				<span style="margin-left: 72px;"> : <?= $row["lot_number"] ?></span>
			</td>
		</tr>

		<tr>
			<td class="td_custom" width="100%" > 
				<span style="border-bottom: none;"> QUANTITY MATERIAL</span>
				<span style="margin-left: 28px;"> : <?= $row["qty_kedatangan"] ?></span>
			</td>
		</tr>

		<tr>
			<td width="100%" > 
				<br><br>
				<span style="border-bottom: none;"> A. SPECIFICATION TEST : </span>
			</td>
		</tr>


	</table>
	
	
	<table class="tg" style="text-align: center;">
	<thead>
            <tr>
                <td rowspan="2">SPESIFIKASI</td>
                <td rowspan="2">STANDARD</td>
                <td rowspan="2">TOLERANSI</td>
                <td colspan="5">ACTUAL SAMPLE</td>
				<td rowspan="2">METHODE</td>
				<td rowspan="2">RESULT</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
            </tr>
        </thead>
        <tbody>

		<?php
		if ($result2->num_rows > 0) {
			while ($row2 = $result2->fetch_assoc()) : ?>


				<tr>
					<td><?= $row2["spesifikasi"] ?></td>
					<td><?= $row2["standart"] ?></td>
					<td><?= $row2["toleransi"] ?></td>
					<td><?= $row2["aktual_sample_1"] ?></td>
					<td><?= $row2["aktual_sample_2"] ?></td>
					<td><?= $row2["aktual_sample_3"] ?></td>
					<td><?= $row2["aktual_sample_4"] ?></td>
					<td><?= $row2["aktual_sample_5"] ?></td>
					<td><?= $row2["metode"] ?></td>
					<td><?= $row2["result"] ?></td>
					 
				</tr>

		<?php $counter += 1;
			endwhile;
		} else {
			echo "0 results";
		}
		?>
	</table>

	<table>
		<tr>
			<td width="100%" > 
				<br><br>
				<span style="border-bottom: none;"> B. VISUAL CHECK (OK = (): NG (x)) : </span>
			</td>
		</tr>
	</table>


	<table class="tg" style="text-align: center;">
	<thead>
            <tr>
                <td rowspan="2">DEFLECTS/ DEVIATION</td>
                <td colspan="10">ACTUAL SAMPLE</td>
				<td rowspan="2">RESULT</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
            </tr>
        </thead>
        <tbody>

		<?php
		if ($result3->num_rows > 0) {
			while ($row3 = $result3->fetch_assoc()) : ?>


				<tr>
					<td><?= $row3["defects"] ?></td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_1"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_2"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_3"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_4"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_5"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_6"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_7"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_8"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_9"] == 1 ? "checked" : "" ?>> </td>
					<td> <input type="checkbox" id="nonPabrikasiCheckbox" <?= $row3["aktual_sample_10"] == 1 ? "checked" : "" ?>> </td>
					<td><?= $row3["result"] ?></td>
					 
				</tr>

		<?php $counter += 1;
			endwhile;
		} else {
			echo "0 results";
		}
		?>
	</table>

	<table>
		<tr>
			<td width="100%" > 
				<br><br>
				<span style="border-bottom: none;"> C. OTHER CHECK : (IF ANY REQUIRED) </span>
			</td>
		</tr>
	</table>
	<table class="tg" style="text-align: center;">
	<thead>
            <tr>
                <td rowspan="2">PARAMETERS / NAMA ALAT CEK</td>
                <td rowspan="2">SPESIFIKASI / ALAT UNTUK CEK</td>
                <td colspan="10">ACTUAL SAMPLE</td>
				<td rowspan="2">RESULT</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
            </tr>
        </thead>
        <tbody>

		<?php
		if ($result4->num_rows > 0) {
			while ($row4 = $result4->fetch_assoc()) : ?>


				<tr>
					<td><?= $row4["defects"] ?></td>
					<td><?= $row4["parameter"] ?></td>
					<td><?= $row4["aktual_sample_1"] ?></td>
					<td><?= $row4["aktual_sample_2"] ?></td>
					<td><?= $row4["aktual_sample_3"] ?></td>
					<td><?= $row4["aktual_sample_4"] ?></td>
					<td><?= $row4["aktual_sample_5"] ?></td>
					<td><?= $row4["aktual_sample_6"] ?></td>
					<td><?= $row4["aktual_sample_7"] ?></td>
					<td><?= $row4["aktual_sample_8"] ?></td>
					<td><?= $row4["aktual_sample_9"] ?></td>
					<td><?= $row4["aktual_sample_10"] ?></td>
					<td><?= $row4["result"] ?></td>
					 
				</tr>

		<?php $counter += 1;
			endwhile;
		} else {
			echo "0 results";
		}
		?>
	</table>


	
	
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