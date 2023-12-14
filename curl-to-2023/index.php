<?php
function inset_user($name, $email, $phone, $pass)
{
    if (empty($pass)) {
        $password = '';
    } else {
        $password =  password_hash($pass, PASSWORD_DEFAULT);
    }

    $data = [
        'sk_key'        => '82A5C663481036616824C0510F21EDE50F734E63D14E5F657716AC38F3C0F9F6',
        'name'          => $name,
        'email'         => $email,
        'phone'         => $phone,
        'password'      => $password,
    ];

    $ch      = curl_init();
    $options = [
        CURLOPT_URL                 => 'http://localhost:8080/curl-from-2023/data.php',
        CURLOPT_CUSTOMREQUEST       => 'POST',
        CURLOPT_POSTFIELDS          => $data,
        CURLOPT_RETURNTRANSFER      => true,
    ];

    curl_setopt_array($ch, $options);

    $results    = curl_exec($ch);
    $final_data = json_decode($results, true);

    curl_close($ch);

    if ($final_data['success'] == 'New data added successfully') {
?>
        <p style="color: green"><?php echo $final_data['success']; ?></p>
    <?php
    }

    $error_message  = $final_data['message'];
    $email_error    = '';
    $pass_error     = '';
    foreach ($error_message as $single_errors) {
        foreach ($single_errors as $error) {
            if ($error == 'email') {
                $email_error = 'Email field is required';
            }
            if ($error == 'password') {
                $pass_error = 'Password field is required';
            }
        }
    }
    ?>
    <?php
    if ($email_error) {
    ?>
        <p style="color: red;"><?php echo $email_error; ?></p>
    <?php
    }
    if ($pass_error) {
    ?>
        <p style="color: red;"><?php echo $pass_error; ?></p>
    <?php
    }
    ?>
<?php
}

// inset_user('Mehedi', 'h9@.com', '01682', '12345');

function data_display()
{
    $data = [
        'user_display_sk' => 'AA4174BAACB9A082B6974B856B28D3951DF54F4955FFF1D18C4893B004AF08C3',
    ];

    $ch = curl_init();

    $options = [
        CURLOPT_URL             => 'http://localhost:8080/curl-from-2023/data.php',
        CURLOPT_CUSTOMREQUEST   => 'POST',
        CURLOPT_POSTFIELDS      => $data,
        CURLOPT_RETURNTRANSFER  => true,
    ];

    curl_setopt_array($ch, $options);
    $results        = curl_exec($ch);
    $user_results   = json_decode($results, true);

?>
    <table border="1" width='400'>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        foreach ($user_results as $single_user) {
        ?>
            <tr>
                <td><?php echo $single_user[0] ?? ''; ?></td>
                <td><?php echo $single_user[1] ?? ''; ?></td>
                <td><?php echo $single_user[2] ?? ''; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php

    // echo '<pre>';
    // print_r($user_results);
    // echo '</pre>';
}

// data_display();


function display_single_user($email)
{
    $data = [
        'single_user_sk' => '8FB1AF64D04AF66AD1FD65DD02768AD99CFBCA2C5B38352B977F2BABA0DED8D0',
        'user_mail'      => $email,
    ];

    $ch = curl_init();
    $options = [
        CURLOPT_URL             => 'http://localhost:8080/curl-from-2023/data.php',
        CURLOPT_CUSTOMREQUEST   => 'POST',
        CURLOPT_POSTFIELDS      => $data,
        CURLOPT_RETURNTRANSFER  => true,
    ];
    curl_setopt_array($ch, $options);

    $results        = curl_exec($ch);
    $single_user    = json_decode($results, true);
    curl_close($ch);

    if ($single_user[0] == 'No user found') {
    ?>
        <p style="color: red;">No user found</p>
    <?php
    } else {
        $name   = $single_user[1] ?? '';
        $email  = $single_user[2] ?? '';
        $phone  = $single_user[3] ?? '';
    ?>
        <table border="1" width='300'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $phone; ?></td>
            </tr>
        </table>
<?php
    }
}

// display_single_user('h8@g.com');


function user_login($email)
{
    $data = [
        'user_login_sk'  => '4B9B58BB71094505EB9456E038A6EB86C0E19559FA2301C5A319ED668D8705E8',
        'user_mail'      => $email,
    ];

    $ch = curl_init();
    $options = [
        CURLOPT_URL             => 'http://localhost:8080/curl-from-2023/data.php',
        CURLOPT_CUSTOMREQUEST   => 'POST',
        CURLOPT_POSTFIELDS      => $data,
        CURLOPT_RETURNTRANSFER  => true,
    ];
    curl_setopt_array($ch, $options);

    $results        = curl_exec($ch);
    curl_close($ch);
    if ($results == 1) {
        header("Location: dashboard.php");
    } else {
        echo 'No user found';
    }
}

// user_login('h8@g.com');
