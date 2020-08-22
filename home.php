<?
session_start();
include 'include/conf.php';
if (!isset($_SESSION["user_email"])) {
?>	
	<script type="text/javascript">
	//alert("<?=$_SESSION['user_email']?>  1 iwladi");
	window.location.href="signin.php";
</script>
<?
	//header("Location:signin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>My Chat - Home</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container col  main-section">
		<div class="row">
			<div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
				<div class="input-group searchbox">
					<div class="input-group-btn">
						<center>
							<a href="include/find_friends.php">
								<button class="btn btn-default search-icon" name="search_user" type="submit">Add New User</button>
							</a>
						</center>
					</div>

					
				</div>
			<div class="left-chat">
				<ul>
					<? include("include/get_users_data.php"); ?>
				</ul>
			</div>
       	</div>
		<div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
			<?
$user=$_SESSION["user_email"];
$get_user="select * from users where user_email='$user'";
$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);

$user_id=$row["user_id"];
$user_name=$row["user_name"];
			?>
<!-- USER CLICK -->
<?
if (isset($_GET["user_name"])) {
	
global $con;

$get_username=$_GET["user_name"];

$get_user="select * from users where user_name='$get_username'";

$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);

$username=$row["user_name"];
$user_profile_image=$row["user_profile"];


}

$total_messages = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (sender_username='$username' AND receiver_username='$user_name')";

$run_messages=mysqli_query($con,$total_messages);
$total=mysqli_num_rows($run_messages);
?>
<div class="col-md-12 right-header">
	<div class="right-header-img">
		<img src="<?=$user_profile_image?>">
		
	</div>
<div class="right-header-detail">
	<form method="post">
		<p><?=$username?></p>
		<span><?=$total; ?> Message</span> &nbsp &nbsp
		<button name="logout" class="btn btn-danger">Logout</button>
	</form>
	<?

if (isset($_POST["logout"])) {
	$update_msg=mysqli_query($con,"UPDATE users SET log_in='Offline' where user_name='$username'");
?>
<script type="text/javascript">
	//alert("<?=$username?>");
	window.location.href="signin.php";
</script>
<?	

	//header("location:logout.php");
	exit();
}
	?>
</div>
</div>


<div class="row">
	<div class="col-md-12 right-header-contentChat" id="scrolling_to_bottom">


<?
$update_msg=mysqli_query($con,"UPDATE users_chat SET msg_status='read' where sender_username='$username' AND receiver_username='$user_name' ");

$sel_msg="select * from users_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name' AND sender_username='$username') ORDER by 1 ASC";

$run_msg=mysqli_query($con,$sel_msg);

while ($row=mysqli_fetch_array($run_msg)) {
	
$sender_username=$row["sender_username"];
$receiver_username=$row["receiver_username"];
$msg_content=$row["msg_content"];
$msg_date=$row["msg_date"];
?>
<ul>
	<?
if ($user_name==$sender_username AND $username==$receiver_username) {
?>
<li>
	<div class="rightside-right-chat alert alert-primary" style="color: #004085;
  background-color: #cce5ff;
  border-color: #b8daff;" >
		<span><?=$username?> <small><?=$msg_date?></small></span>
	<p><?=$msg_content?></p>
	<br><br>
	</div>
</li>

<?
}

else if ($user_name==$receiver_username AND $username==$sender_username) {
?>
<li>
	<div class="rightside-left-chat alert alert-primary" style="color: #004085;
  background-color: #cce5ff;
  border-color: #b8daff;
">
		<span><?=$username?> <small><?=$msg_date?></small></span>
	<p><?=$msg_content?></p>
	<br><br>
	</div>
</li>

<?
}
?>

</ul>
<?
}
?>
		
	</div>
</div>


<div class="row">
	<div class="col-md-12 right-chat-textbox">
		<form method="post">
			<input type="text" name="msg_content" autocomplete="off"   placeholder="Write your message....">

			<button class="btn" name="submit"> <i class="fa fa-telegram" arie-hidden="true"></i> </button>
		</form>
	</div>
</div>
</div>
</div>
</div>

	

<?
if (isset($_POST["submit"])) {
	

	$msg=htmlentities($_POST["msg_content"]);

if ($msg=="") {
?>
<div class="alert alert-danger">
	<strong><center>Message was unable to send</center></strong>
</div>
<?
}


else if (strlen($msg)>100) {
?>
<div class="alert alert-danger">
	<strong><center>Message was unable to send</center></strong>
</div>
<?
}
 

else
{
	$insert="insert into users_chat ( sender_username, receiver_username, msg_content, msg_status, msg_date) values('$user_name','$username','$msg','unread',NOW())";

	$run_insert=mysqli_query($con,$insert);
}

}

?>




<script >
	$('#scrolling_to_bottom').animate({
		scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);
</script>
<script type="text/javascript">
	$(document).ready(function () {
		var height=$(window).height();	
		$('.left-chat').css('height',(height - 92) + 'px');
		$('.right-header-contentChat').css('height',(height - 160) + 'px');
</script>






</body>
</html>