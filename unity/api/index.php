<?php 
	include_once("dbb.php");

	if (isset($_POST["EmailId"]) && !empty($_POST["EmailId"]) && 
		isset($_POST["Password"]) && !empty($_POST["Password"])){

		Login($_POST["EmailId"], $_POST["Password"]);
	}

	function Login($username, $password){
		GLOBAL $con;

		$sql = "SELECT emp_id,EmailId FROM tbl_users WHERE EmailId=? AND Password=? AND Status=?";
		$st=$con->prepare($sql);

		$st->execute(array($username, $password, "2"));//encrypt password
		$all=$st->fetchAll();
		if (count($all) == 1){
			//echo "SERVER: ID#".$all[0]["emp_id"]." - ".$all[0]["EmailId"];
			echo $all[0]["emp_id"];
			exit();
		}

		//if username or password are empty strings
		echo "SERVER: error, invalid username or password";
		exit();
	}

	//if username or password is null (not set)
	echo "SERVER: error, enter a valid username & password";

	//exit():  means end server connection (don't execute the rest)
?>