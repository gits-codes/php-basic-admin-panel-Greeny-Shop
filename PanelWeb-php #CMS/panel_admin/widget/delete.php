<?php
include_once "../../include/functions.php";


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    delete_widget_admin($id);
    header("Location: ../dashbord.php?m=widget&p=list&delete=ok");
    exit;
} else {
    header("location: ../dashbord.php?m=widget&p=list&delete=error");
    exit;
}
