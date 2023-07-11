<?php
$index["debug"] = 0;
// $index["ajax"] = ;

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "test";
$index_table["column"][$i]["sort"] 		= "a.test";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Gambar";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("test");
$i++;

$index_table["column"][$i]["name"] 		= "nama";
$index_table["column"][$i]["sort"] 		= "a.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;


$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;




$test = '
<a data-toggle="modal" href="#myModal';

$modal1 = '"> <img src="https://dev72.inspiraworld.com/mmp_dev/uploads/';

  
$test2 = '" alt="Image" id="profilepic" style="cursor:pointer;display:inline;margin: 0 auto; height:auto; width:20%;"> </a>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="myModal';

$modal2 = '"><div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-body">
	<img src="https://dev72.inspiraworld.com/mmp_dev/uploads/';

$test3 = '" alt="Image" class="img-responsive" id="profilepic" style="cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;"></div></div></div></div>
';

$index["query_select"] = " 	SELECT
							a.*,
							CONCAT('$test', m.nomor, '$modal1', m.directory, '$test2', m.nomor, '$modal2', m.directory, '$test3') AS test
							from thspkslitting a
							left join mharchievedfiles m on m.file_nomor = a.nomor and m.file_tabel = 'thspkslitting' and m.kategori = 'SPK_SLITTING'
										";

$index["query_where"] .= "	AND a.nomor <> 0";
$index["default_order"] = "	a.nomor DESC";



