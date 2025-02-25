<?php
$host="localhost";
$username="root";
$password="";
$dbname= "discuss";

$conn = new mysqli($host,$username,$password,$dbname);
if ($conn->connect_error) {
    echo "not connected!";
}
echo "db connected!";
?>