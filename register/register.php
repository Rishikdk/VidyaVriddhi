<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="../js/validateRegister.js"></script>
    <script src="../mailings/sendMail.js"></script>
    <script>
        function validateAndSendEmail() {
            if (validate()) {
                sendEmail(event);
            }
            return false;
        }
    </script>
</head>
<body>
    <div class="container">
        <form action="verification.php" method="POST" onsubmit="return validateAndSendEmail()">
            <div class="username">
                <label>Full Name :</label>
                <input type="text" id="name">
            </div>
            <div class="Address">
                <label>Address :</label>
                <input type="text" id="address">
            </div>
            <div class="mail">
                <label>Email :</label>
                <input type="text" id="mail">
            </div>
            <div class="Contact">
                <label>Contact :</label>
                <input type="text" id="contact">
            </div>
            <div class="level">
                <label>Level :</label>
                <input type="text" id="level">
            </div>
            <div class="DOB">
                <label>Date Of Birth :</label>
                <input type="date" id="dob">
            </div>
            <div class="Institute">
                <label>Institute :</label>
                <input type="text" id="institute">
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
