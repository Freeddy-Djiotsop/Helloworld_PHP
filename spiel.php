<?php
$zahl = 150;
require 'header.php';
?>

<form action="/jeu.php" method="GET">
    <input type="number" name="ziffer" placeholder="zwischen 0 und 1000">
</form>

<?php require 'footer.php';?>