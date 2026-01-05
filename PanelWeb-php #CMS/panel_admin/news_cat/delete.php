<?php

include_once __DIR__ . '/../../include/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_news_cat($id);
    header("Location: ../dashbord.php?m=news_cat&p=list&delete=ok");
    exit;
} else {
    header("location: ../dashbord.php?m=news_cat&p=list&delete=error");
    exit;
}



