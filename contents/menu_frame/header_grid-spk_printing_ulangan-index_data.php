<?php
$index_table["data"][$i]["no"]                  = $no + $index_page["position"] + 1;
$index_table["data"][$i]["directory"] = "<a href='#' data-toggle='modal' data-target='.preview' data-id='" . $data["directory"] . "'><div style=' width: 80px;height: 80px;position: relative;overflow: hidden;'><img src='uploads/Photo/ITEM"."/" . $data["directory"] . "' id='profilepic' style='cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;'></div></a>";
$index_table["data"][$i]["nama"]         = $data["nama"];
$features = "save|back|reload|add|edit|delete";
$index_table["data"][$i]["status_aktif"]          = $_SESSION["setting"]["status_aktif_" . $data["status_aktif"]];
$index_table["data"][$i]["action"] = generate_navbutton($index_table["data"][$i]["action"], $features, "index", $data["nomor"]);
$index_table["data"][$i]["action"] .= '<a class="btn btn-success btn-app-sm" data-toggle="tooltip" title="" onclick="duplicateItem(' . $data["nomor"] . ')" data-original-title="Duplicate"><i class="fa fa-copy" title="Duplicate"></i></a>&nbsp;';
