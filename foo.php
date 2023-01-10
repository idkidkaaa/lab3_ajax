<?php

$link = mysqli_connect("localhost", "root", "12qw34er", "accounts");

$result = array();
$m = isset($_POST['m']) ? $_POST['m'] : "";
$s = isset($_POST['s']) ? $_POST['s'] : "";

$index = isset($_POST['i']) ? $_POST['i'] : "chat511";

if(!empty($m) && !empty($s)) {
  $sql = "INSERT INTO ".$index." (sender, message) VALUES ('$s', '$m')";
  $result['send_status'] = mysqli_query($link, $sql);
}

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$ind = isset($_GET['i']) ? $_GET['i'] : "chat511";

$sql = "SELECT * FROM ".$ind." WHERE id >'".$start."'";
$items = mysqli_query($link, $sql);
while($row = $items->fetch_assoc()) {
  $result['items'][] = $row;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);