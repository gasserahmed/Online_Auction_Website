<?php
session_start();
$_SESSION['mem']=0;
include 'Connection.php';
include 'topBar.php';
?>
<html>
	<head>
	<style type="text/css">
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
	}
	#header2{
		width: 350px;
		margin-bottom: 5px;
		background: #FFF;
		height: 40px;
		color: #1c6fb5;
		border-radius: 8px;
		box-shadow: 3px 2px 2px;
		position: relative;
		text-align: center;
		top: -20px;
		font-size: 20px;
		left:85px;
	}
	.boxed {
         border: 1px solid white ;
	   padding: 70px 70px;
		box-shadow: 1px 2px 3px #207cca;
		border-radius: 10px;
		position: relative;
		height: 850px;
		top:80;
		z-index: 900;
}
	</head>
	</style>
</html>
<div class="boxed">  
<?php
$category_id = $_REQUEST['category_id'];

$rs = mysql_query("SELECT category_name,parent_category FROM Category WHERE category_id = '$category_id'");
$category = mysql_fetch_array($rs);

$parent_category = $category['parent_category'];
$rs = mysql_query("SELECT * FROM Category WHERE category_id = '$parent_category'");
$parent_name = mysql_fetch_array($rs);

if ($parent_category == null) {
	echo "<h1 id=\"header\">" . $category['category_name'] . " </h1>";
	
	$rs = mysql_query("SELECT item_id,item_name,current_bid_price,auction_end_date FROM Item WHERE sold_to_id IS NULL AND category_id IN (SELECT category_id FROM Category WHERE parent_category='$category_id');");
		while ($row = mysql_fetch_array($rs)) 
		{			
		echo "<dt><a id=\"item2\" href=\"ItemDetails.php?item_id=" . $row['item_id'] . "\">" . $row['item_name'] . "</a></dt>
  		<dd id=\"item\">Current Bid Price: " . $row['current_bid_price'] . "</dd>
  		<dd id=\"item\">Auction End Date: " . $row['auction_end_date'] . "</dd>";
		}

} else {
	echo "<h1 id=\"header\">" . $parent_name['category_name'] . " </h1> 
	<br><h2 id=\"header2\">" . $category['category_name'] . " </h2>";
	
	$rs = mysql_query("SELECT item_id,item_name,current_bid_price,auction_end_date FROM Item WHERE sold_to_id IS NULL AND category_id='$category_id'");
		while ($row = mysql_fetch_array($rs)) 
		{			
		echo "<dt ><a id=\"item2\" href=\"ItemDetails.php?item_id=" . $row['item_id'] . "\">" . $row['item_name'] . "</a></dt>
  		<dd id=\"item\">- Current Bid Price: " . $row['current_bid_price'] . "</dd>
  		<dd id=\"item\">- Auction End Date: " . $row['auction_end_date'] . "</dd>";
		}
}
?>
</div>