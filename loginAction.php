<?php
# Login Action Page
# Team Quincelax
# Version 1

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    # DB Connection
    require ( 'connectDB.php' ) ;

    # File to load and validate functions
    require ( 'loginTools.php' ) ;

    # Check login details
    list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

    # On success set session data and display logged in page
    if ( $check )
    {
        # Access session.
        session_start();
        $_SESSION[ 'UserID' ] = $data[ 'UserID' ] ;
        $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
        $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
        load ( 'home.php' );
    }
    # Or on failure set errors.
    else { $errors = $data; }

    # Close database connection.
    mysqli_close( $link ) ;
}

# Continue to display login page on failure.
include ( 'login.php' ) ;
?>