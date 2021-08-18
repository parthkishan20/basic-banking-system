<?php 
$server = "sql306.epizy.com";
$username ="epiz_29459070";
$password = "CjjLGNHzXGu3bQa";
$db = "epiz_29459070_dbsytem";

//To istablish connection with database
$con = mysqli_connect($server, $username, $password, $db);

//To check if connection is successful or not
if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
 }