<?php 

include "db.php";

$id = $_GET['id']??'';

if($id){
    $query = "DELETE FROM users WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "record deleted!";
    }
}