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
			SELECT DISTINCT
				a.*,
				b.nama  AS supplier,
				b.kode AS kode_supplier,
				DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
				b.alamat as alamat_supplier,
				kota.nama as kota_supplier,
				f.nama as proyek,
				pgw.nama as nama_pemohon,
				pgw.telepon as telepon_pemohon,
				a.top AS top
			FROM thorderpembelian a
			JOIN mhrelasi b ON b.nomor = a.supplier
			JOIN tdorderpembelian c ON c.nomorthorderpembelian = a.nomor
			LEFT JOIN tdpermintaanmaterial d ON d.nomor = c.nomortdpermintaanmaterial
			LEFT JOIN thpermintaanmaterial thprmntaan ON thprmntaan.nomor = d.nomorthpermintaanmaterial
			LEFT JOIN mhpegawai pgw ON pgw.nomor = c.nomormhpegawai
			LEFT JOIN thjualkontrak e ON e.nomor = d.nomorthjualkontrak
			LEFT JOIN mhproyek f ON f.nomor = c.nomormhproyek
			JOIN mhkota kota ON kota.nomor = b.nomormhkota
			WHERE c.status_aktif = 1 AND a.nomor = " . $_GET["no"];

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "SELECT 
a.*,
					UPPER(l.kode) AS kode_proyek, 
					UPPER(b.kode) AS kode, 
					UPPER(b.nama) AS nama_barang,
					UPPER(c.nama) AS tipe,
					UPPER(h.nama) AS satuan_purchasing,
					UPPER(d.nama) AS ukuran,
					UPPER(l.alamat) AS alamat,
					CONCAT(a.jumlah_bayar, ' ', g.nama) AS jumlah,
					a.harga_satuan AS harga_satuan,
					a.subtotal AS total_per_row
				FROM tdorderpembelian a 
				JOIN mhbarang b ON b.nomor = a.nomormhbarang 
				LEFT JOIN tdpermintaanmaterial e ON e.nomor = a.nomortdpermintaanmaterial 
				LEFT JOIN mdbarangtipe c ON c.nomor = a.nomormdbarangtipe 
				LEFT JOIN mdbarangukuran d ON d.nomor = a.nomormdbarangukuran 
				LEFT JOIN mhpekerjaan f ON f.nomor = a.nomormhpekerjaan 
				JOIN mhsatuan g ON g.nomor = b.satuan_purchasing 
				JOIN mhsatuan h ON h.nomor = a.nomormhsatuan_purchasing 
				LEFT JOIN thpermintaanmaterial i ON i.nomor = e.nomorthpermintaanmaterial 
				LEFT JOIN mhpegawai j ON j.nomor = a.nomormhpegawai 
				LEFT JOIN mhproyek l ON l.nomor = e.nomormhproyek 
				WHERE a.status_aktif > 0 AND a.nomorthorderpembelian = " . $row['nomor'];

$result2 = $conn->query($sql2);

$sqlAlamatProyek = "
		SELECT
			g.alamat AS alamat
		FROM thorderpembelian a
		JOIN tdorderpembelian c ON c.nomorthorderpembelian = a.nomor
		LEFT JOIN tdpermintaanmaterial d ON d.nomor = c.nomortdpermintaanmaterial
		LEFT JOIN thjualkontrak e ON e.nomor = d.nomorthjualkontrak
		LEFT JOIN mhproyek g ON g.nomor = d.nomormhproyek				
		WHERE a.nomor = " . $_GET["no"];

$resultAlamat = $conn->query($sqlAlamatProyek);

$arrayAlamat = array();
while ($rowAlamat = $resultAlamat->fetch_assoc()) {
	array_push($arrayAlamat, $rowAlamat["alamat"]);
}

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
		/*Ukuran Kertas A4*/
		width: 8.27in;
		/* height: 11.69in; */
		margin: 0px !important;
		/*margin:.2in .2in .2in .2in;*/
		/*margin-left: 0.2in;
        margin-left: 0.2in;
        margin-top: 0.2in;
        margin-bottom: 0.2in; */
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
			/*Ukuran Kertas A4*/
			width: 8.27in;
			/* height: 11.69in; */
		}

		body,
		html {
			/*Ukuran Kertas A4*/
			width: 8.27in;
			/* height: 11.69in; */
			/*margin:.2in .2in .2in .2in;*/
		}
	}

	/* @media screen {
		div.divFooter {
			position: fixed;
			width: 8.27in;
			bottom: 0.2in;
		}
	} */

	/* @media print {
		div.divFooter {
			position: fixed;
			width: 8.27in;
			bottom: 0.2in;
		}
	} */
</style>

<body>


	<table>
		<tr>
			<td colspan="4">
				<h3>BUKTI ORDER PEMBELIAN<h3>
			</td>
		</tr>
		<tr>
			<td colspan="4"></td>
		</tr>
		<tr>
			<td width="10%">Supplier</td>
			<td width="55%"> : <?= $row['kode_supplier'] . ' - ' . $row['supplier'] ?></td>
			<td width="10%">Nomor</td>
			<td width="25%"> : <?= $row['kode'] ?></td>
		</tr>
		<tr>
			<td width="10%"></td>
			<td width="55%"><?= $row['alamat_supplier'] . ' - ' . $row['kota_supplier'] ?></td>
			<td width="10%">Tanggal</td>
			<td width="25%"> : <?= $row['tanggal'] ?></td>
		</tr>
		<tr>
			<td width="10%"></td>
			<td width="55%"></td>
			<td width="10%">Ship to</td>
			<td width="25%"> : <?= $row['proyek'] ?> - <?= $arrayAlamat[0] ?> </td>
		</tr>
		<tr>
			<td width="10%">Pembayaran</td>
			<td width="55%"> : <?= $row['top'] ?> Hari</td>
			<td width="10%">Pemohon</td>
			<td width="25%"> : <?= $row['nama_pemohon'] . ' (telp: ' . $row['telepon_pemohon'] . ')' ?> </td>
		</tr>
	</table>
	<br><br>
	<table class="tg">
		<tr>
			<td style="text-align: center;">No.</td>
			<td style="text-align: center;">Kode</td>
			<td style="text-align: center;">Nama Barang</td>
			<td style="text-align: center;">Tipe</td>
			<td style="text-align: center;">Ukuran</td>
			<td style="text-align: center;">Jumlah Sat</td>
			<td style="text-align: center;">Harga Satuan</td>
			<td style="text-align: center;">Total</td>
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
					<td style="border-bottom: none; border-top: none;"><?= $row2["kode"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["nama_barang"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["tipe"] ?></td>
					<td style="border-bottom: none; border-top: none;"><?= $row2["ukuran"] ?></td>
					<td style="border-bottom: none; border-top: none; text-align: right;"><?= number_formatting($row2['jumlah_bayar'], "number", 4) ?> <?= $row2["satuan_purchasing"] ?></td>
					<td style="border-bottom: none; border-top: none; text-align: right;"><?= number_formatting($row2["harga_satuan"], 'money') ?></td>
					<td style="border-style: none;text-align: right;"><?= number_formatting($row2["jumlah_bayar"] * $row2["harga_satuan"], 'money') ?></td>
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

		if ($row['status_ppn'] == 'Exclude') {
			$dpp = $subtotal_sebelum_didiskon - $diskon_printout - $row["uang_muka"] - $uang_muka;
			// ppn = dpp * ppn_prosentase / 100
			$ppn = $dpp * $row['ppn_prosentase'] / 100;
			$total = $dpp + $ppn;
		} else {
			$total = $subtotal_sebelum_didiskon - $diskon_printout - $uang_muka;
			$ppn = $row['ppn_prosentase'] / 100 * ($total / (1 + $row['ppn_prosentase'] / 100));

			$dpp = $total - $ppn;
		}


		?>
		<tr>
			<td colspan="<?= $colspan ?>" style="border-left: none; border-right: none; border-bottom: none;">
				Terbilang : <?= strtoupper(terbilang($total)) ?> RUPIAH
			</td>
			<td style="border-left: none; border-right: none; border-bottom: none;text-align: right;">Sub Total</td>
			<td style="border-bottom: none; text-align: right;"><?= number_formatting($subtotal_sebelum_didiskon, 'money') ?></td>
		</tr>
		<tr style="max-height: 10px;">
			<td colspan="<?= $colspan ?>" style="border-left: none; border-right: none; border-bottom: none; border-top: none; position: relative;">

			</td>
			<td style="border-style: none;text-align: right; ">Discount</td>
			<td style="border-top:none;text-align: right; border-bottom: none;"><?= number_formatting($diskon_printout, 'money') ?></td>
		</tr>
		<tr style="max-height: 10px;">
			<td colspan="<?= $colspan ?>" style="border-left: none; border-right: none; border-bottom: none; border-top: none; position: relative;">

			</td>
			<td style="border-style: none;text-align: right; ">Uang Muka</td>
			<td style="border-top:none;text-align: right; border-bottom: none;"><?= number_formatting($uang_muka, 'money') ?></td>
		</tr>
		<?php if ($row['status_ppn'] == 'Include' || $row['status_ppn'] == 'Non PPN') : ?>
			<tr>
				<td colspan="<?= $colspan ?>" style="border-style: none;"></td>
				<td style="border-style: none;text-align: right;">Total</td>
				<td style="border-top:none;text-align: right; border-bottom: none;"><?= number_formatting($total, 'money') ?></td>
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
				<td style="border-top:none;text-align: right; border-bottom: none;"><?= number_formatting($dpp, 'money') ?></td>
			</tr>
		<?php endif; ?>
		<?php
		if ($row['ppn'] == 1) :
		?>
			<tr>
				<td colspan="<?= $colspan + 1 ?>" style="border-style: none;text-align: right;">PPN</td>
				<td style="border-top:none;text-align: right; <?= $row['status_ppn'] == 'Exclude' ? 'border-bottom: none;' : '' ?>"><?= number_formatting($ppn, 'money') ?></td>
			</tr>
		<?php endif; ?>

		<?php if ($row['status_ppn'] == 'Exclude') : ?>
			<tr>
				<td colspan="<?= $colspan ?>" style="border-style: none;"></td>
				<td style="border-style: none;text-align: right;">Total</td>
				<td style="border-top:none;text-align: right;"><?= number_formatting($total, 'money') ?></td>
			</tr>
		<?php endif; ?>
	</table>
	<br><br><br>
	<div class="divFooter">
		<div>
			<p style="font-size: 1em;"><b>PENTING :</b></p>
			<ol>
				<?= ($row['status_ppn'] == 'Include' ? "<li>" . strtoupper($row['status_ppn']) . " - Harga sudah termasuk PPN</li>" : "") ?>
				<li>Surat jalan wajib disertai No. Order Beli dari kami</li>
				<li>Penagihan dilampirkan faktur pajak dan order beli</li>
			</ol>
		</div>
		<table class="tg">
			<tr>
				<!-- <td style="border-style: none;text-align: left;font-size: 10pt"></td> -->
				<!-- <td style="border-style: none;text-align: right;font-size: 10pt">Page 1 of 1</td> -->
				<table>
					<tr>
						<td width="230" style="text-align: center;">Disetujui oleh Supplier</td>
						<td width="230" style="text-align: center;">Dibuat oleh,</td>
						<td width="230" style="text-align: center;">Menyetujui,</td>
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
						<td width="230" style="text-align: center;">(&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp)</td>
						<td width="230" style="text-align: center;">(&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp LENA &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp)</td>
						<td width="230" style="text-align: center;">(&nbsp &nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbsp CORRY &nbsp&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp)</td>
					</tr>
					<tr>
						<td width="230" style="text-align: center;">Tanda tangan & Stempel</td>
						<td width="230" style="text-align: center;"></td>
						<td width="230" style="text-align: center;"></td>
					</tr>
				</table>
				<td width="20%" style="border-style: none;text-align: left;font-size: 10pt;">Printed : <?= date('d M Y \, H:i') ?></td>
			</tr>
		</table>
	</div>

</body>