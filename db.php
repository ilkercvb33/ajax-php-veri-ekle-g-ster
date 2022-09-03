<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
}catch(PDOException $e) {
    $e->getMessage();
}
?>