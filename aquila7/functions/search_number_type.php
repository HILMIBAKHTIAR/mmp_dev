<?php function search_number_type($class = ""){if(!empty($class)){if(strstr($class,$_SESSION["setting"]["class_integer"]))return "integer";if(strstr($class,$_SESSION["setting"]["class_number"]))return "number";if(strstr($class,$_SESSION["setting"]["class_money"]))return "money";if(strstr($class,$_SESSION["setting"]["class_percent"]))return "percent";}return false;} ?>
<?php /*created_by:glennferio@inspiraworld.com;release_date:2020-05-09;*/ ?>