<?php
session_start();
include 'Connection.php';
include 'topBar.php';

$member_id = $_SESSION['member_id'];

date_default_timezone_set('Africa/Cairo');
$current_time = date('Y-m-d H:i:s');

$rs = mysql_query("SELECT * FROM Item WHERE placed_by_id = '$member_id' AND sold_to_id IS NOT NULL");
echo "
	<br><br>
	<fieldset>
    <legend>Sold Items</legend>";
while ($items = mysql_fetch_array($rs)) {
		
	$sold_to_id = $items['sold_to_id'];
	$rs2 = mysql_query("SELECT fname,lname FROM Member WHERE member_id = '$sold_to_id'");
	$member_name = mysql_fetch_array($rs2);

	echo "
    <h4><a href=\"feedbackPage.php?item_id=" . $items['item_id'] . "\"> Item Name: " . $items['item_name'] . " </a></h4>
    <h4>Sold To:" . $member_name['fname'] . " " . $member_name['lname'] . "</h4>  
    <h4>Selling Price: " . $items['current_bid_price'] . " </h4>
    <h4>Auction End Date: " . $items['auction_end_date'] . " </h4>
    <h4>__________________________________________________________</h4>
    
    ";
}
echo "</fieldset>";

$rs = mysql_query("SELECT * FROM Item WHERE sold_to_id = '$member_id'");
echo "
	<br>
	<fieldset>
    <legend>Bought Items</legend>";
while ($items = mysql_fetch_array($rs)) {
		
	$placed_by_id = $items['placed_by_id'];
	$rs2 = mysql_query("SELECT fname,lname FROM Member WHERE member_id = '$placed_by_id'");
	$member_name = mysql_fetch_array($rs2);

	echo "
    <h4><a href=\"feedbackPage.php?item_id=" . $items['item_id'] . "\">Item Name: " . $items['item_name'] . " </a></h4>
    <h4>Bought From:" . $member_name['fname'] . " " . $member_name['lname'] . "</h4>  
    <h4>Buying Price: " . $items['current_bid_price'] . " </h4>
    <h4>Auction End Date: " . $items['auction_end_date'] . " </h4>
    <h4>__________________________________________________________</h4>
    ";
}
echo "</fieldset>";


$rs = mysql_query("SELECT * FROM Item WHERE placed_by_id = '$member_id' AND auction_end_date > NOW()");
echo "
	<br>
	<fieldset>
    <legend>Pending For Sale Items</legend>";
while ($items = mysql_fetch_array($rs)) {
		
	echo "
    <h4>Item Name: " . $items['item_name'] . " </h4>
    <h4>Current Bid Price: " . $items['current_bid_price'] . " </h4>
    <h4>Auction End Date: " . $items['auction_end_date'] . " </h4>
    <h4>__________________________________________________________</h4>
    ";
}
echo "</fieldset>";


$rs = mysql_query("SELECT * FROM Item NATURAL JOIN Bid WHERE member_id = '$member_id' AND auction_end_date > NOW()");
echo "
	<br>
	<fieldset>
    <legend>Pending To Buy Items</legend>";
while ($items = mysql_fetch_array($rs)) {
		
	$placed_by_id = $items['placed_by_id'];
	$rs2 = mysql_query("SELECT fname,lname FROM Member WHERE member_id = '$placed_by_id'");
	$member_name = mysql_fetch_array($rs2);

	echo "
    <h4>Item Name: " . $items['item_name'] . " </h4>
    <h4>Placed By: " . $member_name['fname'] . " " . $member_name['lname'] . "</h4>  
    <h4>Current Bid Price: " . $items['current_bid_price'] . " </h4>
    <h4>Auction End Date: " . $items['auction_end_date'] . " </h4>
    <h4>__________________________________________________________</h4>
    ";
}
echo "</fieldset>";

$rs = mysql_query("SELECT * FROM Item WHERE placed_by_id = '$member_id' AND auction_end_date < NOW() AND sold_to_id is NULL");
echo "
	<br>
	<fieldset>
    <legend>Expired Items</legend>";
while ($items = mysql_fetch_array($rs)) {
	echo "
    <h4>Item Name: " . $items['item_name'] . " </h4> 
    <h4>Auction End Date: " . $items['auction_end_date'] . " </h4>
    <h4>__________________________________________________________</h4>
    ";
}
echo "</fieldset>";
?>