<?php
session_start();
			mysql_connect('localhost', 'root', '') or die(mysql_error());
			$database_selected = mysql_select_db('Auction') or die(mysql_error());
			$member_id = $_SESSION['member_id'];
			$pass1 = md5($_POST['pass']);
			$fname1 = $_POST['fname'];
			$lname1 = $_POST['lname'];
			$phone1 = $_POST['phone'];
			$bank1 = $_POST['bank'];
			$rtn1 = $_POST['rtn'];
			$home_address1 = $_POST['home_address'];
			$shipping_address1= $_POST['shipping_address'];

			$q = mysql_query("update Member
set pass='" . $pass1 . "',
fname='" . $fname1 . "',
lname='" . $lname1 . "',
bank='" . $bank1 . "',
shipping_address='" . $shipping_address1 . "',
phone='" . $phone1 . "',
rtn='" . $rtn1 . "',
home_address='" . $home_address1 . "'
where member_id='" . $member_id . "'") or die(mysql_error());
header("location: http://localhost/ProfilePage.php");
			?>

