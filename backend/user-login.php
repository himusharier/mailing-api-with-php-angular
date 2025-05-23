<?php
include_once("database-connection.php");
include_once("functions.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['email']) AND !empty($_POST['password'])) {

        $email = clean_inputs($_POST['email']);
        $password = clean_inputs($_POST['password']);

        $sql_query = "SELECT password, token FROM users WHERE email='$email'";
        $result = mysqli_query($db, $sql_query);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($count == 1) {
            $verify = password_verify($password, $row['password']);

            if ($verify) {
                $token = random_string_generator(15);

                $updateToken = "UPDATE users SET token = '$token' WHERE email = '$email'";
                $result2 = mysqli_query($db, $updateToken);
                $row2 = mysqli_fetch_assoc($result2);

                $token_query = "SELECT name, email, token FROM users WHERE email='$email'";
                $result3 = mysqli_query($db, $token_query);
                $row3 = mysqli_fetch_assoc($result3);

                http_response_code(200);
                echo json_encode([
                    'code' => 200, 
                    'status'=>'login successful', 
                    'user' => [
                        'name' => $row3['name'],
                        'email' => $row3['email'],
                        'token' => $row3['token'],
                    ]
                ]);
                exit();

            } else {
                http_response_code(401);
                echo json_encode(['code' => 401, 'status'=>'login failed']);
                exit();
            }

        } else {
            http_response_code(500);
            echo json_encode(['code' => 500, 'status'=>'internal error']);
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