<?php
$url = "?=home";
if(isset($_GET["no"]))
{
	$url = "?m=profil_aktif&no=".$_GET["no"];
	$mhadmin_rows = mysqli_num_rows(mysqli_query($con, "
	SELECT a.kode
	FROM mhadmin a
	WHERE a.status_aktif > 0
	AND a.nomor = ".$_GET["no"]."
	AND a.sandi = md5('".$_POST["old_password"]."')"));
	if($mhadmin_rows > 0)
	{
		transactions("start");
		$update = mysqli_query($con, "
		UPDATE mhadmin SET
			sandi = md5('".$_POST["new_password"]."'),
			dibuat_oleh = ".$_SESSION["login"]["nomor"].",
			dibuat_pada = now()
		WHERE nomor = ".$_GET["no"]);
		if(!$update)
		{
			transactions("rollback");
			set_alert(get_message(703,"Edit Profil"),"danger","",$url);
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
		) VALUES (
			".$_SESSION["login"]["nomor"].",
			'".$_SESSION["login"]["ipaddress"]."',
			'".$_SESSION["g.menu"]."',
			'".$_SESSION["menu_".$_SESSION["g.menu"]]["judul"]."',
			'update',
			'mhadmin',
			".$_GET["no"]."
		)");
		transactions("commit");
		set_alert(get_message(702,"Edit Profil"),"success","",$url);
	}
	else
		set_alert(get_message(302),"danger","",$url);
}
die("<meta http-equiv='refresh' content='0;URL=".$url."'>");
?>