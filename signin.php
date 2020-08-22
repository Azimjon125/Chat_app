<?
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login to your account</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.css"> -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
 -->
<!-- <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|3d-float">
     -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/signin.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>





<body class="font-effect-anaglyph">
	<div class="signin-form">
<form method="post" action="">
		<div class="form-header">
			<h2>Sign In</h2>
			<p>Login To MyChat</p>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" placeholder="azim.xacker97@gmail.com" autocomplete="off" required="required">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="pass" placeholder="Password" autocomplete="off" required="required">
		</div>
<div class="small">
	Forgot Password? <a href="forgot_pass.php"> Click here</a>
</div><br>
<div class="form-group">
	<button class="btn btn-primary  btn-block btn-lg" name="sign_in">Sign In</button>
</div>
<?
include 'signin_user.php';
?>
</form>
<!-- form tugadi -->
<div class="text-center small" style="color: #67428B; margin-top: 20px; background-color: #eee; font-size: 20px;">Don't have an account <a href="signup.php"> Create one</a></div>
	

	</div>
</body>
</html>