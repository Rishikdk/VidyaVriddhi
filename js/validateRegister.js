function validate() {
    var name = document.getElementById('name').value;
    var address = document.getElementById('address').value;
    var email = document.getElementById('mail').value;
    var contact = document.getElementById('contact').value;
    var level = document.getElementById('level').value;
    var dob = document.getElementById('dob').value;
    var institute = document.getElementById('institute').value;

    if (name === '' || address === '' || email === '' || contact === '' || level === '' || dob === '' || institute === '') {
        alert('All fields must be filled out');
        return false;
    }
    return true; 
}