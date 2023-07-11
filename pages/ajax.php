<?php 
	session_start();
	include "../config/config.php";
	include "../config/database.php";
	include "../".$config["webspira"]."config/connection.php";

	$conn_header = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
	if ($conn_header->connect_error) { die("Connection failed: " . $conn_header->connect_error); }

	if($_POST["tipe"] == "setPrintData"){
		$_SESSION["print"]["company_mode"]=$_POST["company_mode"];
		$_SESSION["print"]["company_logo"]=$_POST["company_logo"];
		$_SESSION["print"]["company_name"]=$_POST["company_name"];
		$_SESSION["print"]["company_address"]=$_POST["company_address"];
		$_SESSION["print"]["company_contact"]=$_POST["company_contact"];
		$_SESSION["print"]["title"]=$_POST["title"];
		$_SESSION["print"]["periode"]=$_POST["periode"];
		$_SESSION["print"]["header"]=$_POST["header"];
		$_SESSION["print"]["table_header"]=$_POST["table_header"];
		$_SESSION["print"]["table_body"]=$_POST["table_body"];
		$_SESSION["print"]["table_footer"]=$_POST["table_footer"];
		$_SESSION["print"]["total_column"]=$_POST["total_column"];
	}

	if($_POST["tipe"] == "user_filter_column"){

		$menu = $_POST["menu"];

		$data = array();

		$sql = "SELECT DISTINCT a.nomormhadmin, b.nama AS nama_admin 
		FROM shfiltercolumnmenu a 
		JOIN mhadmin b ON a.nomormhadmin = b.nomor 
		WHERE a.kodeshmenu= '".$menu."'";

		$result = $conn_header->query($sql);
		$i = 0;
		while ($row = $result->fetch_array()) {
			$data[$i++] = [
				"nomormhadmin"=>$row["nomormhadmin"], 
				"nama_admin"=>$row["nama_admin"]
			];
		}
		echo json_encode($data);
	}

	if($_POST["tipe"] == "menu_filter_column"){

		$menu = $_POST["menu"];
		$nomormhadmin = $_POST["nomormhadmin"];

		$data = array();

		$sql = "SELECT columns
		FROM shfiltercolumnmenu a 
		WHERE a.kodeshmenu= '".$menu."' 
		AND a.nomormhadmin = ".$nomormhadmin;

		$result = $conn_header->query($sql);
		$i = 0;
		while ($row = $result->fetch_array()) {
			$data[$i++] = [
				"columns"=>explode("|", $row["columns"])
			];
		}
		echo json_encode($data);
	}

 // =====================================AJAX SIA=======================================
	if($_POST["tipe"] == "call_sp"){
		$array = array();
		$sql = "CALL ".$_POST["sp"].";";
		$result = $conn_header->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
        		array_push($array, $row);
	        }
	    }
		echo json_encode($array);
	}

 // =====================================AJAX GA=======================================

	if($_POST["tipe"] == "getDetailPermintaanBarangAset"){
		$nomorthpermintaanbarangaset  = $_POST["nomorthpermintaanbarangaset"];
		$array = array();
		
		$sql = "SELECT a.*,
            b.kode as kode_thpermintaanbarangaset, 
            c.nama as barang,
            c.nomor as nomormhbarangaset,
            a.jumlah_konversi as jumlah_konversi,
            d.nama as nama_satuan_unit,
            e.nama as nama_nomormhsatuan,
            a.nomor as nomortdpermintaanbarangaset,
            b.nomor as nomorthpermintaanbarangaset,
            a.jumlah_pr - a.jumlah_selesai_pr as sisa,
          	0 as jumlah_unit,
          	0 as jumlah
        FROM tdpermintaanbarangaset a
        LEFT JOIN thpermintaanbarangaset b ON b.nomor=a.nomorthpermintaanbarangaset
        LEFT JOIN mhbarangaset c ON c.nomor=a.nomormhbarangaset AND c.status_aktif=1
        LEFT JOIN mhsatuan d ON d.nomor=a.satuan_unit AND d.status_aktif=1
        LEFT JOIN mhsatuan e ON e.nomor=a.nomormhsatuan AND e.status_aktif=1
        WHERE 
            a.status_aktif = 1 
            AND b.status_aktif=1
            AND a.jumlah_unit_pr>0 
            AND a.jumlah_pr-a.jumlah_selesai_pr>0
        AND a.nomorthpermintaanbarangaset IN (".$nomorthpermintaanbarangaset.")";

		$result = $conn_header->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
        		array_push($array, $row);
	        }
	    }
		echo json_encode($array);
	}
	
	if($_POST["tipe"] == "InsertNewPerpanjanganSurat"){
		$tanggal = $_POST["tanggal"];
		$kode =$_POST["kode"];
		$surat   = $_POST["surat"];
		$nomor_surat=$_POST["nomor_surat"];
		$nomorkendaraan=$_POST["nomorkendaraan"];
		$nomormhcabang=$_POST["nomormhcabang"];
		$nomormhvendor=$_POST["nomormhvendor"];
		$pengingat1=$_POST["pengingat1"];
		$pengingat2=$_POST["pengingat2"];
		$keterangan=$_POST["keterangan"];
		$nomorthperpindahanbarang=$_POST["nomorthperpindahanbarang"];

		$dibuat_oleh=$_POST["dibuat_oleh"];
		$dibuat_pada=$_POST["dibuat_pada"];
	
		$newKode='';
		
		$sql="CALL sp_generate_code('kode_transaksi_perpanjangan_surat','".$tanggal."','".$_SESSION["cabang"]["kode"]."','')";
		$result = $conn_header->query($sql);
		$newKode= $result->fetch_assoc();
		$kode =$newKode["kode"];

		$conn_header = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);

			$sql2 = "INSERT INTO thperpanjangansurat (tanggal,nomormhcabang, nomormhvendor, kode, nomormhperpanjangansurat,nomor_surat,nomorkendaraan,pengingat1,pengingat2,keterangan,nomorthperpindahanbarang, dibuat_oleh,dibuat_pada ) VALUES ('".$tanggal."','".$nomormhcabang."','".$nomormhvendor."', '".$kode."', '".$surat."', '".$nomor_surat."','".$nomorkendaraan."','".$pengingat1."','".$pengingat2."','".$keterangan."' ,'".$nomorthperpindahanbarang."' ,'".$dibuat_oleh."','".$dibuat_pada."')";
			$result2 = $conn_header->query($sql2);
			
			echo $sql2;
	}
	
	if($_POST["tipe"] == "InsertNewPerpanjanganAsetKhusus"){
		$tanggal = $_POST["tanggal"];
		$kode =$_POST["kode"];
		$surat   = $_POST["surat"];
		$nomor_surat=$_POST["nomor_surat"];
		$nomormhcabang=$_POST["nomormhcabang"];
		$nomormhvendor=$_POST["nomormhvendor"];
		$pengingat1=$_POST["pengingat1"];
		$pengingat2=$_POST["pengingat2"];
		$keterangan=$_POST["keterangan"];
		$nomormhasetkhusus=$_POST["nomormhasetkhusus"];

		$dibuat_oleh=$_POST["dibuat_oleh"];
		$dibuat_pada=$_POST["dibuat_pada"];
	
		$newKode='';
		
		$sql="CALL sp_generate_code('kode_transaksi_perpanjangan_aset_khusus','".$tanggal."','".$_SESSION["cabang"]["kode"]."','')";
		$result = $conn_header->query($sql);
		$newKode= $result->fetch_assoc();
		$kode =$newKode["kode"];

		$conn_header = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);

			$sql2 = "INSERT INTO thperpanjanganasetkhusus (tanggal,nomormhcabang, nomormhvendor, kode, nomormhperpanjangansurat,nomor_surat,pengingat1,pengingat2,keterangan,nomormhasetkhusus, dibuat_oleh,dibuat_pada) VALUES ('".$tanggal."','".$nomormhcabang."','".$nomormhvendor."', '".$kode."', '".$surat."', '".$nomor_surat."','".$pengingat1."','".$pengingat2."','".$keterangan."' ,'".$nomormhasetkhusus."' ,'".$dibuat_oleh."','".$dibuat_pada."')";
			$result2 = $conn_header->query($sql2);
			
			echo $sql2;
		
	}

	if($_POST["tipe"] == "f_meetingroom"){

		$p_tanggal = $_POST["p_tanggal"];
		$p_start   = $_POST["p_start"];
		$p_finish  = $_POST["p_finish"];
		$p_meetingroom= $_POST["nomormhmeetingroom"];

		$sql = "SELECT CONCAT('Ruangan Sudah Direserved : ',nama) AS data_result
				FROM `thmeetingroomreservation` a
				WHERE a.status_aktif = 1
					AND nomormhmeetingroom=$p_meetingroom
					AND a.tanggal = '$p_tanggal'
					AND (
					TIME_FORMAT('$p_start','%H:%i') BETWEEN TIME_FORMAT(a.start,'%H:%i') AND ADDTIME(TIME_FORMAT(a.finish,'%H:%i'),'-1')
					OR 
					TIME_FORMAT('$p_finish','%H:%i') BETWEEN ADDTIME(TIME_FORMAT(a.start,'%H:%i'),'00:01') AND TIME_FORMAT(a.finish,'%H:%i')

					);";
		$result = $conn_header->query($sql);
		$row = $result->fetch_assoc();
		echo $row["data_result"];
	}

	if($_POST["tipe"] == "checkAmbilOrder"){
		$nomor = $_POST["nomor"];

		$sql = "SELECT status_diterima_ob AS data_result
				FROM `thfoodreservation` a
				WHERE a.status_aktif = 1
				AND a.nomor=".$nomor;

		$result = $conn_header->query($sql);
		$row = $result->fetch_assoc();

		if($row["data_result"]==0){
			$conn_header2 = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
			if ($conn_header2->connect_error) { die("Connection failed: " . $conn_header2->connect_error); }

			$sql2 = "UPDATE thfoodreservation SET status_diterima_ob=1,diterima_oleh_ob=".$_SESSION["login"]["nomor"]. " 
					WHERE status_aktif = 1
					AND nomor=".$nomor;
			$result2 = $conn_header2->query($sql2);

			echo 0;
		}
		else{
			echo 1;
		}
	
	}
	if($_POST["tipe"] == "checkAmbilOrderRequest"){
		$nomor = $_POST["nomor"];

		$sql = "SELECT status_diterima_ob AS data_result
				FROM `threquestob` a
				WHERE a.status_aktif = 1
				AND a.nomor=".$nomor;

		$result = $conn_header->query($sql);
		$row = $result->fetch_assoc();


		if($row["data_result"]==0){
			$conn_header2 = new mysqli($mysql["server"], $mysql["username"], $mysql["password"], $mysql["database"]);
			if ($conn_header2->connect_error) { die("Connection failed: " . $conn_header2->connect_error); }

			$sql2 = "UPDATE threquestob SET status_diterima_ob=1,diterima_oleh_ob=".$_SESSION["login"]["nomor"]. " 
					WHERE status_aktif = 1
					AND nomor=".$nomor;
			$result2 = $conn_header2->query($sql2);

			echo 0;
		}
		else{
			echo 1;
		}
	}
	
	if($_POST["tipe"] == "sendEmailIncomingLetter"){
		$title 		  = $_POST["title"];
		$sender 	  = $_POST["sender"];
		$recipient 	  = $_POST["recipient"];
		$table 		  = $_POST["table"];
		$nomor 		  = $_POST["nomor"];
		$status 	  = $_POST["status"];
		$status_field = $_POST["status_field"];
		$field_email  = $_POST["field_email"];
		$tanggal_masuk=$_POST["tanggal_masuk"];
		$recipient_name=$_POST["recipient_name"];
		$keterangan=$_POST["keterangan"];
		$mode=$_POST["mode"];
		$message = file_get_contents('./mail_templates/incoming_letter_email.html'); 
	    $message = str_replace('%dari%', $sender, $message); 
	    $message = str_replace('%kepada%', $recipient_name, $message);
		$message = str_replace('%tanggal_masuk%', $tanggal_masuk, $message);
		$message = str_replace('%keterangan%', $keterangan, $message);

		if($mode=="add"){
			
			// $sql = "SELECT $field_email AS result FROM $table a WHERE nomor = '$nomor' ";

			// $result = $conn_header->query($sql);
			// $row = $result->fetch_assoc();
				$result_email_sent=0;
				include "./send_email.php"; 

				if($result_email_sent == 1){

					if($status == "post"){
						// $sql = "UPDATE $table SET $field_email = '1' WHERE nomor = '$nomor'";
						// $result = $conn_header->query($sql);
						echo "Notifikasi Telah Terkirim!";
					}

				}
				else{
					echo "Notifikasi Tidak Dapat Dikirim!";
				}
							
		}
		
	}

	if($_POST["tipe"] == "sendEmailOutgoingLetter"){
		$title 		  = $_POST["title"];
		$sender 	  = $_POST["sender"];
		$recipient 	  = $_POST["recipient"];
		$table 		  = $_POST["table"];
		$nomor 		  = $_POST["nomor"];
		$status 	  = $_POST["status"];
		$status_field = $_POST["status_field"];
		$field_email  = $_POST["field_email"];
		$tanggal_keluar=$_POST["tanggal_keluar"];
		$recipient_name=$_POST["recipient_name"];
		$nomorresi=$_POST["nomorresi"];
		$mode=$_POST["mode"];
		$message = file_get_contents('./mail_templates/outgoing_letter_email.html'); 
	    $message = str_replace('%dari%', $sender, $message); 
	    $message = str_replace('%kepada%', $recipient_name, $message);
		$message = str_replace('%tanggal_keluar%', $tanggal_keluar, $message);
		$message = str_replace('%nomorresi%', $nomorresi, $message);
		$message = str_replace('%nomor%', $nomor, $message);

		if($mode=="edit"){
			
			$sql = "SELECT $field_email AS result FROM $table a WHERE nomor = '$nomor' ";

			$result = $conn_header->query($sql);
			$row = $result->fetch_assoc();
			
			$result_email_sent=0;
			
			if($row["result"] != 1){
				
				include "./send_email.php"; 

				if($result_email_sent == 1){

					if($status == "post"){
						$sql = "UPDATE $table SET $field_email = '1' WHERE nomor = '$nomor'";
						$result = $conn_header->query($sql);

						echo "Notifikasi Surat Keluar Terkirim!";
					}

				}
			}

			else{
					
			}
			
		}
		
	}

	if($_POST["tipe"] == "sendEmailNotulenMeeting"){
		$title 		  = $_POST["title"];
		$sender 	  = $_POST["sender"];
		$recipient 	  = $_POST["recipient"];
		$table 		  = $_POST["table"];
		$nomor 		  = $_POST["nomor"];
		$status 	  = $_POST["status"];
		$status_field = $_POST["status_field"];
		$field_email  = $_POST["field_email"];
		$tanggal_masuk=$_POST["tanggal_masuk"];
		$recipient_name=$_POST["recipient_name"];
		$notulen_meeting=$_POST["notulen_meeting"];
		
		$keterangan=$_POST["keterangan"];
		$mode=$_POST["mode"];
		$message = file_get_contents('./mail_templates/notulen_meeting_email.html'); 
	    $message = str_replace('%dari%', $sender, $message); 
	    $message = str_replace('%kepada%', $recipient_name, $message);
	    $message = str_replace('%nomor%', $nomor, $message);
		// $message = str_replace('%tanggal_masuk%', $tanggal_masuk, $message);
		$message = str_replace('%notulen_meeting%', $notulen_meeting, $message);


		if($mode=="edit"){
			
			// $sql = "SELECT $field_email AS result FROM $table a WHERE nomor = '$nomor' ";

			// $result = $conn_header->query($sql);
			// $row = $result->fetch_assoc();
				$result_email_sent=0;
				include "./send_email.php"; 

				if($result_email_sent == 1){

					if($status == "post"){
						// $sql = "UPDATE $table SET $field_email = '1' WHERE nomor = '$nomor'";
						// $result = $conn_header->query($sql);
						echo "Notifikasi Telah Terkirim!";
					}

				}
				else{
					echo "Notifikasi Tidak Dapat Dikirim!";
				}
							
		}
		
	}

	if($_POST["tipe"] == "sendEmailAmbilRequest"){
		$title 		  = $_POST["title"];
		$sender 	  = $_POST["sender"];
		$recipient 	  = $_POST["recipient"];
		$table 		  = $_POST["table"];
		$nomor 		  = $_POST["nomor"];
		$status 	  = $_POST["status"];
		$status_field = $_POST["status_field"];
		$field_email  = $_POST["field_email"];
		$tanggal_masuk=$_POST["tanggal_masuk"];
		$recipient_name=$_POST["recipient_name"];
		$keterangan=$_POST["keterangan"];
		$mode=$_POST["mode"];

		$message = file_get_contents('./mail_templates/requestob_email.html'); 
	    $message = str_replace('%dari%', $sender, $message); 
	    $message = str_replace('%kepada%', $recipient_name, $message);
	    $message = str_replace('%keterangan%', $keterangan, $message);

	    
		if($mode=="add"){
			
			// $sql = "SELECT $field_email AS result FROM $table a WHERE nomor = '$nomor' ";

			// $result = $conn_header->query($sql);
			// $row = $result->fetch_assoc();
				$result_email_sent=0;
				include "./send_email.php"; 
				// $sql = "UPDATE $table SET $field_email = '1' WHERE nomor = '$nomor'";
				$result = $conn_header->query($sql);

				if($result_email_sent == 1){

					if($status == "post"){
						
						echo "Notifikasi Telah Terkirim!";
					}

				}
				else{
					echo "Notifikasi Tidak Dapat Dikirim!";
				}
							
		}
		
	}

	if($_POST["tipe"] == "sendEmailAmbilOrder"){
		$title 		  = $_POST["title"];
		$sender 	  = $_POST["sender"];
		$recipient 	  = $_POST["recipient"];
		$table 		  = $_POST["table"];
		$nomor 		  = $_POST["nomor"];
		$status 	  = $_POST["status"];
		$status_field = $_POST["status_field"];
		$field_email  = $_POST["field_email"];
		$tanggal_masuk=$_POST["tanggal_masuk"];
		$recipient_name=$_POST["recipient_name"];
		$keterangan=$_POST["keterangan"];
		$mode=$_POST["mode"];

		$message = file_get_contents('./mail_templates/food_penerimaan_email.html'); 
	    $message = str_replace('%dari%', $sender, $message); 
	    $message = str_replace('%kepada%', $recipient_name, $message);
	    $message = str_replace('%nomor%', $nomor, $message);
		// $message = str_replace('%tanggal_masuk%', $tanggal_masuk, $message);
		// $message = str_replace('%notulen_meeting%', $notulen_meeting, $message);


		if($mode=="edit"){
			
			// $sql = "SELECT $field_email AS result FROM $table a WHERE nomor = '$nomor' ";

			// $result = $conn_header->query($sql);
			// $row = $result->fetch_assoc();
				$result_email_sent=0;
				include "./send_email.php"; 
				$sql = "UPDATE $table SET $field_email = '1' WHERE nomor = '$nomor'";
				$result = $conn_header->query($sql);

				if($result_email_sent == 1){

					if($status == "post"){
						
						echo "Notifikasi Telah Terkirim!";
					}

				}
				else{
					echo "Notifikasi Tidak Dapat Dikirim!";
				}
							
		}
		
	}

	if($_POST["tipe"] == "sendEmailApproval"){
		$title 		  = $_POST["title"];
		$sender 	  = $_POST["sender"];
		$recipient 	  = $_POST["recipient"];
		$table 		  = $_POST["table"];
		$nomor 		  = $_POST["nomor"];
		$status 	  = $_POST["status"];
		$status_field = $_POST["status_field"];
		$field_email  = $_POST["field_email"];
		$recipient_name=$_POST["recipient_name"];
		
		$header=$_POST["header"];
		$link=$_POST["link"];
		$kode=$_POST["kode"];
		$tanggal=$_POST["tanggal"];
		$keterangan=$_POST["keterangan"];
		$mode=$_POST["mode"];

		$message = file_get_contents('./mail_templates/approval_email.html');

		$message = str_replace('%title%', $title, $message); 
		$message = str_replace('%header%', $header, $message); 
		$message = str_replace('%link%', $link, $message); 
		$message = str_replace('%kode%', $kode, $message);
	    $message = str_replace('%dari%', $sender, $message); 
	    $message = str_replace('%tanggal%', $tanggal, $message); 
	    $message = str_replace('%keterangan%', $keterangan, $message);
	    $message = str_replace('%link%', $link, $message);

	    $message = str_replace('%kepada%', $recipient_name, $message);

		if($mode=="view"){
			
			// $sql = "SELECT $field_email AS result FROM $table a WHERE nomor = '$nomor' ";

			// $result = $conn_header->query($sql);
			// $row = $result->fetch_assoc();
			// $result_email_sent=0;
				include "./send_email.php"; 
				$sql = "UPDATE $table SET $field_email = 1 WHERE nomor = '$nomor'";
				$result = $conn_header->query($sql);

				if($result_email_sent == 1){

					if($status == "post"){
						
						echo "Notifikasi Telah Terkirim!";
					}

				}
				else{
					echo "Notifikasi Tidak Dapat Dikirim!";
				}			
		}
		
	}
?>