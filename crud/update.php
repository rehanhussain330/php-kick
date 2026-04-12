<?php 

include "db.php";

$id = $_GET['id']??'';

if(isset($id)){
   
    $query = "SELECT * FROM users WHERE id = '$id'";

    $result  = mysqli_query($conn, $query);

    if($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $email = $row['email'];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $query = "UPDATE users SET name = '$name', email = '$email' WHERE id = '$id'";

        $result = mysqli_query($conn, $query);
        if($result){
            echo "record updated successfully!";
            header("Location:index.php");
        }
    }
}