<?php

if($edit["mode"] == "add")
{
	$query_custom = "SELECT a.* FROM thkliringgiro a WHERE a.nomor = {$nomor}";
	$debug_html .= "mysql_query : ".$query_custom."<br /><br />";
	$result_custom = mysqli_query($con, $query_custom);
	$thkliringgiro = mysqli_fetch_assoc($result_custom);

	$query_custom = "SELECT a.* FROM tdkliringgiro a WHERE a.nomorthkliringgiro = {$nomor}";
	$debug_html .= "mysql_query : ".$query_custom."<br /><br />";
	$result_custom = mysqli_query($con, $query_custom);

	while ($tdkliringgiro = mysqli_fetch_array($result_custom)) {
		if($thkliringgiro['status_kliring'] == "kliring") {
			if ($thkliringgiro['jenis_uang'] == "uang_masuk") {
				$query_custom2 = "UPDATE thuangmasuk a JOIN tdkliringgiro b ON b.nomorthuang = a.nomor JOIN thkliringgiro c ON c.nomor = b.nomorthkliringgiro SET a.status_giro = 1, a.tanggal_kliring = '{$thkliringgiro['tanggal_kliring']}', a.nomormhaccount = {$thkliringgiro['nomormhaccount']} WHERE a.nomor = {$tdkliringgiro['nomorthuang']} AND b.jenis_uang = 'uang_masuk' AND c.nomor = {$nomor}";
				$debug_html .= "mysql_query : ".$query_custom2."<br /><br />";
				$result_custom2 = mysqli_query($con, $query_custom2);
			} else if ($thkliringgiro['jenis_uang'] == "uang_keluar") {
				$query_custom2 = "UPDATE thuangkeluar a JOIN tdkliringgiro b ON b.nomorthuang = a.nomor JOIN thkliringgiro c ON c.nomor = b.nomorthkliringgiro SET a.status_giro = 1, a.tanggal_kliring = '{$thkliringgiro['tanggal_kliring']}', a.nomormhaccount = {$thkliringgiro['nomormhaccount']} WHERE a.nomor = {$tdkliringgiro['nomorthuang']} AND b.jenis_uang = 'uang_keluar' AND c.nomor = {$nomor}";
				$debug_html .= "mysql_query : ".$query_custom2."<br /><br />";
				$result_custom2 = mysqli_query($con, $query_custom2);
			}

			
		} else if ($thkliringgiro['status_kliring'] == "unkliring") {
			if ($thkliringgiro['jenis_uang'] == "uang_masuk") {
				$query_custom2 = "UPDATE thuangmasuk a JOIN tdkliringgiro b ON b.nomorthuang = a.nomor JOIN thkliringgiro c ON c.nomor = b.nomorthkliringgiro SET a.status_giro = 0, a.tanggal_kliring = '0000-00-00', a.nomormhaccount = 0 WHERE a.nomor = {$tdkliringgiro['nomorthuang']} AND b.jenis_uang = 'uang_masuk' AND c.nomor = {$nomor}";
				$debug_html .= "mysql_query : ".$query_custom2."<br /><br />";
				$result_custom2 = mysqli_query($con, $query_custom2);
			} else if ($thkliringgiro['jenis_uang'] == "uang_keluar") {
				$query_custom2 = "UPDATE thuangkeluar a JOIN tdkliringgiro b ON b.nomorthuang = a.nomor JOIN thkliringgiro c ON c.nomor = b.nomorthkliringgiro SET a.status_giro = 0, a.tanggal_kliring = '0000-00-00', a.nomormhaccount = 0 WHERE a.nomor = {$tdkliringgiro['nomorthuang']} AND b.jenis_uang = 'uang_keluar' AND c.nomor = {$nomor}";
				$debug_html .= "mysql_query : ".$query_custom2."<br /><br />";
				$result_custom2 = mysqli_query($con, $query_custom2);
			}
		}
	}
}
?>