<?php   
    $host   = "mysql:host=localhost;dbname=u297028880_anita_db";
	$user   = "u297028880_ys_anita";
	$pass   = "Youngsyndicate4521";
	$option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	try{
		$con = new PDO($host,$user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){ echo $e.getMessage(); }
?>