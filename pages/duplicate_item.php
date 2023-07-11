<?php 
    session_start();
	include "../config/config.php";
	include "../config/database.php";
	include "../".$config["webspira"]."config/connection.php";

	$conn = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

    $table = $_GET["table"];
    $no = $_GET["no"];
	$query = "call sp_duplicate_item(".$no.",".$_SESSION["login"]["nomor"].")";

	$result = $conn->query($query);
	$berhasil = 0;
	$nomor_baru = 0;

    while($row = $result->fetch_assoc()) {;
		$berhasil = 1;
		$nomor_baru = $row["nomor_baru"];
    }

	mysqli_close($conn);
	// echo "test";

	if($berhasil == 1){
		header("Location: ../dashboard.php?m=permintaan_analisa_sample&f=header_grid&&sm=edit&no=".$nomor_baru);
	}else{
		header("Location: ../dashboard.php?m=permintaan_analisa_sample&f=header_grid&&sm=edit&a=view&no=".$no);
	}
?>