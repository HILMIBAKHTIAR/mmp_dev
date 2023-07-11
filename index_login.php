<?php
session_start();
include "config/config.php";
include "config/database.php";
include $config["webspira"]."config/connection.php";
include $config["webspira"]."functions/anti_injection.php";
include $config["webspira"]."functions/get_message.php";
$debug = 0;
$url = "index.php";
if(isset($_POST["url"]) && $_POST["url"] == "sales")
	$url = "pages/sales";
$username = strtolower(anti_injection($con, $_POST["username"]));
$password = anti_injection($con, $_POST["password"]);
$query_login = "
SELECT a.kode
FROM mhadmin a
WHERE a.status_aktif > 0
AND a.kode = '".$username."'";
$mhadmin_rows = mysqli_num_rows(mysqli_query($con, $query_login));
if($mhadmin_rows > 0)
{
	$password_md5 = md5($password);
	if ($username != 'admin')
		$query_login = "
		SELECT a.*,
		MAX(e.kode) AS cabang_kode, MAX(e.nama) AS cabang_nama, MAX(e.pusat) AS cabang_pusat, MAX(e.nomormhusaha) AS nomormhusaha,
		MAX(b.tipe) AS grup_tipe, MAX(b.tingkatan) AS grup_tingkatan, MAX(b.nomor) AS nomormhadmingrup, MAX(c.pkp) AS pkp,
		MAX(e.nomor) AS nomormhcabang
		FROM mhadmin a
		JOIN shaksesmaster d ON d.`nomormhadmin`= a.nomor AND d.status_aktif > 0
		LEFT JOIN mhadmingrup b ON d.relasi_nomor = b.nomor AND b.status_aktif > 0 AND d.relasi_table = 'mhadmingrup'
		LEFT JOIN mhusaha c ON d.relasi_nomor = c.nomor AND c.status_aktif > 0 AND d.relasi_table = 'mhusaha' 
		LEFT JOIN mhcabang e ON d.relasi_nomor = e.nomor AND e.status_aktif > 0 AND d.relasi_table = 'mhcabang'	
		JOIN mhusaha f ON d.nomormhusaha = f.nomor AND f.kode LIKE '".$config["usaha"]."'
		WHERE a.status_aktif > 0
		AND a.kode = '".$username."'
		AND a.sandi = '".$password_md5."'";
	else
		$query_login = "
		SELECT a.*,
		MAX(e.kode) AS cabang_kode, MAX(e.nama) AS cabang_nama, MAX(e.pusat) AS cabang_pusat, MAX(e.nomormhusaha) AS nomormhusaha,
		MAX(b.tipe) AS grup_tipe, MAX(b.tingkatan) AS grup_tingkatan, MAX(b.nomor) AS nomormhadmingrup, MAX(c.pkp) AS pkp,
		MAX(e.nomor) AS nomormhcabang
		FROM mhadmin a
		LEFT JOIN mhadmingrup b ON b.status_aktif > 0 AND b.nomormhusaha = 0 AND b.template = 1 AND b.kode = 'SPM'
		LEFT JOIN mhusaha c ON c.status_aktif > 0 
		LEFT JOIN mhcabang e ON e.status_aktif > 0	
		WHERE a.status_aktif > 0
		AND a.kode = '".$username."'
		AND a.sandi = '".$password_md5."'";
	$mhadmin_query = mysqli_query($con, $query_login);
	$mhadmin_rows = mysqli_num_rows($mhadmin_query);
	if($mhadmin_rows > 0)
	{
		$mhadmin_array = mysqli_fetch_array($mhadmin_query);
		if($username == 'admin'){
			$_SESSION["cabang"]["nomor"] = $mhadmin_array["nomormhcabang"];
			$_SESSION["usaha"]["nomor"] = '%';
			$_SESSION["usaha"]["inisial"] = '';
			$_SESSION["usaha"]["kode_pos"] = '';
			$_SESSION["usaha"]["alamat"] = '';
			$_SESSION["usaha"]["telepon"] = '';
			$_SESSION["usaha"]["npwp"] = '';
			$_SESSION["usaha"]["email"] = '';
			$_SESSION["usaha"]["pkp"] = $mhadmin_array["pkp"];
		}else{
			$_SESSION["cabang"]["nomor"] = $mhadmin_array["nomormhcabang"];
			$_SESSION["usaha"]["nomor"] = $mhadmin_array["nomormhusaha"];
			$_SESSION["usaha"]["inisial"] = $mhadmin_array["inisial"];
			$_SESSION["usaha"]["kode_pos"] = $mhadmin_array["kode_pos"];
			$_SESSION["usaha"]["alamat"] = $mhadmin_array["alamat"];
			$_SESSION["usaha"]["telepon"] = $mhadmin_array["telepon"];
			$_SESSION["usaha"]["npwp"] = $mhadmin_array["npwp"];
			$_SESSION["usaha"]["email"] = $mhadmin_array["email"];
			$_SESSION["usaha"]["pkp"] = $mhadmin_array["pkp"];
		}

		if($mhadmin_array["status_aktif"] == 1)
		{
			include $config["webspira"]."login.php";
		}
		else
		{
			$_SESSION["login"]["alert"]["message"] = get_message(722);
			if($debug == 1)
				$_SESSION["login"]["alert"]["message"] .= "<br />".$query_login;
			$_SESSION["login"]["alert"]["type"] = "warning";
		}
	}
	else
	{
		$_SESSION["login"]["alert"]["message"] = get_message(305);
		if($debug == 1)
			$_SESSION["login"]["alert"]["message"] .= "<br />".$query_login;
		$_SESSION["login"]["alert"]["type"] = "warning";
	}
}
else
{
	$_SESSION["login"]["alert"]["message"] = get_message(304);
	if($debug == 1)
		$_SESSION["login"]["alert"]["message"] .= "<br />".$query_login;
	$_SESSION["login"]["alert"]["type"] = "danger";
}
die("<meta http-equiv='refresh' content='0;URL=".$url."'>");
?>