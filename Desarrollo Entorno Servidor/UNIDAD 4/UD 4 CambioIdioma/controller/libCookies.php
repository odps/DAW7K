<?php

session_start();

function fnCreateCookie($name, $value)
{
    return setcookie($name, $value, time() + 3600, "/");
}

function fnCreateCookieSerialized($name, $value)
{
    return setcookie($name, serialize($value), time() + 3600, "/");
}

function fnDeleteCookie($name)
{
    if (isset($_COOKIE[$name])) {
        unset($_COOKIE[$name]);
        setcookie($name, "", time() - 1, '/');
        return true;
    } else return false;
}

function fnGetCookie($name)
{
    if (isset($_COOKIE[$name])) {
        return $_COOKIE[$name];
    } else return false;
}

function fnGetCookieSerialized($name)
{
    if (isset($_COOKIE[$name])) {
        return unserialize($_COOKIE[$name]);
    } else return false;
}

function fnCreateSession($name, $value)
{
    $_SESSION[$name] = $value;
    return true;
}

function fnCreateSessionSerialized($name, $value)
{
    $_SESSION[$name] = serialize($value);
    return true;
}

function fnDeleteSession($name)
{
    if (isset($_SESSION[$name])) {
        session_destroy();
        return true;
    } else return false;
}

function fnGetSessionValue($name)
{
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    } else return false;
}

function fnGetSessionSerialized($name)
{
    if (isset($_SESSION[$name])) {
        return unserialize($_SESSION[$name]);
    } else return false;
}

function fnClean($frase)
{
    $frase = strip_tags($frase);
    $frase = htmlspecialchars($frase, ENT_QUOTES, 'UTF-8');
    $frase = trim($frase);
    return $frase;
}
