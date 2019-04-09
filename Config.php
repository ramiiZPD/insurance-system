<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'phpmyadminuser');
   define('DB_PASSWORD', 'password');
   define('DB_DATABASE', 'insurance-system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>