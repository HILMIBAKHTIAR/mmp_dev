<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?php echo $_SESSION["cabang"]["nama"]?><?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["title"]))echo " - Print ".$_SESSION["menu_".$_SESSION["g.menu"]]["title"];?></title>
	<link href="../contents/image/favicon.ico" rel="shortcut icon" />
	<link href="../../aquila/assets_dashboard/css/style_invoice.css" media="all" rel="stylesheet" type="text/css" />
	<style>
		@media all { 
			/*.page-break	{ display: none; }*/
			.absolute { position: absolute; }
			.page-break { page-break-after: always;position: relative; }
			.header { margin-bottom: 15px; }
		}
	    .wrapper { page: wrapper; }
		.tg { border-collapse:collapse;border-spacing:0;line-height: normal; }
		.tg td { font-family:Arial;border-style:solid;border-width:1px;font-size:10px !important;line-height:1.4 !important;border-color:black; }
		.tg .tg-0lax { text-align:center;vertical-align:top;font-weight: bold; }
		.tg2 { border-collapse:collapse;border-spacing:0;line-height: normal; }
		.tg2 td { font-family:Arial;border-style:solid;border-width:1px;font-size: 12px !important;border-color:black;padding:4px !important; }
		.tg2 .tg2-0lax{ text-align:center;vertical-align:top;font-weight: bold; }
		.tg3 { border-collapse:collapse;border-spacing:0;line-height: normal;width: 100%; }
		.tg3 td { padding: 4px;font-size: 11px;vertical-align: top;line-height: 1.5 }
		.tg3 td span {top: 0px!important;}
		th { text-align: center !important;height: 30px;padding: 4px;width: auto !important;font-weight: bold;color:black;text-transform: uppercase;font-size: 12px; }
		.footer td { width: auto !important; }
		.tg3 tr th[class *= "col_header"] { border-bottom: 1px solid black; }
		.tg3 tr[role *= "row"] th{ border-top: 1px solid black; }
		.tg3 tr[role *= "row"] ~ tr[role *= "row"] th{ border-top : 0px; }
		.tg3 tr.even th.group { border-bottom: 1px solid black; }
		.tg3 tr.odd th.group { background: #F5F5F6;color: black; }
		.tg3 tr:last-child th{ border-bottom: 1px solid black; }
		.tg3 tr.company td { font-size: 9px !important; }
		.title { font-size: 20px !important;text-align: center;padding: 3px !important; }
		.period{ font-size: 14px !important;text-align: center;padding: 0px !important; }
		.hide{ display: none; }
		.left{ text-align: left; }
		.right{ text-align: right; }
		.outline{ outline: 1px solid black; }
		.primary, .dark, .dongker, .info{ outline: 1px solid #2f4050;background: #2f4050;color:white; }
		.line { border-bottom: 1px solid black; }
		.overline{ border-top: 1px solid black; }
		@media all {
			div.divHeader { position: fixed;top: 0.2in;right: 0.2in; }
			div.divFooter { position: fixed;bottom: 0in;right: 0in; }
			.page-break { display: none; }
		}
		@media screen {
			body { margin: 5mm; padding:0;}
		}
		@media print {
			@page { size: auto;margin: 5mm 10mm 5mm 10mm; } 
			body { margin: 0; padding:0;}
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
			<?php $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_mode"] !='' ? $company_mode = $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_mode"] : $company_mode = $_SESSION["setting"]["company_mode"];?>
			<?php if($company_mode == 1){?>
			<tr class= "company">
				<td colspan="<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["total_column"]?>" width="100%">
					<table class="tg" width="100%">
						<tr>
							<?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_logo"])){?>
								<?php $logo = $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_logo"]?>
							<?php }else{?>
								<?php $logo = $_SESSION["setting"]["company_logo"]?>
							<?php }?>
							<td width="36px" style="border-style: none;"><img src="../contents/image/<?php echo $logo?>" height="36px"></td>
							<td style="border-style: none;">
								<?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_name"])){?>
									<?php echo strtoupper($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_name"])?><br>
								<?php }else{?>
									<?php echo strtoupper($_SESSION["setting"]["company_name"])?><br>
								<?php }?>

								<?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_address"])){?>
									<?php echo strtoupper($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_address"])?><br>
								<?php }else{?>
									<?php echo strtoupper($_SESSION['setting']['company_address'])?> <br>
								<?php }?>

								<?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_contact"])){?>
									<?php echo strtoupper($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["company_contact"])?><br>
								<?php }else{?>
									<?php echo strtoupper($_SESSION['setting']['company_contact'])?>
								<?php }?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php }?>
			<tr>
				<td colspan="<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["total_column"]?>" class="title"><b>
					<?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["title"])){?>
						<?php echo strtoupper($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["title"])?><br>
					<?php }else{?>
						<?php echo strtoupper($_SESSION["menu_".$_GET["m"]]["title"])?></b>
					<?php }?>
					
				</td>
			</tr>
			<tr>
				<td colspan="<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["total_column"]?>" class="period">[ Periode : <?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["periode"] ?> ]
				</td>
			</tr>
			<tr><td style='padding: 0 !important;'>&nbsp;</td></tr>
			<?php if(!empty($_SESSION["menu_".$_SESSION["g.menu"]]["print"]["header"])){?>
				<tr style="border-bottom: 2px solid black;border-top: 2px solid black">
					<td colspan="<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["total_column"]?>" width="100%">
						<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["header"] ?>
					</td>
				</tr>
				<tr><td style='padding: 5px !important'>&nbsp;</td></tr>
			<?php }?>
			<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["table_header"] ?>
		</thead>
		<tbody>
			<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["table_body"] ?>
			<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["table_footer"] ?>
		</tbody>	
		<tfoot>
			<tr>
				<td colspan="<?php echo $_SESSION["menu_".$_SESSION["g.menu"]]["print"]["total_column"]?>" style="border-style: none;text-align: right;font-size: 8pt;">Printed : <?php echo date("d-m-Y H:i:s");?> &nbsp; <?php echo strtoupper($_SESSION["login"]["nama"])?> &nbsp;</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>