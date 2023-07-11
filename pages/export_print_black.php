<?php
session_start();
include "../config/config.php";
include "../".$config["webspira"]."dashboard_prep.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?=$_SESSION["cabang"]["nama"]?><?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["title"]))echo " - Print ".$_SESSION["menu_".$_SESSION["g.menu"]]["title"];?></title>
	<link href="../contents/image/favicon.ico" rel="shortcut icon" />
	<link href="../../pelangi/assets_dashboard/css/style_invoice.css" media="all" rel="stylesheet" type="text/css" />
	<style>

		@media all {
			/*.page-break	{ display: none; }*/
			.absolute {
			  position: absolute;
			}
			.page-break {
			  page-break-after: always;
			  position: relative;
			}
			.header { margin-bottom: 15px; }
		}
	     .wrapper {
	         page: wrapper;
	     }
	
		html{padding:0px 0px!important;}
		.tg  {border-collapse:collapse;border-spacing:0;line-height: normal;}
		.tg td{font-family:Arial;border-style:solid;border-width:1px;font-size:10px !important;line-height:1.4 !important;border-color:black;}
		.tg .tg-0lax{text-align:center;vertical-align:top;font-weight: bold;}

		.tg2  {border-collapse:collapse;border-spacing:0;line-height: normal;}
		.tg2 td{font-family:Arial;border-style:solid;border-width:1px;font-size: 10pt !important;border-color:black;padding:4px !important;}
		.tg2 .tg2-0lax{text-align:center;vertical-align:top;font-weight: bold;}

		.tg3  {border-collapse:collapse;border-spacing:0;line-height: normal;}
		.tg3 td{
			padding:5px;
			font-size: 12px;
			vertical-align: top;
		}
		th{
			text-align: center;
			height: 30px;
			padding: 5px;
			/*min-width: 80px;*/
			font-weight: bold;
			border-bottom: 1px solid black;
			background: #2c3e50;
			color:white;
			text-transform: uppercase;
			font-size: 12px;
		}
		.title{
			font-size: 24px !important;
			text-align: center;
		}
		.period{
			font-size: 18px !important;
			text-align: center;
		}
/*		.tg3{
			outline: 2px solid black;
		}*/
		.info{
			outline: 1px solid black;
		}
		.primary{
			outline: 1px solid #2c3e50;
			background: #2c3e50;;
			color:white;
		}
		.line{
			border-bottom: 1px solid black;
		}
		.overline{
			border-top: 1px solid black;
		}
		@media all {
			@page { 
				width: 7.6in;
				height: 11in;
		    }
		    body,html {
				/*Ukuran Kertas A4*/
				margin: 0px;
				margin-left: 1px;
		        height: 11in;
		        width: 7.6in;

	    	}
			div.divHeader {
			    position: fixed;
			    top: 0.2in;
			    right: 0.2in;
			}
			div.divFooter {
			    position: fixed;
			    bottom: 0in;
			    right: 0in;
			}
		}
		@media all {
			.page-break { display: none; }
		}
			
		@media print {
			.page-break { display: block; page-break-before: always; }

		}
	</style>
</head>
<body>
<!-- <div class="divFooter">
<table class="tg"  width="100%" style="margin-top: 10px">
		<tr>
			<td style="border-style: none;"></td>
			<td colspan="5" style="border-style: none;">
				<table class="tg" width="100%">
					<tr>
						<td style="border-style: none;text-align: center;vertical-align:top;height: 20mm">Supplier</td>
						<td style="border-style: none;text-align: center;vertical-align:top;">Adm. Pembelian</td>
						<td style="border-style: none;text-align: center;vertical-align:top;">Kabag. Pembelian</td>
					</tr>
					<tr>
						<td style="border-style: none;text-align: center;">__________________________</td>
						<td style="border-style: none;text-align: center;">____________________________</td>
						<td style="border-style: none;text-align: center;">____________________________</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<br>
-->
<table class="tg3">
	<thead>
		<tr>
			<td colspan="<?=$_SESSION["print"]["totalColumn"]?>" width="100%">
				<table class="tg" width="100%">
					<tr>
						<td  width="5%" style="border-style: none;"><img src="../contents/image/<?=$_SESSION['setting']['company_logo']?>?>" height="45px"></td>
						<td style="border-style: none;"><?=$_SESSION["setting"]["company_name"]?><br>
							<?=$_SESSION['setting']['company_address']?> <br>
							<?=$_SESSION['setting']['company_contact']?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="<?=$_SESSION["print"]["totalColumn"]?>" class="title"><b><?=strtoupper($_SESSION["menu_".$_GET["m"]]["title"])?></b>
			</td>
		</tr>
		<tr>
			<td colspan="<?=$_SESSION["print"]["totalColumn"]?>" class="period">[ Periode : <?php echo $_SESSION["print"]["periode"] ?> ]
			</td>
		</tr>
		<tr><td style='padding: none !important;'>&nbsp;</td></tr>
		<?php if(!empty($_SESSION["print"]["header"])){?>
			<tr style="border-bottom: 2px solid black;border-top: 2px solid black">
				<td colspan="<?=$_SESSION["print"]["totalColumn"]?>" width="100%">
					<?php echo $_SESSION["print"]["header"] ?>
				</td>
			</tr>
			<tr><td style='padding: none !important'>&nbsp;</td></tr>
		<?php }?>
		<?php echo $_SESSION["print"]["tableHeader"] ?>
	</thead>
	
	<tbody>
		<?php echo $_SESSION["print"]["tableBody"] ?>
		<?php echo $_SESSION["print"]["tableFooter"] ?>
	</tbody>	

	<tfoot>
			<tr>
				<td colspan="<?=$_SESSION["print"]["totalColumn"]?>" style="border-style: none;text-align: right;font-size: 8pt;">Printed : <?=date("d-m-Y H:i:s");?> &nbsp; <?=strtoupper($_SESSION["login"]["nama"])?> &nbsp;</td>
			</tr>
	</tfoot>
</table>
</body>
</html>