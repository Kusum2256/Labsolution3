<?php
// Handle AJAX request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid_userid = "Kusum";
    $valid_password = "password123";

    $userid = $_POST['userid'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($userid === $valid_userid && $password === $valid_password) {
        echo "success";
    } else {
        echo "fail";
    }
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .message { margin-top: 10px; font-size: 1rem; }
    </style>
</head>
<body>
    <div id="login-container">
        <form id="login-form">
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required><br><br>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            
            <button type="submit">Login</button>
        </form>
        <div class="message" id="message"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("#login-form").submit(function(event) {
                event.preventDefault(); // Prevent page reload
                
                const formData = {
                    userid: $("#userid").val(),
                    password: $("#password").val()
                };
                
                $.ajax({
                    url: "", // Send request to the same page
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response === "success") {
                            $("#login-form").hide();
                            $("#message").text("Welcome!").css("color", "green");
                        } else {
                            $("#message").text("Invalid credentials. Please try again.").css("color", "red");
                        }
                    },
                    error: function() {
                        $("#message").text("An error occurred. Please try again later.").css("color", "red");
                    }
                });
            });
        });
    </script>
</body>
</html>
