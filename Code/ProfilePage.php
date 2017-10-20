<?php session_start();
$_SESSION['mem']=0;?>	
<?php  include'topBar.php' ; ?> 
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
		left:360px;
		text-align: center;
		top:-50px;
	}
	#item2 {
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
		top:-60px;
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
		border-radius: 8px;
		box-shadow: 1px 2px 3px;
		width: 200px;
		background: #FFF;
		margin-bottom:-30px;
		text-align: center;
		color: #1c6fb5;
		position: relative;
		top: -56px;
		font-size: 20px;
		left:80px;
	}
	.boxed {
         border: 1px solid white ;
	   padding: 70px 70px;
		box-shadow: 1px 2px 3px #207cca;
		border-radius: 10px;
		position: relative;
		height: 250px;
		top:80;
		z-index: 900;
}
#sellBtn {
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
		top:330px;
		right:660px;
	}
	#historyBtn{
		background: none repeat scroll 0% 0% #207cca;
		display: inline-block;
		height: 40px;
		width: 100px;
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
		top:330px;
		right:560px;
	}

#myItemsBtn{
		background: none repeat scroll 0% 0% #207cca;
		display: inline-block;
		height: 40px;
		width: 90px;
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
		top:330px;
		right:740px;
	}
#editBtn {
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
		top:330px;
	right:480px;
	}

	</head>
	</style>
</html>
<div class="boxed">  
<?php

$member_id=$_SESSION['member_id'];

$rs = mysql_query("SELECT * FROM Member WHERE member_id = '$member_id'");
$member = mysql_fetch_array($rs);

echo "
    <h1 id=\"item2\">" . $member['fname'] . " " . $member['lname'] . " </h1>
    <h3 id=\"item\">Email: " . $member['email'] . " </h3>
    <h3 id=\"item\">Home Address: " . $member['home_address'] . " </h3>
    <h3 id=\"item\">Shipping Address: " . $member['shipping_address'] . " </h3>
    <h3 id=\"item\">Phone: " . $member['phone'] . " </h3>
    <h3 id=\"item\">Bank Account Number: " . $member['bank'] . " </h3>
    <h3 id=\"item\">Bank Routing Number: " . $member['rtn'] . " </h3>
 ";

echo "
	
	<form name=\"AddItemForm\" action=\"AddItemPage.php\" method=\"post\">
	<input type=\"submit\" id=\"sellBtn\" name=\"sellBtn\" value=\"Sell Item\">
	</form>
	
	<form name=\"BiddingHistoryForm\" action=\"BiddingHistoryPage.php\" method=\"post\">
	<input type=\"submit\" id=\"historyBtn\" name=\"historyBtn\" value=\"Bidding History\">
	</form>
	
	<form name=\"myItemsForm\" action=\"myItemsPage.php\" method=\"post\">
	<input type=\"submit\" id=\"myItemsBtn\" name=\"myItemsBtn\" value=\"My Items\">
	</form>
	
	
	<form name=\"EditProfileForm\" action=\"EditProfile.php\" method=\"post\">
	<input type=\"submit\" id=\"editBtn\" name=\"editBtn\" value=\"Edit Profile\">
	</form>
	";
?>
</div>