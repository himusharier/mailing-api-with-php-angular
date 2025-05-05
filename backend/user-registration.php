<?php
include_once("database-connection.php");
include_once("functions.php");
include_once("mail-server-config.php");
include_once("ip-details.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {

        $name = clean_inputs($_POST['name']);
        $email = clean_inputs($_POST['email']);
        $password = clean_inputs($_POST['password']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $chk_sql_query = "SELECT * FROM users WHERE email='$email'";
            $chk_result = mysqli_query($db, $chk_sql_query);
            $row = mysqli_fetch_assoc($chk_result);

            if ($row["email"] == $email) {
                http_response_code(400);
                echo json_encode(['code' => 400, 'status'=>'email already registered']);
                exit();

            } else {                
                $passwordEncrypt = password_hash($password, PASSWORD_BCRYPT);
                $user_id = rand(001, 999) . date('dmYGis');
                
                $datetime = time();

                $auth = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz@#$%^&*()!-+"), 0, 25);

                $sql_query = "INSERT INTO users (user_id, name, email, password, service_auth, token, datetime) VALUES ('$user_id', '$name', '$email', '$passwordEncrypt', '$auth', '$token', '$datetime')";
                
                if (mysqli_query($db, $sql_query)) {
                    $chk_sql_query = "SELECT name, email FROM users WHERE email='$email'";
                    $chk_result = mysqli_query($db, $chk_sql_query);
                    $row = mysqli_fetch_assoc($chk_result);

                    http_response_code(200);
                    echo json_encode([
                        'code' => 200, 
                        'status' => 'registrsation successful',
                        'user' => [
                            'name' => $row["name"],
                            'email' => $row["email"]
                        ]
                    ]);
                    exit();

                } else {
                    http_response_code(400);
                    echo json_encode(['code' => 400, 'status' => 'registration failed']);
                    exit();
                }
            }

        } else {
            http_response_code(400);
            echo json_encode(['code' => 400, 'status'=>'not valid email']);
            exit();
        }

    } else {
        http_response_code(400);
        echo json_encode(['code' => 400, 'status'=>'wrong input']);
        exit();
    }

} else {
    http_response_code(405);
    echo json_encode(['code' => 405, 'status'=>'method not allowed']);
    exit();
}