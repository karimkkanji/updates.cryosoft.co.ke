<?php
require './_cred.php';
$request = file_get_contents('php://input');
$requrl ="https://api.telegram.org/bot1530706781:AAHAlc-7iZwBDVn-u2J-nRMnCAxve057wT4/";
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($request, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
$user=0;
foreach ($jsonIterator as $key => $val) {
    if (is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
        if($key==='id'){
            $userId=$val;
        }
        if ($key === 'username') {
            $usernameTg = $val;
        }
        if($key==='message_id'){
            $message_id=$val;
        }
        if($key==='text'){
            if($val==='/start'){
                $sql = "SELECT * FROM telegram_notifs where telegram_id = '$userId'";
                $result = $conn->query($sql);
                if ($result->num_rows >0) {
                    $htmlcode =urlencode("<b>You are already REGISTERED</b>");
                }
                else{
                $stmt = $conn->prepare("INSERT INTO telegram_notifs(telegram_username,telegram_id) VALUES (?, ?)");
                    $stmt->bind_param("ss", $username, $id);
                    $username = $usernameTg;
                    if($username==''){
                        $username=NULL;
                    }
                    $id =$userId;
                    if ($stmt->execute()) {
                        $htmlcode =urlencode("<b>Welcome to Year Progress.</b>\n\nYou will receive Year Progress Updates Daily\n\nPowered by <a href='https://cryosoft.co.ke'>Cryosoft Corporation</a>");
                    }
                    else{
                        $htmlcode =urlencode("<b>An error has occured.</b>\n\nYou will NOT receive Year Progress Updates.\n\nTry the following to solve the problem:\n 1. Set a <a href='https://telegram.org/faq#q-what-are-usernames-how-do-i-get-one'>username</a> and try again\n\nPowered by <a href='https://cryosoft.co.ke'>Cryosoft Corporation</a>");
                    }
                }
                    $payload =  file_get_contents($requrl."sendMessage?chat_id=".$userId."&text=".$htmlcode."&parse_mode=HTML");
            }
            else if($val==='/stop'){
                $sqlupdate = "DELETE from telegram_notifs where telegram_id='$userId'";
                        if ($conn->query($sqlupdate) === TRUE) {
                            $htmlcode =urlencode('<b>You have Successfully UNSUBSCRIBED</b>');
                            
                        } else {
                            $htmlcode = urlencode('❌ : <b>An error has occured. We cannot process your Deregistration.</b> Try again later.');
                        }
                        $payload =  file_get_contents($requrl."sendMessage?chat_id=".$userId."&text=".$htmlcode."&parse_mode=HTML");
            }
            if($payload){
                http_response_code(202);
            }
            else{
                http_response_code(200);
            }
        }
    }
}