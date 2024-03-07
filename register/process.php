<?php
include '../database/db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['type'] == 'student') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $sql = "INSERT INTO learner (name, address, email, contact, password) 
                VALUES ('$name', '$address', '$email', '$contact', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Student registered successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($_GET['type'] == 'expertise') {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $pnum = $_POST['pnum'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $profession = $_POST['profession'];
        $institution = $_POST['institution'];

        $sql = "INSERT INTO expert (fname, lname, email, address, pnum, password, profession, institution) 
                VALUES ('$fname', '$lname', '$email', '$address', '$pnum', '$password', '$profession', '$institution')";

        if ($conn->query($sql) === TRUE) {
            echo "Expertise registered successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $username = $_POST['email']; 
    $password = $_POST['password']; 
    $type = $_GET['type']; 

    $sql_login = "INSERT INTO login_credentials (username, password, type) 
                  VALUES ('$username', '$password', '$type')";

    if ($conn->query($sql_login) === TRUE) {
        echo "Login credentials stored successfully";
    } else {
        echo "Error: " . $sql_login . "<br>" . $conn->error;
    }
}

