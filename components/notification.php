<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['email'])) {
    // Redirect unauthorized users to the login page
    header("location: /login");
    exit();
} else {
    include '../database/db_connect.php';

    // if (isset($_SESSION['username'])) {
//     $username = $_SESSION['username'];
//     $sql = "SELECT name, profile_picture FROM learner WHERE email = '$username'";
//     $result = $conn->query($sql);
//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $name = $row['name'];
//         $profile = $row['profile_picture'];
//     }
// }

    // $userNameDisplay = isset($name) ? $name : 'User';
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];

    $notifysql = "SELECT * from notification where email= $email limit 5";
    $result = $conn->query($notifysql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $notify = $row['notify'];
        }
    }
}

?>