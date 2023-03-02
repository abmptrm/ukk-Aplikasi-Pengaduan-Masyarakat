<?php
    
    session_start();

    if ( $_SESSION["level"] === "admin" || $_SESSION["level"] === "petugas" ) {
        session_unset();
        session_destroy();
        header( "location: login-p.php?pesan=logout" );
    } else {
        session_unset();
        session_destroy();
        header( "location: login.php?pesan=logout" );
    }

?>