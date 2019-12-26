<?php
	function connect()
	{
		$con = mysqli_connect("localhost", "root", "", "shopp");
		return $con;
	}
?>