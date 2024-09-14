<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #28a745;
            margin: 0;
            color: #000;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            height: auto;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #000;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        input {
            width: calc(100% - 30px);
            padding: 10px 30px 10px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            color: #000;
        }

        label {
            position: absolute;
            top: 10px;
            left: 0;
            transition: all 0.3s;
            color: #999;
        }

        input:focus + label,
        input:not(:placeholder-shown) + label {
            top: -10px;
            left: 0;
            color: #28a745;
            font-size: 12px;
        }

        .input-group i {
            position: absolute;
            top: 10px;
            right: 0;
            color: #28a745;
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
            margin: 5px;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Login</h2>
    <form id="loginForm" action="login.php" method="post">
        <div class="input-group">
            <input type="email" id="email" name="username" required>
            <label for="username">Email</label>
            <i class="fas fa-envelope"></i>
        </div>
        <div class="input-group">
            <input type="password" id="password" name="password" required>
            <label for="password">Password</label>
            <i class="fas fa-lock"></i>
        </div>
        <br>
        <button type="submit" class="login-btn">Login</button>
        <button type="button" class="back-btn" onclick="window.location.href='registration.php'">Back</button>
    </form>
</div>

<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var form = this;
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'login.php', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                alert(response.message); 
                if (response.status === "success") {
                    localStorage.setItem('username', response.firstName);
                    window.location.href = "home.php";
                }
            } else {
                alert('An error occurred during the login process.');
            }
        };
        xhr.send(formData);
    });
</script>

</body>
</html>
