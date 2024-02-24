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
        <div class="add_new">
            <h3> ADD NEW COURSE </h3>
            <a href ="new_course.php" class="button-24"> ADD </a>
        </div>
    </div>

    <?php
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        echo '<div>'; 
        while ($row = $result->fetch_assoc()) {
            echo '<div class="course-box">';
            echo '<a href="course.php?course_id=' . $row["course_id"] . '">';
            echo '<img src="../images/' . $row["course_image"] . '" alt="' . $row["course_name"] . '">';
            echo '</a>';
            echo '<h2>' . $row["course_name"] . '</h2>';
            echo '<p>Contributors: ' . $row["contributors"] . '</p>';
            echo '<p>Resources: ' . $row["resources"] . '</p>';

            // Buttons for Actions
            echo '<form action="course_process.php" method="post">';
            echo '<input type="hidden" name="course_id" value="' . $row["course_id"] . '">';
            echo '<button type="submit" name="update_course" class="button-35">Update</button>';
            echo '<button type="submit" name="delete_course" class="button-35">Delete</button>';
            echo '<button type="submit" name="reviews" class="button-35">Reviews</button>';
            echo '</form>';
            
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
