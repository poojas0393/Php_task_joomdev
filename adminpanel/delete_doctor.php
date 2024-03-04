<?php
include_once('./rvcore_web/init.php');
protect_page();
//	logged_in_redirect();
	$id = $_GET['id'];
    $updateData = array(
        'active'   => 0,	
        'updated_at' => date('Y-m-d h:i:s', time())
    );
    $condition = array(
        'id'      => $id
    );
    $result = rowUpdate('doctors', $updateData, $condition);
    if($result===true) {
        header('Location: ./doctors?deleted');
    } 
?>

