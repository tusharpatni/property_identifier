<?php include("connection.php");?>
<?php
if(isset($_POST['search']))
{
	$valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = mysqli_query($conn,"SELECT * FROM owner WHERE property_id LIKE \"%$valueToSearch%\" OR name LIKE \"%$valueToSearch%\" OR purchase_date LIKE \"%$valueToSearch%\" OR purchase_amt LIKE \"%$valueToSearch%\" OR area LIKE \"%$valueToSearch%\" GROUP BY name, property_id, purchase_date, purchase_amt, area");
    $search_result = filterTable($query);
}
else {
    $query = mysqli_query($conn,"SELECT * FROM owner");
    $search_result = filterTable($query);
}
function filterTable($query){
    $filter_Result = $query;
    return $filter_Result;
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AUCTION - Dashboard</title>

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
                    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
                </div>
        <?php include ("header.php");?>
		 </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Details</h4>
								<form action="dashboard.php" method="post">
									<input type="text" name="valueToSearch"  size="50" placeholder="Enter owner name, property id, area"><br><br>
									<input type="submit" name="search" value="Filter"><br><br>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                     <thead align="center">
									<td><b>Name</b></td>
									<td><b>Property Id</b></td>
									<td><b>Purchase Date</b></td>
									<td><b>Purchase Amount</b></td>
									<td><b>Area</b></td>
								</thead>
								<?php while($ownerresult = mysqli_fetch_array($search_result)) {?>
                                    <tr align="center">
										<td><?php echo $ownerresult['name'];?></td>
										<td><?php echo $ownerresult['property_id'];?></td>
										<td><?php echo $ownerresult['purchase_date'];?></td>
										<td><?php echo $ownerresult['purchase_amt'];?></td>
										<td><?php echo $ownerresult['area'];?></td>
									</tr>
									<?php } ?>
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


</html>
