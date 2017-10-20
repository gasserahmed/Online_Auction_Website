<?php
session_start();
include 'Connection.php';

$item_id = $_SESSION['item_id'];
$member_id = $_SESSION['member_id'];

$bidding_increment = $_REQUEST['bidBar'];

date_default_timezone_set('Africa/Cairo');

$bid_time = date('Y-m-d H:i:s');

$query = mysql_query("INSERT INTO Bid( member_id, item_id, bid_time, bidding_increment) VALUES('$member_id', '$item_id', '$bid_time', '$bidding_increment');");
$query = mysql_query("UPDATE Item SET current_bid_price=current_bid_price + $bidding_increment WHERE item_id=$item_id");

if (!$query)
	echo "Failed to submit data!";
else {
	header("Location: ItemDetails.php?item_id=$item_id");
	exit();
}
?>