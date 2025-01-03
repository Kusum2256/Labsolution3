<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .form-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 12px;
        }
        .success {
            color: green;
            font-size: 12px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Registration Form</h2>
        <form id="registrationForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
                <span class="error" id="nameError"></span>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea>
                <span class="error" id="addressError"></span>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <span class="error" id="usernameError"></span>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <span class="error" id="emailError"></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <span class="error" id="passwordError"></span>
            </div>
           
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="number" id="phone" name="phone">
                <span class="error" id="phoneError"></span>
            </div>
            <div class="form-group">
                <label>Gender:</label>
                <input type="radio" name="gender" value="male"> Male
                <input type="radio" name="gender" value="female"> Female
                <span class="error" id="genderError"></span>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <select id="course" name="course">
                    <option value="">Select Course</option>
                    <option value="course1">Course 1</option>
                    <option value="course2">Course 2</option>
                    <option value="course3">Course 3</option>
                </select>
                <span class="error" id="courseError"></span>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {

            $("#registrationForm").submit(function (event) {
                event.preventDefault();

                let isValid = true;

                // Reset error messages
                $(".error").text("");

                // Name Validation
                let name = $("#name").val();
                if (name === "" || /\d/.test(name)) {
                    isValid = false;
                    $("#nameError").text("Name cannot be empty or contain numbers.");
                }

                // Address Validation
                let address = $("#address").val();
                if (address === "") {
                    isValid = false;
                    $("#addressError").text("Address cannot be empty.");
                }

                // Username Validation
                let username = $("#username").val();
                if (username === "" || /\s/.test(username) || /[^a-zA-Z0-9_]/.test(username)) {
                    isValid = false;
                    $("#usernameError").text("Username cannot contain spaces or special characters, except for underscores.");
                }

                // Phone Validation
                let phone = $("#phone").val();
                if (phone === "" || !/^\d+$/.test(phone) || !/^(98|97|96)/.test(phone)) {
                    isValid = false;
                    $("#phoneError").text("Phone number must be numeric and start with 98, 97, or 96.");
                }

                // Gender Validation
                let gender = $("input[name='gender']:checked").val();
                if (!gender) {
                    isValid = false;
                    $("#genderError").text("Gender must be selected.");
                }

                // Email Validation
                let email = $("#email").val();
                if (email === "" || !/@/.test(email)) {
                    isValid = false;
                    $("#emailError").text("Invalid email address.");
                }

                // Password Validation
                let password = $("#password").val();
                let passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;
                if (password === "" || !passwordRegex.test(password)) {
                    isValid = false;
                    $("#passwordError").text("Password must be at least 8 characters long and contain at least one digit, one uppercase letter, one lowercase letter, and one special character.");
                }

                // Course Selection Validation
                let course = $("#course").val();
                if (course === "") {
                    isValid = false;
                    $("#courseError").text("Please select a course.");
                }

                // If all validations are passed
                if (isValid) {
                    alert("Form submitted successfully!");
                }
            });
        });
    </script>
</body>
</html>
