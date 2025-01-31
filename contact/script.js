document.getElementById('contact-form').addEventListener('submit', function (event) {
    event.preventDefault();

    let errorMessage = document.getElementById('error-message');
    let successMessage = document.getElementById('success-message');

    if (errorMessage) errorMessage.innerHTML = '';
    if (successMessage) successMessage.innerHTML = '';

    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let subject = document.getElementById('subject').value.trim();
    let message = document.getElementById('message').value.trim();

    if (name === '' || email === '' || subject === '' || message === '') {
        errorMessage.innerHTML = 'All fields are required!';
        return;
    }

    let formData = new FormData(this);

    fetch('process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === "success") {
            document.getElementById('contact-form').reset();
            successMessage.innerHTML = 'Message sent successfully!';
        } else {
            errorMessage.innerHTML = `Error: ${data}`;
        }
    })
    .catch(error => {
        errorMessage.innerHTML = 'An error occurred. Please try again.';
    });
});
