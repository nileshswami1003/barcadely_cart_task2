$(document).ready(function () {
    $('#signInForm').submit(function (e) {
        e.preventDefault(); // Prevent default form submission behavior
    });
});

function signInUser() {
    var email = $('#email').val();
    var password = $('#password').val();

    var userData = {
        email: email,
        password: password
    };

    $.ajax({
        url: './js/ajax/signin_user.php', 
        method: 'POST',
        data: JSON.stringify(userData),
        contentType: 'application/json',
        success: function (response) {
            if (response.success) {
                alert('Sign-in successful!'); 
                // Redirect to the dashboard after successful sign-in
                window.location.href = 'dashboard.php';
            } else {
                alert('Sign-in failed. ' + response.message);
            }
        },
        error: function (error) {
            console.error('Error during sign-in:', error);
            alert('Sign-in failed. Please try again.');
        }
    });
}
