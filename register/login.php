<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./register/login.css">
</head>
<body>
    <div class="main">
        <div class="left">
            <img src="./register/logo.png" class="logo" alt="">
        </div>
        <div class="right">
            <form action="./students/home.php" method="POST" class="form" onsubmit="return validate()">
                <div class="username prefix">
                    <label>Username :</label>
                    <input type="text" id="name">
                </div>
                <div class="Password prefix">
                    <label>Password :</label>
                    <input type="text" id="password">
                </div>
                <button type="submit">Log In</button>
                <div class ="container">
                    <div class="signIn">
                        <a href="register/register.php">Create a New Account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>