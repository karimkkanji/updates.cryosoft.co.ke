<?php
function handleError($errno, $errstr) {
    echo "<div class='alert alert-warning'><b>The application has encountered an error :(</b><br>
            Don't worry, its just a configuration error.
            We are working on it ASAP.</div>";
    die();
}
//set_error_handler("handleError");

if($_SERVER['HTTP_HOST']==='localhost'){
    //$conn = new mysqli('den1.mysql6.gear.host','cryosoft','Wj70418?V8?Q','cryosoft');
    $conn = new mysqli('localhost','root','','agrikenya');
    }
else if($_SERVER['HTTP_HOST']==='updates.cryosoft.co.ke'){
    $conn = new mysqli('den1.mysql5.gear.host', 'agrikenya', 'Fk2296!pV_l4', 'agrikenya');
}
    else{
    //place server config here for external hosting
        $conn = new mysqli('localhost','root','','agrikenya');
    }
$conn->set_charset('utf8mb4');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

