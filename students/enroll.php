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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<?php
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];

    $sql_reviews = "SELECT AVG(rating) AS avg_rating FROM reviews WHERE course_id = '$course_id'";
    $result_reviews = $conn->query($sql_reviews);
    $average_rating = 0;
    if ($result_reviews->num_rows > 0) {
        $row = $result_reviews->fetch_assoc();
        $average_rating = $row['avg_rating'];
    }

    $sql_course = "SELECT c.*, 
        COUNT(t.topic_id) AS total_topics, 
        COUNT(e.expertise_id) AS total_expertise
        FROM courses c
        LEFT JOIN Topics t ON c.course_id = t.course_id
        LEFT JOIN Expertise e ON t.topic_id = e.topic_id
        WHERE c.course_id = '$course_id'
        GROUP BY c.course_id";

    $result_course = $conn->query($sql_course);
    if ($result_course->num_rows > 0) {
        while ($row = $result_course->fetch_assoc()) {
            $course_name = $row["course_name"];
            $course_description = $row['course_description'];
            $total_topics = $row['total_topics'];
            $total_expertise = $row['total_expertise'];
            $course_image = $row['course_image'];
        }
    }
}
?>
<header class="header">
    <section class="sec">
        <div class="logo-container">
            <a href="courses.php">
                <img src="../images/logo.png" alt="Vidya Vriddhi" class="logo-img">
            </a>
        </div>

    </section>
</header>

<div class="containner">
    <div class="section">
        <div class="contributer">
            <h2>Contributors</h2>
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
                        echo "<img src='../images/" . $row["teacher_image"] . "' alt='" . $row["teacher_name"] . "' class='logo-img' >";
                        echo "<p>";
                        echo "<strong>" . $row["teacher_name"] . " </strong><br>";
                        echo "" . $row["teacher_description"] . "<br>";
                        echo "</p>";
                        echo "</div>";
                        echo "</br>";
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
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_enrollment = $row['total_enrollment'];
                    echo "<div class='learner-box'>";
                      echo "<p>";
                      echo "Total Enrolled Students : " . $total_enrollment;
                      echo "</p>";
                      echo "<div class='rating'>";
                      echo "Average Rating: ";
                      $average_rating_rounded = round($average_rating);
                      for ($i = 5; $i >= 1; $i--) {
                          echo "<input value='$i' name='rate' id='star$i' type='radio' ";
                          if ($i == $average_rating_rounded) {
                              echo "checked";
                          }
                          echo ">";
                          echo "<label title='text' for='star$i'></label>";
                      }
                      echo "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    <div class="section">
        <div class="course">
            <h1>COURSE DETAILS</DETAILs></h1>
            <img src='../images/<?php echo $course_image ?>'>
            <p><strong><?php echo $course_name; ?></strong></p>
            <p><?php echo $course_description; ?></p>
            <p>Topics: <?php echo $total_topics; ?></p>
            <p>Resources: <?php echo $total_expertise; ?></p>
            <form action="enroll_process.php?course_id=<?php echo $course_id; ?>" method="post">
                <button type="submit" class="button1" name="enroll">Enroll</button>
            </form>
          </div>
    </div>
    <div class="section">
      <div class="dashboard">
        <h1> DASHBOARD </h1>
        <h2>Assessment Details</h2>
        <?php
        $sql_assessments = "SELECT * FROM assessments WHERE course_id = '$course_id'";
        $result_assessments = $conn->query($sql_assessments);
        if ($result_assessments->num_rows > 0) {
            while ($row_assessment = $result_assessments->fetch_assoc()) {
                $assessment_title = $row_assessment['title'];
                $assessment_id = $row_assessment['id'];

                $sql_questions_count = "SELECT COUNT(*) AS question_count FROM questions WHERE assessment_id = '$assessment_id'";
                $result_questions_count = $conn->query($sql_questions_count);
                $question_count = ($result_questions_count->num_rows > 0) ? $result_questions_count->fetch_assoc()['question_count'] : 0;

                $passing_marks = $row_assessment['passing_score'];

                echo "<div class='assessment-detail'>";
                echo "<p><strong>Title:</strong> $assessment_title</p>";
                echo "<p><strong>Total Questions:</strong> $question_count</p>";
                echo "<p><strong>Passing Score:</strong> $passing_marks</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No assessments found.</p>";
        }
        ?>
      </div>
    </div>
</div>

</body>
</html>
