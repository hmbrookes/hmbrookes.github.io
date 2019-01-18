<?php
# Logout Page
# Team Quincelax
# Version 1

# Access session.
session_start() ;

# Navigation
include 'header.html';
require_once('loginTools.php');

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'UserID' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Goodbye' ;

# Clear session variables.
$_SESSION = array() ;

# Destroy the session.
session_destroy() ;

load('index.php');
exit();
?>