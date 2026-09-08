<?php
/**
 * using mysqli_connect for database connection
 */
// {
// $databaseHost = 'localhost';
// $databaseName = 'komersial_data';
// $databaseUsername = 'root';
// $databasePassword = '';

// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


 
// }

        session_start();
            if (!isset($_SESSION['lang']))
                $_SESSION['lang'] = "en";
        else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
            if ($_GET['lang'] == "en")
                $_SESSION['lang'] = "en";
            else if ($_GET['lang'] == "in")
                $_SESSION['lang'] = "in";
}
require_once "languages/" . $_SESSION['lang'] . ".php";

?>