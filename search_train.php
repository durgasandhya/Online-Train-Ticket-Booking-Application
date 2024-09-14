<?php
include 'protect.php';
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BOOK YOUR TICKET</title>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    nav {
        background-color: #4CAF50;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        color: white;
    }
    nav h1 { margin: 0;}
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
    }
    .container {padding: 20px;}
    .train {
        margin-bottom: 20px;
        border-radius: 10px;
        padding: 20px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        animation: fadeInUp 0.5s ease-in-out;
    }
    .train:nth-child(odd) {animation-delay: 0.1s;}
    .train:nth-child(even) {animation-delay: 0.2s;}
    .train:nth-child(2n) {background-color: #ffcccc;}
    .train:nth-child(3n) {background-color: #b3ffb3; }
    .train:nth-child(4n) {background-color: #ffff99; }
    .train:nth-child(5n) {background-color: #ffcc80; }
    .train:nth-child(1) {background-color: #dbbff1; }
    .train:nth-child(6n) {background-color: #add8e6; }
    .train h1, .train h2, .train h3 {margin: 0;}
    .train-details {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .train-name {
        margin-bottom: 10px;
        display: flex;
        align-items: center; 
    }
    .train-name h1 {margin-right: 120px; }
    .dept-arrival {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .dept, .arrival {
        flex: 1;
        text-align: left;
    }
    .dept:nth-child(odd){margin-left: 540px;}
    .duration {
        flex: 1;
        text-align: center;
        margin-right: 70px;
    }
    .fare {
        text-align: right;
        margin-right: 50px;
    }
    .image {
        width: 170px;
        height: 170px;
        border-radius: 50%;
    }
    @keyframes slideInDown {
        0% {
            transform: translateY(-100%);
            opacity: 0;
        }
        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
</head>
<body>
    <nav>
        <h1>BOOK YOUR TICKET</h1>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="logout.php">log out</a>

            <div class="logo"></div>
        </div>
    </nav>
    <div class="container">
        <div class="train" onclick="window.location.href='book_ticket.php'">
            <img src="left.png.png" alt="Image Left" class="image">
            <div class="train-details">
                <div class="train-name">
                    <h1>Pinakini SF Exp</h1>
                    <div class="fare">
                        <h1>₹100</h1>
                    </div>
                </div>
                <div class="dept-arrival">
                    <div class="dept">
                        <h2>Departure:</h2>
                        <h3>NLR</h3>
                    </div>
                    <div class="duration">
                        <h2>5hrs 18min</h2>
                    </div>
                    <div class="arrival">
                        <h2>Arrival:</h2>
                        <h3>HYD</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="train" onclick="window.location.href='book_ticket.php'">
            <div class="train-details">
                <div class="train-name">
                    <h1>Krishna SF Exp</h1>
                    <div class="fare">
                        <h1>₹115</h1>
                    </div>
                </div>
                <div class="dept-arrival">
                    <div class="dept">
                        <h2>Departure:</h2>
                        <h3>HYD</h3>
                    </div>
                    <div class="duration">
                        <h2>3hrs 45min</h2>
                    </div>
                    <div class="arrival">
                        <h2>Arrival:</h2>
                        <h3>ONG</h3>
                    </div>
                </div>
                </div>
                <img src="right.png.png" alt="Image Right" class="image">
        </div>
                <div class="train" onclick="window.location.href='book_ticket.php'">
                <img src="left.png.png" alt="Image Left" class="image">
                <div class="train-details">
                    <div class="train-name">
                        <h1>Sabari Express</h1>
                        <div class="fare">
                            <h1>₹120</h1>
                        </div>
                    </div>
                    <div class="dept-arrival">
                        <div class="dept">
                            <h2>Departure:</h2>
                            <h3>DEL</h3>
                        </div>
                        <div class="duration">
                            <h2>8hrs 30min</h2>
                        </div>
                        <div class="arrival">
                            <h2>Arrival:</h2>
                            <h3>BOM</h3>
                        </div>
                    </div>
                </div>
                </div>
                <div class="train" onclick="window.location.href='book_ticket.php'">   
                <div class="train-details">
                    <div class="train-name">
                        <h1>Circar Express</h1>
                        <div class="fare">
                            <h1>₹95</h1>
                        </div>
                    </div>
                    <div class="dept-arrival">
                        <div class="dept">
                            <h2>Departure:</h2>
                            <h3>MUM</h3>
                        </div>
                        <div class="duration">
                            <h2>6hrs 15min</h2>
                        </div>
                        <div class="arrival">
                            <h2>Arrival:</h2>
                            <h3>BLR</h3>
                        </div>
                    </div>
                </div>
                <img src="right.png.png" alt="Image Right" class="image">
                </div>
                <div class="train" onclick="window.location.href='book_ticket.php'">
                <img src="left.png.png" alt="Image Left" class="image">
                <div class="train-details">
                    <div class="train-name">
                        <h1>Chennai SF Exp</h1>
                        <div class="fare">
                            <h1>₹110</h1>
                        </div>
                    </div>
                    <div class="dept-arrival">
                        <div class="dept">
                            <h2>Departure:</h2>
                            <h3>KOL</h3>
                        </div>
                        <div class="duration">
                            <h2>9hrs 20min</h2>
                        </div>
                        <div class="arrival">
                            <h2>Arrival:</h2>
                            <h3>CHN</h3>
                        </div>
                    </div>
                </div>
                </div>
                <div class="train" onclick="window.location.href='book_ticket.php'">
                <div class="train-details">
                    <div class="train-name">
                        <h1>Simhapuri Exp</h1>
                        <div class="fare">
                            <h1>₹150</h1>
                        </div>
                    </div>
                    <div class="dept-arrival">
                        <div class="dept">
                            <h2>Departure:</h2>
                            <h3>PUN</h3>
                        </div>
                        <div class="duration">
                            <h2>4hrs 40min</h2>
                        </div>
                        <div class="arrival">
                            <h2>Arrival:</h2>
                            <h3>AMD</h3>
                        </div>
                    </div>
                </div>
                <img src="right.png.png" alt="Image Right" class="image">
                </div>
                </div>    
    </body>
</html>     