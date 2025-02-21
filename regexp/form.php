<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validation</title>
    <script>
        function validateForm(event) {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const emailError = document.getElementById("emailError");
            const passwordError = document.getElementById("passwordError");

            // Email Regex: Only allows Gmail addresses
            const emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

            // Password Regex: At least 8 characters, one uppercase, one lowercase, one number, one special character
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            let isValid = true;

            // Validate Email
            if (!emailRegex.test(email)) {
                emailError.textContent = "Invalid email. Only Gmail addresses allowed.";
                isValid = false;
            } else {
                emailError.textContent = "";
            }

            // Validate Password
            if (!passwordRegex.test(password)) {
                passwordError.textContent = "Password must be at least 8 characters long, include uppercase, lowercase, a number, and a special character.";
                isValid = false;
            } else {
                passwordError.textContent = "";
            }

            if (!isValid) {
                event.preventDefault(); // Stop form submission
            }
        }
    </script>
</head>
<body>

    <h2>Password Validation with Error Messages</h2>
    <form action="submit.php" method="post" onsubmit="validateForm(event)">
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" placeholder="Enter your Gmail" required>
        <p id="emailError" style="color: red;"></p><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <p id="passwordError" style="color: red;"></p><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
