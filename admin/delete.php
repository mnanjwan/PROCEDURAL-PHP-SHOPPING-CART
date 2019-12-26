<?php 
	include('inc/function.php');
	$connect = connect();

	if(isset($_GET["product_id"])){
		$sql = 'DELETE FROM products WHERE product_id = "'.$_GET['product_id'].'" ';
		$res = mysqli_query($connect, $sql) or die(mysqli_error($connect));

		if(mysqli_affected_rows($connect)>0){
			header("Location:view.php");
		}
	}

	

?>