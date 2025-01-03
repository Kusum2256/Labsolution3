<?php
// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['country'])) {
    $country = trim($_POST['country']);

    // Database connection
    $host = 'localhost';
    $dbname = 'location_data';
    $user = 'root';
    $pass = '';

    $conn = mysqli_connect($host, $user, $pass, $dbname);

    if (!$conn) {
        echo 'Database connection failed';
        exit;
    }

    // Fetch cities for the selected country
    $stmt = mysqli_prepare($conn, 'SELECT city_name FROM cities WHERE country_name = ?');
    mysqli_stmt_bind_param($stmt, 's', $country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $city);

    $cities = [];
    while (mysqli_stmt_fetch($stmt)) {
        $cities[] = $city;
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Return cities as plain text separated by commas
    echo implode(',', $cities);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country and City Dropdown</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label, select {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Select Country and City</h1>
    <form>
        <label for="country">Country:</label>
        <select id="country">
            <option value="">-- Select a Country --</option>
            <option value="USA">USA</option>
            <option value="India">India</option>
            <option value="Nepal">Nepal</option>
        </select>

        <label for="city">City:</label>
        <select id="city">
            <option value="">-- Select a City --</option>
        </select>
    </form>

    <script>
        document.getElementById('country').addEventListener('change', function () {
            const country = this.value;
            const cityDropdown = document.getElementById('city');

            // Clear the city dropdown
            cityDropdown.innerHTML = '<option value="">-- Select a City --</option>';

            if (!country) return;

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Current page handles the request
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;

                    if (response) {
                        const cities = response.split(',');
                        cities.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city;
                            option.textContent = city;
                            cityDropdown.appendChild(option);
                        });
                    }
                }
            };

            xhr.send(`country=${encodeURIComponent(country)}`);
        });
    </script>
</body>
</html>
