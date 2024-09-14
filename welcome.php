<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <style>
    body {
      margin: 0;
      padding: 10px;
      background-image: url('welf.jpg');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: flex-start; 
    }
    h1, h2 {
      font-family: Candara, sans-serif; 
      color: #000000; 
      font-size: 45px;
      margin-left: 40px; 
      opacity: 0;
      animation: fadeIn 2s ease forwards; 
    }
    h2{
        color: #242424;
        animation: slideInLeft 2s ease forwards; 
    }
    h1{
        color: #242424;
        margin-bottom: -0px;
    }
    #getStartedBtn {
      padding: 20px 30px;
      font-size: 18px;
      background-color: #3a3a3a;
      color: #ffffff;
      border: none;
      border-radius: 15px;
      cursor: pointer;
      margin-top: -15px; 
      margin-left: 130px; 
      opacity: 0; 
      animation: fadeIn 2s ease forwards; 
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    
    @keyframes slideInLeft {
      from {
        transform: translateX(-100%); 
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }
  </style>
</head>
<body>
    <h1>NORTH NORFOLK RAILWAY</h1>
    <h2>Welcomes you!!</h2>
  <button id="getStartedBtn" onclick="window.location.href='registration.php'"><b>Get Started </b>
  </button>
</body>
</html>