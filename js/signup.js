$(document).ready(function () {
    $('#signUpForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Collect form data
        var formData = {
            email: $('#email').val(),
            password: $('#password').val()
        };

        // Send AJAX request
        $.ajax({
            url: './js/ajax/signup_user.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Sign-up successful!');
                    // window.location.href = 'success.html';
                } else {
                    alert('Sign-up failed. ' + response.message);
                }
            },
            error: function (error) {
                console.error('Error during sign-up:', error);
                alert('Sign-up failed. Please try again.');
            }
        });
    });
});
