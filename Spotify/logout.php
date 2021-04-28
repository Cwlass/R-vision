<?php
include_once "nav.php";
session_destroy();
header("location: home.php");
exit();
