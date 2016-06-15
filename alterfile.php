<?php
include_once('config-knockbean/databaseValues.php');
$conn = @mysql_pconnect($hostName,$dbUserName,$dbPassword) or die("Database Connection Failed<br>". mysql_error());

mysql_select_db($databaseName, $conn) or die('DB not selected'); 


echo mysql_query("ALTER TABLE `rs_test_table,` ADD `brand_val_id` LONGTEXT NOT NULL AFTER `attr_val_id` ");
echo "<br>";

mysql_close();

 ?>