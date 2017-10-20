<html><?php session_start();
	$_SESSION['mem']=0;?>	
	<?php include 'Connection.php';
include 'topBar.php';?>
	<head>
	<style type="text/css">
		#auctionEndDate, #currentBidPrice {
		width: 150px;
		left: -200px;
		margin-bottom: 3px;
		background: #FFF;
		height: 20px;
		color: #207cca;
		border-radius: 8px;
		box-shadow: 1px 2px 3px;
		position: relative;
		top: 1px;
		text-align: center;
	}
	#item {
		width: 350px;
		margin-bottom: 4px;
		background: #FFF;
		height: 20px;
		color: #207cca;
		border-radius: 8px;
		box-shadow: 1px 2px 3px;
		position: relative;
		left:38px;
		text-align: center;
	}
	#item2 {
		width: 350px;
		margin-bottom: 5px;
		background: #FFF;
		height: 40px;
		color: #207cca;
		border-radius: 8px;
		box-shadow: 1px 2px 3px;
		position: relative;
		text-align: center;
		font-size: 20px;
		left: 80px;
	}
	#header{
		border-radius: 8px;
		box-shadow: 1px 2px 3px;
		width: 200px;
		background: #FFF;
		margin-bottom:-30px;
		text-align: center;
		color: #16568d;
		position: relative;
		top: -56px;
		font-size: 25px;
		left:80px;
	}#header2{
	width: 350px;
		margin-bottom: 5px;
		background: #FFF;
		height: 40px;
		color: #1c6fb5;
		border-radius: 8px;
		box-shadow: 3px 2px 2px;
		position: relative;
		text-align: center;
		top: -1px;
		font-size: 20px;
		left:85px;}
	.boxed {
         border: 1px solid white ;
	   padding: 70px 70px;
		box-shadow: 1px 2px 3px #207cca;
		border-radius: 10px;
		position: relative;
		height: 850px;
		top:80;
}
	</head>
	</style>
	<div class="boxed">  
	<h1 id="header">Search Results</h1>
	<?php 

	$keywords = $_SESSION['searchBar'];

	echo "<ul style=\"list-style-type:none>\"";

	$keyword = explode(" ", $keywords);

	$i = 0;
	while (!empty($keyword[$i])) {
		$rs = mysql_query("SELECT item_id,item_name,current_bid_price,auction_end_date FROM Item WHERE sold_to_id IS NULL AND item_name LIKE '%$keyword[$i]%'");
		while ($row = mysql_fetch_array($rs)) {
			echo "<dt><a id=\"header2\" href=\"ItemDetails.php?item_id=" . $row['item_id'] . "\">_" . $row['item_name'] . "_</a></dt>
  		<dd id=\"item\">Current Bid Price: " . $row['current_bid_price'] . "</dt>
  		<dd id=\"item\">Auction End Date: " . $row['auction_end_date'] . "</dt>";
		}
		$i++;
	}

	echo "</ul></div>";

?>
</html>