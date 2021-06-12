<?php
function handleError($errno, $errstr) {
    echo "<div class='alert alert-warning'><b>The application has encountered an error :(</b><br>
            Don't worry, its just a configuration error.
            We are working on it ASAP.</div>";
    die();
}
//set_error_handler("handleError");

if($_SERVER['HTTP_HOST']==='localhost'){
    $conn = new mysqli('localhost','root','','updates');
    //$conn = new mysqli('den1.mysql4.gear.host', 'updatescry', 'Uz078j-Lfb!7', 'updatescry');
}
else if($_SERVER['HTTP_HOST']==='updates.cryosoft.co.ke'){
    $conn = new mysqli('den1.mysql4.gear.host', 'updatescry', 'Uz078j-Lfb!7', 'updatescry');
}
else{
    $conn = new mysqli('localhost','root','','updates');
}

$conn->set_charset('utf8mb4');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
