<?php
session_start();
include "../../config/config.php";
include "../../config/database.php";
include "../../" . $config["webspira"] . "config/connection.php";


$customers = file_get_contents("./list_customers.json");
$customersDecoded = json_decode($customers, true);

// echo '<pre>' . print_r($customersDecoded["response"]["data"], true) . '</pre>';

// looping customers
foreach ($customersDecoded["fieldData"] as $customer) {
  echo $customer. "<br>";
  // $query = "
  //   INSERT INTO mhcustomer (
  //     nama_perusahaan,
  //     alamat_kantor,
  //     telp_kantor,
  //     fax,
  //     alamat_pengiriman,
  //     telp_kantor_pengiriman,
  //     fax_kantor_pengiriman,
  //     kondisi_penagihan,
  //     top,
  //     alamat_penagihan,
  //     ,
  //     status_aktif,
  //     tanggal_input,
  //     user_input,
  //     tanggal_update,
  //     user_update
  //   ) VALUES (
  //     '" . $customer["nama"] . "',
  //     '" . $customer["alamat"] . "',
  //     '" . $customer["kota"] . "',
  //     '" . $customer["kodepos"] . "',
  //     '" . $customer["telepon"] . "',
  //     '" . $customer["fax"] . "',
  //     '" . $customer["email"] . "',
  //     '" . $customer["kontak"] . "',
  //     '" . $customer["npwp"] . "',
  //     1,
  //     NOW(),
  //     1,
  //     NOW(),
  //     1
  //   );
  // ";

  // $debug = "query = " . str_replace(array("\n", "\r", "\t"), " ", $query);
  // $mysqli_query = mysqli_query($