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
    $mail=$_POST['email'];
    $pass=$_POST['password'];
    if (empty($mail)) {
       // header("Location: index.php?error=Email is required");
        exit();
    }else if(empty($pass)){
       // header("Location: index.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM signup_details WHERE E-mail='$mail' AND Password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['E-mail'] === $mail && $row['Password'] === $pass) {
                echo "Hi ".$row['Username']." , ";
            }else{
                echo "Location: index.php?error=Incorect Username or password";
            }
        }else{
            exit"Location: index.php?error=Incorect Username or password";
        }
    }
    mysqli_close($conn);
}
?>