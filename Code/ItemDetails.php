<html>
<head>
	<style type="text/css">
	#bidBtn {
		background: none repeat scroll 0% 0% #207cca;
		display: inline-block;
		height: 40px;
		width: 80px;
		padding: 5px 10px;
		line-height: 1.05em;
		box-shadow: 1px 2px 3px #FFF;
		border-radius: 8px;
		border: 1px solid #FFF;
		text-decoration: none;
		opacity: 0.9;
		cursor: pointer;
		position: absolute;
		color: white;
		top:520px;
	left:180px;
	}

	}
</style>
</head>	
</html>
<?php
session_start();
$_SESSION['mem']=0;
if(!$_SESSION['login_flag'])
{
	$_SESSION['return_to_bid']=1;
	$item_id = $_REQUEST['item_id'];
	$_SESSION['item_id'] = $item_id;
	header("location: http://localhost/loginPage.php");
	exit();
}

include 'Connection.php';
include 'topBar.php';

$item_id = $_REQUEST['item_id'];

$_SESSION['item_id'] = $item_id;

$login_flag = $_SESSION['login_flag'];

$_SESSION['return_to_bid']=0;

$member_id = $_SESSION['member_id'];

$rs = mysql_query("SELECT * FROM Item WHERE item_id= '$item_id'");
$row = mysql_fetch_array($rs);

$placed_by_id = $row['placed_by_id'];
$category_id = $row['category_id'];

$rs = mysql_query("SELECT fname, lname FROM Member WHERE member_id = '$placed_by_id'");
$member_name = mysql_fetch_array($rs);

$rs = mysql_query("SELECT category_name,parent_category FROM Category WHERE category_id = '$category_id'");
$category = mysql_fetch_array($rs);

$parent_category = $category['parent_category'];
$rs = mysql_query("SELECT category_name FROM Category WHERE category_id = '$parent_category'");
$parent_name = mysql_fetch_array($rs);

$rs = mysql_query("SELECT member_id,bidding_increment,bid_time FROM Bid WHERE item_id = $item_id AND bid_time=(SELECT MAX(bid_time) FROM Bid WHERE item_id=$item_id);");

$latest_bidder = mysql_fetch_array($rs);
$latest_bidder_id = $latest_bidder['member_id'];

$rs = mysql_query("SELECT fname, lname FROM Member WHERE member_id = '$latest_bidder_id'");
$latest_bidder_name = mysql_fetch_array($rs);

if ($parent_category == null) {
	echo "
	<br><br><br>
	<fieldset>
    <legend>Item Details</legend>
    <h1>Item Name: " . $row['item_name'] . " </h1>
    <h2>Category: " . $category['category_name'] . " </h2>
    <h4>Description: " . $row['description'] . " </h4>
    <h5>Sold By: " . $member_name['fname'] . " " . $member_name['lname'] . "</h5>    
  </fieldset>";

} else {
	echo "
  <br><br>
  <fieldset>
    <legend>Item Details</legend>
    <h1>Item Name: " . $row['item_name'] . " </h1>
    <h2>Main Category: " . $category['category_name'] . " </h2>
    <h3>Sub Category: " . $parent_name['category_name'] . " </h3>
    <h4>Description: " . $row['description'] . " </h4>
    <h5>Sold By: " . $member_name['fname'] . " " . $member_name['lname'] . "</h5>    
  </fieldset>";
}

if ($member_id == $placed_by_id) {
	echo "
  <fieldset><br>
    <legend>Bidding Details</legend>
    <h1>Current Bid Price: " . $row['current_bid_price'] . " </h1>
    <h2>Starting Bid Price: " . $row['starting_bid_price'] . " </h2>

	<h4>Latest Bid By: " . $latest_bidder_name['fname'] . " " . $latest_bidder_name['lname'] . " </h4>
	<h4>Increment Amount: " . $latest_bidder['bidding_increment'] . "</h4>   
    <h4>Latest Bid On: " . $latest_bidder['bid_time'] . "</h4>    
    
    <h5>Auction Started On: " . $row['auction_start_date'] . " </h5>
    <h5>Auction Ends On: " . $row['auction_end_date'] . "</h5>    
  </fieldset>";
} 

else {
	echo "
  <fieldset>
    <legend>Bidding Details</legend>
    <h1>Current Bid Price: " . $row['current_bid_price'] . " </h1>
    <h2>Starting Bid Price: " . $row['starting_bid_price'] . " </h2>
	
	<form name=\"BidForm\" action=\"AddBid.php\" method=\"post\">
	<input type=\"number\" id=\"bidBar\" name=\"bidBar\" placeholder=\"Enter Bidding Increment...\" min=\"1\" value=\"1\">
	<input type=\"submit\" id=\"bidBtn\" name=\"bidBtn\" value=\"Bid Now!\">
	</form>
	
	<h4>Latest Bid By: " . $latest_bidder_name['fname'] . " " . $latest_bidder_name['lname'] . " </h4>
	<h4>Increment Amount: " . $latest_bidder['bidding_increment'] . "</h4>   
    <h4>Latest Bid On: " . $latest_bidder['bid_time'] . "</h4>    
    
    <h5>Auction Started On: " . $row['auction_start_date'] . " </h5>
    <h5>Auction Ends On: " . $row['auction_end_date'] . "</h5>    
  </fieldset>";
}
?>

