function generateOtp() {
    const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let otp = '';
    const length = 5;  // Fix: Use 'const' to declare the variable
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        otp += charset[randomIndex];
    }
    return otp;
}

function sendEmail(e) {
    e.preventDefault();
    const otp = generateOtp().toString();
    
    console.log('Generated OTP:', otp);
    console.log('Attempting to send email...');
    Email.send({
        Host: "smtps://smtp.elasticemail.com",
        Username: "pram5karki@gmail.com",
        Password: "dxar kvqz xcsz hnzw", 
        To: 'pram15karki@gmail.com',
        From: 'pram5karki@gmail.com',
        Subject: 'Email Verification',
        Body: `your OTP is ${otp}`,
        
    })
    .then(
        message => {
            if (message === 'OK') {
                alert('Email sent successfully!');
            } else {
                console.log('Error:', message);
                alert('Error: Failed to send the email.');
            }
        }
    ).catch(error => {
        console.error('Email sending error:', error);
        alert('Error: Failed to send the email.');
    });

    return true;
}
