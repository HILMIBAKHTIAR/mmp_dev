<?php
$custom = $_GET["c"];
switch($custom)
{
	case "aksesmenu":
		if(!isset($_GET["no"]))
			die("<meta http-equiv='refresh' content='0;URL=".$_SESSION["g.url"]."'>");
		
		$nomor = $_GET["no"];
		$i = 0;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "3";
		$table["column"][$i]["caption"] = "No";
		$table["column"][$i]["priv"] = "";
		$i++;
		$table["column"][$i]["align"] = "left";
		$table["column"][$i]["width"] = "17";
		$table["column"][$i]["caption"] = "Menu";
		$table["column"][$i]["priv"] = "";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "All";
		$table["column"][$i]["priv"] = "";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Open";
		$table["column"][$i]["priv"] = "priv_open";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Add";
		$table["column"][$i]["priv"] = "priv_add";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Edit";
		$table["column"][$i]["priv"] = "priv_edit";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Delete";
		$table["column"][$i]["priv"] = "priv_delete";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Print";
		$table["column"][$i]["priv"] = "priv_print";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Approve";
		$table["column"][$i]["priv"] = "priv_approve";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Disapprove";
		$table["column"][$i]["priv"] = "priv_disapprove";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Reject";
		$table["column"][$i]["priv"] = "priv_reject";
		$i++;
		$table["column"][$i]["align"] = "center";
		$table["column"][$i]["width"] = "10";
		$table["column"][$i]["caption"] = "Finish";
		$table["column"][$i]["priv"] = "priv_close";
		$i++;
		
		if(isset($_GET["a"]) && $_GET["a"] == "save")
		{
			$url = "?m=".$_SESSION["g.menu"]."&f=header_grid&sm=custom&c=aksesmenu&no=".$nomor;
			transactions("start");
			$delete = mysqli_query($con, "DELETE FROM shaksesmenu WHERE nomormhadmingrup = ".$nomor);
			if(!$delete)
			{
				transactions("rollback");
				set_alert(get_message(703,ucfirst("edit")),"error","",$url);
			}
			$shmenu = mysqli_query($con, "
			SELECT a.*
			FROM shmenu a
			WHERE a.status_aktif > 0
			AND a.prioritas IS NOT NULL
			ORDER BY a.prioritas");
			while($menu = mysqli_fetch_array($shmenu))
			{
				$insert_fields = "";
				$insert_values = "";
				$i = 0;
				foreach($table["column"] as $column)
				{
					if(!empty($column["priv"]))
					{
						if($_POST[$column["priv"]."_".$menu["nomor"]])
							$value = 1;
						else
							$value = 0;
						if($i != 0)
						{
							$insert_fields .= ",";
							$insert_values .= ",";
						}
						$insert_fields .= $column["priv"];
						$insert_values .= $value;
						$i++;
					}
				}
				$insert = mysqli_query($con, "INSERT INTO shaksesmenu (nomormhadmingrup,nomorshmenu,".$insert_fields.",dibuat_oleh,dibuat_pada)
				VALUES(".$nomor.",".$menu["nomor"].",".$insert_values.",".$_SESSION["login"]["nomor"].",now())");
				if(!$insert)
				{
					transactions("rollback");
					set_alert(get_message(703,ucfirst("edit")),"error","",$url);
				}
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
				'aksesmenu',
				'shaksesmenu',
				'".$_GET["no"]."'
			)");
			transactions("commit");
			set_alert(get_message(702,ucfirst("update")),"valid","",$url);
		}
		$admin = mysqli_fetch_array(mysqli_query($con, "
		SELECT a.*
		FROM mhadmingrup a
		WHERE a.nomor = ".$nomor));
		if(!empty($admin))
		{
		?>
		<form action="?m=<?=$_SESSION["g.menu"]?>&f=header_grid&sm=custom&c=aksesmenu&a=save&no=<?=$nomor?>" enctype="multipart/form-data" method="post">
			<?php
			$navbutton_override = 1;
			$edit_navbutton["mode"] = "edit";
			$edit_navbutton = generate_navbutton($edit_navbutton);
			$navbutton = $edit_navbutton;
			include $config["webspira"]."codes/navbutton.php";
			echo $navbutton_html;
			?>
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<div class="box-name">
								<i class="fa fa-users"></i>
								<span><a href="?m=<?=$_SESSION["g.menu"]?>&f=header_grid&sm=edit&a=view&no=<?=$nomor?>" target="_blank"><?=$admin["nama"]?></a></span>
							</div>
						<!--<div class="box-icons">
								<button class="beauty-table-to-json" type="submit">  Save  </button>
							</div>-->
							<div class="no-move"></div>
						</div>
						<div class="box-content no-padding">
							<table class="table table-bordered table-striped table-hover table-heading table-datatable">
								<thead>
									<tr>
									<?php
									$i = 0;
									$column_length = count($table["column"]);
									foreach($table["column"] as $column)
									{
										if($i == 0)
											$class = "topleft";
										elseif($i == $column_length-1)
											$class = "topright";
										else
											$class = "";
										echo "<th>".$column["caption"];
										if(!empty($column["priv"]))
											echo "<br />
												  <a href='#' onclick='$(\".".$column["priv"]."\").prop(\"checked\",true);'><i class='fa fa-check-circle'></i></a>
												  <a href='#' onclick='$(\".".$column["priv"]."\").prop(\"checked\",false);'><i class='fa fa-circle'></i></a>";
										echo "</th>";
										$i++;
									}
									?>
									</tr>
								</thead>
								<tbody>
								<?php
								$shaksesmenu = mysqli_query($con, "
								SELECT a.*
								FROM shaksesmenu a
								WHERE a.status_aktif = 1
								AND a.nomormhadmingrup = ".$nomor);
								while($aksesmenu = mysqli_fetch_array($shaksesmenu))
								{
									foreach($table["column"] as $column)
									{
										if(!empty($column["priv"]))
											if($aksesmenu[$column["priv"]] == 1)
												$privileges[$aksesmenu["nomorshmenu"]][$column["priv"]] = "checked";
									}
								}
								$no = 1;
								$shmenu = mysqli_query($con, "
								SELECT a.*
								FROM shmenu a
								WHERE a.status_aktif > 0
								AND a.prioritas IS NOT NULL
								ORDER BY a.prioritas");
								while($menu = mysqli_fetch_array($shmenu))
									{
										$arr_count = explode("|",$menu["daftar_header"]);
										$char_indent = "";
										for ($z=0; $z<count($arr_count);$z++){
											$char_indent .= "&nbsp;";
										}
										if($menu["daftar_header"] == null){
											$char_indent = "";
										}
										if($menu["tipe"] == "dropdown" || $menu["daftar_header"] == null){
											$menu["judul"] = $char_indent." <b>".$menu["judul"]."</b>";
										}else{
											$menu["judul"] = $char_indent." - ".$menu["judul"];
										}
								?>
									<tr>
										<td align="center"><?=$no?></td>
										<td align="left"><?=$menu["judul"]?></td>
										<td align="center">
											<a onclick="$('.row_<?=$no?>').prop('checked',true);"><i class="fa fa-check-circle"></i></a>
											<a onclick="$('.row_<?=$no?>').prop('checked',false);"><i class="fa fa-circle"></i></a>
										</td>
										<?php
										foreach($table["column"] as $column)
										{
											if(!empty($column["priv"]))
												echo "
												<td align='".$column["align"]."'>
													<input class='".$column["priv"]." row_".$no."' name='".$column["priv"]."_".$menu["nomor"]."' type='checkbox' ".$privileges[$menu["nomor"]][$column["priv"]]." />
												</td>";
										}
										?>
									</tr>
								<?php
									$no++;
								}
								?>
								</tbody>
								<tfoot> </tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
		<?php
		}
	break;
}
?>