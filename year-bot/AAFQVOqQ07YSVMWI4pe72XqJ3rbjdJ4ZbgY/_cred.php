<?php
function handleError($errno, $errstr) {
    echo "<div class='alert alert-warning'><b>The application has encountered an error :(</b><br>
            Don't worry, its just a configuration error.
            We are working on it ASAP.</div>";
    die();
}
//set_error_handler("handleError");

if($_SERVER['HTTP_HOST']==='localhost'){
    $conn = new mysqli('localhost','root','','yearprogress');
}
else if($_SERVER['HTTP_HOST']==='updates.cryosoft.co.ke'){
    $conn = new mysqli('den1.mysql2.gear.host', 'yearprogress', 'Es05hfV~fve-', 'yearprogress');
}
else{
    $conn = new mysqli('localhost','root','','yearprogress');
    //$conn = new mysqli('den1.mysql4.gear.host', 'masiri', 'Sk00y8Vva-~E', 'masiri');
}

$conn->set_charset('utf8mb4');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
