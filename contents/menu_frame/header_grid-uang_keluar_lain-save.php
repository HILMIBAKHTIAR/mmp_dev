<?php
if($_POST["metode"] == "Kas")
	$edit["string_code_plus"]["otf"] .="BKK";
if($_POST["metode"] == "Bank")
	$edit["string_code_plus"]["otf"] .="BBK";
if($_POST["metode"] == "Giro")
	$edit["string_code_plus"]["otf"] .="BGK";
?>