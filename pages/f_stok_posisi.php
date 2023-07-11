<?php 
session_start();
include "../config/config.php";
include "../config/database.php";
include "../".$config["webspira"]."config/connection.php";

$batch_number  = $_POST["batch_number"];
$batch_expired = $_POST["batch_expired"];
$nomormhbarang = $_POST["nomormhbarang"];
$nomormhgudang = $_POST["nomormhgudang"];
$nomormhcabang = $_POST["nomormhcabang"];
$tanggal       = $_POST["tanggal"];

$query = "
SELECT f_stok_posisi(
	'".$batch_number."',
	'".$batch_expired."',
	".$nomormhbarang.",
	".$nomormhgudang.",
	".$nomormhcabang.",
	'".$tanggal."'
) AS jumlah
;";
$debug = "query = ".str_replace(array("\n","\r","\t")," ",$query);

$mysqli_query = mysqli_query($con, $query);
while($r = mysqli_fetch_assoc($mysqli_query))
{
	$data = '{"jumlah":"'.$r["jumlah"].'","debug":"'.$debug.'"}';
}
echo $data;
?>