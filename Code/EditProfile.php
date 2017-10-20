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
		top:460px;
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
$fname = $n['fname'];
$lname = $n['lname'];
$pass = $n['pass'];
$phone = $n['phone'];
$shipping_address = $n['shipping_address'];
$home_address = $n['home_address'];
$bank = $n['bank'];
$rtn = $n['rtn'];
			echo "
<pre>
<br><br><br><fieldset>
<legend>Update Profile</legend>
<form name=\"update\" action=\"check4.php\" method=\"post\">
             First Name:        <input type=\"text\" id=\"fname\" name=\"fname\" size=\"30\" value=\"$fname\">  <input type=\"text\" style=\"border: 0px\" id=\"c1\" name=\"c1\" size=\"30\">
             
             Last Name:         <input type=\"text\" id=\"lname\" name=\"lname\" size=\"30\" value=\"$lname\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c2\" name=\"c2\" size=\"30\">
             
             Password:          <input type=\"password\" id=\"pass\" name=\"pass\" size=\"30\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c3\" name=\"c3\" size=\"30\">
                          
             Phone No:          <input type=\"text\" id=\"phone\" name=\"phone\" size=\"30\" value=\"$phone\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c5\" name=\"c5\" size=\"30\">
             
             Shipping Address:  <input type=\"text\" id=\"shipping_address\" name=\"shipping_address\" size=\"30\" value=\"$shipping_address\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c6\" name=\"c6\" size=\"30\">
             
             Home Address:      <input type=\"text\" id=\"home_address\" name=\"home_address\" size=\"30\" value=\"$home_address\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c7\" name=\"c7\" size=\"30\">
             
             Bank Account No:   <input type=\"text\" id=\"bank\" name=\"bank\" size=\"30\" value=\"$bank\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c8\" name=\"c8\" size=\"30\">
             
             RTN:               <input type=\"text\" id=\"rtn\" name=\"rtn\" size=\"30\" value=\"$rtn\">  <input readonly type=\"text\" style=\"border: 0px\" id=\"c9\" name=\"c9\" size=\"30\">

                                                                     <input type=\"submit\" id=\"logup\" name=\"logup\" value=\"Update\">

</form/
</pre>
</fieldset>";
			?>

			<script type="text/javascript">
							$(document).ready(function() {
			$('#logup').click(function() {
			c1.value = "Empty Phone Number";
			//return false;
			var fname_test = document.getElementById('fname').value;
			var lname_test = document.getElementById('lname').value;
			var pass_test = document.getElementById('pass').value;
			//pass_test=md5(pass_test);

			var phone_test = document.getElementById('phone').value;
			var shipping_address_test = document.getElementById('shipping_address').value;
			var home_address_test = document.getElementById('home_address').value;
			var bank_test = document.getElementById('bank').value;
			var rtn_test = document.getElementById('rtn').value;
			var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var e = 0;


			if (pass_test == '') {
			c3.value = "Password field is empty";
			e++;
			} else
			c3.value = "OK";

			if (fname_test == '') {
			c1.value = "First Name is empty";
			e++;
			} else
			c1.value = "OK";

			if (lname_test == '') {
			c2.value = "Last Name is empty";
			e++;
			} else
			c2.value = "OK";

			if (phone_test == '') {
			c5.value = "Empty Phone Number";
			e++;
			} else
			c5.value = "OK";

			if (shipping_address_test == '') {
			c6.value = "Empty shipping address";
			e++;
			} else
			c6.value = "OK";

			if (home_address_test == '') {
			c7.value = "Empty home address";
			e++;
			} else
			c7.value = "OK";

			if (bank_test == '') {
			c8.value = "Empty bank test";
			e++;
			} else
			c8.value = "OK";

			if (rtn_test == '') {
			c9.value = "Empty rtn number";
			e++;
			} else
			c9.value = "OK";

			if (e > 0)
			return false;
			
			
				return true;

				});

				});

			</script>
	</body>
</html>

