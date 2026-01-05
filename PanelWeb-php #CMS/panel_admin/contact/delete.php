<?php
include_once "../../include/functions.php";


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    delete_contact_admin($id);
    header("Location: ../dashbord.php?m=contact&p=list&delete=ok");
    exit;
} else {
    header("location: ../dashbord.php?m=contact&p=list&delete=error");
    exit;
}
