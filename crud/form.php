<?php 

$id = $_GET['id']??'';
include "update.php";
include "insert.php";

?>
<div class="row mt-5">
    <div class="col-md-6 mx-auto">
        <div class="form">
            <form class="form" method="POST">
               
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $name??'' ?>" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $email??'' ?>" placeholder="Email">
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-success"><?= isset($id)?'Update':'Add' ?></button>
                </div>
            </form>
        </div>
    </div>
</div>