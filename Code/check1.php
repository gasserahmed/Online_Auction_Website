<?php
session_start();

$email = $_POST['email'];
$pass = md5($_POST['pass']);

mysql_connect('localhost', 'root', '') or die(mysql_error());
$database_selected = mysql_select_db('Auction') or die(mysql_error());

$q = mysql_query("select  * from Member where email='" . $email . "' and pass='" . $pass . "'  ") or die(mysql_error());
$n = mysql_fetch_array($q);
if ($n > 0) {

	$_SESSION['member_id'] = $n['member_id'];
	$_SESSION['login_flag']=1;
	header("location: ProfilePage.php");
	##$tmp = $_SESSION['member_id'];

	##echo "' . $tmp . ' ";

	//echo "welcome";
} else {
	header('Location: LoginPage.php?alert=' . urlencode("Invalid Entry!"));
	exit();
}
?>

