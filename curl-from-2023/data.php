<?php


// start user display
$user_login_sk = '4B9B58BB71094505EB9456E038A6EB86C0E19559FA2301C5A319ED668D8705E8';

if (isset($_POST['user_login_sk']) == $user_login_sk) {

    $servername     = "localhost";
    $username       = "root";
    $db_password    = "";
    $db_name        = "curl_user";
    $conn           = new mysqli($servername, $username, $db_password, $db_name);

    $user_mail          = $_POST['user_mail'] ?? '';
    $single_user_sql    = "SELECT * FROM users WHERE email='{$user_mail}'";

    if ($result = $conn->query($single_user_sql)) {
        $is_user = $result->num_rows;
        if ($is_user > 0) {
            while ($row = $result->fetch_row()) {
                $data = 1;
            }
        } else {
            $data = 0;
        }
    }
    $conn->close();

    echo $data;
    die;
}

// start user display
$single_user_sk = '8FB1AF64D04AF66AD1FD65DD02768AD99CFBCA2C5B38352B977F2BABA0DED8D0';

if (isset($_POST['single_user_sk']) == $single_user_sk) {

    $servername     = "localhost";
    $username       = "root";
    $db_password    = "";
    $db_name        = "curl_user";
    $conn           = new mysqli($servername, $username, $db_password, $db_name);

    $user_mail          = $_POST['user_mail'] ?? '';
    $single_user_sql    = "SELECT * FROM users WHERE email='{$user_mail}'";

    if ($result = $conn->query($single_user_sql)) {
        $is_user = $result->num_rows;
        if ($is_user > 0) {
            while ($row = $result->fetch_row()) {
                $data = $row;
            }
        } else {
            $data = ['No user found'];
        }
    }
    $conn->close();

    echo json_encode($data);
    die;
}


// start user display
$user_display_sk = 'AA4174BAACB9A082B6974B856B28D3951DF54F4955FFF1D18C4893B004AF08C3';
if (isset($_POST['user_display_sk']) == $user_display_sk) {

    $servername     = "localhost";
    $username       = "root";
    $db_password    = "";
    $db_name        = "curl_user";
    $conn           = new mysqli($servername, $username, $db_password, $db_name);

    $users = [];
    $get_users_sql = "SELECT * FROM users";
    $result = $conn->query($get_users_sql);
    if ($result->num_rows > 0) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $users[$i][] = $row["name"];
            $users[$i][] = $row["email"];
            $users[$i][] = $row["phone"];
            $i++;
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    echo json_encode($users);
    die;
}


// start user insert 
$access_token = '82A5C663481036616824C0510F21EDE50F734E63D14E5F657716AC38F3C0F9F6';
if (isset($_POST['sk_key']) == $access_token) {

    $servername     = "localhost";
    $username       = "root";
    $db_password    = "";
    $db_name        = "curl_user";
    $conn           = new mysqli($servername, $username, $db_password, $db_name);

    $name       = $_POST['name'] ?? '';
    $email      = $_POST['email'] ?? '';
    $phone      = $_POST['phone'] ?? '';
    $password   = $_POST['password'] ?? '';

    $error      = false;
    $message    = [];
    $success    = '';

    if (empty($email)) {
        $error_email    = [
            0 => 'email',
            1 => 'Email field is required',
        ];
        array_push($message, $error_email);
        $error          = true;
    }

    if (empty($password)) {
        $error_password    = [
            0 => 'password',
            1 => 'Password field is required',
        ];
        array_push($message, $error_password);
        $error          = true;
    }

    if ($error == true) {
    } else {
        $insert_sql = "INSERT INTO `users`( `name`, `email`, `phone`, `password`) VALUES ('{$name}','{$email}','{$phone}','{$password}')";

        if ($conn->query($insert_sql) === TRUE) {
            $success = "New data added successfully";
        }
        $conn->close();
    }

    $data = [
        'success'           => $success,
        'message'           => $message,
    ];

    echo json_encode($data);
    die;
}
