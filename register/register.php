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
            <div class="containers">
                <form enctype="multipart/form-data" method="post" action="process1.php?type=student"
                    onsubmit="return validateForm()">
                    <div class="continer_info">
                        <label>Learner Information</label>
                        <div class="row">
                            <div class="name">
                                <label>First Name</label>
                                <input type="text" name="fname" id="fname" placeholder="Enter First Name" required />
                                <label>Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email" required />
                                <label>Address</label>
                                <input type="text" name="address" id="address" placeholder="Enter Address" required />
                                <label>Contact No.</label>
                                <input type="number" name="contact" id="contact" placeholder="Enter Phone number"
                                    required />
                            </div>

                            <div class="contacts">
                                <label>Last Name</label>
                                <input type="text" name="lname" id="lname" placeholder="Enter last Name" required />

                                <!-- <input type="password" name="password" id="password" placeholder="Enter password" required> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="work">
                                <label>Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter your password"
                                    maxlength="20" required />

                            </div>

                            <div class="pass">
                                <label>Conform password</label>
                                <input type="password" name="confirmpassword" id="confirmpassword"
                                    placeholder="Confirm your password" maxlength="20" required />
                            </div>

                            <!-- <tr>
            <td>Gender</td>
            <td><input type="radio" name="gender" id="male" /> Male</td>
            <td><input type="radio" name="gender" id="female" /> Female</td>
          </tr> -->

                        </div>

                        <div class="container_img">
                            <div class="doc_img">
                                <label>Your picture:</label>
                                <input type="file" name="pimg" id="pimg" accept="image/*"
                                    onchange="preview(this, 'profilePreview')" />
                                <img id="profilePreview" />
                            </div>

                        </div>

                        <div class="submit">
                            <textarea type="textarea" name="description" id="description"
                                placeholder="Write about you"></textarea>
                            <button type="submit" name="submit" class="btn-primary takespace">Register</button>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit_learner">Register</button>
            </form>
        </div>

        <div id="expertise-form" style="display: none;">
            <div class="containers">


                <form enctype="multipart/form-data" action="process1.php?type=expertise" method="POST"
                    onsubmit="return e_validateForm()">
                    <div class="continer_info">
                        <label>Expertise Information</label>
                        <div class="row">
                            <div class="name">
                                <label>First Name</label>
                                <input type="text" name="fname" id="efname" placeholder="Enter First Name" required>
                                <label>Email</label>
                                <input type="email" name="email" id="eemail" placeholder="Enter Email" required>
                                <label>Contact No.</label>
                                <input type="number" name="contact" id="econtact" placeholder="Enter Phone number"
                                    required>

                            </div>
                            <div class="contacts">
                                <label>Last Name</label>
                                <input type="text" name="lname" id="elname" placeholder="Enter Last Name" required>
                                <label>Address</label>
                                <input type="text" name="address" id="eaddress" placeholder="Enter Address" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="pass">
                                <label>Password</label>
                                <input type="password" name="password" id="epassword" placeholder="Enter Your Password"
                                    maxlength="20" required>
                                <label>Institution</label>
                                <input type="text" name="institution" id="einstitution"
                                    placeholder="Enter Institution Name" required>

                            </div>
                            <div class="work">
                                <label>Conform Password</label>
                                <input type="password" name="conformpassword" id="econformpassword"
                                    placeholder="Confirm Your Password" maxlength="20" required>

                                <label>Profession</label>
                                <input type="text" name="profession" id="eprofession" placeholder="Enter Profession"
                                    required>

                            </div>
                        </div>
                    </div>
                    <div class="container_img">
                        <div class="doc_img">
                            <!-- <label>Your picture:</label>
                            <input type="file" name="pimg" id="pimg" accept="image/*"
                                onchange="preview(this, 'profilePreview')" required>
                            <img id="profilePreview" /> -->
                            <br /><label>Document/Certificate:</label>
                            <input multiple type="file" name="doc" id="edoc" accept="image/*"
                                onchange="preview(this, 'docPreview')" required>
                            <img id="docPreview" />
                        </div>
                        <div class="citizen">
                            <label>Your picture:</label>
                            <input type="file" name="pimg" id="epimg" accept="image/*"
                                onchange="preview(this, 'frontPreview')" required />
                            <img id="frontPreview" />
                        </div>
                    </div>
                    <div class="submit">
                        <textarea type="textarea" name="des" id="edes" placeholder="Write about you"></textarea>
                        <button type="submit" name="submit_expert" class="btn-primary takespace">Register</button>
                    </div>
                </form>
            </div>
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

        function validateForm() {
            var password = document.getElementById("password").value;
            var contact = document.getElementById("contact").value;
            var confirmpassword = document.getElementById("confirmpassword").value;

            if (password != confirmpassword) {
                alert("Passwords do not match.");
                return false;
            }
            if (contact.length < 8) {
                alert("Please provide a valid Phone Number!");
                return false;
            }
            return true;
        }


        function e_validateForm() {
            var password = document.getElementById("epassword").value;
            var contact = document.getElementById("econtact").value;
            var confirmpassword = document.getElementById("econfirmpassword").value;

            if (password != confirmpassword) {
                alert("Passwords do not match.");
                return false;
            }
            if (contact.length < 8) {
                alert("Please provide a valid Phone Number!");
                return false;
            }
            return true;
        }

        function preview(input, previewId) {
            var file = input.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = document.getElementById(previewId);
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

    </script>
</body>
</html>