<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register/register.css">
    <title>Register</title>
</head>

<body>
    <div class="form-container">
        <div class="radio-inputs">
            <button onclick="showStudentForm()"> <label>
                    <input class="radio-input" type="radio" name="engine">
                    <span class="radio-tile">
                        <span class="radio-icon">
                        </span>
                        <span class="radio-label">Learner register</span>
                    </span>
                </label></button>


            <button onclick="showExpertiseForm()"> <label>
                    <input checked="" class="radio-input" type="radio" name="engine">
                    <span class="radio-tile">
                        <span class="radio-icon">
                        </span>
                        <span class="radio-label">Expertise register</span>
                    </span>
                </label></button>
        </div>

        <div id="student-form" style="display: none;">
            <div class="containers">
                <form enctype="multipart/form-data" method="post" action="#" onsubmit="return validateForm()">
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
                                <input type="number" name="pnum" id="pnum" placeholder="Enter Phone number" required />
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
                                <label>Instution</label>
                                <input type="text" name="instution" id="instution" placeholder="Enter Instution name" />
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
                            <button type="submit" name="submit" class="btn-primary takespace">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div id="expertise-form" style="display: none;">
            <div class="containers">


                <form enctype="multipart/form-data" action="process.php?type=expertise" method="POST"
                    onsubmit="return validateForm()">
                    <div class="continer_info">
                        <label>Expertise Information</label>
                        <div class="row">
                            <div class="name">
                                <label>First Name</label>
                                <input type="text" name="fname" id="fname" placeholder="Enter First Name" required>
                                <label>Email</label>
                                <input type="email" name="email" id="email" placeholder="Enter Email" required>
                                <label>Contact No.</label>
                                <input type="number" name="pnum" id="pnum" placeholder="Enter Phone number" required>

                            </div>
                            <div class="contacts">
                                <label>Last Name</label>
                                <input type="text" name="lname" id="lname" placeholder="Enter Last Name" required>
                                <label>Address</label>
                                <input type="text" name="address" id="address" placeholder="Enter Address" required>

                            </div>
                        </div>
                        <div class="row">
                            <div class="pass">
                                <label>Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                    maxlength="20" required>
                                <label>Institution</label>
                                <input type="text" name="institution" id="institution"
                                    placeholder="Enter Institution Name" required>

                            </div>
                            <div class="work">
                                <label>Conform Password</label>
                                <input type="password" name="conformpassword" id="conformpassword"
                                    placeholder="Confirm Your Password" maxlength="20" required>

                                <label>Profession</label>
                                <input type="text" name="profession" id="profession" placeholder="Enter Profession"
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
                            <input multiple type="file" name="doc" id="doc" accept="image/*"
                                onchange="preview(this, 'docPreview')" required>
                            <img id="docPreview" />
                        </div>
                        <div class="citizen">
                            <label>Your picture:</label>
                            <input type="file" name="pimg" id="pimg" accept="image/*"
                                onchange="preview(this, 'frontPreview')" required />
                            <img id="frontPreview" />
                        </div>
                    </div>
                    <div class="submit">
                        <textarea type="textarea" name="des" id="des" placeholder="Write about you"></textarea>
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
            var pnum = document.getElementById("pnum").value;
            var confirmpassword = document.getElementById("confirmpassword").value;

            if (password != confirmpassword) {
                alert("Passwords do not match.");
                return false;
            }
            if (pnum.length < 8) {
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