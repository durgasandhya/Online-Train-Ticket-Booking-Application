<?php
include 'protect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Success</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fafffa;
    }
    nav {
        background-color: #4CAF50;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        color: white;
    }
    nav h1 {margin: 0;}
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
    .content {
        padding: 20px;
        margin-bottom: 100px; 
    }
    .passenger-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 25px; 
    }
    .passenger-table th, .passenger-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .passenger-table th {background-color: #f2f2f2;}
    .download-button {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        width: 200px;
    }
    .flower{
        position: absolute;
        bottom: 0;
        right: 0;
        width: 340px; 
        height: auto; 
        margin: 20px; 
        margin-right: 0px;
        margin-bottom: +50px;
    }
    @keyframes blink-red {
        0% { color: red; }
        50% { color: transparent; }
        100% { color: red; }
    }
    .blink-red p {animation: blink-red 1s infinite;}
    .footer {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    @keyframes slideIn {
        0% {
          transform: translateY(-50px);
          opacity: 0;
        }
        100% {
          transform: translateY(0);
          opacity: 1;
        }
      }
      #successHeading {animation: slideIn 0.5s ease-out;}
</style>
</head>
<body>
    <nav>
        <h1>BOOK YOUR TICKET</h1>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="logout.php">Log Out</a>
            <a href="book_ticket.html">Book Ticket</a>
            <div class="logo"></div>
        </div>
    </nav>
<div class="content">
    <h1 id="successHeading" style="text-align: center;">Your Ticket is Successfully Booked</h1>
    <!-- <center><p>Thank you for choosing us.</p></center><br> -->
    <center><?php
    if (isset($_SESSION['username'])) {
        echo '<p> Thank you for choosing us ' . $_SESSION['username'] .  '</p>';
    } else {
        echo '<p>Thank you for choosing us.</p>';
    }
    ?></center>
    <img src="t1.png" alt="Bottom Image" class="flower">
    <table class="passenger-table" style="font-size: 15px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Berth No.</th>
            </tr>
        </thead>
        <tbody id="passengerDetails">
            <!-- Passenger details will be dynamically added here -->
        </tbody>
    </table><br>
    <div class="blink-red" style="text-align: center;">
        <p style="display: inline-block; vertical-align: middle; ">Download your ticket here</p>
        <img src="darrow.png" alt="emoji" width="50px" height="auto" style="display: inline-block; vertical-align: middle;">
    </div>
    <a href="#" id="downloadButton" class="download-button">Download Your Ticket</a>
</div>
<div class="footer"><p>©2024 Book your Train.in. All Rights Reserved</p></div>
<!-- Include jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    function generateBerthNumber() {
        return Math.floor(Math.random() * 200) + 1;
    }
    var queryString = window.location.search.substring(1);
    var params = new URLSearchParams(queryString);
    var passengerDetails = [];
    params.forEach((value, key) => {
        var passengerIndex = parseInt(key.split('_')[1]);
        if (!passengerDetails[passengerIndex]) {
            passengerDetails[passengerIndex] = {};
        }
        if (key.startsWith('name')) {
            passengerDetails[passengerIndex].name = value;
        } else if (key.startsWith('age')) {
            passengerDetails[passengerIndex].age = value;
        }
    });
    var tableBody = document.getElementById('passengerDetails');
    passengerDetails.forEach(passenger => {
        var row = tableBody.insertRow();
        row.insertCell(0).textContent = passenger.name;
        row.insertCell(1).textContent = passenger.age;
        row.insertCell(2).textContent = generateBerthNumber(); // Generate random berth number
    });
    document.getElementById('downloadButton').addEventListener('click', function() {
        const pdf_btn = document.createElement('a');
        pdf_btn.setAttribute('id', 'toPDF');
        const customers_table = document.querySelector('.passenger-table');
        const toPDF = function(customers_table) {
            const html_code = `
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Table Data</title>
            <style>
                .passenger-table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 25px; 
                }
                .passenger-table th, .passenger-table td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }
                .passenger-table th {
                    background-color: #f2f2f2;
                }
            </style>
            </head>
            <body>
            <table class="passenger-table">${customers_table.innerHTML}</table>
            </body>
            </html>`;
            const new_window = window.open();
            new_window.document.write(html_code);
            setTimeout(() => {
                new_window.print();
                new_window.close();
            }, 400);
        }
        pdf_btn.onclick = () => {
            toPDF(customers_table);
        };
        pdf_btn.click();
    });
});
</script>
</body>
</html>