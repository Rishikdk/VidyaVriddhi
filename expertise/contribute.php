<?php
    include_once('header.php');
    include_once('../database/db_connect.php');
    if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $thumbnail_path = '../uploads/' . $_FILES['thumb']['name'];
    $video_path = '../uploads/' . $_FILES['video']['name'];
    
    move_uploaded_file($_FILES['thumb']['tmp_name'], $thumbnail_path);
    move_uploaded_file($_FILES['video']['tmp_name'], $video_path);
    
    $sql = "INSERT INTO uploaded_items (title, description, thumbnail_path, video_path) VALUES ('$title', '$description', '$thumbnail_path', '$video_path')";
    if ($conn->query($sql) === TRUE) {
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
        <input
            type="text"
            name="title"
            maxlength="100"
            required
            placeholder="Title "
            class="box"
        />
        <p>Title description <span>*</span></p>
        <textarea
            name="description"
            class="box"
            required
            placeholder="write description"
            maxlength="1000"
            cols="30"
            rows="10"
        ></textarea>
        <p>select thumbnail <span>*</span></p>
        <input type="file" name="thumb" accept="image/*" required class="box" />
        <p>select video <span>*</span></p>
        <input type="file" name="video" accept="video/*" required class="box" />
        <input type="submit" value="upload" name="submit" class="btn" />
    </form>
    </section>
</body>
</html>
