<?php
	if(!empty($_POST["max_digit"]) && $_POST["max_digit"]!=0 && !empty($_POST["header"])){
		transactions("start");
		$sql = "UPDATE shvariabel SET nilai = '".$_POST['nilai']."' WHERE nomor = '".$_POST['nomorshvariabel']."'";
		$result = mysqli_query($con, $sql);
		transactions("commit");
	}
?>