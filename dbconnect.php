<?php
//Showing server, user name, password, database name
define('MYSQL_SERVER','localhost');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_DB','p77795gs_rig');


//Connect to mysql database
function db_connect(){
	$con = mysqli_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DB)
	or die ("ERROR: ".mysqli_error($con));

	if(!mysqli_set_charset($con,"utf8")){
		printf("ERROR: ".mysqli_error($con));
	}
	return $con;
}
?>
