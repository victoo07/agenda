<!-- Passo 3.3 - Começe a programar construindo o url.php  -->

<?php
    $BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';
