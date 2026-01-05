<?php
include_once 'functions.php';


function user_login($data)
{
    $connection = config();
    $username = mysqli_real_escape_string($connection, $data['username']);
    $password = mysqli_real_escape_string($connection, $data['password']);

    $sql = "SELECT * FROM admin_tbl WHERE username = '$username'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row && $row['password'] === $password) {
        $_SESSION['username'] = $row['name'];
        header("Location: dashbord.php?m=index&p=index");
        exit;
    } else {
        header("Location: index.php?login=Error");
        exit;
    }
}

