<?php
global $getCurrentHost,$getCurrentURL;
$getCurrentHost=$_SERVER['HTTP_HOST'];
$getCurrentURL="/Testing/Web_Geolifecare.com";
//echo 'website is under construction... ';
//exit; 
$host = "localhost";
if($getCurrentHost=='localhost')
{
    $username = "root";
    $password = "";
}
else
{
    $username = "geolifec_webuser";
    $password = "l0#ksZKGAv*h";
}

/////////////////////////////////
$db = "geolifec_webdb";
global $DB_LINK;
// Create connection
$DB_LINK = new mysqli($host, $username, $password, $db);
if (!$DB_LINK)
{
    die("Server Busy kindly wait.." . mysqli_connect_error());
	   exit;
}
$host1 = "localhost";
if($getCurrentHost=='localhost')
{
    $username1 = "root";
    $password1 = "";
}
else
{
    $username1 = "geolifec_comuser";
    $password1 = "rbLePgs7bj~s";
}
/////////////////////////////////
$db1 = "geolifec_company";
global $DB_LINK1;
// Create connection
$DB_LINK1 = new mysqli($host1, $username1, $password1, $db1);
if (!$DB_LINK1)
{
	die("Server Busy kindly wait.." . mysqli_connect_error());
	exit;
}
?>