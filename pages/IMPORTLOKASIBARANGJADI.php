<?php
session_start();
include "../config/config.php";
include "../".$config["webspira"]."dashboard_prep.php";
include "excel_reader2.php";

$modul = "master_barang_data";
$folder = "http://10.10.22.31/inafood_erp/";

$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

// upload file xls
$target = "file_temp/".$_FILES['fileImport']['name'];
if (!move_uploaded_file($_FILES["fileImport"]["tmp_name"], $target)) {
    $_SESSION["menu_master_barang_data"]["alert"]["message"] = $phpFileUploadErrors[$_FILES['fileImport']['error']];
	header("Location: ".$folder."/dashboard.php?m=".$modul."&f=header_grid&");
	// header("Location: dashboard.php?m=".$modul."&f=header_grid&");
}
 
// beri permisi agar file xls dapat di baca
chmod($target,0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($target,false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
$kode_lama = "";
for ($i=2; $i<=$jumlah_baris; $i++){
	// $gagal=false;
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	// DETAIL
	// for ($x=1; $x<=$jumlah_baris; $x++){
	// echo $i;
	// $kode = "UMUIMP".date("Ymdhis").$i;
	 // $kode  = "UMU" . str_replace("-","",$tanggal);
	// }

	$kode_barang 		= $data->val($i, 1);
	$nama_barang  		= $data->val($i, 2);
	$nama_lokasi 		= $data->val($i, 3);
	$prioritas			= $data->val($i, 4);

	$barang = mysql_fetch_array(mysql_query("SELECT nomor,  count(*) AS total FROM mhbarang  WHERE status_aktif = 1 AND kode = '$kode_barang'"));
	$lokasi = mysql_fetch_array(mysql_query("SELECT nomor,  count(*) AS total FROM mhlokasi  WHERE status_aktif = 1 AND nama = '$nama_lokasi' AND nomormhgudang = 10"));


	if($barang['total'] == 0){
    	// $kode = formatting_code("kode_po_supplier_gagal");
		// $tipe=1;
		$keterangan .= "BARANG TIDAK ADA";
		// unlink($_FILES['fileImport']['name']);
		// unlink($_FILES['fileImport']['name']);
		// $_SESSION["menu_".$modul]["alert"]["message"] = "Data gagal di import, Barang Tidak Ditemukan !!";
		// header("Location: /dashboard.php?m=".$modul."&f=header_grid&");
		// exit();
	}

	if($lokasi['total'] == 0){
		$keterangan .= "LOKASI TIDAK ADA";
		// unlink($_FILES['fileImport']['name']);
		// unlink($_FILES['fileImport']['name']);
		// $_SESSION["menu_".$modul]["alert"]["message"] = "Data gagal di import, Lokasi Tidak Ditemukan !!";
		// header("Location: /dashboard.php?m=".$modul."&f=header_grid&");
		// exit();
	}

	// input data ke database (table data_pegawai)
	mysql_query("INSERT INTO mdbaranglokasi (
								nomormhbarang, 
								nomormhlokasi, 
								prioritas, 
								dibuat_oleh,
								dibuat_pada,
								keterangan,
								catatan
							) VALUES (
								'".$barang['nomor']."',
								'".$lokasi['nomor']."',
								'$prioritas',
								'".$_SESSION["login"]["nomor"]."',
								NOW(),
								'$keterangan',
								'INJECT DATA'
							)");
	// echo "INSERT INTO mdbaranglokasi (
	// 							nomormhbarang, 
	// 							nomormhlokasi, 
	// 							prioritas, 
	// 							dibuat_oleh,
	// 							dibuat_pada,
	// 							catatan
	// 						) VALUES (
	// 							'".$barang['nomor']."',
	// 							'".$lokasi['nomor']."',
	// 							'$prioritas',
	// 							'".$_SESSION["login"]["nomor"]."',
	// 							NOW(),
	// 							'INJECT DATA EXCEL'
	// 						)";
	// 		exit();
	$berhasil++;
}
// exit();
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['fileImport']['name']);

$_SESSION["menu_".$modul]["alert"]["message"] = "Berhasil Import (".$berhasil.") Data Lokasi Masuk";
// header("Location: /dashboard.php?m=".$modul."&f=header_grid&");
header("Location: /inafood_erp/dashboard.php?m=".$modul."&f=header_grid&&sm=edit&a=view&no=".$barang['nomor']);
?>