<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function validate(){
            var otp =document.getElementById('otp').value;
            if(otp==='')
            {
                alert('Please Fill the OTP');
                return false;
            }
            return true;
        }
    </script>
    
</head>
<body>
    <div class="container">
        <form action="" method="post" onsubmit="return validate()">
            <div> 
                <label>Enter the OPT </label>
                <input type="text" id="otp">
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

