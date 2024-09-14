<?php
include 'protect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK YOUR TICKET</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10;
            background-image: url("g4.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-position: left top;
            background-size: 1520px 680px;
            position: relative; 
        }
        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .selector-container select, .selector-container input[type="date"] {
            width: 130px; 
            height: 40px; 
            font-size: 18px; 
            text-align: center;
            border-radius: 9px;
        }
        select#source-station, select#destination-station {
            background-color: #37be3c;
            color: rgb(0, 0, 0); 
        }
        select#source-station option,select#destination-station option {
            background-color: white; 
            color: black; 
        }
        select#source-station, select#destination-station,input[type="date"] {
            background-color: #e4e4e4;
            color: rgb(0, 0, 0); 
        }
        nav {
            background-color: #4CAF50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: white;
            animation: fadeInDown 1s ease forwards;
        }
        nav h1 {
            margin: 0;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-links a {
            color: white;
            text-decoration: underline;
            margin: 0 10px;
        }
        .logo {
            width: 40px;
            height: 40px;
            background-image: url('profile.png');
            background-size: cover;
            border-radius: 50%;
            margin-right: 10px;
            animation: fadeInLeft 1s ease forwards;
        }
        .content-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 6; 
            animation: slideInUp 1s ease forwards;
        }
        .content {
            width: 90%; 
            display: flex;
            flex-direction: column; 
            align-items: center; 
        }
        .search-container {
            display: flex;
            align-items: center;
            margin-top: -33px; 
            animation: slideInLeft 1s ease forwards;
        }
        .search-form {
            display: flex;
            align-items: center;
        }
        .selector-container {
            margin-top: -42px; 
        }
        .label-container {
            margin-right: 30px;
            font-family: sans-serif; 
            display: flex;
            align-items: center;
        }
        .label-container label {
            font-size: 20px;
            margin-right: 90px; 
        }
        .footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            animation: fadeInUp 1s ease forwards;
        }
        .rail-img {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 370px; 
            height: auto; 
            margin: 46px; 
            animation: fadeInRight 1s ease forwards;
        }
        .MuiButtonBase-root {
            background-color: #4CAF50;
            color: rgb(0, 0, 0);
            margin-top: 0px; 
            padding: 12px 24px; 
            margin-right: 600px; 
            margin-left: auto;
            animation: slideInRight 1s ease forwards;
        }
        button{
            border-radius: 6px;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
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
    </style>
</head>
<body>
<div class="container">
    <nav>
        <h1>BOOK YOUR TICKET</h1>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="logout.php">log out</a>
            <div class="logo"></div>
        </div>
    </nav>
<br><br><br><br><br><br>
    <div class="content-wrapper">
        <div class="content">
            <div class="search-container">
                <div class="search-form">
                    <div class="selector-container">
                        <div class="label-container">
                            <img width="60" height="60" src="https://www.confirmtkt.com/img/icons/ic-search-from-desktop.svg" alt="search">
                            <label for="source-station" style="font-style: sans-serif;">From</label>
                        </div>
                        <select id="source-station">
                            <option value="nellore">Nellore</option>
                            <option value="hyderabad">Hyderabad</option>
                            <option value="ongole">Ongole</option>
                            <option value="banglore">Banglore</option>
                            <option value="chennai">Chennai</option>
                        </select>
                    </div>
                    <div class="selector-container">
                        <div class="label-container">
                            <img width="60" height="60" src="https://www.confirmtkt.com/img/icons/ic-search-to-desktop.svg" alt="search">
                            <label for="destination-station" style="font-style: sans-serif;">To</label>
                        </div>
                        <select id="destination-station">
                            <option value="chennai">Chennai</option>
                            <option value="banglore">Banglore</option>
                            <option value="ongole">Ongole</option>
                            <option value="hyderabad">Hyderabad</option>
                            <option value="nellore">Nellore</option>
                        </select>
                    </div>
                    <div class="selector-container">
                        <div class="label-container">
                            <img width="60" height="60" src="https://www.confirmtkt.com/img/icons/ic-search-calender-desktop.svg" alt="calender">
                            <label for="dateOfJourney" style="font-style: sans-serif;">Departure Date</label>
                        </div>
                        <input type="date" id="dateOfJourney" name="dateOfJourney">
                    </div>
                </div>
            </div><br><br><br><br>
                    <button class="MuiButtonBase-root MuiButton-root MuiButton-contained ctkt-btn-success" id="searchButton"  type="button">
                        <span class="MuiButton-label">SEARCH TRAINS</span>
                        <span class="MuiTouchRipple-root"></span>
                    </button> 
                </div>
    </div>
 <div class="footer">
        <p>©2024 Book your Train.in. All Rights Reserved</p>
    </div>
    <img class="rail-img" src="rail.png" alt="Rail Image">
</div>
<script>
    document.getElementById("searchButton").onclick = function () {
        var dateOfJourney = document.getElementById("dateOfJourney").value;
        if (dateOfJourney === "") {
            alert("Please select the Date of Journey.");
        } else {
            location.href = "Search_train.php";
        }
    };
</script>
</body>
</html>