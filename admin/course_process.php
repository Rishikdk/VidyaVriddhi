<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php
        include_once('header.php');
        include_once('../database/db_connect.php');
    ?>
</head>
<body>
    <div class="update-container">
        <div class="u-container">
            <?php
                extract($_POST);
                
                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    if (isset($_POST['update_course'])){
                        $query="SELECT * FROM courses WHERE course_id ='$course_id'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0){
                            while ($row = $result->fetch_assoc()) {
                                $course_name=$row["course_name"];
                                $contributors=$row["contributors"];
                                $resources=$row["resources"];
                                
                                echo '<img src="../images/' . $row["course_image"] . '" alt="' . $row["course_name"] . '">';
                                echo '<h2>' . $row["course_name"] . '</h2>';
                                echo '<p>Contributors: ' . $row["contributors"] . '</p>';
                                echo '<p>Resources: ' . $row["resources"] . '</p>';
                            }
                        }
                    }
                }
            ?>
        </div>
        <div class="u-container">
            <input type="text" value ="<?php echo $course_id; ?>"><br>
            <input type="text" value ="<?php echo $course_name; ?>"><br>
            <input type="text" value ="<?php echo $contributors; ?>"><br>
            <input type="text" value ="<?php echo $resources; ?>"><br>
            <button type="submit" class="button-24">Update</button>
        </div>
    </div>
</body>
</html>
