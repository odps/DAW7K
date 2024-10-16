<?php
include "libCookies.php";

if (isset($_POST['lang'])) {
    $lang = $_POST['lang'];
    fnCreateCookie("lang", $lang);
    header("Location: ../content.php");
}
