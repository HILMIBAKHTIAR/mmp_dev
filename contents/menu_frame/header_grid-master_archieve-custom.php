<?php
$resultajax = "data_fail_didelete_custom";
$custom = $_GET["c"];
switch($custom)
{
	case "delete":
		if(isset($_GET["no"]))
		{
			// transactions("start");

			$approved_by = $_SESSION["login"]["nomor"];

			$update_1 = mysqli_query($con, "UPDATE mharchievedfiles SET status_aktif = 0, dihapus_oleh = $approved_by, dihapus_pada = NOW() WHERE nomor = ".$_GET["no"]);

			if(!$update_1)
			{
				// transactions("rollback");
				$resultajax = "data_fail_didelete_custom";
				// set_alert(get_message(703,ucfirst("edit")),"error");
			}
			mysqli_query($con, "
			INSERT INTO rhaktivitasadmin (
				nomormhadmin,
				ipaddress,
				aksi_menu_kode,
				aksi_menu_judul,
				aksi_statement,
				aksi_table,
				aksi_nomor
			)
			VALUES (
				".$_SESSION["login"]["nomor"].",
				'".$_SESSION["login"]["ipaddress"]."',
				'".$_SESSION["g.menu"]."',
				'".$_SESSION["menu_".$_SESSION["g.menu"]]["judul"]."',
				'delete',
				'mharchievedfiles',
				'".$_GET["no"]."'
			)");

			// transactions("commit");
			$resultajax = "data_success_didelete_custom";
			// set_alert(get_message(702,ucfirst("update")),"valid");
		}
		// echo "<script>window.location='dashboard.php?m=".$_SESSION["menu_".$_SESSION["g.menu"]]["string"]."&f=header_grid&&sm=edit&a=view&no=".$_GET["h"]."';</script>";
	break;
}

if($custom != "delete"){
	echo $resultajax;	
}
?>


