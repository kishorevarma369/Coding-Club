<?php
include_once('includes/session.php');
if(isset($_SESSION['user_id'])) header('Location: '.'/home.php');
include_once('includes/dbcon.php');

function process_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit']))
{
    if(isset($_POST['email'])&&isset($_POST['pass']))
    {
        $email=process_input($_POST['email']);
        $pass=process_input($_POST['pass']);
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        echo $sql;
        if($ans=mysqli_query($dbcon,$sql)){
            if(mysqli_num_rows($ans)==1)
            {
                $row=mysqli_fetch_assoc($ans);
                if(password_verify($pass,$row['password'])){
                    //add what ever required
                    $_SESSION['user_id']=$row['user_id'];
                    $_SESSION['username']=$row['username'];
                }
                else $_SESSION['error']='User Email or Password Incorrect';
            }
            else
            {
                $_SESSION['error']='User Email or Password Incorrect';
            } 
        }else $_SESSION['error']='Contact Admin Problem with Login';
    }
}

    
mysqli_close($dbcon);
// echo $_SESSION['error'];
header('Location: '.'/index.php');
?>