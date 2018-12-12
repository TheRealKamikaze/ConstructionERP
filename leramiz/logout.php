<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['employeeName']);
unset($_SESSION['employeeeEmailId']);
unset($_SESSION['employeeDP']);
unset($_SESSION['employeeType']);
unset($_SESSION['employeePhoneNo']);
unset($_SESSION['employee']);
unset($_SESSION['employeeUniqueNo']);
// Delete all session variables
 session_destroy();

// Jump to login page
header('Location: index.php');

?>