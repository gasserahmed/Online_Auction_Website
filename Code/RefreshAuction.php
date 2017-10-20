<?php
include 'Connection.php';

date_default_timezone_set('Africa/Cairo');
$current_time = date('Y-m-d H:i:s');

$rs = mysql_query("SELECT * FROM Item WHERE auction_end_date < '$current_time'") or die(mysql_error());

while ($row = mysql_fetch_array($rs)) {
	$item_id = $row['item_id'];
	$rs2 = mysql_query("SELECT * FROM Bid WHERE item_id = $item_id AND bid_time=(SELECT MAX(bid_time) FROM Bid WHERE item_id=$item_id);");

	$latest_bidder = mysql_fetch_array($rs2);
	$latest_bidder_id = $latest_bidder['member_id'];

	if($latest_bidder_id!=null)
		$query = mysql_query("UPDATE Item SET sold_to_id=$latest_bidder_id WHERE item_id=$item_id");
}
?>