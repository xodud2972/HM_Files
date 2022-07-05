<?php

	function db_open(){

		$host = "localhost";
		$user = "root";
		$password = "dkssud22@@";
		$dataname = "peopledb";

		$db=mysqli_connect($host,$user,$password) or die ("ERROR: Could not connect to the database");
		mysqli_select_db($db, $dataname);
		return $db;
	}


	function que($db, $Qry){
		mysqli_query($db, "set names utf8");
		$que = mysqli_query($db, $Qry);
		return $que;
	}

	
	function que_close($db){
		mysqli_close($db);
	}
	
?>