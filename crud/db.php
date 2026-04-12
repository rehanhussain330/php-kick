<?php 

$conn = new mysqli("localhost","root","","test_db");

if($conn->connect_error){
    die("connection failed!".$conn->connect_error);
}