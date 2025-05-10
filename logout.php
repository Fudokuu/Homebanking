<?php
session_start();
// Distruggi la sessione
session_destroy();
// Reindirizza all'homepage
header("Location: login.html");
exit();
?>