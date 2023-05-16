<?php
session_start();

$_SESSION["username"]= "rakib";

echo $_SESSION["username"];



session_unset();

?>