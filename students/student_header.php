<?php
include '../database/db_connect.php';
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT fname, profile_picture FROM learner WHERE email = '$username'";
    $sql = "SELECT fname, profile_picture FROM learner WHERE email = '$username'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $fname = $row['fname'];
            $profile = $row['profile_picture'];
        } else {
            echo "No rows returned from the database for username: $username";
        }
    } else {
        echo "Query execution failed: " . $conn->error;
    }
} else {
    echo "Username session variable is not set.";
}

$userNameDisplay = isset($fname) ? $fname : 'User';
$userNameDisplay = isset($fname) ? $fname : 'User';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin/admin_header.css">
</head>

<body>
    <?php
    include_once('../components/nav.php');
    ?>
    <div class="side-bar">
        <div class="close-side-bar">
            <i class="fas fa-times"></i>
        </div>
        <div class="profile">
            <img src="../uploads/profile/<?php echo $profile; ?>" alt="Profile Picture">
            <h3>
                <?php echo $userNameDisplay; ?>
            </h3>
            <span>student</span>
            <a href="student_profile.php" class="btn">View Profile</a>
        </div>
        <nav class="navbar">
            <a href="home.php"><i class="fas fa-home"></i><span>home</span></a>
            <a href="about.php"><i class="fas fa-question"></i><span>about us</span></a>
            <a href="courses.php"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
            <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
            <a href="contact.php"><i class="fas fa-headset"></i><span>contact us</span></a>
        </nav>
    </div>

</body>
