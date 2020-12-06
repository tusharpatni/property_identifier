<?php include("connection.php");

if(isset($_GET['delete_id'])){
	$delete_id=$_GET['delete_id'];
	mysqli_query($conn,"delete from property where id = $delete_id");
	$_SESSION['msg']="<span style='color:red;'>Property deleted successfully</span>";
	header("location:property.php");
}
if(isset($_GET['status_id'])){
	$status_id=$_GET['status_id'];
	$userData=mysqli_fetch_assoc(mysqli_query($conn,"select * from property where id = $status_id"));
	if($userData['status']==1){
		$newstatus=0;
	}
	else{
		$newstatus=1;
	}
	$_SESSION['msg']="<span style='color:green;'>Status updated successfully</span>";
	mysqli_query($conn,"update property set status = $newstatus where id = $status_id");
	header("location:property.php");
}
?>