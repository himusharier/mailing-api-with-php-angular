<?php
include_once("database-connection.php");
include_once("functions.php");
include_once("mail-server-config.php");
include_once("ip-details.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {

        $name = clean_inputs($_POST['name']);
        $email = clean_inputs($_POST['email']);
        $password = clean_inputs($_POST['password']);

        $user_id = rand(000001, 999999) . date('dmYGis');
        $datetime = time();

        $auth = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz@#$%^&*()!-+"), 0, 21);

        $sql_query = "INSERT INTO users (user_id, name, email, password, auth, datetime) VALUES ('$user_id', '$name', '$email', '$password', '$auth', '$datetime')";

        
        if (mysqli_query($db, $sql_query)) {
            //echo "success";
            echo json_encode(['code' => 200, 'status' => 'success']);
            exit();
        } else {
            //echo "failed";
            echo json_encode(['code' => 401, 'status' => 'failed']);
            exit();
        }
        

    } else {
        //echo "error";
        echo json_encode(['code' => 401, 'status'=>'error']);
        exit();
    }

} else {
    exit();
}