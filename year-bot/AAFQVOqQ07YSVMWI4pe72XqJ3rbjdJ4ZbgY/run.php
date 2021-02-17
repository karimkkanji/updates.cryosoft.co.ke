<?php
require './_cred.php';
$requrl ="https://api.telegram.org/bot1530706781:AAFQVOqQ07YSVMWI4pe72XqJ3rbjdJ4ZbgY/";
$now = time(); // or your date as well
$endyear = strtotime("2021-12-31");
$datediff = $endyear-$now;
$yearTot = date('L')?366:365;
$remaining = $yearTot - round($datediff / (60 * 60 * 24));
$num= floor(20*($remaining/$yearTot));
$percentage = ($remaining/$yearTot)*100;
$remaining=(20-$num);
$complete = "█";
$incomplete ="░";
$message = "";
for ($num; $num--; $num>0){
    $message.=$complete;
}
for ($remaining; $remaining--; $remaining>0){
    $message.=$incomplete;
}
$message.="\t<b>".floor($percentage)."%</b>";
$message=urlencode($message);
$sqlteleg = 'SELECT telegram_id FROM telegram_notifs WHERE telegram_id IS NOT NULL';
    $resultteleg = $conn->query($sqlteleg);
    if ($resultteleg->num_rows > 0) {
        while ($rowteleg = $resultteleg->fetch_assoc()) {
            $sql_lastrun = "SELECT * from last_update WHERE id ='1'";
            $result_last = $conn->query($sql_lastrun);
            if($result_last->num_rows>0){
                while($row_last_run=$result_last->fetch_assoc()){
                    if($percentage>$row_last_run['percentage']){
                        if(updateProgress($conn,$percentage,$now)){
                            $user= $rowteleg['telegram_id'];
                            $payload = file_get_contents($requrl . "sendMessage?chat_id=" . $user . "&text=" . $message . "&parse_mode=HTML");
                            if ($payload) {
                                http_response_code(200);
                            } else {
                                http_response_code(202);
                            }
                        }
                    }
                }
            }


        }
    }
    function updateProgress($conn,$percentage,$now){
        $sql ="UPDATE last_update SET percentage='$percentage',last_run_time='$now' WHERE id='1'";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
?>