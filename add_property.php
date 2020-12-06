<?php include("connection.php");?>
<?php
$address1 = "";
$address2 = "";
$city = "";
$state = "";
$pincode = "";

/*print_r($_POST);*/
if($_POST)
{
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];
	
	$status = 1;
	if($address1=="")
	{
		?>
		<script>
			alert('Please enter Property Address1 !!');
		</script>
		<?php
		$status=0;
	}
	if($address2=="")
	{
		?>
		<script>
			alert('Please enter Property Address2 !!');
		</script>
		<?php
		$status=0;
	}
		if($city=="")
	{
		?>
		<script>
			alert('Please enter Property City !!');
		</script>
		<?php
		$status=0;
	}
		if($state=="")
	{
		?>
		<script>
			alert('Please enter Property State !!');
		</script>
		<?php
		$status=0;
	}
		if($pincode=="")
	{
		?>
		<script>
			alert('Please enter Property Pincode !!');
		</script>
		<?php
		$status=0;
	}
	if($status){
		mysqli_num_rows(mysqli_query($conn,"insert into property set address1='$address1', address2='$address2', city='$city', state='$state', pincode='$pincode', created = now(), modified = now()"));
		?>
		<script>
			alert('Property updated successfuly !!');
		</script>
		<?php
		header("location:property.php");
	}
	else{
		?>
		<script>
			alert('Please check the errors listed below !!');
		</script>
		<?php
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<style>
      .link:hover {
      cursor: default;
      }
	</style>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AUCTION - Add Property</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <?php include ("sidebar.php");?>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="property.php">Property</a>
                </div>
                <?php include ("header.php");?>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Add Property</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="" method="post" enctype="multipart/form-data">
                                <table class="table table-hover">
									  <tr>
										<tr>
											<td class="link">Address1</td>
											<td><textarea rows="5" type="text" name="address1" class="form-control" autocomplete="off"><?php echo $address1;?></textarea></td>
										</tr>
										<tr>
											<td class="link">Address2</td>
											<td><textarea rows="5" type="text" name="address2" class="form-control" autocomplete="off"><?php echo $address2;?></textarea></td>
										</tr>
										<tr>
											<td>City</td>
											<td><input type="text" class="form-control" name="city" autocomplete="off" value="<?php echo $city;?>"/></td>
										</tr>
										<tr>
											<td>State</td>
											<td><input type="text" class="form-control" name="state" autocomplete="off" value="<?php echo $state;?>"/></td>
										</tr>
										<tr>
											<td>Pincode</td>
											<td><input type="text" class="form-control" name="pincode" autocomplete="off" value="<?php echo $pincode;?>"/></td>
										</tr>
										<tr>
											<td align="center" style="padding-top:50px; margin-left:150px;"><button type="submit" class="btn btn-info btn-fill">Save</button>&nbsp;&nbsp;<button type="reset" class="btn btn-info btn-fill">Reset</button></td>
										</tr>
									</tr>
								</table>
							  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php include("footer.php");?>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<!--<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
  
   <script>
     CKEDITOR.replace( 'address1' );
     CKEDITOR.replace( 'address2' );
   </script>-->
</html>
