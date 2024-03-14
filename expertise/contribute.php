<?php
session_start();
include_once('header.php');
include_once('../database/db_connect.php');

if (isset($_POST['submit'])) {
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
    }
    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_path = '../uploads/' . $_FILES['video']['name'];

    move_uploaded_file($_FILES['video']['tmp_name'], $video_path);

    $expertise_id = null;
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sql_expertise_id = "SELECT id FROM expert WHERE email = '$username'";
        $result_expertise_id = $conn->query($sql_expertise_id);
        if ($result_expertise_id->num_rows > 0) {
            $row_expertise_id = $result_expertise_id->fetch_assoc();
            $expertise_id = $row_expertise_id['id'];
            echo $expertise_id;
        }
    }

    $sql = "INSERT INTO uploaded_items (title, description, course_id, video_path, expertise_id) 
            VALUES ('$title','$description', '$course_id', '$video_path', '$expertise_id')";
    if ($conn->query($sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/expertise/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../css/expertise/playlist.css" />
</head>
<body>
    <section class="video-form">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Topic<span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="Title" class="box" />
            <p>Description<span>*</span></p>
            <input type="text" name="description" maxlength="100" required placeholder="Description" class="box" />
            <p>Select video <span>*</span></p>
            <input type="file" name="video" accept="video/*" required class="box" />
            <input type="submit" value="Upload" name="submit" class="btn" />
        </form>
    </section>
</body>
</html>
