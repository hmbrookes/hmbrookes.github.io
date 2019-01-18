<?php
# Registration Page
# Team Quincelax
# Version 1

# Navigation
include 'header.html';

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
    echo '<p id="err_msg">Oops! There was a problem:<br>' ;
    foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
    echo 'Please try again or Register</p>' ;
}

# Checks form submitted
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    # DB Connection File Link
    require ('connectDB.php');

    # Initialize an error array to store error(s) in the form
    $errors = array();

    # Checks if there is a first name entered
    if ( empty( $_POST[ 'first_name' ] ) )
    { $errors[] = 'Enter your first name.' ; }
    else
    { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

    # Check if there is a surname entered
    if (empty( $_POST[ 'last_name' ] ) )
    { $errors[] = 'Enter your last name.' ; }
    else
    { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

    # Checks for an email address
    if ( empty( $_POST[ 'email' ] ) )
    { $errors[] = 'Enter your email address.'; }
    else
    { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

    # Checks for a password entered and for both to match
    if ( !empty($_POST[ 'pass1' ] ) )
    {
        if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
        { $errors[] = 'Passwords do not match.' ; }
        else
        { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
    }
    else { $errors[] = 'Enter your password.' ; }

    # Checks if email address already in DB
    if ( empty( $errors ) )
    {
        $query = "SELECT user_id FROM users WHERE email='$e'" ;
        $result = @mysqli_query ( $link, $query ) ;
        if ( mysqli_num_rows( $result ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
    }

    # Age Validation
    if (empty( $_POST[ 'DofB' ] ) )
    { $errors[] = 'Enter your Date of Birth.' ; }
    else
    {
        $date = $_POST[ 'DofB' ];
        $age = intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
        if ($age < 18){
            $errors[] = 'Sorry, you are too young to create an account.' ;
        }
        else{
            $DofB = mysqli_real_escape_string( $link, trim( $_POST[ 'DofB' ] ) ) ;
        }
    }

    # On an error free form it enters the data into the DB
    if ( empty( $errors ) )
    {
        $p1 = $hashed_password = password_hash($p, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (first_name, last_name, email, pass, DofB, alevel) VALUES ('$fn', '$ln', '$e', SHA1('$p1'), '$DofB', '0')";
        $result = @mysqli_query ( $link, $query ) ;
        if ($result)
        { echo '<div class="formRL"><h1>Registered!</h1><p>You are now registered.</p><p><a href="login.php">Login</a></p></div>'; }
        # Close DB connection
        mysqli_close($link);

        # Exit script:
        exit();
    }
    # Or report errors.
    else
    {
        echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
        foreach ( $errors as $msg )
        { echo " - $msg<br>" ; }
        echo 'Please try again.</p>';
        # Close database connection.
        mysqli_close( $link );
    }
}
?>

<!-- Display body section. -->
<div class="formRL">
    <h1>Registration</h1>
    <p>If you do please <a href = "login.php">login here</a></p>

    <!-- Form -->
    <form action="register.php" method="post">
        <label for="first_name">First Name:</label><br>
        <input type="text" name="first_name"  required pattern="^[a-zA-Z]+$" placeholder="First Name"value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>">
        <br>

        <label for="last_name">Last Name:</label><br>
        <input type="text" name="last_name"  required pattern="^[a-zA-Z]+$" placeholder="Last Name"value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
        <br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" required pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
        <br>

        <label for="DofB">Date of Birth:</label><br>
        <input type="date" name="DofB" min = "1895-01-01" placeholder="Date of Birth" value="<?php if (isset($_POST['DofB'])) echo $_POST['DofB']; ?>">
        <br>

        <label for="password">Password (minimum of 6 characters, 1 letter and 1 number):</label><br>
        <input type="password" name="pass1" placeholder="Password" pattern = "(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
        <br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" name="pass2" placeholder="Confirm Password" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
        <br>

        <button type="submit" name="submit" >Register</button><br>
    </form>
    <br>

    <p>Already got an account? <a href = "login.php">Login Here</a></p>
</div>