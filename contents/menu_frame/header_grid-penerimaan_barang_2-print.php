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


<table class="table" width="90%" style="height:70px;margin-top: 5px; margin-left: 45px;">
				<tr>
					<td width="50%" style="vertical-align: top; padding: 0;">
						<table style="border:none;">
							<tr>
								<td width="30%" class="myheader text-medium">
								<img style="width: 25rem;" src="https://dev72.inspiraworld.com/mmp_dev/uploads/logo.jpg" class="card-img-top" alt="...">
								<br>
									<font size="4"><strong> To: <?= $row['supplier'] ?> </strong></font><br>
									<br>
									<font size="2"> <?= $row['alamat'] ?> </font><br>
									<br>
									<font size="2"><strong>Attn</strong> <?= $row['attn'] ?> </font><br>
								</td>
							</tr>
						</table>
					</td>


					<br>

					
					<td width="18%" class="myheader" style="vertical-align: top; padding-top: 0;">
					<br><br>
						
						<table class="text-medium">

							<tr>
								<td> 	
								<font size="1">Revisi : 03</font></td>
							</tr>


							<tr>
								<td>
								<font size="1">Halaman : 1/1</font></td>
							</tr>


							<tr>
								<td>
								<font size="1">Tanggal Terbit : <?= $row['tanggal'] ?> </font></td>
							</tr>

						</table>
						<table class="myheader text-medium" style="border: 1px solid black;" width="100%">

							<tr>
								<td>
								<br>
								<strong>Purchase Order</strong>
								</td>
							</tr>

							<tr>
								<td>No Po</td>
								<td>:</td>
								<td><?= $row['kode'] ?> </td> 
							</tr>

							<tr>
								<td>Date Issued</td>
								<td>:</td>
								<td><?= $row['tanggal'] ?> </td>
							</tr>

							<tr>
								<td>Category</td>
								<td>:</td>
								<td><?= $row['category'] ?> </td>
							</tr>
				
						</table>
					</td>
				</tr>
			</table>


	<br><br>
	<table class="tg">
		<tr>
			<td style="text-align: center;">No</td>
			<td style="text-align: center;">Item Code</td>
			<td style="text-align: center;">Description</td>
			<td style="text-align: center;">Delivery</td>
			<td style="text-align: center;">Qty</td>
			<td style="text-align: center;">Total</td>
			<td style="text-align: center;">Unit Price</td>
			<td style="text-align: center;">Subtotal Idr</td>
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

				<tr style="border-right: 1pt solid black;border-left: 1pt solid black;">
					<td style="border-bottom: none; border-top: none;"><?= $counter ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["kode_barang"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["nama_barang"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["tanggal"] ?></td>
					<td style="border-bottom: none; border-top: none;">  <?= number_formatting($row2["jumlah_unit"], 'number2') ?> <?= $row2["satuan"] ?> </td>
					<td style="border-bottom: none; border-top: none;"> <?= number_formatting($row2["jumlah_berat"], 'number2') ?> </td>
					<td style="border-bottom: none; border-top: none; text-align: right;"><?= number_formatting($row2["harga_satuan"], 'currency') ?></td>
					<td style="border-style: none;text-align: right;"><?= number_formatting($row2["subtotal"], 'currency') ?></td>
				</tr>;

		<?php $counter += 1;
			endwhile;
		} else {
			echo "0 results";
		}
		?>
		<?php
		$colspan = 6;

		$total = 0;

		if ($row['diskon_nominal'] > 0 || $sum_diskon_detail > 0) {
			$diskon_printout = $subtotal_sebelum_didiskon - $row["subtotal"] + $row['diskon_nominal'];
		} else {
			$diskon_printout = 0;
		}

		$uang_muka =  ($row["uang_muka"] ? $row["uang_muka"] : 0);

		if ($row['ppn'] == 1) {
			$dpp = $subtotal_sebelum_didiskon - $diskon_printout - $row["uang_muka"] - $uang_muka;
			// ppn = dpp * ppn_prosentase / 100
			$ppn = $dpp * $row['ppn_prosentase'] / 100;
			$total = $dpp + $ppn;

			$dpp_fix = $row["subtotal"] - $row['diskon_nominal'];
		} else {
			$total = $subtotal_sebelum_didiskon - $diskon_printout - $uang_muka;
			$ppn = $row['ppn_prosentase'] / 100 * ($total / (1 + $row['ppn_prosentase'] / 100));

			$dpp = $total - $ppn;
		}


		?>
		<tr>
			<td colspan="<?= $colspan ?>" style="border-left: none; border-right: none; border-bottom: none;">
				<!-- Terbilang : <?= strtoupper(terbilang($total)) ?> RUPIAH -->
				<br>
				<strong>Invoice, Faktur Pajak and Delivery Note on behalf of:</strong> <br>
				PT. MITRA MULTI PACKAGING. Jl. Raya Serang KM. 24, RW 001/005, Desa Tobat Balaraja - Tangerang <br>
				<strong>Term of payment:</strong> <?= $row['top'] ?> DAYS AFTER INVOICE RECEIVE <br>
				<strong>Note/ Delivery Location:</strong> <br>
				BANK BCA; A/C. 108.302.6999; A/N. PT. COLORPAK INDONESIA TBK



			</td>
			<td style="border-left: none; border-right: none; border-bottom: none;text-align: right;">Sub Total</td>
			<td style="border-bottom: none; text-align: right;"> <?= number_formatting($row["subtotal"], 'currency') ?> </td>
		</tr>
		<tr style="max-height: 10px;">
			<td colspan="<?= $colspan ?>" style="border-left: none; border-right: none; border-bottom: none; border-top: none; position: relative;">

			</td>
			<td style="border-style: none;text-align: right; ">Disc</td>
			<td style="border-top:none;text-align: right; border-bottom: none;"> <?= number_formatting($row["diskon_nominal"], 'currency') ?> </td>
		</tr>

		<?php if ($row['status_ppn'] == 'Include' || $row['status_ppn'] == 'Non PPN') : ?>
			<tr>
				<td colspan="<?= $colspan ?>" style="border-style: none;"></td>
				<td style="border-style: none;text-align: right;">Total (Rp)</td>
				<td style="border-top:none;text-align: right; border-bottom: none;"> <?= number_formatting($row["dpp"], 'currency') ?> </td>
			</tr>
			<tr>
				<td colspan="<?= $colspan + 1 ?>" style="border-style: none;text-align: right;"></td>
				<td style="border-top:none;text-align: right; <?= $row['status_ppn'] == 'Non PPN' ? '' : 'border-bottom: none;' ?>"></td>
			</tr>
		<?php endif; ?>
		<?php
		if ($row['ppn'] == 1) :
		?>
			<tr>
				<td colspan="<?= $colspan + 1 ?>" style="border-style: none;text-align: right;">DPP</td>
				<td style="border-top:none;text-align: right;"> <?= number_formatting($dpp_fix, 'currency') ?> </td>
			</tr>
			<tr>
				<td colspan="<?= $colspan + 1 ?>" style="border-style: none;text-align: right;">PPN 11%</td>
				<td style="border-top:none;text-align: right; border-bottom: none;"> <?= $row['status_ppn'] == 'Exclude' ? 'border-bottom: none;' : '' ?> <?= number_formatting($ppn, 'currency') ?> </td>
			</tr>

			
		<?php endif; ?>
		<?php
		if ($row['ppn'] == 1) :
		?>
			<tr>
				<td colspan="<?= $colspan + 1 ?>" style="border-style: none;text-align: right;">Grand Total (Rp)</td>
				<td style="border-top:none;text-align: right;"> <?= number_formatting($total, 'currency') ?> </td>
			</tr>
		<?php endif; ?>


	</table>
	
	<br><br><br><br>
	<div class="divFooter">
		<div>
			<p style="font-size: 1em;"><b>NB: Harap INV & FP harus ditujukan ke Accounting</b></p>
		</div>
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