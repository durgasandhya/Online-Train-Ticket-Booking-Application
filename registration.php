<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background-image: url("ttt.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 48%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        /* Create two unequal columns that float next to each other */
        .row {
            display: flex;
            justify-content: space-around;
        }
        .column {
            flex: 1;
            padding: 20px;
        }
        .left {
            width: 50%;
        }
        .right {
            width: 50%;
            padding: 40px;
            border-radius: 20px;
            background: #fff;
            animation: slideInRight 1s ease forwards;
        }
        table {
            width: 100%;
            font-size: large;
        }
        table td {
            padding: 9.2px;
            position: relative;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: calc(100% - 30px);
            padding: 10px 30px 10px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            color: #000;
        }
        label {
            margin-bottom: 5px;
            color: #999;
        }
        button {
            padding: 10px 20px;
            background: #28a745;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s;
            width: 100%;
        }
        button:hover {
            background: #218838;
        }
        .right h1 {
            text-align: center;
            margin-top: 40px;
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .login-link {
            margin-top: 20px;
            color: #28a745;
            text-decoration: none;
            font-size: 14px;
        }
        .login-link:hover {
            text-decoration: underline;
        }
        .fas {
            color: #28a745;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="column left"></div>
        <div class="column right">
            <h1>Create Your Account</h1>
           <p style="margin-bottom:-50px;"></p>
            <form id="registrationForm" action="register.php" method="POST">
                <table>
                    <tr>
                        <td><label for="fullName">Full Name</label></td>
                        <td><input type="text" id="fullName" name="fullName" required></td>
                        <td><i class="fas fa-user"></i></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td><label for="phoneNumber">Phone Number</label></td>
                        <td><input type="tel" id="phoneNumber" name="phoneNumber" required></td>
                        <td><i class="fas fa-phone"></i></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="email" id="email" name="email" required></td>
                        <td><i class="fas fa-envelope"></i></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" id="password" name="password" required></td>
                        <td><i class="fas fa-lock"></i></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td><label for="confirmPassword">Confirm Password</label></td>
                        <td><input type="password" id="confirmPassword" name="confirmPassword" required></td>
                        <td><i class="fas fa-lock"></i></td><br><br>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <br><td colspan="2"><button type="submit">Sign Up</button></td><br>
                    </tr>
                    
                </table>
            </form>
            <center>
            <h3><p>Already have an account? <a href="login_page.php" class="login-link">Log in</a></p></h3></center>
        </div>
    </div>
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault();
    
            const fullName = document.getElementById('fullName').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
    
            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }
    
            if (!/^\d{10}$/.test(phoneNumber)) {
                alert('Invalid phone number. It should be 10 digits.');
                return;
            }
    
            // Send form data to server
            fetch('register.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    fullName: fullName,
                    phoneNumber: phoneNumber,
                    email: email,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.href = 'login_page.php'; // Redirect to login page
                } else {
                    alert(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
    
</body>
</html>
