<?php session_start();?>	
<?php  include'topBar.php';  ?> 
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style type="text/css">
#username, #password, #email, #user_id, #registration_date, #new_username, #new_password {
		width: 250px;
		margin-bottom: 15px;
		background:#d2e4f4;
        border:0px solid #dbdbdb;
        color: #16568d;
		height: 30px;
		border-radius: 8px;
		box-shadow: 1px 2px 3px;
		position: relative;
		top:-25px;
		}
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
		top:220px;
	right:100px;
	}
	#item {
		width: 2px;
		background: #FFF;
		margin-bottom:4px;
		color: #207cca;position: relative;
		text-align: center;
		top: -28px;
		font-size: 15px;
	}
	.boxed {
         border: 1px solid white ;
	   padding: 70px 70px;
		box-shadow: 1px 2px 3px #207cca;
		border-radius: 10px;
		position: relative;
		width:400px;
		height: 200px;
		left:350px;
		top:80;
}
	#header{
		width: 2px;
		background: #FFF;
		margin-bottom:4px;
		color: #207cca;position: relative;
		text-align: center;
		top: -56px;
		font-size: 15px;
		left:140px;
	}
</style>
</head>	




<?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>


<div class="boxed">  		
<form  name="input1"action="check1.php" method="post">
      <table id="tbl" align="center">
       <tr><td id="header"><h1>Login</h1></td></tr>
       <tr><td id="item">Email:</td><td><input type="text" name="email" id="email"></td></tr> <input  readonly type="text" name="c1" id="c1" size="20" style="border: 0px">
       <tr><td id="item">Password:</td><td><input type="password" name="pass" id="password"></td></tr><input  readonly type="text" name="c2" id="c2" size="20" style="border: 0px">
       <tr><td><input type="submit" name="login" id="submit" value="Login"></td></tr>
      </table>
     </form>
	</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#login').click(function() {
					var e = 0;
					var chk = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					var email_test = document.getElementById('email').value;
					var pass_test = document.getElementById('pass').value;
					if (!chk.test(email_test) || email_test == '') {
						if (email_test == '')
							c1.value = "Email is empty";
						else
							c1.value = "Email is invalid";
						e++;
					} else
						c1.value = "";

					if (pass_test == '') {
						e++;
						c2.value = "Empty Password";
						//return false;
					}

					if (e > 0)
						return false;

					return true;
				});
			});
		</script>
</html>