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
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $sql_query = "INSERT INTO `contact_details` (`S.No.`, `Username`, `E-mail`, `Subject`, `Message`) VALUES (NULL, '$name', '$mail', '$subject', '$message')";
    if(mysqli_query($conn,$sql_query)){
        echo "Message sent Successfully";
        mail("zerohunger@viitecm.in.net		
",$subject,$message,"From:$mail");
    }else{
        echo "Error...".$sql_query."Failed to insert data".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>