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
        font-family: "Cool jazz";
        font-size: 18px;
        font-style: cool Jass;
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
    form {
        margin: 20px auto;
        max-width: 500px;
        padding: 20px;
        border-radius: 5px;
        background-color: transparent;
    }
    label {
        width: 100px;
        display: inline-block;
        vertical-align: top;
    }
    input[type="text"], input[type="number"], input[type="tel"] {
        border: none;
        border-bottom: 1px solid #4CAF50;
        margin-bottom: 10px;
        padding: 5px;
        width: calc(100% - 110px);
        outline: none;
        display: inline-block;
    }
    input[type="radio"] {margin-right: 5px;}
    .passenger {
        margin-bottom: 20px;
        background-color: transparent;
        border: none;
        font-size: 20px;
    }
    #fareDetails {margin-bottom: 20px;}
    #totalAmount {text-align: center;}
    #paymentButton {
        display: block;
        margin: auto;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    #imageContainer {
        width: 100%;
        margin-bottom: 20px;
        position: relative;
    }
    #imageContainer img {
        width: 100%;
        height: auto;
    }
    .image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }
    .flower{
        position: absolute;
        bottom: 0;
        right: 0;
        width: 390px; 
        height: auto; 
        margin: 30px; 
        margin-right: 0px;
        margin-bottom: -780px;
    }
form {
    margin: 20px auto;
    max-width: 500px;
    padding: 20px;
    border-radius: 5px;
    background-color: transparent;
    animation: fadeInUp 1s ease forwards;
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
#addPassenger {
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    height: 32px;
}
#addPassenger:hover {background-color: #45a049;}
#paymentButton {
    display: block;
    margin: auto;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
#paymentButton:hover {background-color: #45a049;}
#passengerContainer {
    text-align: center;
    animation: slideInLeft 1s ease forwards;
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
</style>
</head>
<body style="background-color:#f0f3f0">
<nav>
    <h1>BOOK YOUR TICKET</h1>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="book_ticket.php">Book Ticket</a>
        <div class="logo"></div>
    </div>
</nav>
<div id="imageContainer">
    <img src="upimage111.jpg" alt="Top Image">
</div>
</center>
<img src="f3.png" alt="Bottom Image" class="flower">
<form id="bookingForm">
    <div id="passengerContainer" style="text-align: center;">
        <h2 style="color: #1fa724; font-style:Arial;">Passenger Details</h2><br>
        <div class="passenger">
            <label for="name">Name:</label><br><br>
            <input type="text" class="name" name="name" pattern="[A-Za-z ]+" title="Name should contain only alphabets" required><br><br><br>&nbsp;&nbsp;
            <label for="age">Age:</label><br><br>
            <input type="number" class="age" name="age" min="5" max="150" required>
            <p>Children under 5yrs do not require a ticket to travel!</p><br>
            <label>Gender:</label><br><br><br>
            <input type="radio" class="gender" name="gender_${passengerIndex}" value="male" required><label>Male</label>
            <input type="radio" class="gender" name="gender_${passengerIndex}" value="female" required><label>Female</label>
            <input type="radio" class="gender" name="gender_${passengerIndex}" value="other" required><label>Other</label>
            <br><br><br><br>
            <label for="phone">Phone No:</label><br><br>
            <input type="tel" class="phone" name="phone" pattern="[0-9]{10}" title="Phone number should contain only 10 digits" required>
            <br><br><br>
            <label for="preference">Preference:</label>
            <select name="preference" class="preference">
                <option value="general">General Seat</option>
                <option value="window">Window Seat</option>
            </select><br>
        </div>
    </div>
    <button type="button" id="addPassenger">+ Add Passenger</button>
    <div id="fareDetails">
        <h2>Fare Details</h2>
        <p>Total Adults: <span id="totalAdults">0</span></p>
        <p>Total Children: <span id="totalChildren">0</span></p>
        <p>Total Fare: ₹<span id="totalFare">0</span></p>
    </div>
    <div id="totalAmount">
        <button type="button" id="paymentButton">Proceed to Pay</button>
    </div>
</form>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const addPassengerBtn = document.getElementById("addPassenger");
    const paymentBtn = document.getElementById("paymentButton");
    const totalAdults = document.getElementById("totalAdults");
    const totalChildren = document.getElementById("totalChildren");
    const totalFare = document.getElementById("totalFare");
    let passengerIndex = 1; 
    let passengersData = []; // Array to store passenger details
    function calculateFare() {
        let adultCount = 0;
        let childCount = 0;
        let totalFareAmount = 0;
        passengersData.forEach(passenger => {
            const age = passenger.age;
            if (age >= 14) {
                adultCount++;
                totalFareAmount += 170;
            } else if (age >= 5) {
                childCount++;
                totalFareAmount += 58;
            }
        });
        totalAdults.textContent = adultCount;
        totalChildren.textContent = childCount;
        totalFare.textContent = totalFareAmount;
    }
    // Event listener for adding new passengers
    addPassengerBtn.addEventListener("click", function() {
        const passengerDiv = document.createElement("div");
        passengerDiv.className = "passenger";
        passengerDiv.innerHTML = `
            <div class="passenger"><br>
                <label for="name">Name:</label><br><br>
                <input type="text" class="name" name="name" pattern="[A-Za-z ]+" title="Name should contain only alphabets" required><br><br><br>
                <label for="age">Age:</label><br><br>
                <input type="number" class="age" name="age" min="5" max="150" required><br><br><br>
                <label>Gender:</label><br><br><br>
                <input type="radio" class="gender" name="gender_${passengerIndex}" value="male" required><label>Male</label>
                <input type="radio" class="gender" name="gender_${passengerIndex}" value="female" required><label>Female</label>
                <input type="radio" class="gender" name="gender_${passengerIndex}" value="other" required><label>Other</label><br><br><br><br>
                <label for="phone">Phone No:</label><br><br>
                <input type="tel" class="phone" name="phone" pattern="[0-9]{10}" title="Phone number should contain only 10 digits" required><br><br><br>
                <label for="preference">Preference:</label>
                <select name="preference" class="preference">
                    <option value="general">General Seat</option>
                    <option value="window">Window Seat</option>
                </select><br>
            </div>
        `;
        document.getElementById("passengerContainer").appendChild(passengerDiv);
        passengerIndex++; // Increment the passenger index for the next passenger
    });
    document.getElementById("passengerContainer").addEventListener("input", function(event) {
        const target = event.target;
        if (target.classList.contains("name") || target.classList.contains("age") || target.classList.contains("phone")) {
            const passengerIndex = Array.from(target.closest(".passenger").parentElement.children).indexOf(target.closest(".passenger"));
            const name = passengersData[passengerIndex] ? passengersData[passengerIndex].name : '';
            const age = passengersData[passengerIndex] ? passengersData[passengerIndex].age : '';
            const phone = passengersData[passengerIndex] ? passengersData[passengerIndex].phone : '';
            passengersData[passengerIndex] = {
                name: target.classList.contains("name") ? target.value : name,
                age: target.classList.contains("age") ? parseInt(target.value) : age,
                phone: target.classList.contains("phone") ? target.value : phone
            };
            calculateFare(); 
        }
    });
    paymentBtn.addEventListener("click", function() {
        const passengers = document.querySelectorAll(".passenger");
        let allDetailsEntered = true;
        passengers.forEach(passenger => {
            const name = passenger.querySelector(".name").value.trim();
            const age = passenger.querySelector(".age").value.trim();
            const gender = passenger.querySelector('input[name^="gender"]:checked');
            const phone = passenger.querySelector(".phone").value.trim();
            if (name === "" || age === "" || gender === null || phone === "") {
                alert("Please fill in all details for each passenger.");
                allDetailsEntered = false;return;
            }
            if(age>150 || age<5){
                alert("Age should be between 5 and 150.");
                allDetailsEntered = false;return;
            }
            if (!name.match(/^[a-zA-Z ]+$/)) {
                alert("Name should contain only alphabets.");
                allDetailsEntered = false;return;
            }
            if (!phone.match(/^\d{10}$/)) {
                alert("Phone number should contain exactly 10 digits.");
                allDetailsEntered = false;return;
            }
        });
        if (allDetailsEntered) {
            const passengerQueryString = passengersData.map((passenger, index) => {
                return `name_${index}=${encodeURIComponent(passenger.name)}&age_${index}=${encodeURIComponent(passenger.age)}&gender_${index}=${encodeURIComponent(passenger.gender)}&phone_${index}=${encodeURIComponent(passenger.phone)}`;
            }).join('&');
            window.location.href = `success.php?${passengerQueryString}`;
        }
    });
});
</script>
</body>
</html>