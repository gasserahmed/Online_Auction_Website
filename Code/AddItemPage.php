<?php
session_start();
include 'topBar.php';

?>
<html>
<head>
	<style type="text/css">
	#logup {
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
		top:350px;
	left:300px;
	}

	}
</style>
</head>	
</html>


<html>

	<body>

		<div class="contact" >
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


			<?php
mysql_connect('localhost', 'root', '') or die(mysql_error());
$database_selected = mysql_select_db('Auction') or die(mysql_error());
$member_id = $_SESSION['member_id'];

$q = mysql_query("select  * from Member where member_id='" . $member_id . "'") or die(mysql_error());
$n = mysql_fetch_array($q);
$rs = mysql_query("SELECT *FROM category where parent_category is not null");


echo "
<pre>
<br><br><br><fieldset>
<legend>Sell Item</legend>
<form name=\"update\" action=\"check3.php\" method=\"post\">
             Item Name:           <input type=\"text\" id=\"item_name\" name=\"item_name\" size=\"30\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c1\" name=\"c1\" size=\"30\">
             
             Description:         <input type=\"text\" id=\"description\" name=\"description\" size=\"30\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c2\" name=\"c2\" size=\"30\">
             
             Starting Bid Price:  <input type=\"text\" id=\"starting_bid_price\" name=\"starting_bid_price\" size=\"30\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c3\" name=\"c3\" size=\"30\">
                          
             Auction End Date:    <input type=\"datetime-local\" id=\"auction_end_date\" name=\"auction_end_date\" size=\"30\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c4\" name=\"c4\" size=\"30\">
            
            
              	<select name=\"category\"  id=\"category\">";
while($row = mysql_fetch_array($rs))
{ 
  echo "<option value=\"".$row['category_id']."\">".$row['category_name']."</option>\n ";
}
echo "</select>
            
            
                                                                     <input type=\"submit\" id=\"logup\" name=\"logup\" value=\"Submit\">
</form/
</pre>
</fieldset>";
			?>
<script type="text/javascript">
			$(document).ready(function() {
				$('#logup').click(function() {

					var curr = new Date();
					var auction_end_date_test = new Date();
					auction_end_date_test = document.getElementById('auction_end_date').value;
					var item_name_test = document.getElementById('item_name').value;
					var starting_bid_price_test = document.getElementById('starting_bid_price').value;
					var e = 0;
					if (item_name_test == '') {
						c1.value = "Empty Item Name";
						e++;
					} else
						c1.value = "";

					if (starting_bid_price_test < 0 || starting_bid_price_test == '') {
						if (starting_bid_price_test == '')
							c3.value = "specify starting bid price";
						else
							c3.value = "Starting Price must be positive";
						e++;
					} else
						c3.value = "";
					
				
					if (auction_end_date_test < curr || Date.parse(curr) > Date.parse(auction_end_date_test)) {
						if(auction_end_date_test < curr)
						c4.value = "complete time please";
						else
						c4.value = "invalid time";
						
					//	c1.value = curr;
						e++;
					} else
						c4.value = "";

					if (e > 0)
						return false;

					return true;
				});
			});

		</script>
	</body>
</html>

