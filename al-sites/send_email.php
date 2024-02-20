<?php
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $name = $_POST["name"];
  $day = $_POST["birthdate"];
  $week = $_POST["week"];
  $transmission = $_POST["transmission"];

  $to = "jszrl2003@gmail.com";
  $subject = "Kibérlési kérelem";
  $emailMessage = "Kibérlési információk:\nNév: $name\nSzületési dátum: $day\nHét: $week\nVáltó: $transmission";
  $headers = "From: autoberles@webdeveloperss.hu";

  if (mail($to, $subject, $emailMessage, $headers)) {
    $message = "Az e-mail elküldése sikeres volt!";
  } else {
    $message = "Az e-mail küldése sikertelen!";
  }
}
?>
