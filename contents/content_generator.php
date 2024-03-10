<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display PDF</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="content.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .resource-box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        #pdfViewer {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container_content">
        <div class="topic_details">
            <h3>Topics</h3>
            <?php
            include_once('../database/db_connect.php');
            if (isset($_GET['course_id'])) {
                $course_id = $_GET['course_id'];
                $sql = "SELECT c.*, t.topic_id, t.topic_name, GROUP_CONCAT(r.resource_link) AS resource_links, GROUP_CONCAT(r.resource_type) AS resource_types
                        FROM courses c
                        INNER JOIN topics t ON c.course_id = t.course_id
                        LEFT JOIN resources r ON t.topic_id = r.topic_id
                        WHERE c.course_id = '$course_id'
                        GROUP BY t.topic_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<ul class="w3-bar-item">';
                        echo '<li class="w3-bar-item w3-button" onclick="openPdf(`' . $row["resource_links"] . '`, `' . $row["resource_types"] . '`)">' . $row["topic_name"] . '</li>';
                        echo '</ul>';
                    }
                }
            }
            ?>
        </div>
        <div>
            <div class="header_container">
                <h1>
                    <div class="logo-container">
                        <a href="../students/courses.php">
                            <img src="../images/logo.png" alt="Vidya Vriddhi" class="logo-img">idya
                        </a>
                    </div>
                </h1>
            </div>
            <div class="w3-container">
                <div id="resourceDetails"></div>
                <iframe id="pdfViewer" src="" width='100%' height='720px' frameborder='0'></iframe>
            </div>
        </div>
    </div>
    <script>
        function openPdf(resourceLinks, resourceTypes) {
            var links = resourceLinks.split(',');
            var types = resourceTypes.split(',');
            var pdfViewer = document.getElementById("pdfViewer");
            var resourceDetails = document.getElementById("resourceDetails");
            var details = "";
            for (var i = 0; i < links.length; i++) {
                details += "<div class='resource-box'>";
                details += "<p>Resource Type: " + types[i] + "</p>";
                details += "<p>Resource Link: " + links[i] + "</p>";
                details += "<button onclick=\"showResource('" + links[i] + "')\">View Resource</button>";
                details += "</div>";
            }
            resourceDetails.innerHTML = details;
            pdfViewer.src = links[0];
        }

        function showResource(link) {
            var pdfViewer = document.getElementById("pdfViewer");
            pdfViewer.src = link;
            pdfViewer.style.display = "block";
        }
    </script>
</body>

</html>