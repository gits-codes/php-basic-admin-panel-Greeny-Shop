<?php

function uploader_pic_add($data,$path,$fileSize)
{
//    var_dump($data,$path);
    $connection = config();
    $sql = "INSERT INTO uploader_tbl (title,img,size) VALUES ('$data[title]','$path','$fileSize')";
    $result = mysqli_query($connection, $sql);
}
function delete_uploader($id)
{
    $connection = config();
    $sql = "DELETE FROM news_tbl WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}
function list_uploader_admin()
{
    $connection = config();
    $sql = "SELECT * FROM uploader_tbl";
    $res = mysqli_query($connection, $sql);
    $result = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}
function model_uploader_pic($file, $dir, $folder, $name)
{
    $file = $_FILES[$file];
    if (!file_exists($folder)) {
        mkdir($dir . $folder);
    }
    $filename = $file['name'];
    $array = explode('.', $filename);
    $extension = end($array);
    $new_name_pic = $name . "-" . rand() . "." . $extension;
    $from = $file['tmp_name'];
    $to = $dir . $folder . "/" . $new_name_pic;
    if (move_uploaded_file($from, $to)) {
        return array($to, $file['size']);
    } else {
        return null;
    }

}
/*




function show_news_tbl_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM news_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}


function list_news_defult()
{
    $connection = config();
    $sql = "SELECT * FROM news_tbl";
    $row = mysqli_query($connection, $sql);
    while ($res = mysqli_fetch_assoc($row)) {
        $result[] = $res;
    }
    return $result;

}

function select_news_cat()
{
    $connection = config();
    $sql = "SELECT * FROM news_cat";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}
function select_news_cat_with_id($id)
{
    $connection = config();
    $sql = "SELECT title FROM news_cat WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
    if ($row = mysqli_fetch_assoc($res)) {
        return $row['title'];
    }
    return '';
}
*/
