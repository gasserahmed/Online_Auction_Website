<?php include 'RefreshAuction.php'; ?>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<style type="text/css">
			.print {
				color: #F00;
				font-size: 17px;
				position: absolute;
				top: 405px;
				left: 880px;
			}
			#searchBtn {
				position: relative;
				padding: 6px 15px;
				left: -23px;
				border: 2px solid #207cca;
				background-color: #207cca;
				color: #fafafa;
				top: 10px;
			}
			#homeBtn {
				position: relative;
				padding: 4px 15px;
				left: 15.5px;
				border: 2px solid #207cca;
				background-color: #207cca;
				color: #fafafa;
				top: 10.25px;
			    z-index: 910;
			}
			#logInBtn {
				position: relative;
				padding: 6px 15px;
				left: -25.8px;
				border: 2px solid #207cca;
				background-color: #207cca;
				color: #fafafa;
				top: 10px;
			}
			#profileBtn {
				position: relative;
				padding: 6px 15px;
				left: -25.55px;
				width: 72px;
				border: 2px solid #207cca;
				background-color: #207cca;
				color: #fafafa;
				top: 10px;
			}
			#registerBtn, #logOutBtn {
				position: relative;
				padding: 6px 15px;
				left: -28px;
				border: 2px solid #207cca;
				background-color: #207cca;
				color: #fafafa;
				top: 10px;
			}
			#logOutBtn {
				position: relative;
				padding: 6px 15px;
				left: -28px;
				border: 2px solid #207cca;
				background-color: #207cca;
				color: #fafafa;
				top: 10px;
			}
			#searchBtn:hover {
				border: 2px solid #ffffff;
			}
			#logInBtn:hover {
				border: 2px solid #ffffff;
			}
			#homeBtn:hover {
				border: 2px solid #ffffff;
			}
			#logOutBtn:hover {
				border: 2px solid #ffffff;
			}
			#profileBtn:hover {
				border: 2px solid #ffffff;
			}
			#registerBtn:hover {
				border: 2px solid #ffffff;
			}
			#searchBar {
				position: relative;
				left: 7px;
				padding: 8px 15px;
				width: 687px;
				background: #d2e4f4;
				border: 0px solid #dbdbdb;
				color: #16568d;
				top: 10px;
			}
			ul {
				font-family: Arial, Verdana;
				font-size: 14px;
				margin: 0;
				padding: 0;
				left: -150px;
				z-index: 910;
				list-style: none;
			}

			ul li {
				display: block;
				position: relative;
				float: left;
				left: 150px;
				top: 10px;
				z-index: 910;
			}

			li ul {
				display: none;
			}

			ul li a {
				display: block;
				text-decoration: none;
				color: #ffffff;
				border-bottom: 1px solid #ffffff;
				padding: 7px 15px;
				background: #207cca;
				margin-left: 1px;
				border-right: 2px solid #FFFFFF;
				z-index: 910;
			}

			ul li a:hover {
				background: #207cca;
			}
			li:hover ul {
				display: block;
				position: absolute;
				width: 102px;
				top: 21px;
				z-index: 910;
				text-align: center;
			}

			li:hover li {
				float: none;
				font-size: 12px;
			}

			li:hover a {
				background: #79b0df;
			}

			li:hover li a:hover {
				background: #207cca;
			}

			.darrow {
				color: #FFF;
				font-size: 8pt;
				position: absolute;
				top: 9px;
				right: 4px;
			}
			.rarrow {
				color: #FFF;
				font-size: 13pt;
				position: absolute;
				top: 6px;
				right: 4px;
			}

			#er {
				color: #F00;
				font-size: 17px;
				position: absolute;
				top: 405px;
				left: 880px;
			}
		</style>
	</head>
	<?php
	if (isset($_POST['homeBtn'])) {
		header("location: http://localhost/homePage.php");
	} else if (isset($_POST['searchBtn'])) {
		$_SESSION['searchBar'] = $_POST['searchBar'];
		header("location: http://localhost/SearchPage.php");
	} else if (isset($_POST['logInBtn'])) {
		header("location: http://localhost/loginPage.php");
	} else if (isset($_POST['profileBtn'])) {
		header("location: http://localhost/profilePage.php");
	} else if (isset($_POST['logOutBtn'])) {

		header("location: http://localhost/logoutPage.php");

	} else if (isset($_POST['registerBtn'])) {
		header("location: http://localhost/registrationPage.php");
	}
	?>

	<div class="contact">

		<form action="#" method="post">
			<table id="tbl" align="center">
				<tr>
					<td>
					<dt ><a id="homeBtn" href="homePage.php">Home </a></dt>
					</td>
					<td>
					<input type="text"  name="searchBar" id="searchBar" placeholder="Search..." >
					</td>
					<td>
					<input type="submit" name="searchBtn" id="searchBtn" value="Search">
					</td>
					<?php error_reporting('E_ALL ^ E_NOTICE');
						if ($_SESSION['login_flag'] == 0) {
							echo "<td><input type=\"submit\" name=\"logInBtn\" id=\"logInBtn\" value=\"Login\"></td>";
							echo "<td> <input type=\"submit\" name=\"registerBtn\" id=\"registerBtn\" value=\"Register\"></td></tr>";

						} else if ($_SESSION['login_flag'] == 1) {
							echo "<td> <input type=\"submit\" name=\"profileBtn\" id=\"profileBtn\" value=\"Profile\"></td>";
							echo "<td> <input type=\"submit\" name=\"logOutBtn\" id=\"logOutBtn\" value=\"Logout\"></td></tr>";
						}
					?>
			</table>
			<ul id="menu">
				<?php include'connection.php';
$result = mysql_query("SELECT * FROM category");
$count=1;
while($row = mysql_fetch_array($result)) {
if($row['parent_category']==0){
echo "<li><a href=\"BrowsePage.php?category_id=" . $row['category_id'] . "\">" . $row['category_name']. "</a><span class=\"darrow\">&#9660;</span>";
				?>
				<ul>
					<?php
					include 'connection.php';
					$result2 = mysql_query("SELECT * FROM category");
					while ($row = mysql_fetch_array($result2)) {
						if ($row['parent_category'] == $count)
							// echo "<li><a href=\"\">" . $row['category_name']. "</a></li>";
							echo "<li><a href=\"BrowsePage.php?category_id=" . $row['category_id'] . "\">" . $row['category_name'] . "</a></li>";
					}
				?>
				</ul>
				<?php }$count++;} ?>
				</li>
			</ul>
		</form>
	</div>
</html>