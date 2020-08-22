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
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>





<body class="font-effect-anaglyph">
	<div class="signin-form">
<form method="post" action="">
		<div class="form-header">
			<h2>Sign Up</h2>
			<p>Fill out this from and start chatting with your friends</p>
		</div>
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="user_name" placeholder="Username" autocomplete="off" required="required">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required="required">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="user_email" placeholder="azim.xacker97@gmail.com" autocomplete="off" required="required">
		</div>
		
	<div class="form-group">
			<label>Country</label>
			<select class="form-control" name="user_country">
				<option disabled="">Select a contry</option>
				<option>Uzbekistan</option>
				<option>Russian</option>
				<option>USA</option>
				<option>Korea</option>
				<option>India</option>
				<option>UK</option>
				<option>France</option>
			</select>
		</div>
<div class="form-group">
			<label>Gender</label>
			<select class="form-control" name="user_gender">
				<option disabled="">Select your gender</option>
				<option>Male</option>
				<option>Female</option>
				<option>Others</option>
			</select>
		</div>
<div class="form-group">
	<label class="checkbox-inline"> <input type="checkbox" required>I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Police</a> </label>
</div>

<div class="form-group">
	<button class="btn btn-primary  btn-block btn-lg" name="sign_up">Sign Up</button>
</div>
<?
include 'signup_user.php';
?>
</form>
<!-- form tugadi -->
<div class="text-center small" style="color: #67428B; margin-top: 20px; background-color: #eee; font-size: 20px;">Already have an account? <a href="signin.php"> Signin here</a></div>
	

	</div>
</body>
</html>