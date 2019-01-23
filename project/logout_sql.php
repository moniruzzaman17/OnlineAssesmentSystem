<?php
session_start();
session_destroy();
include 'utillclass.php';

header('Location: http://localhost/project/index.php');
?>