<?php 
session_start();
session_unset();
session_destroy();

header("Location: moment3-2.php");
exit();