<?php  
$servername = "localhost"; 
$username = "root";        
$password = "";             
$dbname = "form_db";     

$conn = new mysqli($servername, $username, $password, $dbname);  
if ($conn->connect_error) {  
    die("Database Connection Failed: " . $conn->connect_error);  
} else {  
    echo "";  
}   
$conn->set_charset("utf8");  
?>
