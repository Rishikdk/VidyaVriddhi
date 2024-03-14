<?php
session_start();
include_once('../database/db_connect.php');

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT id FROM learner WHERE email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        if (isset($_POST['enroll'])) {
            if (isset($_GET['course_id'])) {
                $course_id = $_GET['course_id'];

                $enroll_sql = "INSERT INTO enrollments (course_id, learner_id, enrolled_date) 
                               VALUES ('$course_id', '$user_id', NOW())";

                if ($conn->query($enroll_sql) === TRUE) {
                    echo "<script>alert('Enrollment successful!');</script>"; 
                    header("Location: courses.php");
                    exit();
                } else {
                    echo "Error: " . $enroll_sql . "<br>" . $conn->error;
                }
            } else {
                echo "Course ID is not provided!";
            }
        }
    } else {
        echo "User not found!";
    }
} else {
    header("Location: login.php");
    exit();
}
