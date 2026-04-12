<?php 

session_start();

$conn = new mysqli("localhost","root","","test_db");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
   if($_POST['token'] == $_SESSION['token']){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if(!empty($name) && !empty($phone) && !empty($email)){
            $query = "INSERT INTO users(name, email, phone) VALUES('$name','$email','$phone')";
            $result = mysqli_query($conn, $query);
            if($result){
                echo "Record Inserted Successfully!";
            }else{
                echo "Failed to run query";
            }
        }
    $_SESSION['token'] = md5(uniqid(rand(),true));
   }

}

$_SESSION['token'] = md5(uniqid(rand(),true));

?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="phone">Phone</label>
        <input type="text" name="phone">
    </div>
    <div>
        <button type="submit">submit</button>
    </div>
</form>


<table>
    <tr>
        <th>SNO</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php 

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    while($data = mysqli_fetch_assoc($result)){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        echo <<<END

        <tr>
         <td>$name</td>
         <td>$email</td>
         <td>$phone</td>
        </tr>

        END;
    }

    ?>
</table>


    <?php 

    $query = "SELECT id, GROUP_CONCAT(phone SEPARATOR ', ') AS phone FROM users GROUP BY id";
    $result = mysqli_query($conn, $query);

    while($data = mysqli_fetch_assoc($result)){
        $phone = $data['phone'];
        echo <<<END

         <span>$phone</span>

        END;
    }

    ?>