<?php
$conn = new mysqli('localhost', 'root', '','updates');

header("Content-Type:application/json");

if (isset($_GET['app_name']) && $_GET['app_name']!="") {

 $app_name = $_GET['app_name'];
 $result = mysqli_query($conn,"SELECT * FROM app_updates WHERE app_name='$app_name' ORDER BY id DESC LIMIT 1");

 if(mysqli_num_rows($result)>0){
 $row = mysqli_fetch_array($result);
 $app_version = $row['app_version'];
 $changelog = $row['app_change_log'];
 $date_updated = $row['date_updated'];
 response($app_version,$changelog,$date_updated);
 mysqli_close($conn);
 }else{
 response(NULL,"No Such app exists Found",NULL);
 }
}else{
    response(NULL,"No Such app exists Found",NULL);
 }
 
function response($app_version,$changelog,$date_updated){
 $response['app_version'] = $app_version;
 $response['app_change_log'] =  $changelog;
 $response['date_updated'] = $date_updated;
 $json_response = json_encode($response);
 echo $json_response;
}