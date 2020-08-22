
<?
include 'include/conf.php';
if (isset($_POST["sign_in"])) {
	$pass= htmlentities(mysqli_real_escape_string($con,$_POST["pass"]));
	$email= htmlentities(mysqli_real_escape_string($con,$_POST["email"]));

$select_user="select * from users where user_email='$email' AND user_pass='$pass'";

$query=mysqli_query($con,$select_user);
$check_user=mysqli_num_rows($query);
if ($check_user==1) {
	
$_SESSION["user_email"]=$email;
$update_msg=mysqli_query($con,"UPDATE users SET log_in='Online' where user_email='$email'");

$user=$_SESSION["user_email"];
$get_user="select * from users where user_email='$user'";
$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);
$user_name=$row['user_name'];
?>

<script type='text/javascript'>
	window.location.href="in.php?user_name=<?=$user_name?>";
</script>

<?

}
else
{
	?>
<div class="alert alert-danger">
	<strong>Check your email and password</strong>
</div>
	<?
}






}
?>