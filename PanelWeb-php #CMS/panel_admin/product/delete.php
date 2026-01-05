<?php
include_once "../../include/functions.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_product_admin($id);
    header("Location: ../dashbord.php?m=product&p=list&delete=ok");
    exit;
} else {
    header("location: ../dashbord.php?m=product&p=list&delete=error");
    exit;
}
