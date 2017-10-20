<?php 
		 session_start();
		 $_SESSION['mem']=0;
	include'topBar.php'  ;
	include 'Connection.php';
	 ?> 
<html>
<head>
	<style type="text/css">
	#submit {
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
		top:320px;
	left:300px;
	}

	}
</style>
</head>	
</html>
	 
	 
	 <?php
	 
	 $member_id = $_SESSION['member_id'];
	 $item_id = $_REQUEST['item_id']; // send it from the hyperlink
	 
	 $_SESSION['item_id_feed']=$item_id;
	 
	 $rs = mysql_query("SELECT * FROM Item WHERE item_id='$item_id'");//Grabbed the item
	 
	 $item = mysql_fetch_array($rs);
	 
	 $placed_by_id = $item['placed_by_id'];
	 $sold_to_it= $item['sold_to_id'];
	 
	 $buyer_comment = $item['buyer_comment'];
	 $buyer_rating = $item['buyer_rating'];
	 $seller_comment = $item['seller_comment'];
	 $seller_rating = $item['seller_rating'];
	 
	 if($member_id==$placed_by_id)//I am the Seller
	 	{
	 		echo "
<pre>
<br><br><br><fieldset>
<legend>Feedback</legend>

<form name=\"update\" action=\"check5.php\" method=\"post\">
             
             Comment on the buyer: <input type=\"text\" id=\"commentBuyer\" name=\"commentBuyer\" size=\"30\" value=\"$seller_comment\">  
             Rate the buyer: <input type=\"number\" id=\"rateBuyer\" name=\"rateBuyer\" size=\"30\" min=\"1\" max=\"10\" value=\"$seller_rating\"> 
             
             Comment on you: <input readonly type=\"text\" id=\"commentSeller\" name=\"commentSeller\" size=\"30\" value=\"$buyer_comment\">
             Your rating: <input readonly type=\"number\"  id=\"rateSeller\" name=\"rateSeller\" size=\"30\" min=\"1\" max=\"10\" value=\"$buyer_rating\">
                         
             <input type=\"submit\" id=\"submit\" name=\"submit\" value=\"Submit\">

</form>
</pre>
</fieldset>";	
	 	}
		
	 else {
		 echo "
<pre>
<br><br><br><fieldset>
<legend>Feedback Form</legend>

<form name=\"update\" action=\"check5.php\" method=\"post\">
             
            
             Comment on you: <input readonly type=\"text\" id=\"commentBuyer\" name=\"commentBuyer\" size=\"30\" value=\"$seller_comment\">  
             Your rating: <input readonly type=\"number\" id=\"rateBuyer\" name=\"rateBuyer\" size=\"30\" min=\"1\" max=\"10\" value=\"$seller_rating\"> 
             
             Comment on the seller: <input  type=\"text\" id=\"commentSeller\" name=\"commentSeller\" size=\"30\" value=\"$buyer_comment\">
             Rate the seller: <input  type=\"number\"  id=\"rateSeller\" name=\"rateSeller\" size=\"30\" min=\"1\" max=\"10\" value=\"$buyer_rating\">
                         
             <input type=\"submit\" id=\"submit\" name=\"submit\" value=\"Submit\">

</form>
</pre>
</fieldset>";	
	 }
		
	 
	 
	 ?>
	 
