<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'bookstore');

$connection = mysqli_connect(HOST, USER, PASS, DB) or die('Unable Connect');