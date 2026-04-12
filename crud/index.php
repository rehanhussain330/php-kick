<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>


<a href="form.php">Add New</a>

<div class="row">
    <div class="col-md-6 mx-auto">
        <table class="table">
   <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
   </thead>
   <tbody>
   
   <?php  

   include "db.php";

    $query = "SELECT * FROM users";

    $records = mysqli_query($conn, $query);

    while($record = mysqli_fetch_assoc($records)){
        $id = $record['id'];
        $name = $record['name'];
        $email = $record['email'];
        echo <<<END

        <tr>
            <td>$name</td>
            <td>$email</td>
            <td>
                <a href="form.php?id=$id" class="btn btn-warning">Edit</a>
                <a href="delete.php?id=$id" class="btn btn-danger">Delete</a>
            </td>
        </tr>

        END;
    }

    ?>

   </tbody>
</table>

    </div>
</div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>