<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <script src="https://kit.fontawesome.com/8eab227f7f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/expertise/ex_profile.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User profile</title>
</head>

<body>
    <div class="containers_user">
        <div class="container_display">
            <div class="display">
                <img src="../img/icone.png" />
                <h1 style="color: aliceblue">User name</h1>
            </div>
        </div>

        <div class="container_nav">
            <ul>
                <li><a href="ex_profile.php"><i class="fa-solid fa-user"></i> profile</a></li>
                <li><a href="profile_about.php"><i class="fas fa-book"></i> about me</a></li>
                <li><a href="profile_document.php"><i class="fas fa-graduation-cap"></i> Document/Certificate</a></li>
                <li><a href="expertise_header.php"><i class="fas fa-home"></i>home</a></li>
            </ul>
        </div>

        <div class="container_show">
            <div class="user">
                <h2>EXPERTISE INFORMATION</h2>
                <form>
                    <div class="row">
                        <label>First name</label>
                        <input type="text" name="fname" id="fname" placeholder="user name" />

                        <label>Email</label>
                        <input type="email" name="email" id="email" placeholder="email" />
                    </div>

                    <div class="colum">
                        <label>Last name</label>
                        <input type="text" name="lname" id="lname" placeholder="user last name" />
                    </div>

                </form>
                <div>
                    <div class="user">
                        <br>
                        <h2>CONTACT INFORMATION</h2>
                        <form>
                            <div class="row">
                                <label>Address</label>
                                <input type="text" name="address" id="address" placeholder="user address" />

                                <label>Contact Number</label>
                                <input type="text" name="pnum" id="pnum" placeholder="phone number" />
                            </div>

                            <div class="colum">
                                <label>Contact Number</label>
                                <input type="text" name="pnum" id="pnum" placeholder="phone number" />
                            </div>
                        </form>
                    </div>

                    <div class="user">
                        <br>
                        <h2>About us</h2>
                        <form>
                            <div class="row">
                                <label>Profession</label>
                                <input type="text" name="profession" id="profession" placeholder="profession" />
                                <label>Short Intro</label>
                                <textarea type="textarea" name="dec" id="dec" placeholder="about"></textarea>

                            </div>

                            <div class="colum">
                                <label>Instution</label>
                                <input type="text" name="instution" id="instution" placeholder="Instution" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>

</html>