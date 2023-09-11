<?php
// connecting web server to database
$servername="localhost";
$username="viiteuxx_sai";
$password="H7ceHAJ~u%~!";
$database="viiteuxx_user_details";
// Creating a connection
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
// Inserting data and storing it in database
if(isset($_POST['submit'])){
    $feedback=$_POST['feedback'];
    $sql_query = "INSERT INTO `Feedback` (`S.No.`, `Feedback`) VALUES (NULL, '$feedback')";
    if(mysqli_query($conn,$sql_query)){
        echo "Feedback sent Successfully";
    }else{
        echo "Error...".$sql_query."Failed to insert data".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>