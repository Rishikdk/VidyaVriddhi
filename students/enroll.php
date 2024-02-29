<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include_once('../database/db_connect.php');    
        ?>
         <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];    
        $query="SELECT * FROM courses WHERE course_id ='$course_id'";
            $result = $conn->query($query);
            if ($result->num_rows > 0){
                 while ($row = $result->fetch_assoc()) {
                    $course_name=$row["course_name"];
                    $contributors=0;
                    $resources=0;
                }
            }}
    ?>


    <div class="u-container">
       
    </div>
    <div class="containner">
      <div class="section">
        <div class="contributers">Contributers</div>
        <div class="learners">learners</div>
      </div>
      <div class="section">
        <div class="course"> <input type="text" value ="<?php echo $course_id; ?>"><br>
        <input type="text" value ="<?php echo $course_name; ?>"><br>
        <input type="text" value ="<?php echo $contributors; ?>"><br>
        <input type="text" value ="<?php echo $resources; ?>"><br>
        <button type="submit" class="button-24">Enroll</button></div>
      </div>
      <div class="section dashboard">dashboard</div>
    </div>
      
</body>
</html>