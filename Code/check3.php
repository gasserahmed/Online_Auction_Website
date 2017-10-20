<?php
session_start();

$link = mysql_connect('localhost', 'root', '') or die(mysql_error());
$database_selected = mysql_select_db('Auction') or die(mysql_error());

$item_name = $_POST['item_name'];
$description = $_POST['description'];
$starting_bid_price = $_POST['starting_bid_price'];
$auction_end_date = $_POST['auction_end_date'];

date_default_timezone_set('Africa/Cairo');
$date = date('Y-m-d H:i:s');

$member_id =$_SESSION['member_id'];
$category =$_POST['category'];	

if (!$link) {
	die("Could not connect database");
}

if (!$database_selected) {
	die("Could not select database");
}

$query = mysql_query("INSERT INTO Item( item_name, description, starting_bid_price , auction_end_date,auction_start_date,placed_by_id,current_bid_price,category_id) VALUES('$item_name', '$description', '$starting_bid_price', '$auction_end_date', '$date','$member_id', '$starting_bid_price', '$category');");


$g = mysql_query("SELECT * FROM item WHERE auction_start_date=(SELECT MAX(auction_start_date) FROM item WHERE placed_by_id=$member_id);") or die(mysql_error());


$r=mysql_fetch_array($g);

$z= $r['item_id'];

if ($query) 
	header("location: ItemDetails.php?item_id=$z");

?>

