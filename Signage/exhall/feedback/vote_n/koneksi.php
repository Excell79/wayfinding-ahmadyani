<?php
include "../parserversion/mysql.php";
    $conn = mysql_connect('localhost','root','');
    if(!$conn)
    {
        die('tidak bisa melakukan koneksi'.mysql_error());
    }
    mysql_select_db('feedback',$conn);
?>
