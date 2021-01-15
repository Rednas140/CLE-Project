<?php

require_once "database.php";
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <title>Laura's Happy Home</title>

</head>

<body>
<header>
    <div class="navbar">
        <p class="logo" >Laura's Happy Home</p>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="reserveren.php">Reserveren</a></li>
            </ul>
        </nav>
    </div>
</header>
<div class="content">
    <form id="reserverenform" action="reserveren.php">
        <h1 class="formtitel">Reserveer:</h1>
        <div class="tab">Contactgegevens
            <p><input placeholder="Naam" oninput="this.className = ''" name="Naam"></p>
            <p><input placeholder="Straatnaam + huisnummer" oninput="this.className = ''" name="straat"></p>
            <p><input placeholder="Plaatsnaam" oninput="this.className = ''" name="plaats"></p>
            <p><input placeholder="E-mail" oninput="this.className = ''" name="email" type="email"></p>
            <p><input placeholder="Telefoon" oninput="this.className = ''" name="telefoon"></p>
        </div>
        <div class="tab">Reserveren van:
            <p><input type="date" id="start" oninput="this.className = ''" name="reserbegin" value="2020-01-11" min="2020-01-01" max="2020-12-31"></p>
            <p><input type="date" id="start" oninput="this.className = ''" name="resereind" value="2020-01-11" min="2020-01-01" max="2020-12-31"></p>
        </div>
        <div class="tab">Opmerkingen:
            <p><input placeholder="Als u nog opmerkingen heeft kan u die hier noteren" oninput="this.className = ''" name="opmerking"></p>
        </div>
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Terug</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Volgende</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>

</div>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Verstuur";
        } else {
            document.getElementById("nextBtn").innerHTML = "Volgende";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("reserverenform").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

</body>

</html>