<?php
session_start();
			mysql_connect('localhost', 'root', '') or die(mysql_error());
			$database_selected = mysql_select_db('Auction') or die(mysql_error());
			
			$member_id = $_SESSION['member_id'];
			
	 		$item_id = $_SESSION['item_id_feed']; 
	 
	 $rs = mysql_query("SELECT * FROM Item WHERE item_id='$item_id'");//Grabbed the item
	 
	 $item = mysql_fetch_array($rs);
	
			$commentBuyer = $_POST['commentBuyer'];
			$rateBuyer = $_POST['rateBuyer'];
			$commentSeller = $_POST['commentSeller'];
			$rateSeller = $_POST['rateSeller'];
			
			
$query = mysql_query("UPDATE Item SET buyer_comment='$commentSeller',buyer_rating='$rateSeller',seller_comment='$commentBuyer',seller_rating='$rateBuyer' WHERE item_id=$item_id");

header("location: http://localhost/ProfilePage.php");
			?>

