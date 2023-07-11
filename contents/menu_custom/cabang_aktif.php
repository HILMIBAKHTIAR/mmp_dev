<?php
// die("<meta http-equiv='refresh' content='0;URL=dashboard.php?m=cabang_aktif&f=header_grid&'>");

if(isset($_GET["a"]) && $_GET["a"] == "set" && isset($_GET["no"]))
{
	$cabang = mysqli_fetch_array(mysqli_query($con, "
	SELECT a.*, b.pkp
	FROM mhcabang a
	JOIN mhusaha b ON b.nomor = a.nomormhusaha AND b.status_aktif = 1
	WHERE a.nomor = ".$_GET["no"]."
	AND a.nomormhusaha LIKE '".$_SESSION["usaha"]["nomor"]."'"
	));
	$_SESSION["cabang"]["nomor"] = $cabang["nomor"];
	$_SESSION["cabang"]["kode"] = $cabang["kode"];
	$_SESSION["cabang"]["nama"] = $cabang["nama"];
	$_SESSION["cabang"]["pusat"] = $cabang["pusat"];
	$_SESSION["usaha"]["pkp"] = $cabang["pkp"];
/*	if($cabang["pusat"] == 1)
		$_SESSION["cabang"]["restriction"] = "pusat";
	else
		$_SESSION["cabang"]["restriction"] = "cabang";
*/	die("<meta http-equiv='refresh' content='0;URL=dashboard.php'>");
}
?>
<div class="row">
<?php
$mhcabang = mysqli_query($con, "
SELECT a.*
FROM mhcabang a
WHERE a.status_aktif = 1
AND a.nomormhusaha LIKE '".$_SESSION["usaha"]["nomor"]."'
ORDER BY a.nomor");
while($cabang = mysqli_fetch_array($mhcabang))
{
	$pusat = "";
	
	if($cabang["pusat"] == 1)
		$pusat = "Pusat";
	else
		$pusat = "-";
	

/*	$count_sdusercabang = mysqli_num_rows(mysqli_query($con, "
	SELECT a.*
	FROM shaksesmaster a
	WHERE a.status_aktif = 1
	AND a.nomormhadmin = ".$_SESSION["login"]["nomor"]."
	AND a.relasi_nomor = ".$cabang["nomor"]."
	AND a.relasi_tipe = 'master_cabang'"));
*/	if(in_array($cabang["nomor"],$_SESSION["akses_array"]["master_cabang"]) /*&& $count_sdusercabang > 0*/
	&& $cabang["nomor"] != $_SESSION["cabang"]["nomor"])
	{
		$status_aktif = "<div class='col-sm-9'>&nbsp;</div>";
		$tombol_aktif = "<div class='col-sm-3'><a class='btn btn-info' href='?f=custom&m=cabang_aktif&a=set&no=".$cabang["nomor"]."'><i style='font-size:14px' class='fa fa-arrow-right' title='Go'></i></a></div>";
	}
	elseif(!in_array($cabang["nomor"],$_SESSION["akses_array"]["master_cabang"])/*$count_sdusercabang <= 0*/)
	{
		$status_aktif = "<div class='col-sm-9'>&nbsp;</div>";
		$tombol_aktif = "<div class='col-sm-3'><a class='btn btn-danger'><i style='font-size:16px' class='fa fa-ban'></i></a></div>";
	}
	elseif($cabang["nomor"] == $_SESSION["cabang"]["nomor"])
	{
		$status_aktif = "<div class='col-sm-3'><a class='btn btn-success'><i style='font-size:16px' class='fa fa-home'></i></a></div>";
		$tombol_aktif = "<div class='col-sm-9'>&nbsp;</div>";
		$cabang["nama"] = "<h3>".$cabang["nama"]."</h3>";
	}
?>
	<div class="col-xs-12 col-sm-3">
		<div class="box box-pricing">
			<div class="box-header">
				<div class="box-name">
					<span><?=$cabang["nama"]?></span>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding">
				<div class="row-fluid centered">
					<div class="col-sm-12">Kode <?=$cabang["kode"]?></div>
					<div class="col-sm-12"><?=$pusat?></div>
					<div class="col-sm-12"><?=$cabang["keterangan"]?></div>
					<div class="clearfix"></div>
				</div>
				<div class="row-fluid bg-default">
					<?=$status_aktif?>
					<?=$tombol_aktif?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>
</div>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
    $("#ajax-content").prepend(
    	'<div class="well cst-btn-navbutton">'
			+'<div class="row">'
				+'<div class="col-sm-12">'
					+'<div class="bs-example">'
						+'<div style="float:right;">'
							 +'<a class="btn btn-primary add" data-toggle="tooltip" title="" href="dashboard.php?m=master_aset&amp;f=header_grid&amp;&amp;sm=edit" data-original-title="Filter"><i class="fa fa-filter" title="Filter"></i> </a>' 
						+'</div>'
					+'</div>'
				+'</div>'
			+'</div>'
		+'</div>');
});
</script>