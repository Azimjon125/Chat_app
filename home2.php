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
<!-- //////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html>
<head>
	<title>My Chat </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
    	<link rel="stylesheet" type="text/css" href="css/open-iconic-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-ms-3">
			
<?
$gl_user=$_SESSION["user_email"];
$select="select * from users where user_email='$gl_user'";
$baj=mysqli_query($con,$select)or die(mysql_error());
while ($chiq=mysqli_fetch_array($baj,MYSQLI_ASSOC)) {
?>


<div style="background-color: #eee;">
	<div class="userimg">
		<img src="<?=$chiq['user_profile']?>">
		
	</div>
<div class="right-header-detail">
	<form method="post">
		<h4>&nbsp &nbsp<?=$chiq['user_name']?></h4>
			<a href="" class="btn btn-success"><span class="oi envelope-closed"></span></a>
			<a href="" class="btn btn-success"><span class="oi oi-delete"></span></a>

		<!-- <span><?=$total; ?> Message</span> &nbsp &nbsp -->
		<button name="logout" class="btn btn-danger"><!-- Logout --><span class="oi oi-account-logout"></span></button>
	</form>


<?


	
}






?>


		</div>
		
	</div>
	
</div>



</body>
</html>

