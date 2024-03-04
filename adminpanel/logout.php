<?php
    include_once('./rvcore_web/init.php');
    session_destroy();
    header('Location: ./');    
    exit();
?>