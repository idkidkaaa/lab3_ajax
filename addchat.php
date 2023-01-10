<?php

$chname = $_POST['chname'];
$result = array();

$link = mysqli_connect("localhost", "root", "12qw34er", "accounts");

if (!empty($chname)) {

    // Create chat

    $sql = ("INSERT INTO chats (name) VALUES('$chname')");
    $r = mysqli_query($link, $sql);

    // create table for it

    $sql = ("CREATE TABLE ".$chname." 
        (id int not null primary key auto_increment, sender varchar(16), message varchar(255), created timestamp default current_timestamp)");
    $r = mysqli_query($link, $sql);

}

// get chats

$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$sql = "SELECT * FROM chats WHERE id >'".$start."'";
$items = mysqli_query($link, $sql);
while($row = $items->fetch_assoc()) {
  $result['items'][] = $row;
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode($result);