<?php

//echo 'website is under construction... ';
//exit; 
$host = "localhost";
$username = "gnfmaste_nuser";
$password = "MtuUA-(a,[iW";

/////////////////////////////////
$db = "gnfmasterdom_new_db";



global $DB_LINK;
// Create connection
$DB_LINK = new mysqli($host, $username, $password, $db);
if (!$DB_LINK) 
{
    die("Server Busy kindly wait.." . mysqli_connect_error());
	exit;
}

$host1 = "localhost";
$username1 = "gnfmasterdom_alluser";
$password1 = "H4BD00LPfne!";

/////////////////////////////////
$db1 = "gnfmasterdom_comdb";



global $DB_LINK1;
// Create connection
$DB_LINK1 = new mysqli($host1, $username1, $password1, $db1);
if (!$DB_LINK1) 
{
    die("Server Busy kindly wait.." . mysqli_connect_error());
	exit;
}



 
?>