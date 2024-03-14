<?php
//notification send
function sendNotification($conn, $title, $message, $link)
{
    $time = round(microtime(true) * 1000);
    $sql = "INSERT INTO notification(title,message,link,time) values ('$title','$message','$link','$time')";
    $conn->query($sql);
}
?>