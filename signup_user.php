<?
include 'include/conf.php';

if (isset($_POST["sign_up"])) {
	$name= htmlentities(mysqli_real_escape_string($con,$_POST["user_name"]));
	$pass= htmlentities(mysqli_real_escape_string($con,$_POST["user_pass"]));
	$email= htmlentities(mysqli_real_escape_string($con,$_POST["user_email"]));
	$country= htmlentities(mysqli_real_escape_string($con,$_POST["user_country"]));
	$gender= htmlentities(mysqli_real_escape_string($con,$_POST["user_gender"]));
    $rand=rand(1,2);

if ($name=="") {
	?>
	<script type="text/javascript">
		alert("We can not verify your name");
	</script>
	<?
}
if (strlen($pass)<8) {
	?>
<script type="text/javascript">
	alert("Password should be minum 8 characters");
	exit();
</script>

	<?
}

$check_email="select * from users where user_email='$email'";
$run_mail=mysqli_query($con,$check_email);
$check=mysqli_num_rows($run_mail);
if ($check==1) {
	?>
<script type="text/javascript">
	alert("Email already exist, please try again");
	window.open("signup.php",'_self');
	exit();
</script>
	<?
}

if ($rand==1) {
	$profile_pic="img/1.jpg";
}
 else if ($rand==2) {
	$profile_pic="img/2.jpg";
}

$insert="insert into users (user_name,user_pass,user_email,user_profile,user_country,user_gender)values('$name','$pass','$email','$profile_pic','$country','$gender')";
$query=mysqli_query($con,$insert)or die(mysqli_error());

if ($query) {
	?>
<script type="text/javascript">
	alert("Congratulaions <?=$name?>, your account has been created succsessfully");
	window.open("signin.php",'_self');
</script>
	<?
}
else
{
	?>
<script type="text/javascript">
	alert("Registration failed, try again");
	window.open("signup.php",'_self');
</script>
	<?
}



}
?>