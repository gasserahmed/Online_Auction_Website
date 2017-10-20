<?php
session_start();

$link = mysql_connect('localhost', 'root', '') or die(mysql_error());
$database_selected = mysql_select_db('Auction') or die(mysql_error());

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pass = md5($_POST['pass']);
$email = $_POST['email'];
$phone = $_POST['phone'];
$shipping_address = $_POST['shipping_address'];
$home_address = $_POST['home_address'];
$bank = $_POST['bank'];
$rtn = $_POST['rtn'];

if (!$link) {
	die("Could not connect database");
}

if (!$database_selected) {
	die("Could not select database");
}

$q = mysql_query("select * from member where email='" . $email . "' ") or die(mysql_error());
$n = mysql_fetch_row($q);

if ($n > 0) {
	header('Location: RegistrationPage.php?alert=' . urlencode("email already exist!"));

} else {
	$insert = mysql_query("insert into member values('','" . $email . "','" . $pass . "','" . $fname . "','" . $lname . "','" . $home_address . "','" . $shipping_address . "','" . $phone . "','" . $bank . "','" . $rtn . "')") or die(mysql_error());
    
    
    $r = mysql_query("select  * from Member where email='" . $email . "' and pass='" . $pass . "'  ") or die(mysql_error());
	$m = mysql_fetch_array($r);
	if ($insert) {
		$_SESSION['member_id'] = $m['member_id'];
		$_SESSION['login_flag'] = 1;
		header("location: ProfilePage.php");
		//$tmp = $_SESSION['member_id'];

	//echo "' . $tmp . ' ";
	//	echo "Successful Registeration";

	} else {

		echo "error";

	}
}
?>

