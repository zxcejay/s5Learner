<?php
$username = 'root';
$password = '';
$db = "s5Learner";
try {
    $conn = new PDO('mysql:host=localhost;dbname='.$db.'', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>