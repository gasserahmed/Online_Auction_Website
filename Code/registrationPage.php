<?php  include'topBar.php'
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

<?php if (isset($_GET["alert"])):
?>
<script type="text/javascript">
alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");</script>
<?php endif; ?>

	<body>

		<script type="text/javascript">
			function codeAddress() {
				fname.value = sessionStorage.getItem("fname");
				lname.value = sessionStorage.getItem("lname");
				phone.value = sessionStorage.getItem("phone");
				shipping_address.value = sessionStorage.getItem("shipping_address");
				home_address.value = sessionStorage.getItem("home_address");
				bank.value = sessionStorage.getItem("bank");
				rtn.value = sessionStorage.getItem("rtn");
			}


			window.onload = codeAddress;
		</script>

		<div class="contact" >
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			;

			<form name="input2"action="check2.php" method="post">
				<br><fieldset style="color:#16568d">
					<legend style="color:#207cca size:50">
						Registration
					</legend>
					<table>

						<tr>
							<td><h4 style="color:#207cca">First Name:</h4></td><td>
							<input  type="text" name="fname" id="fname" size="30">
							<input  readonly type="text" name="c1" id="c1" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Last Name:</h4></td><td>
							<input type="text" name="lname" id="lname" size="30">
							<input  readonly type="text" name="c2" id="c2" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Password:</h4></td><td>
							<input type="password" name="pass" id="pass" size="30">
							<input  readonly type="text" name="c3" id="c3" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Email:</h4></td><td>
							<input type="text" name="email" id="email"  size="30">
							<input  readonly type="text" name="c4" id="c4" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Phone No:</h4></td><td>
							<input type="text" name="phone" id="phone"  size="30">
							<input  readonly type="text" name="c5" id="c5" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Shipping Address:</h4></td><td>
							<input type="text" name="shipping_address" id="shipping_address" size="30">
							<input  readonly type="text" name="c6" id="c6" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Home Address:</h4></td><td>
							<input type="text" name="home_address" id="home_address" size="30">
							<input  readonly type="text" name="c7" id="c7" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">Bank Account No:</h4></td><td>
							<input type="number" min="1" max="999999999999" name="bank" id="bank" size="30">
							<input  readonly type="text" name="c8" id="c8" size="20" style="border: 0px">
							</td>
						</tr>
						<tr>
							<td><h4 style="color:#207cca">RTN:</h4></td><td>
							<input type="number" min="1" max="999999999" name="rtn" id="rtn" size="30">
							<input  readonly type="text" name="c9" id="c9" size="20" style="border: 0px">
							</td>
						</tr>
					</table>
					<input type="submit" name="logup" id="logup" value="Sign-Up">
				</fieldset>
			</form>

			<div id="er2"></div>

		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#logup').click(function() {

					var fname_test = document.getElementById('fname').value;
					var lname_test = document.getElementById('lname').value;
					var pass_test = document.getElementById('pass').value;
					//pass_test=md5(pass_test);
					var email_test = document.getElementById('email').value;
					var phone_test = document.getElementById('phone').value;
					var shipping_address_test = document.getElementById('shipping_address').value;
					var home_address_test = document.getElementById('home_address').value;
					var bank_test = document.getElementById('bank').value;
					var rtn_test = document.getElementById('rtn').value;
					var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					var e = 0;
					sessionStorage.setItem("fname", document.getElementById('fname').value);
					sessionStorage.setItem("lname", document.getElementById('lname').value);
					sessionStorage.setItem("email", document.getElementById('email').value);
					sessionStorage.setItem("phone", document.getElementById('phone').value);
					sessionStorage.setItem("shipping_address", document.getElementById('shipping_address').value);
					sessionStorage.setItem("home_address", document.getElementById('home_address').value);
					sessionStorage.setItem("bank", document.getElementById('bank').value);
					sessionStorage.setItem("rtn", document.getElementById('rtn').value);

					if (fname_test == '') {
						c1.value = "First name is empty!";
						e++;
					} else
						c1.value = "OK";

					if (lname_test == '') {
						c2.value = "Last name is empty!";
						e++;
					} else
						c2.value = "OK";

					if (!chk.test(email_test) || email_test == '') {
						if (email_test == '')
							c4.value = "Email is empty!";
						else
							c4.value = "Email is invalid!";
						e++;
					} else
						c4.value = "OK";

					if (phone_test == '') {
						c5.value = "Phone number is empty!";
						e++;
					} else
						c5.value = "OK";

					if (shipping_address_test == '') {
						c6.value = "Shipping address is empty!";
						e++;
					} else
						c6.value = "OK";

					if (home_address_test == '') {
						c7.value = "Home address is empty!";
						e++;
					} else
						c7.value = "OK";

					if (bank_test == '') {
						c8.value = "Bank account number is empty!";
						e++;
					} else
						c8.value = "OK";

					if (rtn_test == '') {
						c9.value = "RTN is empty!";
						e++;
					} else
						c9.value = "OK";

					if (e > 0)
						return false;

					return true;

				});
				$('#login').click(function() {

					var username_test = document.getElementById('user_name1').value;
					var password_test = document.getElementById('password1').value;
					if (username_test == '') {
						$('#er').html('Empty username field!');
						return false;
					}
					if (password_test == '') {
						$('#er').html('Empty password field!');
						return false;
					}
				});
			});

		</script>
	</body>
</html>

