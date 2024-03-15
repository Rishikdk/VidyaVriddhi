<?php
include_once('../database/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $expertise_id = $_POST['expertise_id'];
    $passing_score = $_POST['passing_score'];
    
    $sql_insert_assessment = "INSERT INTO assessments (title, description, expertise_id, passing_score) 
                              VALUES ('$title', '$description', $expertise_id, $passing_score)";
    if ($conn->query($sql_insert_assessment) === TRUE) {
        $assessment_id = $conn->insert_id; 
        
        for ($i = 1; $i <= 10; $i++) {
            $question_text = $_POST["question$i"];
            $correct_option = $_POST["correct_option$i"];
            $option1 = $_POST["option1_$i"];
            $option2 = $_POST["option2_$i"];
            $option3 = $_POST["option3_$i"];
            $option4 = $_POST["option4_$i"];
            
            $sql_insert_question = "INSERT INTO questions (assessment_id, question_text, correct_option, option1, option2, option3, option4) 
                                    VALUES ($assessment_id, '$question_text', $correct_option, '$option1', '$option2', '$option3', '$option4')";
            $conn->query($sql_insert_question);
        }
        
        echo "Assessment created successfully.";
    } else {
        echo "Error creating assessment: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Assessment</title>
    <link rel="stylesheet" href="assessment.css">
    
</head>
<body>
    <h2>Create Assessment</h2>
    <form action="create_assessment.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        
        <label for="expertise_id">Expertise ID:</label><br>
        <input type="number" id="expertise_id" name="expertise_id" required><br>
        
        <label for="passing_score">Passing Score:</label><br>
        <input type="number" id="passing_score" name="passing_score" step="0.01" required><br>
        
        <h3>Questions:</h3>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <label for="question<?php echo $i; ?>">Question <?php echo $i; ?>:</label><br>
            <input type="text" id="question<?php echo $i; ?>" name="question<?php echo $i; ?>" required><br>
            
            <label for="correct_option<?php echo $i; ?>">Correct Option:</label><br>
            <input type="number" id="correct_option<?php echo $i; ?>" name="correct_option<?php echo $i; ?>" required min="1" max="4"><br>
            
            <label for="option1_<?php echo $i; ?>">Option 1:</label><br>
            <input type="text" id="option1_<?php echo $i; ?>" name="option1_<?php echo $i; ?>" required><br>
            
            <label for="option2_<?php echo $i; ?>">Option 2:</label><br>
            <input type="text" id="option2_<?php echo $i; ?>" name="option2_<?php echo $i; ?>" required><br>
            
            <label for="option3_<?php echo $i; ?>">Option 3:</label><br>
            <input type="text" id="option3_<?php echo $i; ?>" name="option3_<?php echo $i; ?>" required><br>
            
            <label for="option4_<?php echo $i; ?>">Option 4:</label><br>
            <input type="text" id="option4_<?php echo $i; ?>" name="option4_<?php echo $i; ?>" required><br>
            <br><br><br><br>
        <?php endfor; ?>
        
        <input type="submit" value="Create Assessment">
    </form>
</body>
</html>
