<?php include("connection.php");?>
<?php
$name = "";
$property_id = "";
$purchase_date = "";
$purchase_amt = "";
$area = "";

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$ownerqry=mysqli_fetch_assoc(mysqli_query($conn,"select * from owner where id = $id"));
	$name = $ownerqry['name'];
	$purchase_date = $ownerqry['purchase_date'];
	$purchase_amt = $ownerqry['purchase_amt'];
	$area = $ownerqry['area'];
	$property_id = $ownerqry['property_id'];
}
//print_r($_POST);
if(isset($_POST['submit']))
{   		
	$name = $_POST['name'];
	$purchase_date=$_POST['purchase_date'];
	$purchase_amt=$_POST['purchase_amt'];
	$area=$_POST['area'];
	$property_id=$_POST['property_id'];
	$status = 1;
	if($name=="")
	{
		?>
		<script>
			alert('Please enter Property Owner Name !!');
		</script>
		<?php
		$status=0;
	}
	if($purchase_date==""){
		?>
		<script>
			alert('Please enter Purchase Date !!');
		</script>
		<?php
		$status=0;
	}
	if($purchase_amt==""){
		?>
		<script>
			alert('Please enter Purchase Amount !!');
		</script>
		<?php
		$status=0;
	}
	if($area==""){
		?>
		<script>
			alert('Please enter Area !!');
		</script>
		<?php
		$status=0;
	}
	if($property_id==""){
		?>
		<script>
			alert('Please Choose Property !!');
		</script>
		<?php
		$status=0;
	}
	if($status){
			$sqll = "UPDATE owner SET property_id='$property_id', name='$name', purchase_amt='$purchase_amt', purchase_date='$purchase_date', area='$area' where id='$id'";
		}
	/*echo $sqll; exit('whichuwey');*/
		$update = mysqli_query($conn,$sqll);
		?>
		<script>
			alert('Property Owner updated successfuly !!');
		</script>
		<?php
		if(update)
		header("location:owner.php");
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
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AUCTION - Edit Property Owner</title>

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
                    <a class="navbar-brand" href="owner.php">Property Owner</a>
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
                                <h4 class="title">Edit Property Owner</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form action="" method="post" enctype="multipart/form-data">
                                <table class="table table-hover">
									  <tr>
										<tr>
										  <td>Choose Property</td>
										  <td>
											<select name="property_id">
											<option value=""><--choose Property--></option>
											<?php $query=mysqli_query($conn,"select * from property where status = 1");?>
											<?php while($propertyqry=mysqli_fetch_assoc($query)){ ?>
											<option <?php if($propertyqry['id']==$property_id){ ?>selected<?php } ?> value="<?php echo $propertyqry['id']; ?>"><?php echo $propertyqry['name']; ?></option>
											<?php } ?>
											</select>
										  </td>
										</tr>
										<tr>
											<td>Enter Owner Name</td>
											<td><input type="text" name="name" autocomplete="off" value="<?php echo $name;?>"/></td>
										</tr>
										<tr>
											<td>Enter Purchase Date</td>
											<td><input type="date" name="purchase_date" autocomplete="off" value="<?php echo $purchase_date;?>"/></textarea></td>
										</tr>
										<tr>
											<td>Enter Purchase Amount</td>
											<td><input type="text" name="purchase_amt" autocomplete="off" value="₹<?php echo $purchase_amt;?>"/></td>
										</tr>
										<tr>
											<td>Enter Area</td>
										<td><input type="text" name="area" autocomplete="off" value="<?php echo $area;?>"/></td>
										</tr>
										<tr>
										<td colspan="2" align="center" style="padding-top:50px; margin-left:150px;"><button type="submit" class="btn btn-info btn-fill" name="submit">Save</button>&nbsp;&nbsp;<button type="reset" class="btn btn-info btn-fill">Reset</button></td>
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
	
	<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
  
   <script>
     CKEDITOR.replace( 'short_description' );
     CKEDITOR.replace( 'brief_description' );
   </script>

</html>
