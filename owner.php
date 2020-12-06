<?php include("connection.php");?>
<?php
$message="";


 $ownerqry = mysqli_query($conn, "select * from owner");
//print_r($ownerresult);
 $totalRecords =  mysqli_num_rows($ownerqry);
	$currentpage=1;
	$recordperpage=5;
	
	if(isset($_GET['page']))
	{
		$currentpage = $_GET['page'];
	}
	
	$totalpage = ceil($totalRecords/$recordperpage);
	
	$startIndex = ($currentpage-1)*$recordperpage;
	$owner = mysqli_query($conn,"select * from owner limit $startIndex, $recordperpage");
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AUCTION - Property Owner</title>

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
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Property Owner</h4>
								 <a style="color:black;" href="add_owner.php"><button type="submit" class="btn btn-info btn-fill pull-right"><i class="pe-7s-plus"></i>&nbsp;&nbsp;Add</button></a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                     <thead align="center">
									<td><b>S.No.</b></td>
									<td><b>Name</b></td>
									<td><b>Property Id</b></td>
									<td><b>Purchase Date</b></td>
									<td><b>Purchase Amount</b></td>
									<td><b>Area</b></td>
									<td><b>Actions</b></td>
								</thead>
								<?php $SNO = ($currentpage-1)*$recordperpage+1;?>
								<?php while ($ownerresult = mysqli_fetch_assoc($owner)) {?>
                                    <tr align="center">
										<td><?php echo $SNO; ?></td>
										<td><?php echo $ownerresult['name'];?></td>
										<td><?php echo $ownerresult['property_id'];?></td>
										<td><?php echo $ownerresult['purchase_date'];?></td>
										<td><?php echo $ownerresult['purchase_amt'];?></td>
										<td><?php echo $ownerresult['area'];?></td>
										<td><a style="text-decoration:none;" rel="tooltip" title="View" data-placement="bottom" target="" href="view_owner.php?id=<?php echo $ownerresult['id']?>"><i class="pe-7s-look"></i></a> | <a style="text-decoration:none; color:green;" rel="tooltip" title="Edit" data-placement="bottom" target="" href="edit_owner.php?id=<?php echo $ownerresult['id']?>"><i class="pe-7s-note"></i></a> | <a style="color:red;text-decoration:none;" rel="tooltip" title="Delete" data-placement="bottom" target="" href="owner_action.php?delete_id=<?php echo $ownerresult['id']; ?>" onclick="javascript:return confirm('Are you sure to delete this owner!');"><i class="pe-7s-trash"></i></a> | <a style="text-decoration:none;" href="owner_action.php?status_id=<?php echo $ownerresult['id'];?>">
										<?php
										if($ownerresult['status']==1){
											echo "<span style='color:red;' rel='tooltip' title='Inactive' data-placement='bottom' target=''><i class='pe-7s-close-circle'></i></span>";
										}
										else{
											echo "<span style='color:green;' rel='tooltip' title='Active' data-placement='bottom' target=''><i class='pe-7s-check'></i></span>";
										}
										?>
										</a></td>
									</tr>
									<?php $SNO++;}?>
									<?php if($totalRecords==0){?>
									<tr>
									<td colspan="9" align="center"><h5>No Records Found</h5></td>
									</tr>
									<?php } ?>
                                    </tr>
                                </table>

                            </div>
                        </div>
								<br>
								<br>
						<div align="center">
								<?php if ($totalpage>1) { ?>
								<?php for ($i=1;$i<=$totalpage;$i++) {?>
								<a href ="owner.php?page=<?php echo $i;?>"><input type="submit" name="paging" value="<?php echo $i;?>" style="padding:5px 10px;background-color:<?php echo($currentpage==$i)?"#2F4F4F":"#708090";?>;border:1px solid cyan;color:cyan;"> </a>
								<?php }?>
								<?php }?>
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


</html>
