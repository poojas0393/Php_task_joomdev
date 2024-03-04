<?php
include_once('./rvcore_web/init.php');
$conn = conn('obj');
if(!empty($_POST["country_id"])){
    //Fetch all state data
    $query = $conn->query("SELECT * FROM rv_states WHERE country_id = ".$_POST['country_id']." AND status = 1 ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select state</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}elseif(!empty($_POST["state_id"])){
    //Fetch all city data
    $query = $conn->query("SELECT * FROM rv_cities WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //City option list
    if($rowCount > 0){
        echo '<option value="">Select city</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>