<?php

$link = mysqli_connect("localhost", "root", "12qw34er", "accounts");

$result = array();
$m = isset($_POST['m']) ? $_POST['m'] : "Meow";
$s = isset($_POST['s']) ? $_POST['s'] : "Lung";

if(!empty($m) && !empty($s)) {
  $sql = "INSERT INTO chat0 (sender, message) VALUES ('$s', '$m')";
  $result['send_status'] = mysqli_query($link, $sql);
}

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$sql = "SELECT * FROM chat0 WHERE id >'".$start."'";
$items = mysqli_query($link, $sql);
while($row = $items->fetch_assoc()) {
  $result['items'][] = $row;
}

$db.close;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);