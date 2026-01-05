<?php
include_once "../../include/functions.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    delete_menu_admin($id);
    header("Location: ../dashbord.php?m=menu&p=list&delete=ok");
    exit;

} else {
    header("location: ../dashbord.php?m=menu&p=list&delete=error");
    exit;
}
