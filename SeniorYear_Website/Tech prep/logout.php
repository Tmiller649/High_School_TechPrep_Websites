<?php
 //Signs the admin out and takes them back to the login page
session_start();
session_unset();
session_destroy();
header("Location: adminlogin.php");