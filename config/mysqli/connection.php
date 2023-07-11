<?php
	$conn_header = mysqli_connect($mysqli["server"],$mysqli["username"],$mysqli["password"])or die("Koneksi ke ".$mysqli["server"]." gagal.");
	mysqli_select_db($conn_header, $mysqli["database"])or die("Database ".$mysqli["database"]." tidak ditemukan.");
?>