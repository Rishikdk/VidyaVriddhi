<?php
include '../database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['type'] == 'student') {
        extract($_POST);
        $profilePicture = uploadProfile();
        $password1 = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO learner (fname,lname, address, email, contact, password, profile_picture,description) 
                VALUES ('$fname','$lname', '$address', '$email', '$contact', '$password1', '$profilePicture', '$description')";
        // $conn->query($sql);
        if ($conn->query($sql) === TRUE) {

            echo "Student registered successfully<br>";
            login_credentials($conn);

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }




    } elseif ($_GET['type'] == 'expertise') {
        extract($_POST);
        $document = uploadDocument();
        $profilePicture = uploadProfile();
        $password1 = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO expert (fname,lname,email,address, pnum, password,profession,institution, profile_picture,document,description) 
                VALUES ('$fname','$lname','$email','$address', '$contact', '$password1', '$profession','$institution','$profilePicture','$document', '$des')";
        // $conn->query($sql);
        if ($conn->query($sql) === TRUE) {

            echo "Expertise registered successfully<br>";
            login_credentials($conn);

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


}

function login_credentials($conn)
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $type = $_GET['type'];

        $sql = "INSERT INTO login_credentials (username, password, type) 
                      VALUES ('$username', '$password', '$type')";
        if ($conn->query($sql) === TRUE) {
            echo "Login credentials stored successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

    }

}

function uploadProfile()
{

    $target_dir = "../uploads/";
    $target_dir1 = "uploads/profile";
    $unique = uniqid();
    $target_file = $target_dir . $unique;
    $target_file1 = $target_dir1 . $unique;
    // $imageFileType = strtolower(pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file)) {
        return $target_file1;
    } else {
        return 0;
    }
}

function uploadDocument()
{

    $target_dir = "../uploads/";
    $target_dir1 = "uploads/profile";
    $unique = uniqid();
    $target_file = $target_dir . $unique;
    $target_file1 = $target_dir1 . $unique;
    // $imageFileType = strtolower(pathinfo($_FILES["profilePic"]["name"], PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) {
        return $target_file1;
    } else {
        return 0;
    }
}