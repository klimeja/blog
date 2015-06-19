<?php
include 'databaze.php';
?>
            <?php
            $kategorie = $_GET["kategorie"];
            $db = new databaze("$kategorie");
            $db->vyber();
            ?>

