<?php

include "./libs/libCookies.php";

if (isset($_COOKIE["frasesConocidas"])) {
  fnDeleteCookie("frasesConocidas");

  header("Location: ../index.php");
} else {
  header("Location: ../index.php");
}
