<?php
include '../database/db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_GET['type'] == 'student') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $targetDirectory = "../uploads/profile/"; 
        $profilePicture = basename($_FILES["pimg"]["name"]);
        $targetFile = $targetDirectory . $profilePicture;

        if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $targetFile)) {
            echo "The file ". $profilePicture. " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $sql = "INSERT INTO learner (name, address, email, contact, password, profile_picture) 
                VALUES ('$name', '$address', '$email', '$contact', '$password', '$profilePicture')";

        if ($conn->query($sql) === TRUE) {
            echo "Student registered successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }elseif ($_GET['type'] == 'expertise') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $pnum = $_POST['pnum'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
            $profession = $_POST['profession'];
            $institution = $_POST['institution'];
            $decription = $_POST['des'];

            $targetDirectory = "../uploads/profile/";

            $profilePicture = basename($_FILES["pimg1"]["name"]);
            $document = basename($_FILES["doc"]["name"]);
            
            $targetFile = $targetDirectory . $profilePicture;
            $targetFile = $targetDirectory . $document;
    
            if (move_uploaded_file($_FILES["pimg1"]["tmp_name"], $targetFile) && move_uploaded_file($_FILES["doc"]["tmp_name"], $document)) {
                echo "The file ". $profilePicture. " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $sql = "INSERT INTO expert (id, fname, lname, email, address, pnum, password, profession, institution, profile_picture, document, description) 
            VALUES ('$unique_id', '$fname', '$lname', '$email', '$address', '$pnum', '$password', '$profession', '$institution', '$profilePicture', '', '')";

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
