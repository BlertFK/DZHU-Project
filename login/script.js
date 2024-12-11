function validateForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;
    let errorMessage = document.getElementById('error-message');

    // Check if the name is not empty
    if (name.trim() === "") {
        errorMessage.textContent = "Please enter your full name.";
        return false;
    }

    // Check if the email is valid
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
        errorMessage.textContent = "Please enter a valid email address.";
        return false;
    }

    // Check if the password meets complexity requirements
    let passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[A-Z]).{6,}$/;
    if (!passwordRegex.test(password)) {
        errorMessage.textContent = "Password must be at least 6 characters long and include at least one letter, one number, one symbol, and one uppercase letter.";
        return false;
    }

    // Check if the password and confirm password match
    if (password !== confirmPassword) {
        errorMessage.textContent = "Password and confirm password do not match.";
        return false;
    }

    // If everything is valid, clear the error message
    errorMessage.textContent = "";
    return true;
}


function validateLoginForm() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let errorMessage = document.getElementById('error-message');

    // Check if email is valid
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
        errorMessage.textContent = "Please enter a valid email address.";
        return false;
    }

    // Check if password is entered
    if (password.trim() === "") {
        errorMessage.textContent = "Please enter your password.";
        return false;
    }

    // If everything is valid, clear the error message
    errorMessage.textContent = "";
    return true;
}
