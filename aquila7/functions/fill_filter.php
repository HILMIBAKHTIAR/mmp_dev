<?php function fill_filter($filter,$data = []){$max=count($filter["field"]);for($i=0;$i<$max;$i++){if(!isset($filter["field"][$i]["input_value"])&&!isset($filter["field"][$i]["input_attr"]["value"])){$string_browse="";if($filter["field"][$i]["input_element"]=="browse")$string_browse="browse|";$filter["field"][$i]["input_value"]=$_SESSION["menu_".$_SESSION["g.menu"]]["filter_".$string_browse.$filter["field"][$i]["input"]];if(isset($number_type))unset($number_type);if(!empty($filter["field"][$i]["input_class"]))$number_type=search_number_type($filter["field"][$i]["input_class"]);if(!empty($filter["field"][$i]["input_attr"]["class"]))$number_type=search_number_type($filter["field"][$i]["input_attr"]["class"]);if(!empty($number_type))$filter["field"][$i]["input_value"]=number_formatting($filter["field"][$i]["input_value"],$number_type);}}return $filter;} ?>
<?php /*created_by:glennferio@inspiraworld.com;release_date:2020-05-09;*/ ?>