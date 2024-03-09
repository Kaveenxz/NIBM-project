function validateSignUpForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('signup-email').value;
    var password = document.getElementById('signup-password').value;

    if (name.trim() === "" || email.trim() === "" || password.trim() === "") {
        alert('Please fill in all fields.');
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    if (password.length < 8) {
        alert('Password must be at least 8 characters.');
        return false;
    }

    return true;
}

function validateSignInForm() {
    var email = document.getElementById('signin-email').value;
    var password = document.getElementById('signin-password').value;

    if (email.trim() === "" || password.trim() === "") {
        alert('Please fill in all fields.');
        return false;
    }

    return true;
}