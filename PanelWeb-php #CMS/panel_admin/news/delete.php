<?php
include_once "../../include/functions.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_news_tbl_admin($id);
    header("Location: ../dashbord.php?m=news&p=list&delete=ok");
    exit;
} else {
    header("location: ../dashbord.php?m=news&p=list&delete=error");
    exit;
}
