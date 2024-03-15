<?php
session_start();
include_once ('header.php');
include_once ('../database/db_connect.php');

if (isset ($_POST['submit'])) {
    if (isset ($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
    } else {
        echo "Course ID is not provided!";
        exit(); 
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_path = '../uploads/' . $_FILES['video']['name'];

    move_uploaded_file($_FILES['video']['tmp_name'], $video_path);

    $expertise_id = null;
    if (isset ($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sql_expertise_id = "SELECT id FROM expert WHERE email = '$username'";
        $result_expertise_id = $conn->query($sql_expertise_id);
        if ($result_expertise_id->num_rows > 0) {
            $row_expertise_id = $result_expertise_id->fetch_assoc();
            $expertise_id = $row_expertise_id['id'];
        } else {
            echo "Error: Expert not found for the provided username!";
            exit(); 
        }
    } else {
        echo "Error: User session not found!";
        exit(); 
    }

    $sql = "INSERT INTO uploaded_items (title, description, video_path, expertise_id, course_id) 
            VALUES ('$title', '$description', '$video_path', '$expertise_id', '$course_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
       // sendNotification($conn, $title, " Details and videos of the course", "/students/course.php");
        header("Location: courses.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function sendNotification($conn, $title, $message, $link)
{
    $time = round(microtime(true) * 1000);
    $sql = "INSERT INTO notification (title, message, link, time) VALUES ('$title', '$message', '$link', '$time')";
    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/expertise/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>


<body>
    <section class="video-form">
        <form action="contribute.php<?php if(isset($_GET['course_id'])) echo '?course_id=' . $_GET['course_id']; ?>" method="post" enctype="multipart/form-data">
            <p>Topic<span>*</span></p>
            <input type="text" name="title" maxlength="100" required placeholder="Title" class="box" />
            <p>Description<span>*</span></p>
            <input type="text" name="description" maxlength="100" required placeholder="Description" class="box" />
            <p>Select video <span>*</span></p>
            <input type="file" name="video" accept="video/*" required class="box" />
            <input type="submit" value="Upload" name="submit" class="btn" />
            <a href="assessment.php" class ="button-28">Upload Assessment</a>

        </form>
    </section>
</body>


</html>