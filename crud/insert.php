<?php 

include "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $check_record = "SELECT * FROM users WHERE name = '$name' AND email = '$email'";

    $record = mysqli_query($conn, $check_record);

    if(mysqli_num_rows($record) > 0){
        echo "record already exists!";
    }else{
        $query = "INSERT INTO users(name, email) VALUES('$name','$email')";

        $result = mysqli_query($conn, $query);

        if($result){
            echo "record inserted successfully!";
             header("Location:index.php");
        }else{
            echo "failed to run query!";
        }
    }
}