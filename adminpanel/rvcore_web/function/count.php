<?php
function countryCount(){
	$condition = array( 'active'  => '1' );
	$result = rowCount('forign_destinations', $condition);
	echo $result; 
}
function empCount(){
	$condition = array( 'active'  => '1' );
	$result = rowCount('embassy', $condition);
	echo $result; 
}
function testCount(){
	$condition = array( 'active'  => '1' );
	$result = rowCount('testimonials', $condition);
	echo $result; 
}
function hospitalCount(){
	$condition = array( 'active'  => '1' );
	$result = rowCount('hospitals', $condition);
	echo $result; 
}
/********************* Destinations count *********************/
function destCount(){
	$condition = array( 'active'  => '1' );
	$result = rowCount('destinations', $condition);
	echo $result; 
}
/********************** DOCTORS COUNT *************************/
function doctorsCount(){
	$condition = array( 'active'  => '1' );
	$result = rowCount('doctors', $condition);
	echo $result; 
}
/************************* Total blogs *********************************/
function activeblogsCount() {
	$condition = array( 'active'  => '1' );
	$result = rowCount('blogs', $condition);
	echo $result; 
}
/********************************total treatements****************************************/
function activeTreatementsCount() {
	$condition = array( 'active'  => '1' );
	$result = rowCount('treatments', $condition);
	echo $result; 
}
/*--------------------------------------------------- All register users Count -------------------------------------------------*/
function registerUsersCount() {
	$condition = '';
	$result = rowCount('user_account', $condition);
	echo $result; 
}

/*------------------------------------------------- All unactivated users Count ------------------------------------------------*/
function inactiveUsersCount() {
	$condition = array( 'active'  => '0' );
	$result = rowCount('user_account', $condition);
	echo $result; 
}

/*--------------------------------------------------- All activated users Count ------------------------------------------------*/
function activeUsersCount() {
	$condition = array( 'active'  => '1' );
	$result = rowCount('user_account', $condition);
	echo $result; 
}

/*--------------------------------------------------- All blocked users Count --------------------------------------------------*/
function blockedUsersCount() {
	$condition = array( 'active'  => '2' );
	$result = rowCount('user_account', $condition);
	echo $result; 
}

/*--------------------------------------------------- All logged in users Count ------------------------------------------------*/
function loggedinUsersCount() {
	$condition = array( 'modified'  => date("Y-m-d H:i:sa"), );
	$result = greaterCount('userloggedin', $condition);
	echo $result; 
} 

/*--------------------------------------------------- All register Admin Count -------------------------------------------------*/
function registerAdminCount() {
	$condition = '';
	$result = rowCount('admin_users', $condition);
	echo $result; 
}

/*------------------------------------------------- All unactivated Admin Count ------------------------------------------------*/
function inactiveAdminCount() {
	$condition = array( 'active'  => '0' );
	$result = rowCount('admin_users', $condition);
	echo $result; 
}

/*--------------------------------------------------- All activated Admin Count ------------------------------------------------*/
function activeAdminCount() {
	$condition = array( 'active'  => '1' );
	$result = rowCount('admin_users', $condition);
	echo $result; 
}

/*--------------------------------------------------- All blocked Admin Count --------------------------------------------------*/
function blockedAdminCount() {
	$condition = array( 'active'  => '2' );
	$result = rowCount('admin_users', $condition);
	echo $result; 
}

/*--------------------------------------------------- All logged in Admin Count ------------------------------------------------*/
function loggedinAdminCount() {
	$condition = array( 'modified'  => date("Y-m-d H:i:sa"), );
	$result = greaterCount('adminloggedin', $condition);
	echo $result; 
}



?>