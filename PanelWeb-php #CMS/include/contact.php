<?php
function add_contact($data)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO contact_tbl (name,email,subject,text) VALUES ('$data[name]','$data[email]','$data[subject]','$data[text]')";
    $result = mysqli_query($connection, $sql);
}

function list_contact_admin()
{
    $connection = config();
    $sql = "SELECT * FROM contact_tbl";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}

function delete_contact_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM contact_tbl WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}

function show_contact_detail($id)
{
    $connection = config();
    $sql = "SELECT * FROM contact_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);
    return $res;
}


