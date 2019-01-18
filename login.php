<?php
# Login Page
# Team Quincelax
# Version 1

# Navigation
include ( 'header.html' ) ;
session_start();

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
    echo '<p id="err_msg">Oops! There was a problem:<br>' ;
    foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
    echo 'Please try again or Register</p>' ;
}
?>

<!-- Body -->
<div class = "formRL">
    <h1>Login</h1>
    <p>If you already have an account please login.</p>

    <form action="loginAction.php" method="post">

        <label for="email">Email: </label>
        <input type="text" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Email"name="email"><br>

        <label for="password">Password: </label>
        <input type="password" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" placeholder="Password"name="pass"><br>

        <button type="submit" name="submit" >Log In</button>
    </form>
    <br>
    <p>Not Registered? <a href = "register.php">Register Here</a></p>
</div>
