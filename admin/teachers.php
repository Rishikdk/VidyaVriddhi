<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
     include_once('admin_header.php');
     include_once('../database/db_connect.php');
    ?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
        
    <div class="course-box1">
            <h1>Register New Expertise <div class="fas fa-user" ></div></h1>
            <a href="register_expertise.php" class = "button-24">Register </a>
    </div>
    
<?php
    $sql = "SELECT * FROM teachers";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        echo '<div>'; 
        while ($row = $result->fetch_assoc()) {
            echo '<div class="course-box">';
            echo '<a href="../teachers/'. $row["teacher_id"] .'.php">';
            echo '<img src="../images/' . $row["teacher_image"] . '" alt="' . $row["teacher_name"] . '">';
            echo '</a>';
            echo '<i class ="fas fa-user"></i>';
            echo '<h2>' . $row["teacher_name"] . '</h2>';
            echo '<p>Contributors: ' . $row["contributors"] . '</p>';
            echo '<p>Resources: ' . $row["resources"] . '</p>';
            echo '<a href="update_course.php?course_id=' . $row["teacher_id"] . ' " class="button-35">Update</a>';
            echo '<a href="reviews.php?course_id=' . $row["teacher_id"] . ' " class="button-35">Delete</a>';
            echo '<a href="reviews.php?course_id=' . $row["teacher_id"] . ' " class="button-35">Reviews</a>';
            echo '</div>'; 
            $count++;
            if ($count % 3 == 0) {
                echo '<br>';
            }
        }
        echo '</div>'; 
    } else {
        echo "No courses found.";
    }
    ?>
</body>
</html>
