<?php 
    include "PHP/connection.inc.php";
    session_start();
    $_SESSION['ID'] = '';
    $_SESSION['name'] = '';
    $_SESSION['email'] = '';
    $_SESSION['phone'] = '';
    $_SESSION['DOB'] = '';
    $_SESSION['ip_address'] = '';
    $_SESSION['last_login'] = '';
    $_SESSION['last_login_ip_address'] = '';
    $_SESSION['last_login_timestamp'] = '';
    $_SESSION['country_code'] = '';
    $_SESSION['state'] = '';
    $_SESSION['district'] = '';
    $_SESSION['zip_code'] = '';
    $_SESSION['street'] = '';
    $_SESSION['token'] = '';
    $_SESSION['date'] = date("Y-m-d", strtotime('-13 year'));
    $path = $_SERVER['PHP_SELF'];
    $csrf_token = hash("sha256", md5(uniqid(rand(), true)));
    $csrf_token_time = time();
    function bn ($a) {
        return basename($a);
    }

    // if(bn($path) == 'login.php' OR bn($path) == 'signup.php'){
    //     if(bn($path) != 'index.php'){
    //         if (isset($_SESSION['admin'])) {
    //             header('location: index.php');
    //         }
    //     }
    // }
    $_KAB = [
        "user" => [
            "ID" => $_SESSION['ID'],
            "name" => $_SESSION['name'],
            "email" => $_SESSION['email'],
            "phone" => $_SESSION['phone'],
            "DOB" => $_SESSION['DOB'],
            "ip_address" => $_SESSION['ip_address'],
            "last_login" => $_SESSION['last_login'],
            "last_login_ip_address" => $_SESSION['last_login_ip_address'],
            "token" => $_SESSION['token'],
            "last_login_timestamp" => $_SESSION['last_login_timestamp'],
            "country_code" => $_SESSION['country_code'],
            "state" => $_SESSION['state'],
            "district" => $_SESSION['district'],
            "zip_code" => $_SESSION['zip_code'],
            "street" => $_SESSION['street']
        ],
        "generate" => [
            "CSRF" => [
                "token" => $csrf_token,
                "time" => $csrf_token_time
            ],
            "token" => [
                "unique_id" => uniqid(rand(), true),
                "md5" => md5(uniqid(rand(), true)),
                "sha1" => sha1(uniqid(rand(), true)),
                "sha256"=> hash('sha256', uniqid(rand(), true)),
                "auto"=> md5(hash('sha256', sha1(uniqid(rand(), true))))
            ]
        ]
    ];
    // echo $_SERVER['PHP_SELF'];
?>