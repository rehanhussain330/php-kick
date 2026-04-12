<?php 

$conn = new mysqli("localhost","root","","test_db");

if($conn->connect_errror){
    die("connection failed!".$conn->connect_error);
}