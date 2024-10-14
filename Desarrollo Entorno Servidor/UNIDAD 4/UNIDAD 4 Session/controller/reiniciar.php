<?php
//session_start();

include "./libs/libCookies.php";

if (isset($_SESSION["frasesConocidas"])) {
  fnDeleteSession("frasesConocidas");

  header("Location: ../index.php");
} else {
  header("Location: ../index.php");
}
