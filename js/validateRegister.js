function validateForm() {
  document
    .querySelectorAll(".error")
    .forEach((error) => (error.textContent = ""));

  let isValid = true;

  const nameInput = document.getElementById("name");
  const nameError = document.getElementById("nameError");
  if (nameInput.value.trim() === "") {
    nameError.textContent = "Full Name is required";
    isValid = false;
  }

  const addressInput = document.getElementById("address");
  const addressError = document.getElementById("addressError");
  if (addressInput.value.trim() === "") {
    addressError.textContent = "Address is required";
    isValid = false;
  }

  const emailInput = document.getElementById("mail");
  const emailError = document.getElementById("mailError");
  if (emailInput.value.trim() === "") {
    emailError.textContent = "Email is required";
    isValid = false;
  } else if (!isValidEmail(emailInput.value.trim())) {
    emailError.textContent = "Invalid email format";
    isValid = false;
  }

  const contactInput = document.getElementById("contact");
  const contactError = document.getElementById("contactError");
  if (contactInput.value.trim() === "") {
    contactError.textContent = "Contact is required";
    isValid = false;
  }

  const levelInput = document.getElementById("level");
  const levelError = document.getElementById("levelError");
  if (levelInput.value.trim() === "") {
    levelError.textContent = "Level is required";
    isValid = false;
  }

  const dobInput = document.getElementById("dob");
  const dobError = document.getElementById("dobError");
  if (dobInput.value.trim() === "") {
    dobError.textContent = "Date of Birth is required";
    isValid = false;
  }

  const instituteInput = document.getElementById("institute");
  const instituteError = document.getElementById("instituteError");
  if (instituteInput.value.trim() === "") {
    instituteError.textContent = "Institute is required";
    isValid = false;
  }

  return isValid;
}

function isValidEmail(email) {
  // Regular expression for validating email format
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
