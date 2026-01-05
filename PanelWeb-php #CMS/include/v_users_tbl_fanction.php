<?php
include_once "functions.php";
function v_users_tbl($data)
{
    $connection = config();
    $sql = "INSERT INTO v_users_tbl (username,email,password) VALUES ('$data[username]','$data[email]','$data[password]')";
    mysqli_query($connection, $sql);
    header("location: ../Site+1/login.php");
}

function v_users_login($data)
{
    session_start();
    $connection = config();
    $email = mysqli_real_escape_string($connection, $data['email']);
    $password = mysqli_real_escape_string($connection, $data['password']);
    $sql = "SELECT * FROM v_users_tbl WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row && $row['password'] == $password) {
        $_SESSION['user_id'] = $row['id'];
        header("location: index.php");
        exit();
    } else {
        header("location: login.php?wrong-login");
    }

}



















