<?php

function add_pages($data)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO page_tbl (title,keyword,description,body) VALUES ('$data[title]','$data[keyword]','$data[description]','$data[body]')";
    mysqli_query($connection, $sql);
}

function list_page_admin()
{
    $connection = config();
    $sql = "SELECT * FROM page_tbl";
    $res = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $result[] = $row;
    }
    return $result;
}
function edit_show_page($data,$id)
{
//    var_dump($data);
    $connection = config();
    $sql = "UPDATE page_tbl SET title= '$data[title]',keyword='$data[keyword]',description = '$data[description]',body = '$data[body]' WHERE id = '$id'";
    mysqli_query($connection, $sql);

}
function show_page_edit($id)
{
    $connection = config();
    $sql = "SELECT * FROM page_tbl WHERE id='$id'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    return $res;
}
function delete_page_admin($id)
{
    $connection = config();
    $sql = "DELETE FROM page_tbl WHERE id='$id'";
    $res = mysqli_query($connection, $sql);
}


/*
function add_news_cat($data,$path)
{
//    var_dump($data);
    $connection = config();
    $sql = "INSERT INTO news_tbl (title,text,img,news_cat,date) VALUES ('$data[title]','$data[text]','$path','$data[news_cat]','$data[date]')";
    $result = mysqli_query($connection, $sql);
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

