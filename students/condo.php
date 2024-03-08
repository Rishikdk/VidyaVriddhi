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
      $sql = "SELECT c.*, 
      COUNT(t.topic_id) AS total_topics, 
      COUNT(e.expertise_id) AS total_expertise
      FROM courses c
      LEFT JOIN Topics t ON c.course_id = t.course_id
      LEFT JOIN Expertise e ON t.topic_id = e.topic_id
      WHERE c.course_id = '$course_id'
      GROUP BY c.course_id";

      $result = $conn->query($sql);
      if ($result->num_rows > 0){
          while ($row = $result->fetch_assoc()) {
              $course_name = $row["course_name"];
              $course_description = $row['course_description'];
              $total_topics = $row['total_topics'];
              $total_expertise = $row['total_expertise'];
          }
      }
  }
?>
<header class="header">  
    <section class="sec">
        <div class="logo-container">
            <a href="admin_header.php">
            <img src="../images/logo.png" alt="Vidya Vriddhi" class="logo-img">
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

    <div class="containner">
      <div class="section">
        <div class="contributer">
          <h2>List of Expertise</h2>
              <div class="scroll-box">
              <?php
                $sql = "SELECT e.*
                  FROM expertise e
                  INNER JOIN topics t on e.topic_id = t.topic_id
                  INNER JOIN courses c on t.topic_id = c.course_id
                  where t.course_id ='$course_id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<div class='teacher-box'>";
                      echo "<img src='../images/" . $row["teacher_image"] . "' alt='" . $row["teacher_name"] . "'>";
                      echo "<p>";
                      echo "<strong>Teacher Name:</strong> " . $row["teacher_name"] . "<br>";
                      echo "" . $row["teacher_description"] . "<br>";
                      echo "</p>";
                      echo "</div>";
                  }
              } else {
                  echo "<p>No expertise found.</p>";
              }
          ?>
        </div>
        </div>
        <div class="learners">
          <h2>Enrolled Students</h2>
          <?php 
            $sql = "SELECT l.*, e.enrolled_date, COUNT(l.id) AS total_enrollment
            FROM learner l
            INNER JOIN enrollments e ON l.id = e.student_id
            WHERE e.course_id = '$course_id'";
              
              $result = $conn ->query($sql);
              if($result ->num_rows >0){
                while($row = $result -> fetch_assoc()){
                  $total_enrollment = $row['total_enrollment'];
                  echo "<div class='learner-box'>";
                      echo "<p>";
                      echo "Total Enrolled Students : ".$total_enrollment;
                      echo "</p>";
                      echo "Average Rating : ";
                      //echo "<p>";
                      //echo "<img src='../uploads/profile/" . $row["profile_picture"] . "' class='image-box'>";
                      //echo "<strong>Student Name:</strong> " . $row["name"] . "<br>";
                      //echo "</p>";
                      //echo "<p>";
                      //echo "<strong>Enrolled Date:</strong> " . $row["enrolled_date"] . "<br>";
                      //echo "</p>";
                      echo "</div>";
                }
              }else {
                echo "<p>No expertise found.</p>";
              }
            ?>
        </div>
      </div>
      <div class="section">
      <div class="course">
        <p>Course Name: <?php echo $course_name; ?></p>
        <p>Description: <?php echo $course_description; ?></p>
        <p>Topics: <?php echo $total_topics; ?></p>
        <p>Resources: <?php echo $total_expertise; ?></p>
        <button type="submit" class="button-24">Enroll</button></div>
      </div>
      <div class="section dashboard">dashboard</div>
    </div>
      
</body>
</html>