<?php

define('DB_HOST','localhost');
define('DB_USER','u297028880_ys_anita');
define('DB_PASS','Youngsyndicate4521');
define('DB_NAME','u297028880_anita_db');

$conn = mysqli_connect('localhost','u297028880_ys_anita','Youngsyndicate4521','u297028880_anita_db') or die(mysqli_error());

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

?>
