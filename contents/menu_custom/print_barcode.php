<style>	
	tr, td{
		padding:0px!important;
		margin:0px!important;
		line-height: 100%;
		font-family:tahoma;
	}
</style>
<?php
	include "../../config/config.php";
	include "../../config/database.php";
	include "../../".$config["webspira"]."config/connection.php";

	$conn_header = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	if ($conn_header->connect_error) { die("Connection failed: " . $conn_header->connect_error); }

	// $nomor = $_GET["no"];
	// $sql = "SELECT a.*,c.nama AS nama, b.jumlah AS jumlah
	// 		FROM thbelinota a 
	// 		JOIN tdbelinota b ON b.nomorthbelinota = a.nomor
	// 		JOIN mhbarang c ON b.nomormhbarang = c.nomor
	// 		WHERE a.nomor = '$nomor' AND a.status_aktif = 1";
	// $result = $conn_header->query($sql);
	// $row = $result->fetch_assoc();

	$sql = "
			SELECT
            a.nomor as nomor, a.kode as kode, b.nama as nama,
            c.nama as tipe, d.nama as golongan, e.nama as kategori,
            f.nama as subkategori, g.nama as jenis, h.nama as gol,
            h.kode as kodegol, 
            CONCAT(c.kode,'.',d.kode,e.kode,'.',f.kode,g.kode) as kode1,
            a.jumlah as jumlah, n.nama as nama_nomormhsatuan, n.nomor as nomormhsatuan,
            p.nomorkendaraan as nomorkendaraan, p.kode_aktiva as kode_aktiva,
            DATE_FORMAT(p.tanggal_perolehan, '%d-%m-%Y') as custom_tanggal_perolehan,
            p.tanggal_perolehan as tanggal_perolehan,
            CONCAT(q.kode1,q.kode2,' - ',q.nama1,' ',q.nama2) as lokasibarang,
            p.nomor as nomorthdistribusibarang, a.nomormhbarang as nomormhbarang,
            r.nama as pic,s.nama as cabang
            FROM
                thperpindahanbarang a
            LEFT JOIN mhbarang b on b.nomor=a.nomormhbarang
            LEFT JOIN mhtipebarang c ON  c.nomor=b.nomormhtipebarang  
            LEFT JOIN mhgolonganbarang d ON d.nomor=b.nomormhgolonganbarang
            LEFT JOIN mhkategoribarang e ON e.nomor=b.nomormhkategoribarang  
            LEFT JOIN mhsubkategoribarang f ON f.nomor=b.nomormhsubkategoribarang  
            LEFT JOIN mhjenisbarang g ON g.nomor=b.nomormhjenisbarang  
            LEFT JOIN mhgolbarang h ON h.nomor=b.nomormhgolbarang
            LEFT JOIN mhsatuan m ON m.nomor =a.satuan_unit
            LEFT JOIN mhsatuan n ON n.nomor= a.nomormhsatuan
            LEFT JOIN mdbarangsatuan o on o.nomormhbarang=b.nomor AND o.terkecil=1 AND o.status_aktif=1
            LEFT JOIN thdistribusibarang p on p.nomor=a.nomorthdistribusibarang 
            LEFT JOIN mhlokasibarang q on q.nomor=p.nomormhlokasibarang
            LEFT JOIN mhpegawai r on r.nomor=p.diterima_oleh
            LEFT JOIN mhcabang s on s.nomor=a.nomormhcabang 
            WHERE
                a.status_aktif = 1 AND h.status_aktif=1   
           
	AND a.nomor = ".$_GET["no"];
	// echo $sql;
	$result = $conn_header->query($sql);
	// $row = $result->fetch_assoc();

	$font_default 	= "18";
	$font_md 		= "10";
	$font_xl 		= "16";
	$barcode_height = "2.0";
	$barcode_width = "6.0";

	// if($row["width"] == "-" && $row["height"] == "-"){
	// 	$row["width"] = "5";
	// 	$row["height"] = "2";
	// 	$font_default 	= "5.8";
	// 	$font_md 		= "5";
	// 	$font_xl 		= "14";
	// 	$barcode_height = "0.8";
	// }

	// if($row["width"] == 5 && $row["height"] == 2){
	// 	$font_default 	= "7";
	// 	$font_md 		= "7";
	// 	$font_xl 		= "14";
	// 	$barcode_height = "1";
	// }

	// if($row["width"] == 5 && $row["height"] == 2){
	// 	$font_default 	= "10";
	// 	$font_md 		= "7";
	// 	$font_xl 		= "14";
	// 	$barcode_height = "1";
	// }
	
	// echo $row["barcode"];
	while($row = $result->fetch_assoc()) {
	// $bc1 = $row["barang"];
	// // if(empty($bc1))
	// $bc2 = $row["supplier"];
	// $bc3 = $row["batch_number"];
	// $barcode = strtoupper($bc1.'.'.$bc2.'.'.$bc3);
	$barcode=$row["kode"];
	// $page = $row["jumlah_print"];
	$page=1;
	
	$x = 1;
		echo "<table border='0'  style='margin-top: 0px;margin-left:-8px;'>";
		for($i = 1; $i <= $page; $i++)
		{
			if($x%2 != 0){
				echo "<tr>";
			}
			if($i == $page){
				// echo "<table  border='0' cellpadding='1' style='float: left;border:0px solid black;width:".$row["width"]."cm;height:".$row["height"]."cm;max-height:".$row["height"]."cm;font-size:".$font_default."px;transform: rotate(0deg);margin-top:30px;margin-left:0px;'>";
				// echo "	<tr>";
				echo "		<td style='padding: 0px !important;'>";
				// echo "			APOTIK SURYA MUSTIKA";
				// echo "			<br>".$row["namalokasi"]."";
				// echo "			<br><div style='padding-top:0px;font-size:".$font_xl."px;text-align:center'>".$row["nama"]."</div>";
				echo "			<br><img src='barcode.php?codetype=code128&text=".$barcode."' style='width:100%;height:".$barcode_height."cm;'/>";
				echo "			<br><div style='text-transform: uppercase;padding-top:3px;text-align:center;font-size:16px;'>".$barcode.' '.$row["nama"]."</div>";
				echo "			<br>";
				echo "			<br>";
				echo "		</td>";
				// echo "	</tr>";
				// echo "</table>";
			}
			else
			{
				// echo "<table  border='0' cellpadding='1' style='float: left;border:0px solid black;width:".$row["width"]."cm;height:".$row["height"]."cm;max-height:".$row["height"]."cm;font-size:".$font_default."px;transform: rotate(0deg);margin-top:30px;margin-left:-50px;'>";
				// echo "	<tr>";
				echo "		<td style='padding: 0px !important;'>";
				// echo "			APOTIK SURYA MUSTIKA";
				// echo "			<br>".$row["namalokasi"]."";
				// echo "			<br><div style='padding-top:0px;font-size:".$font_xl."px;text-align:center'>".$row["nama"]."</div>";
				echo "			<br><img src='barcode.php?codetype=code128b&text=".$barcode."' style='width:100%;height:".$barcode_height."cm;'/>";
				echo "			<br><div style='text-transform: uppercase;padding-top:3px;text-align:center;font-size:16px;'>".$barcode.' '.$row["nama"]."</div>";
				echo "			<br>";
				echo "			<br>";
				echo "		</td>";
				// echo "	</tr>";
				// echo "</table>";
			}
			if($x%2 == 0){
				echo "</tr>";
			}
			$x++;
		}
		
	}
	echo "</table>";
?>