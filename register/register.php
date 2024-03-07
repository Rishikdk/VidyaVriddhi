<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">

    <title>Register</title>
    <style>
        .form-container {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <button onclick="showStudentForm()">Register as Student</button>
        <button onclick="showExpertiseForm()">Register as Expertise</button>

        <div id="student-form" style="display: none;">
            <h3>Student Form</h3>
            <form action="process.php?type=student" method="POST" enctype="multipart/form-data">
                <div class="username">
                    <label>Full Name :</label>
                    <input type="text" name="name" id="name" required>
                    <span class="error" id="nameError"></span>
                </div>
                <div class="Address">
                    <label>Address :</label>
                    <input type="text" name="address" id="address" required>
                    <span class="error" id="addressError"></span>
                </div>
                <div class="mail">
                    <label>Email :</label>
                    <input type="email" name="email" id="mail" required>
                    <span class="error" id="mailError"></span>
                </div>
                <div class="Contact">
                    <label>Contact :</label>
                    <input type="text" name="contact" id="contact" required>
                    <span class="error" id="contactError"></span>
                </div>
                <div class="Password">
                    <label>Password :</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="container_img">
                    <div class="doc_img">
                        <label>Your picture:</label>
                        <input type="file" name="pimg" id="pimg" accept="image/*" onchange="preview(this, 'profilePreview')" required>
                        <img id="profilePreview" />
                    </div>
                </div>
                <button type="submit" name="submit_learner">Register</button>
            </form>
        </div>

        <div id="expertise-form" style="display: none;">
            <h3>Expertise Form</h3>
            <form action="process.php?type=expertise" method="POST">
                <div class="continer_info">
                    <div class="name">
                        <input type="text" name="fname" id="fname" placeholder="Enter First Name" required>
                        <input type="text" name="lname" id="lname" placeholder="Enter Last Name" required>
                    </div>
                    <div class="contacts">
                        <input type="email" name="email" id="email" placeholder="Enter Email" required>
                        <input type="text" name="address" id="address" placeholder="Enter Address" required>
                        <input type="number" name="pnum" id="pnum" placeholder="Enter Phone number" required>
                    </div>
                    <div class="pass">
                        <input type="password" name="password" id="password" placeholder="Enter Your Password" maxlength="20" required>
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Your Password" maxlength="20" required>
                    </div>
                    <div class="work">
                        <input type="text" name="profession" id="profession" placeholder="Enter Profession" required>
                        <input type="text" name="institution" id="institution" placeholder="Enter Institution Name" required>
                    </div>
                </div>
                <div class="container_img">
                    <div class="doc_img">
                        <label>Your picture:</label>
                        <input type="file" name="pimg" id="pimg" accept="image/*" onchange="preview(this, 'profilePreview')" required>
                        <img id="profilePreview" />
                        <br /><label>Document/Certificate:</label>
                        <input type="file" name="doc" id="doc" accept="image/*" onchange="preview(this, 'docPreview')" required>
                        <img id="docPreview" />
                    </div>
                </div>
                <div class="submit">
                    <textarea type="textarea" name="des" id="des" placeholder="Write about you"></textarea>
                    <button type="submit" name="submit_expert" class="btn-primary takespace">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showStudentForm() {
            document.getElementById('student-form').style.display = 'block';
            document.getElementById('expertise-form').style.display = 'none';
        }

        function showExpertiseForm() {
            document.getElementById('student-form').style.display = 'none';
            document.getElementById('expertise-form').style.display = 'block';
        }
    </script>
</body>
</html>
