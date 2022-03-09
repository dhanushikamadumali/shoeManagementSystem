<?php
if (!isset($_SESSION["user"])) {//if not session user
    ?> <script> window.location = "../index.php" </script> <?php //riderect index
}
?>