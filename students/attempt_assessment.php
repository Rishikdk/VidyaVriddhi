<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attempt Assessment</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="main-content">
    <?php
include_once('../database/db_connect.php');

$assessment_id = $_GET['assessment_id']; 

$sql = "SELECT a.*, q.*
        FROM assessments a
        INNER JOIN questions q ON a.id = q.assessment_id
        WHERE q.assessment_id = '$assessment_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='assessment-details'>";
        echo "<h2>Assessment Title: " . $row['title'] . "</h2>";
        echo "<p>Description: " . $row['description'] . "</p>";
        echo "<p>Passing Score: " . $row['passing_score'] . "</p>";
        echo "</div>";

        echo "<div class='question'>";
        echo "<h3>Question " . $row['id'] . "</h3>";
        echo "<p>" . $row['question_text'] . "</p>";
        echo "<ul>"; 
        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='1'>" . $row['option1'] . "</li>";
        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='2'>" . $row['option2'] . "</li>";
        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='3'>" . $row['option3'] . "</li>";
        echo "<li><input type='radio' name='answer[" . $row['id'] . "]' value='4'>" . $row['option4'] . "</li>";
        echo "</ul>"; 
        echo "</div>"; 
    }
} else {
    echo "<p>No questions available for this assessment.</p>";
}

$conn->close();
?>


        <form action="submit_answers.php" method="post">
            <input type="hidden" name="assessment_id" value="<?php echo $assessment_id; ?>">
            <input type="submit" value="Submit Answers">
        </form>
    </div>
</body>
</html>