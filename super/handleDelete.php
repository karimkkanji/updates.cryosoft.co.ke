<?php
session_start();
require './_cred_main.php';
if(isset($_POST['id']) && isset($_SESSION['username'])){
    $id = $_POST['id'];
    $sql  = "DELETE from `notices` where id = '$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<div style="margin-top:10px" class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> The Notice has been Deleted!
        </div>';
    } else {
        echo '<div style="margin-top:10px" class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Couldn\'t Complete request!</strong> An error occured. '.$conn->error.'
        </div>';
    }
}
else{
    echo '<div style="margin-top:80px" class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Couldn\'t Complete request!</strong> An error occured. You might need to sign in or not all details were not provided.
</div>';
}