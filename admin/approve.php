<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Resources</title>
    <link rel = "stylesheet" href="../css/styles.css">
    <link rel = "stylesheet" href="../css/admin/style.css">
</head>
<body>
    <h1>Approve Resources</h1>

    <?php
    include_once('../database/db_connect.php');
    
    if(isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
       // echo "Course ID: " . $course_id;

        $sql = "SELECT * FROM uploaded_items WHERE course_id = '$course_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="resource-details">';
                echo '<h2>Title: ' . $row["title"] . '</h2>';
                echo '<p>Description: ' . $row["description"] . '</p>';
                echo '<div class="thumbnail-container">';
                echo '<img src="' . $row["thumbnail_path"] . '" alt="Thumbnail" class="thumbnail">';
                echo '</div>';
                echo '<div class="video-container">';
                echo '<video src="' . $row["video_path"] . '" controls class="video"></video>';
                echo '</div>';
                echo '<form action="process_approval.php" method="post">';
                echo '<input type="hidden" name="item_id" value="' . $row["id"] . '">';
                echo '<button type="submit" name="approve" class="button-35">Approve</button>';
                echo '<button type="submit" name="reject" class = "button-35">Reject</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "No items to approve.";
        }
    } else {
        echo "Course ID not provided.";
    }
    ?>

</body>
</html>
