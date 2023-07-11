<?php
if(!empty($_POST["sandi_baru"]))
	$_POST["sandi"] = md5($_POST["sandi_baru"]);
?>