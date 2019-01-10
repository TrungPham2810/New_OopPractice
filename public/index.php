<?php session_start();
    include_once('../application/controller/__autoload.php');
    include_once('../application/config/config.php');
    include_once('../application/model/Db.php');
    include ('../application/view/template/Header.php');
    if (!empty($_GET)) {
        $action = $_GET['action'];
    switch($action) {
        case 'content':
            include ('../application/view/Content.php');
            break;
        case 'delete':
            include ('../application/controller/DeleteNews.php');
        // default :
        //     include ('../application/view/HomePage.php');
        //     include ('../application/view/Showdata.php');
    }
    } else {
            include ('../application/view/HomePage.php');
            include ('../application/view/Showdata.php');
    }
    include ('../application/view/template/Footer.php');
?>