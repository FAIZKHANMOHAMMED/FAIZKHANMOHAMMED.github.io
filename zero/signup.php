<?php
// connecting web server to database
$servername="localhost";
$username="viiteuxx_sai";
$password="H7ceHAJ~u%~!";
$database="viiteuxx_user_details";
//Creating a connection
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Connection Failed".mysqli_connect_error());
}
//try {
//$conn = new PDO("mysql:host=".$servername.";dbname=".$database, $username
//$password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo 'Database Connected Successfully'; 
//} catch(PDOException $error) {
  //echo "Something went wrong " . $error->getMessage();
//}
// Inserting data and storing it in database
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $password=$_POST['password'];
    $sql_query = "INSERT INTO `signup_details` (`S.No.`, `Username`, `E-mail`, `Password`) VALUES (NULL, '$name', '$mail', '$password')";
    $subject="Registered Successfully";
    $message="Dear $name,

Welcome to ZEROHUNGER! We are so glad that you have chosen to use our website to access affordable food. We know that food insecurity is a real challenge for many people, and we are committed to helping you get the food you need.

Our website connects you with food banks, soup kitchens, and other organizations that provide food to those in need. We also provide information about food stamps, government assistance programs, and other resources that can help you afford food.

To get started, please create an account on our website. Once you have created an account, you will be able to search for food banks and soup kitchens in your area. You can also view information about food stamps and other government assistance programs.

We are here to help you every step of the way. If you have any questions, please do not hesitate to contact us.

Thank you for choosing [Website Name]. We look forward to helping you get the food you need.

Yours Sincerely,
teamzerohunger."
    if(mysqli_query($conn,$sql_query)){
        echo "Data inserted Successfully";
        mail($mail,$subject,$message,"From:zerohunger@viitecm.in.net");
    }else{
        echo "Error...".$sql_query."Failed to insert data".mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>