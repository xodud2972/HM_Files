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

    // Paging 처리시 사용하는 sql함수
    // function db_open2($sql){
	// 	$db_id="root"; 
	// 	$db_pw="dkssud22@@"; 
	// 	$db_name="peopledb"; 
	// 	$db_domain="localhost"; 
	// 	$db=mysqli_connect($db_domain,$db_id,$db_pw,$db_name) or die ("ERROR: Could not connect to the database");
	
    //     return $db->query($sql); 
		// 오른쪽에 있는것이 연산자의 왼쪽에 있는 변수로 인스턴스화되어 하나의 객체 구성원이 된다는 의미
		// 혹은 개체의 속성에 섭근한다.
		// $db 변수에 저장된 객체의 $sql을 가지고 query()메소드를 실행하는 것
    // }
?>