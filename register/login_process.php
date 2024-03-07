<?php
session_start();
echo "condo";
include '../database/db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    echo "condo1";
    $sql = "SELECT type FROM login_credentials WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userType = $row['type'];

        $_SESSION['userType'] = $userType;

        if ($userType === 'student') {
            echo "Redirecting to student page"; 
            header("Location: ../students/home.php");
            exit();
        } elseif ($userType === 'expertise') {
            echo "Redirecting to expertise page"; 
            header("Location: ../expertise/expertise_header.php");
            exit();
        }
        
    } else {
        echo "Invalid username or password";
    }
}

