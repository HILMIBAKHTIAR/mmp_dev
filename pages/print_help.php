<?php 
session_start();
include "../config/config.php";
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";

$menu = $_GET["m"];
if($menu == "master_help_md")
{
	$suffix = "_md";
	$program = "MD";
}
elseif($menu == "master_help_pt")
{
	$suffix = "_pt";
	$program = "PT";
}
else
{
	$suffix = "";
	$program = "Center";
}

echo "
<img src='../contents/image/logo.png' width='400' />
<center>
	<h1>PANDUAN MANUAL PROGRAM ".$program."</h1>
</center>
<br /><br /><br />
<h2><u>".strtoupper("Flowchart Sistem")."</u></h2>
<br />
<img src='../contents/image/flowchart_1a.jpg' width='600' style='border:1px solid black; padding:10px;' />
<br /><br />
<img src='../contents/image/flowchart_1b.jpg' width='600' style='border:1px solid black; padding:10px;' />
<br /><br />
<img src='../contents/image/flowchart_2a.jpg' width='600' style='border:1px solid black; padding:10px;' />
<br /><br />
<img src='../contents/image/flowchart_2b.jpg' width='600' style='border:1px solid black; padding:10px;' />
<br /><br /><hr />
";

$query = "
SELECT a.*,
bmn.judul AS menu
FROM mhhelp".$suffix." a
JOIN shmenu".$suffix." bmn ON a.nomorshmenu = bmn.nomor AND bmn.status_aktif > 0
WHERE a.status_aktif > 0
AND a.nomor > 1
ORDER BY bmn.prioritas";
// echo $query;

$mysqli_query = mysqli_query($con, $query);
while($r = mysqli_fetch_assoc($mysqli_query))
{
	echo "<h2><u>".strtoupper("Menu ".$r["menu"])."</u></h2>";
	echo "<br />";
	echo $r["text_help"];
	echo "<br /><hr />";
}
?>