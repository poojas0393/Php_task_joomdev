<?php
/*-------------------------------------------- Database Connection --------------------------------------------*/
function conn($type) {
    global $database;
    $hostname = $GLOBALS['hostname']; $hostuser = $GLOBALS['hostuser']; $hostpass= $GLOBALS['hostpass']; $database = $GLOBALS['database'];
	
    // MySQLi (object-oriented)    
    if(isset($type) && $type === 'obj') {
        $conn = new mysqli($hostname, $hostuser, $hostpass, $database);
        if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

    // MySQLi (procedural)
    } elseif(isset($type) && $type === 'pro') {
        $conn = mysqli_connect($hostname, $hostuser, $hostpass, $database);
        if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }
        
    //PDO
    } elseif(isset($type) && $type === 'pdo') {
        try {
            $conn = new PDO("mysql:host=$hostname;dbname=$database", $hostuser, $hostpass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) { echo "Connection failed: " . $e->getMessage();  }
		
    // MySQL (old)
    } elseif(isset($type) && $type === 'mysql') {
		$connect_error = 'Sorry we\'re experiencing connections problems.';
		// Create connection
		$conn = mysql_connect($hostname, $hostuser, $hostpass) or die($connect_error);
		mysql_select_db($database) or die($connect_error);
		
	} else {
        $conn = 'connection type not found';

    }
    return $conn;

}
// use
// $conn = conn('obj');


/*-----------------------------------------  Create database function  ----------------------------------------*/
function createDBase($database) {
	$hostname = $GLOBALS['hostname']; $hostuser = $GLOBALS['hostuser']; $hostpass = $GLOBALS['hostpass']; $database = $GLOBALS['database'];
	$conn = new mysqli($hostname, $hostuser, $hostpass);
	$sql = "CREATE DATABASE `".$database."`";
	if ($conn->query($sql) === TRUE) {
		return true; // Database created successfully
	} else {
		return "Error creating database: " . $conn->error;
	}
	$conn->close();
}
//	Ex.
//	$result = createDBase('rvtechnosols');
//	if($result===true) { echo 'Sussess'; } else { print_r($result); }


/*------------------------------------------  Create Table function  ------------------------------------------*/
function createTable($tablename) {
    $conn = conn('obj');
	$sql = "CREATE TABLE `".$tablename."` (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			firstname VARCHAR(30) NOT NULL,
			lastname VARCHAR(30) NOT NULL,
			email VARCHAR(50),
			reg_date TIMESTAMP
			)";
	if ($conn->query($sql) === TRUE) {
		return true; // Table MyGuests created successfully
	} else {
		echo "Error creating table: " . $conn->error;
	}
	$conn->close();
}
//	Ex.
//	$result = createTable('rvtechnosols');
//	if($result===true) { echo 'Sussess'; } else { print_r($result); }


/*-------------------------------------------  Insert Row function  -------------------------------------------*/
function rowInsert($tablename, $insert_data) {
    //array_walk($insert_data, 'array_sanitize');
    $conn = conn('obj');
	$fields = '`' . implode('`, `', array_keys($insert_data)) . '`';
    $data = '\'' . implode('\', \'', $insert_data) . '\'' ;
    $sql = "INSERT INTO `".$tablename."` ($fields) VALUES ($data)";
    if ($conn->query($sql) === true) { return true; } else { return false; }
    $conn->close(); 
}
/*
//  Ex.
	$insert_data = array(
		'username'  => '<b>Shubham Kumar</b>',
		'password'	=> '8085873396'
		);
	$result =rowInsert('admin_users', $insert_data);
    if($result===true) { echo 'Sussess'; } elseif($result===false) { echo 'lost'; }
*/

/*-----------------------------------------  Insert Multiple function  -----------------------------------------*/
function multiInsert($tablename, $insert_data) {
	$count = count($insert_data);
	for ($row = 0; $row < $count; $row++) {
		array_walk($insert_data[$row], 'array_sanitize');
		$fields[$row] = '`' . implode('`, `', array_keys($insert_data[$row])) . '`';
		$data[$row] = '\'' . implode('\', \'', $insert_data[$row]) . '\'' ;
		@$sql .= "INSERT INTO `".$tablename."` ($fields[$row]) VALUES ($data[$row]);";
	}
	$conn = conn('obj');
	if ($conn->multi_query($sql) === true) { return true; } else { return "Error: " . $sql . "<br>" . $conn->error; }
    $conn->close(); 
}
////  Ex.
//	$insert_data = array (
//		array('username'  => '<b>rv</b>', 'password'	=> '8085873396', 'fname'	=> 'Rajveer1'),
//		array('username'  => '<b>rv</b>', 'password'	=> '8085873396', 'fname'	=> 'Rajveer2'),
//		array('username'  => '<b>rv</b>', 'password'	=> '8085873396', 'fname'	=> 'Rajveer3'),
//		array('username'  => '<b>rv</b>', 'password'	=> '8085873396', 'fname'	=> 'Rajveer4')
//	);
//	
//	$result = multiInsert('admin_users', $insert_data);
//    if($result===true) { echo 'Sussess'; } else { echo $result; }


/*-------------------------------------------  Update Row function  -------------------------------------------*/
function rowUpdate($tablename, $updateData, $condition) {
    //array_walk($updateData, 'array_sanitize');
    array_walk($condition, 'array_sanitize');
    $conn = conn('obj');
    foreach($updateData as $field=>$data) { $update[] = '`' . $field . '` =\'' . $data . '\''; }
    foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` =\'' . $conddata . '\''; }
    $sql = "UPDATE `".$tablename."` SET" . implode(', ', $update) . " WHERE ". implode(' AND ', $where) ."";
    if ($conn->query($sql) === true) { return true; } else { return false; }
    $conn->close(); 
}
/*
//  Ex.
	$updateData = array(
		'username'  => '<b>rajveer</b>',
		'password'	=> '9876543210'
	);
    $condition = array(
        'idkeys'  => '3',
        'fname'     => 'shubh'
    );
	$result = rowUpdate('admin_users', $updateData, $condition);
	if($result===true) { echo 'Sussess'; } elseif($result===false) { echo 'lost'; }
*/
/*-------------------------------------------  Select Row function  -------------------------------------------*/
function rowSelect($tablename, $condition) {
    $conn = conn('obj');
    $result = array(); $where = array();
    $func_num_args = func_num_args(); $func_get_args = func_get_args();
    if ($func_num_args > 1) {
        unset($func_get_args[0]); unset($func_get_args[1]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        if(!empty($condition)) {
            foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` =\'' . $conddata . '\''; }
            $sql = $conn->query("SELECT $fields FROM $tablename WHERE ". implode(' AND ', $where) ."");            
        } else {
            $sql = $conn->query("SELECT $fields FROM $tablename");
        }
        $count = $sql->num_rows;
		if($count>=1) {
			for ($x = 0; $x < $count; $x++) {
				$row = $sql->fetch_assoc();
				foreach ($func_get_args as $value) {
					$result['data'][$x][$value] = $row[$value];;
				}
			}
		} else {
			$result = false;
		}
        return($result);
    }
}
/*-------------------------------------------  Select Row function  -------------------------------------------*/
function rowSelectDesc($tablename, $condition) {
    $conn = conn('obj');
    $result = array(); $where = array();
    $func_num_args = func_num_args(); $func_get_args = func_get_args();
    if ($func_num_args > 1) {
        unset($func_get_args[0]); unset($func_get_args[1]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        if(!empty($condition)) {
            foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` =\'' . $conddata . '\''; }
            $sql = $conn->query("SELECT $fields FROM $tablename WHERE ". implode(' AND ', $where) ." ORDER BY id DESC");            
        } else {
            $sql = $conn->query("SELECT $fields FROM $tablename ORDER BY id DESC");
        }
        $count = $sql->num_rows;
		if($count>=1) {
			for ($x = 0; $x < $count; $x++) {
				$row = $sql->fetch_assoc();
				foreach ($func_get_args as $value) {
					$result['data'][$x][$value] = $row[$value];;
				}
			}
		} else {
			$result = false;
		}
        return($result);
    }
}
/*
// ex.
	$condition = array(
		'rvloginId'  => '1',
	);
	$tabledata = rowSelect('user_account', $condition, 'id', 'fname', 'lname');
	$tableList = $tabledata['data'];
	echo $tableList[0]['id'].' '.$tableList[0]['fname'].' '.$tableList[0]['lname'];
	foreach($tableList as $data) {
		echo $data['id'].' '.$data['fname'].' '.$data['lname'].'<br />';
	}
*/


/*-------------------------------------------  Select Row function  -------------------------------------------*/
function rowSelectLike($tablename, $condition) {
    $conn = conn('obj');
    $result = array(); $where = array();
    $func_num_args = func_num_args(); $func_get_args = func_get_args();
    if ($func_num_args > 1) {
        unset($func_get_args[0]); unset($func_get_args[1]);
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` LIKE \'' . $conddata . '%\''; }
		$sql = $conn->query("SELECT $fields FROM $tablename WHERE ". implode(' OR ', $where) ."");            
        $count = $sql->num_rows;
        for ($x = 0; $x < $count; $x++) {
            $row = $sql->fetch_assoc();
            foreach ($func_get_args as $value) {
                $result['data'][$x][$value] = $row[$value];;
            }
        }
        return($result);
    }
}
/*
// ex.
	$condition = array(
		'name'  => 'pr',
	);
	$tabledata = rowSelectLike('web_content', $condition, 'id', 'name', 'title');
	$tableList = $tabledata['data'];
	echo $tableList[0]['id'].' '.$tableList[0]['name'].' '.$tableList[0]['title'].'<br /><br /><br />';
	foreach($tableList as $data) {
		echo $data['id'].' '.$data['name'].' '.$data['title'].'<br />';
	}
*/
	
/*-------------------------------------------  Delete Row function  -------------------------------------------*/
function rowDelete($tablename, $condition) {
    $conn = conn('obj');
	foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` =\'' . $conddata . '\''; }
	$sql = "SELECT * FROM `".$tablename."` WHERE ". implode(' AND ', $where) ."";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$delsql = "DELETE FROM `".$tablename."` WHERE ". implode(' AND ', $where) ."";
		if ($conn->query($delsql) === true) { return true; } else { return false; }
	} else { return "0"; }
	$conn->close();
}
//	Ex.
//	$condition = array(
//	'idkeys'  => '2',
//	'fname'     => 'shubh'
//	);
//	$result = rowDelete('admin_users', $condition);
//	if($result===true) { echo 'Sussess'; } elseif($result===false) { echo 'lost'; } elseif($result==0) { echo '0 results ( row not found )'; }


/*-------------------------------------------  Row count function  -------------------------------------------*/
function rowCount($tablename, $condition) {
    $conn = conn('obj');
	if(!empty($condition)) {
		foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` =\'' . $conddata . '\''; } 
		$sql = "SELECT * FROM `".$tablename."` WHERE ". implode(' AND ', $where) ."";         
	} else {
		$sql = "SELECT * FROM `".$tablename."`";
	}
	$result = $conn->query($sql);
	return $result->num_rows;
	$conn->close();
}
/*
//	Ex.
	$condition = array(
		'name'  => 'process'
	);
	$result = rowCount('web_content', $condition);
	echo $result;
*/

/*-------------------------------------------  Row count function  -------------------------------------------*/
function greaterCount($tablename, $condition) {
    $conn = conn('obj');
	if(!empty($condition)) {
		foreach($condition as $field=>$conddata) { $where[] = '`' . $field . '` >\'' . $conddata . '\''; } 
		$sql = "SELECT * FROM `".$tablename."` WHERE ". implode(' AND ', $where) ."";
	} else {
		$sql = "SELECT * FROM `".$tablename."`";
	}
	$result = $conn->query($sql);
	return $result->num_rows;
	$conn->close();
}
/*
//	Ex.
	$condition = array( 'datatime'  => '2018-02-05 10:12:11' );
	$result = greaterCount('adminloggedin', $condition);
	echo $result;  
*/

/*--------------------------------- Data sanitizeing ( Cross site Scripting ) ---------------------------------*/
function array_sanitize(&$item) {
    $conn = conn('obj');
    $item = htmlentities(strip_tags(mysqli_real_escape_string($conn, $item)));
}

/*-------------------------- Sanitize all array data  ( Cross site Scripting ) --------------------------------*/
function sanitize($data) {
    $conn = conn('obj');
    return htmlentities(strip_tags(mysqli_real_escape_string($conn, $data)));
}
?>