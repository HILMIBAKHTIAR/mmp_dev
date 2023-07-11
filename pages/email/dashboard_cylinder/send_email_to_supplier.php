<?php

$email[ 'recipients'] = $_POST['recipients'];
$email['title'] = $_POST['title'];

$email = [
  'recipients' => 'hilmibakhtiar14@gmail.com',
  'title' => 'GAS ATTACHMENT',
  'message' => 'NGANG NGONG',
  'attachments' => 'logitech2.jpg',
];

include '../send_email.php';



