<?php
$edit["title"] = "Edit Profil";
$edit["manual_save"] = "contents/menu_custom/profil_aktif-save.php";

$i = 0;
$edit["field"][$i]["label"] = "Nama";
$edit["field"][$i]["input"] = "nama";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["label"] = "Username";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["label"] = "Password Lama";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "old_password";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["type"] = "password";
$edit["field"][$i]["input_attr"]["minlength"] = "4";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$i++;
$edit["field"][$i]["label"] = "Password Baru";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "new_password";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["type"] = "password";
$edit["field"][$i]["input_attr"]["minlength"] = "4";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$i++;
$edit["field"][$i]["label"] = "Konfirmasi Password";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "confirm_password";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["type"] = "password";
$edit["field"][$i]["input_attr"]["minlength"] = "4";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_validate"] = "equalTo:new_password";
$i++;

$r = mysqli_fetch_array(mysqli_query($con, "
SELECT a.nama, a.kode
FROM mhadmin a
WHERE a.nomor = ".$_GET["no"]));
$edit = fill_value($edit,$r);
$edit_navbutton = generate_navbutton($edit_navbutton,"save");
?>