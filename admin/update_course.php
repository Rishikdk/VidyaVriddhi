<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>
<header class="header">  
        <section class="sec">
            <div class="logo-container">
                <a href="admin_header.php">
                <img src="logo.png" alt="Vidya Vriddhi" class="logo-img">
                </a>
            </div>
            <form action="" method="POST" class="form">
                <input type="text" placeholder="search course">
                <button type="submit" class= "fas fa-search" name="search_box"></button>
            </form>
            <div class ="icons">
                <div id ="menu_btn" class="fas fa-bars"></div>
                <div id ="search_btn" class="fas fa-search"></div>
                <div id ="user_btn" class="fas fa-user"></div>
            </div>
        </section>
    </header>
    <?php
    include_once('../database/db_connect.php');

    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];

        $sql = "SELECT * FROM courses WHERE course_id = $course_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo '<form action="update_course_process.php" method="post">';
            echo '<input type="hidden" name="course_id" value="' . $row["course_id"] . '">';
            echo '<label for="course_name">Course Name:</label>';
            echo '<input type="text" id="course_name" name="course_name" value="' . $row["course_name"] . '"><br>';
            echo '<label for="contributors">Contributors:</label>';
            echo '<input type="text" id="contributors" name="contributors" value="' . $row["contributors"] . '"><br>';
            echo '<label for="resources">Resources:</label>';
            echo '<input type="text" id="resources" name="resources" value="' . $row["resources"] . '"><br>';
            echo '<input type="submit" value="Update">';
            echo '</form>';
        } else {
            echo "Course not found.";
        }
    } else {
        echo "Course ID not provided.";
    }
?>

</body>
</html>