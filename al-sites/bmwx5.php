<!doctype html>
<html lang="hu">

<head>
	<title>JR-Kereskedés</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css" media="all">
	<link rel="icon" type="image/png" href="pics/favicon.png">
</head>

<body class="bg-secondary">



	<!--
navbar komponens:
https://getbootstrap.com/docs/4.4/components/navbar/
-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<a class="navbar-brand" href="#">JR.Kereskedés</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="#">Kezdőlap <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item"><a class="nav-link" href="#rolunk">Rólunk</a></li>
				<li class="nav-item"><a class="nav-link" href="#autok">Autók</a></li>
				<li class="nav-item"><a class="nav-link" href="#autok">Elérhetőségek</a></li>
			</ul>
		</div>
	</nav>

<div class="text-center">
  <div style="max-width: 600px; margin: 0 auto;">
    <img src="../pics/bmwx5.jpg" class="img-thumbnail img-fluid" alt="Car Image">
  </div>
</div>
      

  <form class="text-center formula rounded" method="post" action="bmwx5.php" id="rentalForm">
  <label for="day">Születési dátum:</label>
<input type="date" id="birthdate" name="birthdate"><br>


    <label for="week">Hét:</label>
    <input type="number" id="week" name="week" min="1" max="4"><br>

    <label for="transmission">Váltó:</label>
    <input type="radio" id="auto" name="transmission" value="Automatikus">Automatikus
    <input type="radio" id="manual" name="transmission" value="Kézi">Kézi<br>

    <input type="submit" name="submit" value="Kibérlési kérelem elküldése" id="submitButton" class="btn btn-success" disabled>
  </form>
  
  <?php
$message = ""; // Alapértelmezett üzenet

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $name = $_POST["name"];
  $day = $_POST["birthdate"];
  $week = $_POST["week"];
  $transmission = $_POST["transmission"];

  $to = "jszrl2003@gmail.com"; // Az e-mail cím, ahová az űrlap adatait küldjük
  $subject = "Kibérlési kérelem";
  $emailMessage = "Kibérlési információk:\nNév: $name\nSzületési dátum: $day\nHét: $week\nVáltó: $transmission";
  $headers = "From: autoberles@webdeveloperss.hu"; // Módosítsd a feladó e-mail címét

  if (mail($to, $subject, $emailMessage, $headers)) {
    $message = "Az e-mail elküldése sikeres volt!";
  } else {
    $message = "Az e-mail küldése sikertelen!";
  }
}
?>

<!-- Itt jelenítsd meg az űrlapot -->
<form method="post" action="lamborgini.php">
  <!-- Az űrlap mezői és gombja itt vannak -->
</form>

<!-- Itt jelenítsd meg az üzenetet -->
<div id="message">
  <?php echo $message; ?>
</div>



  <div id="price" class="text-center"><span id="weeklyPrice"></span></div>
  <div id="ageMessage" class="text-center"></div>

  <script>
    // JavaScript kód az életkor ellenőrzéséhez és a gomb állapotának frissítéséhez
    const rentalForm = document.getElementById("rentalForm");
    const birthdateInput = document.getElementById("birthdate");
    const weekInput = document.querySelector('[name="week"]');
    const weeklyPriceDisplay = document.getElementById("weeklyPrice");
    const ageMessage = document.getElementById("ageMessage");
    const submitButton = document.getElementById("submitButton");
    const autoRadio = document.getElementById("auto");
    const manualRadio = document.getElementById("manual");

    rentalForm.addEventListener("input", updateSubmitButtonState);
    autoRadio.addEventListener("input", updateSubmitButtonState);
    manualRadio.addEventListener("input", updateSubmitButtonState);

    function updateSubmitButtonState() {
      const birthdate = new Date(birthdateInput.value);
      const currentDate = new Date();
      const age = currentDate.getFullYear() - birthdate.getFullYear();
      const isFormValid = age >= 18 && birthdateInput.value !== "" && weekInput.value !== "" && (autoRadio.checked || manualRadio.checked);

      if (isFormValid) {
        ageMessage.textContent = "";
        updateWeeklyPrice();
        submitButton.disabled = false;
      } else {
        if (age < 18) {
          ageMessage.textContent = "Nem bérelhetsz autót, ha nem töltötted be a 18. életévedet!\n(Vagy nem valós dátumot adtál meg!)";
          ageMessage.style.whiteSpace = "pre-line";
          ageMessage.style.color = "red"; 
          ageMessage.style.fontWeight = "bold";
        } else {
          ageMessage.textContent = "";
        }
        weeklyPriceDisplay.textContent = "Heti ár: 0 Ft";
        submitButton.disabled = true;
      }
    }

    function updateWeeklyPrice() {
      const weeks = parseInt(weekInput.value, 10);
      const price = weeks * 22500; // 21,000 Ft/hét áron
      weeklyPriceDisplay.textContent = "Heti ár: " + price + " Ft";
      weeklyPriceDisplay.style.fontWeight = "bold";
      weeklyPriceDisplay.style.color = "#7FFF00";
      weeklyPriceDisplay.style.fontSize = "20px";
    }
  </script>





	

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>



</body>

</html>
