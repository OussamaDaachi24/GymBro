document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorMessage = document.getElementById('error-message');

    // Reset error message
    errorMessage.style.display = 'none';
    errorMessage.textContent = '';

    // Basic validation
    if (!email || !password) {
        showError('Please fill in all fields');
        return;
    }

    if (!validateEmail(email)) {
        showError('Please enter a valid email address');
        return;
    }

    // Prepare form data
    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    // Disable login button during request
    const loginButton = document.getElementById('login-button');
    loginButton.disabled = true;
    loginButton.textContent = 'Logging in...';

    // Send AJAX request
    fetch('/GymBro/login', {
        method: 'POST',
        body: formData,
        credentials: 'same-origin' // Include cookies for session handling
    })
    .then(response => {
        // Check if the response is a redirect
        if (response.redirected) {
            window.location.href = response.url;
            return;
        }
        
        // If not redirected, parse the response
        return response.text().then(text => {
            try {
                return JSON.parse(text);
            } catch (e) {
                // If response is not JSON, check if it contains PHP error message
                if (text.includes('error')) {
                    throw new Error(text);
                }
                // If it's HTML, probably the login page with error
                if (text.includes('error-message')) {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(text, 'text/html');
                    const errorElement = doc.querySelector('.error-message');
                    if (errorElement) {
                        throw new Error(errorElement.textContent.trim());
                    }
                }
                throw new Error('Login failed. Please try again.');
            }
        });
    })
    .then(data => {
        if (data && data.success) {
            // Successful login
            window.location.href = '/GymBro/home';
        } else {
            // Show error message from server
            showError(data.message || 'Login failed. Please try again.');
        }
    })
    .catch(error => {
        showError(error.message || 'An error occurred. Please try again.');
    })
    .finally(() => {
        // Re-enable login button
        loginButton.disabled = false;
        loginButton.textContent = 'Login';
    });
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function showError(message) {
    const errorMessage = document.getElementById('error-message');
    errorMessage.textContent = message;
    errorMessage.style.display = 'block';
}