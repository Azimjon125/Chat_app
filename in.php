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
}
?>






<!DOCTYPE html>
<html>
	<head>
		<title>Chat</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/chat/bootstrap-css.css">
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="css/chat/js.js"></script>
	</head>
	<body>
		<div class="container-fluid h-100">

<?
include 'include/conf.php';
						$az=$_SESSION['user_email'];
$sel="select * from users where user_email='$az'";
$balj=mysqli_query($con,$sel);
while ($chiq=mysqli_fetch_array($balj,MYSQLI_ASSOC)) {
echo $chiq["user_name"];
echo $chiq["user_email"];
}
?>

			<div class="row justify-content-center h-100">
				<div class="col-md-4 col-xl-3 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
<!-- chap taraft -->
					<div class="card-body contacts_body">
						<ui class="contacts">
							<?
						$az=$_SESSION['user_email'];
include 'include/conf.php';
//$user="select * from users where user_email !='$az'";
$user="select * from users";
$run_user=mysqli_query($con,$user);
while ($row_user=mysqli_fetch_array($run_user,MYSQLI_ASSOC)) {
	$user_id=$row_user["user_id"];
    $user_name=$row_user["user_name"];
    $user_email=$row_user["user_email"];
    if ($user_email==$az) {
    	$az= $user_name;
    	$user_name="Saved Massage";
    }
    $user_profile=$row_user["user_profile"];
    $login=$row_user["log_in"];
    //$msg_status=$row_user["msg_status"];
  //   if ($msg_status=="unread") {
  // $c++;

  //   }
    //$sana="select * from users";

// $sana="SELECT COUNT(msg_status) FROM users_chat WHERE sender_username='$user_name' AND receiver_username='$az' AND msg_status='unread'";
// $g=mysqli_query($con,$sana)or die(mysql_error());
// if ($row_u=mysqli_fetch_array($g,MYSQLI_ASSOC)) {

// print_r($row_u);
// }

//$result = $con->query("SELECT COUNT(msg_status) FROM users_chat");
$result = $con->query("SELECT COUNT(msg_status) FROM users_chat WHERE sender_username='$user_name' AND receiver_username='$az' AND msg_status='unread'");
$row = $result->fetch_row();
//echo '#: ', $row[0];
//echo $az;
?>
<li class="active">
							<div class="d-flex bd-highlight">
								<div class="img_cont">
									<img src="<?=$user_profile?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
								<div class="user_info">
									<span><a href="in.php?user_name=<?=$user_name?>"><?=$user_name;?></a>  <span class="badge badge-pill badge-success"><?=$row[0];?></span></span>

									<p>
										<?
if ($login=="Online") {
	echo "<span> <i class='fa fa-circle' area-hidden='true'> </i>Online </span>";
}
else {
	echo "<span> <i class='fa fa-circle' area-hidden='true'> </i>Offline </span>";
}
?>
</p>
								</div>
							</div>
						</li>
<?
}
?>
</ui>
					</div>
<!-- CHap taraft tugadi -->

					<div class="card-footer"></div>
				</div></div>
				<!-- massage boshlandi -->
				<div class="col-md-8 col-xl-6 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								<!-- With maryam -->
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
<div class="img_cont">
									<img src="<?=$user_profile_image?>" class="rounded-circle user_img">
									<span class="online_icon"></span>
								</div>
	<form method="post">
										<div class="user_info">
									<span>Chat with <?
									if (($username==$az)or ($username=="")) {
										echo "I'm";
									}
									else 
										{
										
									echo $username;
								}
									

									?></span>
									<p><?=$total; ?> Message</p>
								</div>
		<button name="logout" class="btn btn-danger">Logout</button>
	</form>
	<?
if (isset($_POST["logout"])) {
	$update_msg=mysqli_query($con,"UPDATE users SET log_in='Offline' where user_name='$username'");
?>
<script type="text/javascript">
	window.location.href="signin.php";
</script>
<?	
	exit();
}
	?>
<!-- with maryam tugadi -->

								<div class="video_cam">
									<span><i class="fas fa-video"></i></span>
									<span><i class="fas fa-phone"></i></span>
								</div>
							</div>
							<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
							<div class="action_menu">
								<ul>
									<li><i class="fas fa-user-circle"></i> View profile</li>
									<li><i class="fas fa-users"></i> Add to close friends</li>
									<li><i class="fas fa-plus"></i> Add to group</li>
									<li><i class="fas fa-ban"></i> Block</li>
								</ul>
							</div>
						</div>

						<!-- massage endi boshlandikuuuuu -->
						<div class="card-body msg_card_body">

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
	<?
if ($user_name==$sender_username AND $username==$receiver_username) {
?>

<div class="d-flex justify-content-end mb-4">
								<div class="msg_cotainer_send">
								<?=$msg_content?>
									<span class="msg_time_send"><?=$msg_date?></span>
								</div>
								<div class="img_cont_msg">
							<img src="" class="rounded-circle user_img_msg">
								</div>
							</div>
<?
}

else if ($user_name==$receiver_username AND $username==$sender_username) {
?>
<div class="d-flex justify-content-start mb-4">
								<div class="img_cont_msg">
									<img src="" class="rounded-circle user_img_msg">
								</div>
								<div class="msg_cotainer">
								<?=$msg_content?>
									<span class="msg_time"><?=$msg_date?></span>
								</div>
							</div>
<?
}
}
?>
	</div>

<!-- massage tugadi -->

						<div class="card-footer">
							<form method="post">
							<div class="input-group">
								<div class="input-group-append">
									<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
								</div>
								<textarea name="msg_content" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<button name="submit" class="btn btn-info">
								<div class="input-group-append">
									<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
								</button>
								</div>
							</div>
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
?>
<script type="text/javascript">
	window.location.href='in.php?user_name=<?=$username?>';
</script>

<?
}
?>



	</body>
</html>