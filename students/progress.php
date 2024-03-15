<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessments</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include_once('../database/db_connect.php');
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $sql_user_id = "SELECT id FROM learner WHERE email = '$username'";
        $result_user_id = $conn->query($sql_user_id);

        if ($result_user_id->num_rows > 0) {
            $row_user_id = $result_user_id->fetch_assoc();
            $user_id = $row_user_id['id'];

            $sql_enrolled_courses = "SELECT course_id FROM enrollments WHERE learner_id = '$user_id'";
            $result_enrolled_courses = $conn->query($sql_enrolled_courses);

            if ($result_enrolled_courses->num_rows > 0) {
                while ($row_enrolled_course = $result_enrolled_courses->fetch_assoc()) {
                    $course_id = $row_enrolled_course['course_id'];

                    $sql_assessments = "SELECT id, title FROM assessments WHERE course_id = '$course_id'";
                    $result_assessments = $conn->query($sql_assessments);

                    if ($result_assessments->num_rows > 0) {
                        echo "<h2>Assessments for Course ID: $course_id</h2>";
                        echo "<ul>";

                        while ($row_assessment = $result_assessments->fetch_assoc()) {
                            $assessment_id = $row_assessment['id'];
                            $assessment_title = $row_assessment['title'];

                            echo "<li><a href='attempt_assessment.php?assessment_id=$assessment_id'>$assessment_title</a></li>";
                        }

                        echo "</ul>";
                    } else {
                        echo "<p>No assessments found for Course ID: $course_id</p>";
                    }
                }
            } else {
                echo "<p>You are not enrolled in any courses.</p>";
            }
        } else {
            echo "<p>User not found.</p>";
        }
    } else {
        echo "<p>You are not logged in.</p>";
    }
    ?>

</body>
</html>
