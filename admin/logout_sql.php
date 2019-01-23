<?php
session_start();
session_destroy();

header('Location: http://localhost/project/admin/index.php');
?>