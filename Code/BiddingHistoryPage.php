<?php session_start(); ?>
<?php
		if (isset($_POST['myBidsBtn'])) {
			$_SESSION['mem']=1;
			header("location: http://localhost/BiddingHistoryPage.php");
		
		}
		if (isset($_POST['memBidsBtn'])) {
			$_SESSION['mem'] = 11;
			header("location: http://localhost/BiddingHistoryPage.php");
				}
		?>
<?php
include 'topBar.php';
?>
<html>
	<head>
		<style type="text/css">
			#item {
				width: 1250px;
				margin-bottom: 4px;
				background: #FFF;
				height: 20px;
				color: #207cca;
				border-radius: 8px;
				box-shadow: 1px 2px 3px;
				position: relative;
				left: -65px;
				text-align: center;
				top: -55px;
			}
			#item2 {
				width: 350px;
				margin-bottom: 5px;
				background: #FFF;
				height: 40px;
				color: #207cca;
				border-radius: 8px;
				box-shadow: 3px 2px 2px;
				position: relative;
				text-align: center;
				font-size: 25px;
				left: 360px;
				top: -60px;
			}
			#header {
				width: 350px;
				margin-bottom: 5px;
				background: #FFF;
				height: 40px;
				color: #16568d;
				border-radius: 8px;
				box-shadow: 3px 2px 2px;
				position: relative;
				text-align: center;
				font-size: 25px;
				left: 360px;
				top: -60px;
			}
			#header2 {
				width: 160px;
				margin-bottom: 5px;
				background: #FFF;
				height: 40px;
				color: #1c6fb5;
				border-radius: 8px;
				box-shadow: 3px 2px 2px;
				position: relative;
				text-align: center;
				font-size: 22px;
				left: 370px;
				top: -60px;
				margin-right: 10px;
			}
			#header3 {
				width: 160px;
				margin-bottom: 5px;
				background: #FFF;
				height: 40px;
				color: #1c6fb5;
				border-radius: 8px;
				box-shadow: 3px 2px 2px;
				position: relative;
				text-align: center;
				font-size: 22px;
				left: 450px;
				top: -60px;
				margin-right: 10px;
			}
			.boxed {
				border: 1px solid white;
				padding: 70px 70px;
				border-radius: 10px;
				position: relative;
				height: 250px;
				top: 80;
				z-index: 900;
			}
			</head>
		</style>
</html>
<div class="boxed">
	
	<?php

		$member_id = $_SESSION['member_id'];
		$rs = mysql_query("SELECT * FROM bid natural join item WHERE member_id = '$member_id' ORDER BY bid_time DESC");
		$rs2 = mysql_query("SELECT * FROM bid natural join item WHERE placed_by_id = '$member_id' ORDER BY bid_time DESC");
		echo "<h1 id=\"header\">Bidding History</h1>";
		?>
		
	<form action="#" method="post">
					<input type="submit" name="myBidsBtn" id="header2" value="My Bids">
					<input type="submit" name="memBidsBtn" id="header2" value="Members Bids">
						
			</table>
	

		
		<?php
		if($_SESSION['mem']==1){
			echo "<h1 id=\"header3\">My Bids</h1>";
		while ($obj = mysql_fetch_array($rs)) {
			echo "
<h3 id=\"item\">Item Name: " . $obj['item_name'] . " - Bidding Price: " . $obj['bidding_increment'] . " - Bid Time: " . $obj['bid_time'] . " </h3>";
		}
		}
		
		else if($_SESSION['mem']==11){
			echo "<h1 id=\"header3\">Members Bids</h1>";
		while ($obj = mysql_fetch_array($rs2)) {
			$memId=$obj['member_id'];
			$memName= mysql_query("SELECT fname,lname FROM member WHERE member_id = '$memId'");
			while ($obj1 = mysql_fetch_array($memName)){
			echo "
<h3 id=\"item\">Bidder ID: " . $obj['member_id'] ." - Bidder Name: " . $obj1['fname'] ."    ". $obj1['lname'] .  " - Item Name: " . $obj['item_name'] . " - Bidding Price: " . $obj['bidding_increment'] . " - Bid Time: " . $obj['bid_time'] . " </h3>";
		}}
		}
		
		?>
	</form>
</div>
		