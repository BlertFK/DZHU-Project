document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Reset error message
    document.getElementById('error-message').innerHTML = '';

    // Form input values
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let subject = document.getElementById('subject').value;
    let message = document.getElementById('message').value;

    // Email validation
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        document.getElementById('error-message').innerHTML = 'Please enter a valid email address.';
        return;
    }

    // Check for empty fields
    if (name === '' || email === '' || subject === '' || message === '') {
        document.getElementById('error-message').innerHTML = 'All fields are required!';
        return;
    }

    // If everything is valid
    alert('Message sent successfully!');
    document.getElementById('contact-form').reset(); // Reset the form
});
