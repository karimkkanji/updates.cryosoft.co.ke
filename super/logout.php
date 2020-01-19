<?php
session_start();

if(session_destroy()){
    echo "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=./\">";
}
?>
