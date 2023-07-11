<?php
    /*
    if(isset($_FILES["file_upload"]["name"]) && !empty($_FILES["file_upload"]["name"]) && $_FILES["file_upload"]["size"] > 0)
    {
        unlink($_SESSION["setting"]["dir_upload"]."/".$r["directory"]);
        $random = rand(1,9999);
        $file = "quotation/".$random."-".$_FILES["file_upload"]["name"];
        $location = getcwd()."/"."uploads/quotation/".$random."-".$_FILES["file_upload"]["name"];
        move_uploaded_file($_FILES["file_upload"]["tmp_name"],$_SESSION["setting"]["dir_upload"]."/".$file);
        $_POST["nama"]      = $random."-".$_FILES["file_upload"]["name"];
        $_POST["directory"] = $file;
        // exit;
    }
    */
    $url            = $_POST["url"];
    $menu           = $_POST["menu"];
    $file_count     = $_POST["file_count"];
    // transactions($con, "start");
    for ($i = 0; $i < $file_count; $i++)
    {
        $up_file        = $_FILES["file_upload_".$i];
        $up_dir         = $_SESSION["setting"]["dir_upload"];
        $up_folder      = $_POST["kategori"];
        $up_field       = "directory";
        $unlink_old     = 1;
        $random_name    = 9999;

        $multi          = is_array( $_FILES["file_upload_".$i]['name'] );
        $multi_count    = $multi ? count($_FILES["file_upload_".$i]['name']) : 1;
        for($j = 0; $j < $multi_count; $j++)
        {
            if($multi)
            {
                $up_file["name"]        = $_FILES["file_upload_".$i]["name"][$j];
                $up_file["tmp_name"]    = $_FILES["file_upload_".$i]["tmp_name"][$j];
                $up_file["size"]        = $_FILES["file_upload_".$i]["size"][$j];
            }
            if(isset($up_file["name"]) && !empty($up_file["name"]) && $up_file["size"] > 0)
            {
                if($unlink_old == 1)
                    unlink($up_dir."/".$r[$up_field]);
                
                $dest_folder = $up_dir;
                if(!empty($up_folder))
                    $dest_folder .= "/".$up_folder;
                
                $dest_name = $up_file["name"];
                if(!empty($random_name))
                    $dest_name = rand(1, $random_name) . "-" .str_replace("'", "", str_replace(" ", "_", $up_file["name"]));
                
                $uploaded = upload_file($up_file["tmp_name"], $dest_folder, $dest_name);
                if($uploaded == "succeed") {
                    $_POST[$up_field] = $up_folder . "/" . $dest_name;

                    $insert = mysqli_query($con, "
                    INSERT INTO mharchievedfiles ( kode, file_nomor, file_kode, file_tabel, kategori, nama, directory, keterangan ) 
                    VALUES ((SELECT CONCAT('AR',(SELECT kode FROM mhcabang WHERE nomor = ".$_SESSION["cabang"]["nomor"]."),DATE_FORMAT(NOW(),'%y%m'),LPAD((SUBSTRING(IFNULL(MAX(kode),1),10)+1),4,'0')) AS kode 
                   FROM mharchievedfiles a),". $_POST["file_nomor"] .",'". $_POST["file_kode"] ."','". $_POST["file_tabel"] ."','". $_POST["kategori"] ."','". $dest_name ."','". $_POST["directory"] ."','". $_POST["keterangan"] ."')
                    ");
                    if(!$insert)
                    {
                        // transactions($con, "rollback");
                        set_alert(get_message(703, "Setting Application Data"), "danger", "", $url);
                    }
                }
                else
                {
                    $additional_message = "";
                    if($uploaded == "not_writeable")
                     $additional_message = ", destination folder (".$dest_folder.") is not writeable.";
                    set_alert(get_message(703, "Upload file"), "danger");
                }
            }
        }
    }
    set_alert(get_message(702, "Upload File"), "success", "", $url, $menu);
    // transactions($con, "commit");
?>