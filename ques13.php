<?php
// Handle the AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $username = trim($_POST['username']);

    if ($username === '') {
        echo 'Invalid username';
        exit;
    }

    // Database connection
    $host = 'localhost';
    $dbname = 'question13';
    $user = 'root';
    $pass = '';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        echo 'Database connection failed';
        exit;
    }

    // Check if username exists
    $stmt = mysqli_prepare($conn, 'SELECT COUNT(*) FROM users WHERE username = ?');
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    if ($count == 0) {
        echo 'Username is available';
    } else {
        echo 'Username is not available';
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, input {
            display: block;
            margin: 10px 0;
        }
        #status {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Password Reset</h1>
    <form id="resetForm">
        <label for="username">Enter your username:</label>
        <input type="text" id="username" name="username" autocomplete="off" required>
        <div id="status"></div>
    </form>

    <script>
        document.getElementById('username').addEventListener('input', function () {
            const username = this.value.trim();
            const statusDiv = document.getElementById('status');

            if (username.length === 0) {
                statusDiv.textContent = ''; // Clear status if input is empty
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Current page handles the request
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;

                    if (response === 'Username is available') {
                        statusDiv.textContent = 'Username is available';
                        statusDiv.style.color = 'green';
                    } else if (response === 'Username is not available') {
                        statusDiv.textContent = 'Username is not available';
                        statusDiv.style.color = 'red';
                    } else {
                        statusDiv.textContent = response;
                        statusDiv.style.color = 'orange';
                    }
                } else if (xhr.readyState === 4) {
                    statusDiv.textContent = 'Error checking username';
                    statusDiv.style.color = 'orange';
                }
            };

            xhr.send(`username=${encodeURIComponent(username)}`);
        });
    </script>
</body>
</html>
