<?php
error_reporting(0);
$db = mysqli_connect("localhost", "root", "", "mailserver_main_db");
//check connection
if (mysqli_connect_errno()) {
    echo "failed";
    exit();
}
mysqli_set_charset($db, 'utf8');